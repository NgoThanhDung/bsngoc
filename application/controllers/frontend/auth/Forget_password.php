<?php


defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *
 */
class Forget_password extends Public_Controller
{
	function __construct() {
		parent::__construct();
    $this->load->model('User_model', 'User');
	}

  public function index()
  {
		// $seo = $this->Config->get_seo();
		// $view_data = $this->merge_viewdata([
		// 	'title'       => 'Đăng ký',
		// 	'keyword'     => $seo['seo_keyword'],
		// 	'description' => $seo['seo_description'],
		// ]);
		// $forgot_at = strtotime(date('Y-m-d H:i:s'));
		// echo $forgot_at;
    $view_data          = $this->get_default_view_data();
    $view_data['title'] = 'Quên mật khẩu';
    $view_data          = $this->merge_viewdata($view_data);

    echo $this->blade->run('frontend.pages.auth.forget_password', $view_data);
  }

	public function help_restore_password()
	{
		$email = $this->input->post('email');
		$user  = $this->User->get_user_by_email($email);

		if (!$user) {
			$this->flash('Email không tồn tại');
			redirect(base_url('mat-khau/quen'));
			return;
		}

		$forgot_at = date('Y-m-d H:i:s');
		$code      = md5($user->email.strtotime($forgot_at));

		// $end_at = strtotime($forgot_at) + 1*60*60;
		// echo $forgot_at."<br>";
		// echo date('d-m-Y H:i:s', $end_at)."<br>";
		// echo $code."<br>";
		// return;

		$user->password_reset_code = $code;
		$user->password_forgot_at  = $forgot_at;
		if ($this->User->update_password_forgetting_code_and_time($user)) {
			$this->send_restoring_email((array)$user);
			$this->flash('Chúng tôi đã gửi email giúp bạn khôi phục mật khẩu.');
			redirect(base_url('mat-khau/quen'));
		}

		return;
	}

	public function send_restoring_email($user=[])
	{
		$this->load->helper('email_helper');
		$to      = $user['email'];
		$subject = $this->website->website[0]['website_name'].' - Lấy lại mật khẩu';
		$message = $this->load->view('frontend/email/reset-password',['user' => $user],true);
		$email   = sendEmail($to, $subject, $message, $attachment = '', $cc = '');
	}


	public function verify_password_resetting_code($code)
	{
		$user = $this->User->get_user_by_password_reset_code($code);
		if (!$user) {
			show_404();
		}

		$email     = $user->email;
		$forgot_at = $user->password_forgot_at;
		$test_code = md5($email.strtotime($forgot_at));
		// $time_limit đơn vị là giờ
		$time_limit_hours = 1;
		$time_limit_second = $time_limit_hours*3600;

		if ($test_code != $user->password_reset_code) {
			show_404();
		} else {
			$now = date('Y-m-d H:i:s');
			// Thời gian hiệu lực 1 giờ đồng hồ từ lúc gửi email giúp khôi phục mật khẩu
			if (strtotime($now) > strtotime($forgot_at)+$time_limit_second) {
				$this->flash('Liên kết đã hết hiệu lực (1 giờ)');
				redirect(base_url('mat-khau/quen'));
				return;
			}
		}

		$this->set_auth_session($user);
		$this->flash('Hãy đặt lại mật khẩu của bạn ở đây');
		redirect(base_url('mat-khau/quen'));
		return;
	}


}
