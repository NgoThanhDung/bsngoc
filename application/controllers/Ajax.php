<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Ajax extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  /**
   * Tạo alias // Cũ, thay thế = create_slug()
   */
  public function create_alias()
  {
    $unicode = $this->input->get('unicode');
    //myhelper_helper.php
    echo make_alias($unicode);
  }

  /**
   * Tạo slug // 02/04/2019
   */
  public function create_slug()
  {
    $raw_slug = $this->input->get('raw_slug');
    //myhelper_helper.php
    echo json_encode([
      'slug' => make_alias($raw_slug)
    ]);
  }

  public function get_menu_children_by_parent_id($parent_id, $exception_id, $type)
  {
    $this->load->model('menu_model', 'Menu');
    $menu_children = $this->Menu->get_children($parent_id, ['id !=' => $exception_id, 'type' => $type]);
    $this->load->view('backend/components/menu_order', ['menu_children' => $menu_children]);
  }

  /**
   * Tạo phiên bản khi thêm sản phẩm (màu sắc, kích thước)
   */
  public function create_products_version()
  {
    $this->load->library('cart');
    $this->cart->destroy();
    $product_name   = $this->input->get('product_name') ? $this->input->get('product_name') : "unknown";
    // echo $product_name; return;
    $color_str_list = $this->input->get('color_str_list');
    $size_str_list  = $this->input->get('size_str_list');
    $this->load->model('Color_model', 'Color');
    $this->load->model('Size_model', 'Size');
    $color_id_array = explode(',', $color_str_list);
    $size_id_array  = explode(',', $size_str_list);

    $color_array    = $this->Color->get_colors_by_id_list($color_id_array);
    $size_array     = $this->Size->get_sizes_by_id_list($size_id_array);
    // $this->prt($size_array);
    // return;

    $versions       = [];
    $i              = 1;
    foreach ($size_array as $index => $size) {
      foreach ($color_array as $index => $color) {
        $versions[] = [
        'id'      => 'version' . $i++,
        'qty'     => '1',
        'price'   => 0,
        'name'    => $product_name,
        'options' => array(
          'Size'  => [
            'label' => 'Kích thước',
            'value' => $size['name'],
            'id'    => $size['id'],
          ],
          'Color' => [
            'label' => 'Màu',
            'value' => $color['name'],
            'id'    => $color['id'],
          ]
        )
        ];
      }
    }
    // CART
    $this->cart->insert($versions);
    // $this->prt($this->cart->contents());
    // return;

    $this->load->view('backend/components/product-versions-table');
  }

  // Xóa 1 phiên bản khi thêm sản phẩm
  public function remove_product_version()
  {
    $rowid = $this->input->get('rowid');
    $this->load->library('cart');
    $this->cart->remove($rowid);
    if ($this->cart->total_items() > 0) {
      $this->load->view('backend/components/product-versions-table');
    } else {
      echo " ";
    }
  }


  public function update_order_is_paid_status()
  {
    $order_id = $this->input->get('order_id');
    $this->load->model('order_model', 'Order');
    $order = $this->Order->find($order_id);
    if ($order) {
      if ($order->is_paid) {
        $order->is_paid = 0;
      } else {
        $order->is_paid = 1;
      }
      $this->Order->update($order);

    }

  }


  // =========================================== USER ===========================================
  public function get_product_details()
  {

    $product_id = $this->input->get('product_id');
    $size = $this->input->get('size');
    $this->load->model('product_detail_model', 'ProductDetail');
    $details = $this->ProductDetail->get_versions_by_productid_and_size($product_id, $size);
    $this->load->view('frontend/components/product-versions', ['details' => $details]);

  }


  public function add_to_cart()
  {

    $this->load->model('product_model', 'Product');
    $this->load->model('product_wholesale_model', 'ProductWholesale');
    $this->load->library('cart');
    $summary = $this->input->get('summary');
    foreach ($summary as $summary_item) {

      $product_id = $summary_item['product_id'];
      // $color = $summary_item['color'];
      break;

    }
    $product = $this->Product->get_product_by_id($product_id);
    $product_wholesale = $this->ProductWholesale->get_product_wholesale($product_id);
    // 1. Phải insert vô cart trước
    // 2. Sau đó xóa cart đi, (trước khi xóa lưu cart vào 1 biến nào đó)
    // 3. Từ biến mới lưu đó, tạo lại cart mới - có update đơn giá theo số lượng mua sỉ
    $versions = [];
    foreach ($summary as $version_id => $summary_item) {

      $size = $summary_item['size'];
      $quantity = $summary_item['number'];
      $price = 0;
      $versions[] = [
      'id'      => $product_id . '-' . $version_id,
      'qty'     => $summary_item['number'],
      'price'   => $price,
      'name'    => $product['name'],
      'options' => array(
      'size'       => $size,
      'color'      => $summary_item['color'],
      'image'      => $product['image'],
      'product_id' => $product_id,
      'version_id' => $version_id
      )
      ];

    }
    // $this->prt($versions);
    $this->cart->insert($versions);
    $cart_clone = $this->cart->contents();
    $this->cart->destroy();
    $this->recreate_cart_session($cart_clone, $product_wholesale, $product_id);

  }

  // Khi thay đổi số lượng muốn mua ở trang chi tiết sản phẩm -> ...
  public function calculate_subtotal_money_when_changing_qty()
  {
    $product_id = $this->input->get('product_id');
    $size = $this->input->get('size');
    $quantity = $this->input->get('quantity');
    $quantity += $this->calculate_the_temp_qty($product_id, $size);
    $this->load->model('product_wholesale_model', 'ProductWholesale');
    $product_wholesale = $this->ProductWholesale->get_product_wholesale($product_id);
    $price = $this->get_wholesale_price_by_product($product_wholesale, $size, $quantity);
    // echo $price*$this->input->get('quantity');
    echo $price * $quantity;
    return;
  }

  // Khi thay đổi số lượng muốn mua ở trang chi tiết sản phẩm -> ...
  public function calculate_the_temp_qty($product_id, $size)
  {

    // Chú ý ở đây, nếu thêm sản phẩm mà không hiện tiền thì có thể đang có session cart phía admin
    // Vào tab ẩn danh để test lại
    $this->load->library('cart');
    $quantity = 0;
    if ($this->cart->contents()) {
      $cart_clone = $this->cart->contents();
      foreach ($cart_clone as $cart_item) {
        $cart_item_product_id = $cart_item['options']['product_id'];
        $cart_item_product_size = $cart_item['options']['size'];
        if ($cart_item_product_id == $product_id && $cart_item_product_size == $size) {
          $quantity += $cart_item['qty'];
        }
      }
    }
    return $quantity;
  }


  public function recreate_cart_session($cart, $product_wholesale, $product_id)
  {

    foreach ($cart as $cart_item) {

      $price = $cart_item['price'];
      $size = $cart_item['options']['size'];
      // sửa lại -> tìm hết những thằng cùng size -> cộng số lượng -> lấy giá
      $quantity = $cart_item['qty'];
      $total_qty_by_size = $this->sum_quantity_by_size($size, $cart);
      $id = $cart_item['options']['product_id'];
      if ($id == $product_id) {

        $price = $this->get_wholesale_price_by_product($product_wholesale, $size, $total_qty_by_size);

      }
      $data = [
      'id'      => $cart_item['id'],
      'qty'     => $quantity,
      'price'   => $price,
      'name'    => $cart_item['name'],
      'options' => array(
      'size'       => $size,
      'color'      => $cart_item['options']['color'],
      'image'      => $cart_item['options']['image'],
      'product_id' => $cart_item['options']['product_id'],
      'version_id' => $cart_item['options']['version_id']
      )
      ];
      $this->cart->insert($data);

    }

  }


  public function sum_quantity_by_size($size, $cart)
  {

    $quantity = 0;
    foreach ($cart as $item) {

      if ($item['options']['size'] == $size) {

        $quantity += $item['qty'];

      }

    }
    return $quantity > 0 ? $quantity : 1;

  }


  public function get_wholesale_price_by_product($product_wholesale, $size, $quantity)
  {

    $price = 0;
    foreach ($product_wholesale as $key => $wholesale) {

      if ($size == $wholesale['product_size']) {


        $min = $wholesale['from_quantity'];
        $max = $wholesale['to_quantity'] == 0 ? INF : $wholesale['to_quantity'];
        if ($quantity >= $min && $quantity <= $max) {

          $price = $wholesale['price'];

        }

      }

    }
    return $price;

  }


  // =================================================== END USER ============================================
}
