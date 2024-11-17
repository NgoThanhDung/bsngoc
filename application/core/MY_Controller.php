<?php
/**
 *
 */
class MY_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// echo phpinfo();
	}

	public function prt($data) {
		echo "<pre>";
		print_r($data);
	}

	public function doing_maintenance()
	{
		if ($this->session->userdata('email') != "email@email.com") {
			echo "Tính năng này đang được bảo trì, xin lỗi vì sự bất tiện này";
			exit();
		}
	}

	/**
	 * So sánh chuỗi truyền vào và hash của một chuỗi nào đó
	 */
	public function check_hash($string_to_compare, $existed_hash) {
		return password_verify($string_to_compare, $existed_hash);
	}

	/**
	 * hash password
	 */
	public function make_bcrypt($string) {
		return password_hash($string, PASSWORD_BCRYPT);
	}

	/**
	 * Clean xss
	 */
	public function clean($data) {
		return $this->security->xss_clean($data);
	}

	/**
	 * Đăng xuất người dùng hiện tại
	 */
	public function log_user_out($session_array=[]) {
		$this->load->model('User_model', 'User');
		$id = $this->session->userdata('email');
		if ($this->User->update_last_login($id)) {
			// $this->session->sess_destroy();
			$session_array_to_unset = [
        'login', 'id', 'username',
        'avatar', 'email',
        'phone', 'address',
        'role', 'is_admin'
      ];
      $this->session->unset_userdata($session_array_to_unset);
			return TRUE;
		} else {
			return FALSE;
		}
	}
	/**
	 * Đổi ngôn ngữ sang Việt Nam (chủ yếu khi dùng form_validation)
	 */
	public function vietnam() {
		$this->config->set_item('language', 'vietnam');
	}
	/**
	 * Hàm tạo flashdata, mặc định sẽ trả về $msg
	 */
	public function flash($flashdata_content = '', $flashdata_name = 'msg') {
		$this->session->set_flashdata($flashdata_name, $flashdata_content);
	}
	function make_dir($path)
	{
		return is_dir($path) || mkdir($path);
	}
  /**
   * Tạo session sau khi đăng nhập thành công
   * @param object $user Đối tượng user lấy từ bảng users
   */
	public function set_auth_session($user) {
		if (!$user) {
			return FALSE;
		}
		$this->session->set_userdata([
      'login'     => TRUE,
			'id'        => $user->id,
			'username'  => $user->username,
			'avatar'    => $user->avatar,
			'email'     => $user->email,
			'phone'     => $user->mobile_no,
			'address'   => $user->address,
			'role'      => $user->role,
			'is_admin'  => $user->is_admin ? TRUE : FALSE
		]);
		return TRUE;
	}
  public function get_default_view_data()
  {
    $seo = $this->Config->get_seo();
    $view_data = [
      'title'       => $seo['seo_title'],
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
		];
    return $view_data;
  }
}
/**
 * Admin controller - > nếu là admin thì mới được truy cập các phương thức của các lớp extends Class này
 */
class Admin_Controller extends MY_Controller
{
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata('is_admin')) {
			redirect(base_url('admin/login'));
		}
		// $CI = &get_instance();
		// echo "<pre>";
		// print_r($CI);
		// exit();
	}
}
/**
 * Public controller - > Dành cho trang ngoài
 */
class Public_Controller extends MY_Controller
{

	protected $views = APPPATH.'views';
	protected $cache = APPPATH.'cache';
	protected $blade;

	protected $_CI;
	protected $website_config;

	function __construct() {
		parent::__construct();

		$this->load->library('cart');
		$this->load->library('policy');

		$this->_CI = get_instance();

		$this->blade = new \eftec\bladeone\BladeOne($this->views, $this->cache);
		$this->blade->setBaseUrl(base_url().'public');
		// $this->website = $this->website;
	}
  /**
   * Hàm cho phép truy cập
   *
   * @param  string $allow
   * Nếu $allow = 'all'      => được phép truy cập không ràng buộc
   * Nếu $allow = 'login'    => Chỉ được phép truy cập khi ĐÃ đăng nhập
   * Nếu $allow = 'notlogin' => Chỉ được phép truy cập khi KHÔNG đăng nhập
   *
   */
  public function allow_access($allow = 'all')
  {
    if ($allow == 'login' && !$this->session->login) {
      show_404();
      return;
    }
    if ($allow == 'notlogin' && $this->session->login) {
      show_404();
      return;
    }
  }

	public function merge_viewdata($data=[])
	{
		return array_merge($data, ['_CI' => $this->_CI]);
	}

	public function front_404()
	{
		set_status_header(404);

		$view_data = $this->merge_viewdata();
		echo $this->blade->run('frontend.errors.error_404', $view_data);
		exit();
	}
}
