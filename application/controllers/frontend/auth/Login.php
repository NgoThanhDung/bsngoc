<?php


defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */

class Login extends Public_Controller
{
	function __construct() {
		parent::__construct();
    $this->load->model('config_model', 'Config');
    $this->load->model('Oauth_providers', 'OauthProvider');
    $this->load->model('User_oauth', 'UserOauth');
    $this->load->model('User_model', 'User');

		$this->allow_access('notlogin');
	}
  public function index()
  {
    $seo = $this->Config->get_seo();
    $view_data = $this->merge_viewdata([
      'title'       => 'Đăng nhập',
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
		]);

		echo $this->blade->run('frontend.pages.auth.login', $view_data);
  }

	public function login_normally()
	{
		$form_data = $this->input->post();
		$flag = FALSE;
		$msg = 'Đăng nhập thành công.';
		if (!$user = $this->get_customer_by_email_and_password($form_data)) {
			$msg = 'Email hoặc mật khẩu không trùng khớp';
		} else {
			$flag = TRUE;
			if (!$user->is_verify) {
				$msg  = 'Tài khoản chưa xác thực';
				$this->flash($msg);
				redirect(base_url('xac-thuc'));
				return;
			} else {
				if (!$user->is_active) {
					$msg = 'Tài khoản đã bị khóa do vi phạm chính sách';
					$flag = FALSE;
				}
			}
		}

		$this->flash($msg);
		if (!$flag) {
			redirect(base_url('dang-nhap'));
			return;
		}
		$this->set_auth_session($user);
		redirect(base_url(), 'refresh');
		return;
	}

	public function get_customer_by_email_and_password($form_data)
	{
		if (count($form_data) < 2) {
			return FALSE;
		}
		$condition = [
			'email'    => $form_data['email'],
			'role'     => 2,
			'is_admin' => 0,
		];
		$user = $this->User->get_customer_when_login($condition);
		if (!$user) {
			return FALSE;
		}
		if (!$this->check_hash($form_data['password'], $user->password)) {
			return FALSE;
		}
		return $user;
	}

  // ajax - login with facebook
  public function login_with_facebook()
  {
    $fb_id   = $this->input->get('id');
    $fb_name = $this->input->get('name');
    // application/config/constants.php FB_OAUTHPROVIDER;
    $user_oauth = $this->get_user_oauth($oauth_provider_id = FB_OAUTHPROVIDER, $oauth_id = $fb_id);
		$user_id = null;
		// print_r($user_oauth);
		if (!$user_oauth) {
			// Lần đầu đăng nhập = facebook => thêm vào bảng users v`à bảng user_oauth_provider
			// 1. Tạo user
			$user_data = [
				'firstname'  => $fb_name,
				'is_verify'  => 1,
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' => date('Y-m-d h:i:s'),
			];
			// create_new_user_for_oauth_provider returb last insert id
			$user_id = $this->User->create_new_user_for_oauth_provider($user_data);
			// 2. Tạo dữ liệu bảng user_oauth_provider
			if ($user_id) {
				$user_oauth_data = [
					'user_id'           => $user_id,
					'oauth_provider_id' => FB_OAUTHPROVIDER,
					'oauth_id'          => $fb_id
				];
				$insert_user_oauth_result = $this->UserOauth->insert($user_oauth_data);
			}
		} else {
			$user_id = $user_oauth->user_id;
		}
		// Lấy dữ liệu user theo id
		$user = $this->User->find($user_id);
		if (!$user->is_active) {
			// Tài khoản bị khóa
		} else {
			// Tạo session đăng nhập
			$this->set_auth_session($user);
			// redirect(base_url(), 'refresh');
			// header('Location: '+base_url());
		}
  }

  public function get_user_oauth($oauth_provider_id, $oauth_id)
  {
		$condition = [
			'oauth_provider_id' => $oauth_provider_id,
			'oauth_id' => $oauth_id
		];
		return $this->UserOauth->get_user_oauth($condition);
  }
}
