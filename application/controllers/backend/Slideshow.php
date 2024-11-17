<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Slideshow extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Slideshow_model', 'Slideshow');
		$this->load->model('Slideshow_slide_model', 'SlideshowSlide');

		$this->load->library('datatable'); // loaded my custom serverside datatable library
		// $this->doing_maintenance();
	}

	/**
	 * Render trang danh sách slideshow
	 * @return ---
	 */
	public function render_slideshow_list_page()
	{
		// echo "slideshow"; return;
		$view_data = [
			'title'       => 'Danh sách Slideshow',
			'view'        => 'backend/pages/slideshow/slideshow_list',
			'check_table' => $this->Slideshow->check_table(),
			'tab'         => 'slideshow,slideshow_list',
		];
		// $slideshows = $this->Slideshow->get_slideshows_for_datatable();
		// echo $slideshows;return;
		$this->load->view('backend/layout', $view_data);
	}

	/**
	 * Lấy dữ liệu cho datatable
	 *
	 */
	public function slideshow_datatable_json()
	{
		$slideshows     = $this->Slideshow->get_slideshows_for_datatable();
		$slideshow_data = array();
		foreach ($slideshows['data'] as $slideshow) {

			$preview_link  = base_url("admin/slideshow/" . $slideshow['slideshow_id'] . "/preview");
			$delete_button = '<a data-slideshow-name="' . $slideshow['slideshow_name'] . '" data-href="' . base_url("admin/slideshow/" . $slideshow['slideshow_id'] . "/delete") . '" href="#/" class="delete-action"><i class="la la-close delete"></i></a>';

			$slideshow_data[] = array(
				$slideshow['slideshow_id'],
				'<a target="_blank" href="' . $preview_link . '">' . $slideshow['slideshow_name'] . '</a>',
				'<div class="action-buttons td-actions text-right">
				<a href="' . base_url("admin/slideshow/" . $slideshow['slideshow_id'] . "/edit") . '" class="edit-action"><i class="la la-edit edit"></i></a>
				' . $delete_button . '
				</div>'
			);
		}
		$slideshows['data'] = $slideshow_data;
		echo json_encode($slideshows);
	}

	/**
	 * Render trang tạo slideshow
	 * @return [type] [description]
	 */
	public function render_create_slideshow_page()
	{
		$view_data = [
			'title'     => 'Thêm mới Slideshow',
			'view'      => 'backend/pages/slideshow/slideshow_create',
			'tab'       => 'slideshow,slideshow_create',
		];

		$this->load->view('backend/layout', $view_data);
	}

	/**
	 * AJAX - Thêm một slide vào slideshow (template)
	 */
	public function add_more_slide()
	{
		$id             = mt_rand();
		$slide_template = $this->load->view('backend/components/one_slide.php', ['id' => $id], TRUE);
		echo json_encode($slide_template);
		return;
	}

	/**
	 * AJAX - Chọn 1 slideshow để hiện thị
	 */
	public function select()
	{
		$slideshow_id = $this->input->get('slideshowID');
		$this->Slideshow->deselect_selected_slideshow();
		$this->Slideshow->update_slideshow(['status' => 1], $slideshow_id);
		echo "OK";
		return;
	}

	/**
	 * Tạo slideshow
	 */
	public function create_slideshow()
	{
		$data_to_insert = [
			'name' => $this->input->post('name'),
		];
		$slideshow_id = $this->Slideshow->create_slideshow($data_to_insert);
		if ($slideshow_id == false) {
			$this->flash('Có lỗi xảy ra, không thể tạo slideshow bây giờ');
			redirect(base_url('admin/slideshow/create'));
			return;
		}
		// Tạo slideshow thành công => Thêm hình ảnh cho slideshow (bảng slideshow_slides);
		$url_array  = $this->input->post('url[]');
		$link_array = $this->input->post('links[]');
		$limit      = count($url_array);
		if ($limit > 0) {
			$insert_array = [];
			for ($i = 0; $i < $limit; $i++) {
				$insert_array[] = [
					'slideshow_id' => $slideshow_id,
					'url'          => $url_array[$i],
					'link'         => $link_array[$i],
				];
			}
			$this->SlideshowSlide->insert_slides_for_slideshow($insert_array);
		}
		$this->flash('Tạo Slideshow thành công');
		redirect(base_url('admin/slideshow'));
		return;
	}
	/**
	 * Render trang chỉnh sửa - cập nhật slideshow
	 * @return [type] [description]
	 */
	public function render_edit_slideshow_page($slideshow_id)
	{
		$slideshow = (array) $this->Slideshow->first_or_fail($slideshow_id);

		$slides    = $this->SlideshowSlide->get_slides_for_slideshow($slideshow_id);

		// $this->prt($slides); return;
		$view_data = [
			'title'     => 'Chỉnh sửa Slideshow',
			'view'      => 'backend/pages/slideshow/slideshow_edit',
			'slideshow' => $slideshow,
			'slides'    => $slides,

			'tab'       => 'slideshow,'
		];

		$this->load->view('backend/layout', $view_data);
	}

	/**
	 * Cập nhật slideshow
	 * @return [type] [description]
	 */
	public function update_slideshow()
	{

		$slideshow_id = $this->input->post('id');
		$form_data    = [
			'slideshow_name' => $this->input->post('name'),
		];
		$data_to_update = [
			'name' => $this->input->post('name'),
		];

		$this->Slideshow->update_slideshow($data_to_update, $slideshow_id);



		// Xóa hết slides của 1 slideshow

		$this->SlideshowSlide->delete_slideshow_slides($slideshow_id);

		// Insert mới



		$url_array  = $this->input->post('url[]');

		$link_array = $this->input->post('links[]');

		$limit      = count($url_array);

		if ($limit > 0) {

			$insert_array = [];

			for ($i = 0; $i < $limit; $i++) {

				$insert_array[] = [

					'slideshow_id' => $slideshow_id,

					'url'          => $url_array[$i],

					'link'         => $link_array[$i],

				];
			}

			$this->SlideshowSlide->insert_slides_for_slideshow($insert_array);
		}

		$this->flash('Cập nhật Slideshow thành công');

		redirect(base_url('admin/slideshow'));

		return;
	}


	public function delete_slideshow($id)
	{
		$slideshow = (array)$this->Slideshow->first_or_fail($id);
		if ($slideshow['status']) {
			$this->flash('Không thể xóa slideshow này vì nó đang được chọn');
		} else {
			// Xóa hết slides của 1 slideshow
			$this->SlideshowSlide->delete_slideshow_slides($id);
			// Xóa slide
			$this->Slideshow->delete($slideshow);
			$this->flash('Xóa Slideshow thành công');
		}
		redirect(base_url('admin/slideshow'));
	}

	/**
	 * Xem trước 1 slideshow
	 */
	public function preview_slideshow($slideshow_id)
	{
		$slideshow = (array)$this->Slideshow->first_or_fail($slideshow_id);
		$slides    = $this->SlideshowSlide->get_slides_for_slideshow($slideshow_id);
		$view_data = [
			'slideshow' => $slides,
			'title'     => $slideshow['name']
		];
		$this->load->view('backend/pages/slideshow/slideshow_preview', $view_data);
	}
}
