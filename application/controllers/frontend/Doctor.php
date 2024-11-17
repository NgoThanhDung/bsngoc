<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 */
class Doctor extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Config_model', 'Config');
		$this->load->model('Info_doctor_model', 'info_doctor');
	}
	public function index()
	{
		$seo       = $this->Config->get_seo();
		$info = $this->info_doctor->get_info_doctor();

		$view_data = $this->merge_viewdata([
			'title'       => 'Tra cứu thông tin bác sĩ',
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
			'info' => $info
		]);

		echo $this->blade->run('frontend.pages.doctor', $view_data);
	}
}
