
<?php

/**
 *
 */
class Validation
{

	private $CI;

	function __construct() {
		$this->CI = &get_instance();
		$this->CI->load->library('form_validation');
		// $this->CI->load->config('myconfig');

		// Đổi sang ngôn ngữ Vietnam để hiển thị lỗi validation
		$this->CI->config->set_item('language', 'vietnam');
	}

	protected $rules = array(
		'password_reset_code' => [
			'field' => 'password_reset_code',
			'label' => 'Mã đặt lại mật khẩu',
			'rules' => 'trim|required|min_length[6]|alpha_numeric'
		],

		'firstname' => [
			'field' => 'firstname',
			'label' => 'Tên',
			'rules' => 'trim|required|min_length[2]'
		],
		'lastname' => [
			'field' => 'lastname',
			'label' => 'Họ và tên lót',
			'rules' => 'trim|required|min_length[2]'
		],

		'mobile_no' => [
			'field' => 'mobile_no',
			'label' => 'Số điện thoại',
			'rules' => 'trim|required|min_length[10]|max_length[11]|numeric'
		],

		'address' => [
			'field' => 'address',
			'label' => 'Địa chỉ',
			'rules' => 'trim|required|min_length[10]|max_length[255]'
		],

		'current_password' => [
			'field' => 'current_password',
			'label' => 'Mật khẩu hiện tại',
			'rules' => 'trim|required|min_length[6]|max_length[32]'
		],
		'password' => [
			'field' => 'password',
			'label' => 'Mật khẩu',
			'rules' => 'trim|required|min_length[6]|max_length[32]'
		],
		'password_confirmation' => [
			'field' => 'password_confirmation',
			'label' => 'Mật khẩu xác nhận',
			'rules' => 'trim|required|matches[password]'
		],

		'email' => [
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[users.email]'
		],
		'email_edit' => [
			'field' => 'email_edit',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
		],
		'email_login' => [
			'field' => 'email_login',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
		],
		'email_register' => [
			'field' => 'email_register',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[users.email]'
		],

		'group_name_create' => [
			'field' => 'group_name_create',
			'label' => 'Tên nhóm thành viên',
			'rules' => 'trim|required|min_length[3]|is_unique[user_groups.group_name]'
		],
		'group_name_edit' => [
			'field' => 'group_name_edit',
			'label' => 'Tên nhóm thành viên',
			'rules' => 'trim|required|min_length[3]'
		],

		'news_category_name' => [
			'field' => 'news_category_name',
			'label' => 'Tên danh mục',
			'rules' => 'trim|required|min_length[3]'
		],
		'news_category_alias_create' => [
			'field' => 'news_category_alias_create',
			'label' => 'Đường dẫn',
			'rules' => 'trim|min_length[3]|is_unique[news_categories.alias]'
		],

		'news_name' => [
			'field' => 'news_name',
			'label' => 'Tiêu đề tin tức',
			'rules' => 'trim|required|min_length[10]|is_unique[news.name]'
		],
		'news_alias' => [
			'field' => 'news_alias',
			'label' => 'Đường dẫn',
			'rules' => 'trim|required|min_length[10]'
		],
		'news_thumbnail' => [
			'field' => 'news_thumbnail',
			'label' => 'Hình đại diện',
			'rules' => 'trim|required'
		],
		'news_content' => [
			'field' => 'news_content',
			'label' => 'Nội dung tin tức',
			'rules' => 'trim|required'
		],

		'menu_name' => [
			'field' => 'menu_name',
			'label' => 'Menu',
			'rules' => 'trim|required|min_length[3]'
		],

		'security_caption' => [
			'field' => 'security_caption',
			'label' => 'Mô tả chính sách',
			'rules' => 'trim|required|min_length[3]'
		],
		// SEO
		'title' => [
			'field' => 'title',
			'label' => 'Tiêu đề SEO',
			'rules' => 'trim'
		],
		'keyword' => [
			'field' => 'keyword',
			'label' => 'Từ khóa',
			'rules' => 'trim'
		],
		'description' => [
			'field' => 'description',
			'label' => 'Mô tả',
			'rules' => 'trim'
		],
		// END SEO



	);

	/**
	 * Lấy bộ cài đặt cho form validate
	 * @param: Truyền vào form data
	 * @return: Trả về mảng cài đặt
	 * @link: https://www.codeigniter.com/userguide3/libraries/form_validation.html#setting-rules-using-an-array
	 */
	public function get_validation_config($form_data = []) {
		if (empty($form_data)) {
			return FALSE;
		}

		$config = [];
		foreach ($form_data as $form_data_key => $value) {
			foreach ($this->rules as $key => $rule) {
				if ($form_data_key == $key) {
					$config[] = $rule;
				}
			}
		}
		return $config;
	}

	public function validate_form($form_data) {
		if (!$form_data) {
			return FALSE;

		}
		// Vì dữ liệu khi validate là mảng tự tạo, không phải input->post() => set_data()
		$this->CI->form_validation->set_data($form_data);
		// Lấy ra bộ cài đặt khi validate (tùy vào form_data). Sau đó set_rules
		$validation_config = $this->get_validation_config($form_data);
		$this->CI->form_validation->set_rules($validation_config);

		// Trả về kết quả validate: Bool TRUE of FALSE
		return $this->CI->form_validation->run();
	}
}
