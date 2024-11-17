<?php


defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */

class Register extends Public_Controller
{
	function __construct() {
		parent::__construct();
    $this->load->model('config_model', 'Config');
    $this->load->model('User_model', 'User');
	}
  public function index()
  {
		$seo = $this->Config->get_seo();
		$view_data = $this->merge_viewdata([
			'title'       => 'Đăng ký',
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
		]);

		echo $this->blade->run('frontend.pages.auth.login', $view_data);
  }
  public function register()
  {
    $form_data = $this->input->post();
    $view_data = $this->get_default_view_data();
		$view_data['title'] = 'Đăng ký';
		$view_data = $this->merge_viewdata($view_data);
    if ($this->validation->validate_form($form_data) == FALSE) {
      // Dữ liệu không hợp lệ
			echo $this->blade->run('frontend.pages.auth.login', $view_data);
			return;
		}
    // Dữ liệu hợp lệ: Thêm vào bảng users + gửi email xác thực tài khoản
    // Thêm vào cơ sở dữ liệu
		$data_to_insert = [
			'email'      => $form_data['email'],
			// make_bcrypt => MY_Controller
			'password'   => $this->make_bcrypt($form_data['password']),
      'lastname'   => $form_data['lastname'],
      'firstname'  => $form_data['firstname'],
      'sex'        => $form_data['sex'],
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
			'role'       => 2,
			'token'      => md5($form_data['email'])
		];
		$insert_result = $this->User->insert($data_to_insert);
    if (!$insert_result) {
			$this->session->set_flashdata('msg', 'Không thể đăng ký tài khoản. Đã xảy ra lỗi không mong muốn.');
			redirect(base_url('dang-ky'));
      return;
		}
    $email_data = [
      'email'     => $data_to_insert['email'],
      'firstname' => $data_to_insert['firstname'],
      'lastname'  => $data_to_insert['lastname'],
      'token'     => $data_to_insert['token']
    ];
    $this->send_verify_email($email_data);
		$this->session->set_flashdata('msg', 'Chúng tôi đã gửi email tới <b>'.$email_data['email'].'</b> để giúp bạn xác thực tài khoản. Hãy xác thực tài khoản để có thể đăng nhập.');
		redirect(base_url('dang-nhap'));
  }
	
  public function send_verify_email($email_data)
  {
    $this->load->helper('email_helper');
    $to = $email_data['email'];
    $subject = $this->website->website[0]['website_name'].' - Thông báo xác thực tài khoản';
    $message = $this->load->view('frontend/email/verify-account',['email_data' => $email_data],true);
    $email   = sendEmail($to, $subject, $message, $attachment = '', $cc = '');
  }
}
