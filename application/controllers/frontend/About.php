<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 */
class About extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Config_model', 'Config');
		$this->load->model('Security_model', 'Security');
	}
	public function index()
	{
		$seo       = $this->Config->get_seo();
		$get_about = $this->Security->get_about();
		$view_data = $this->merge_viewdata([
			'title'       => 'Giới thiệu',
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
			'get_about' => $get_about
		]);

		echo $this->blade->run('frontend.pages.about', $view_data);
	}
}
