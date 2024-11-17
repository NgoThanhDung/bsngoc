<?php


defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *
 */
class Logout extends Public_Controller
{
	function __construct() {
		parent::__construct();
    $this->allow_access('login');
	}

  public function index()
  {
		$session = [
			'new_email'
		];
    if ($this->log_user_out($session)) {
			redirect(base_url('dang-nhap'), 'refresh');
		} else {
			$this->session->set_flashdata('msg', 'Không thể đăng xuất. Lỗi không xác định.');
			redirect(base_url());
		}
  }
}
