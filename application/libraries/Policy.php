<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy {

	protected $CI;
	public $website   = [];

	public function __construct() {
		$this->CI =& get_instance();
	}

  public function can_admin()
  {
    return $this->CI->session->login && $this->CI->session->is_admin;
  }

  public function can_user()
  {
    return $this->CI->session->login && !$this->CI->session->is_admin;
  }

  public function can_guest()
  {
    return !$this->CI->session->login;
  }

  public function can_member()
  {
    return $this->CI->session->login;
  }

}
