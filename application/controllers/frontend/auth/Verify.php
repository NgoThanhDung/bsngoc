<?php


defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *
 */
class Verify extends Public_Controller
{
	function __construct() {
		parent::__construct();
    $this->load->model('config_model', 'Config');
    $this->load->model('User_model', 'User');
	}

  public function index()
  {
    $view_data = $this->get_default_view_data();
		$view_data['title'] = 'Xác thực tài khoản';
		$view_data = $this->merge_viewdata($view_data);
		echo $this->blade->run('frontend.pages.auth.verification', $view_data);
  }

	public function resend_verification_email()
	{
		$email = $this->input->post('email');
		$user = (array)$this->User->get_user_by_email($email);

		if (!$user) {
			$this->flash('Email không tồn tại');
			redirect(base_url('xac-thuc'));
			return;
		}

		if ($user['is_verify']) {
			$this->flash('Tài khoản này đã được xác thực, sẵn sàng đăng nhập');
			redirect(base_url('xac-thuc'));
			return;
		}

		$this->load->helper('email_helper');
    $to      = $user['email'];
    $subject = $this->website->website[0]['website_name'].' - Thông báo xác thực tài khoản';
    $message = $this->load->view('frontend/email/verify-account',['email_data' => $user],true);
    $email   = sendEmail($to, $subject, $message, $attachment = '', $cc = '');

		$this->flash('Chúng tôi đã gửi email giúp kích hoạt tài khoản vào <b>'.$user['email'].'</b>');
		redirect(base_url('xac-thuc'));
		return;
	}

	public function verify($token)
	{
		if (!$user = $this->User->get_user_by_token($token)) {
			show_404();
		}
		if ($user->is_verify) {
			show_404();
		}
		if (md5($user->email) != $token) {
			echo "sai email";
			return;
		}
		$user->is_verify = 1;
		$user->token = '';
		if ($this->User->update($user)) {
			$this->session->set_flashdata('msg', 'Kích hoạt tài khoản thành công. Sẵn sàng để đăng nhập.');
			redirect(base_url('dang-nhap'));
		} else {
			$this->session->set_flashdata('msg', 'Đã có lỗi xảy ra, hãy liên lạc với chúng tôi để được giải quyết. Xin lỗi vì sự bất tiện này');
			redirect(base_url('dang-ky'));
		}
		return;
	}
}
