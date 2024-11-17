<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website {

	protected $CI;
	public $website   = [];

	public function __construct() {
		$this->CI =& get_instance();
		$this->init();
	}
	public function init() {
		$this->CI->load->model('config_model', 'Config');
		$this->website = $this->CI->Config->get_config();

	
		
		
	}

	public function get_header_slideshow()
	{
		$this->CI->load->model('slideshow_model', 'Slideshow');
		return $this->CI->Slideshow->get_header_slideshow();
	}

	public function get_header_menu()
	{
		$this->CI->load->model('menu_model', 'Menu');
		return $this->menu = $this->CI->Menu->get_menu_list([
      'status' => 1,
      'type'   => 'header'
    ]);
	}
	public function get_lates_blog()
	{
		$this->CI->load->model('news_model', 'News');
		return $this->new = $this->CI->News->get_latest_articles();
	}
	public function get_blog_id($id)
	{
		$this->CI->load->model('news_model', 'News');
		return $this->new = $this->CI->News->get_all_blog_cate_id($id);
	}

}
