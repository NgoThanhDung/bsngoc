<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 */
class Security extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Config_model', 'Config');
		$this->load->model('Security_model', 'Security');
	}
	public function security_1()
	{
		$seo       = $this->Config->get_seo();
		$get_security = $this->Security->get_security_id(1);
		$this->update_article_view(1, $get_security[0]['view']);
		$view_data = $this->merge_viewdata([
			'title'       => 'Chính sách bảo mật',
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
			'get_security' => $get_security
		]);

		echo $this->blade->run('frontend.pages.security', $view_data);
	}
	public function security_2()
	{
		$seo       = $this->Config->get_seo();
		$get_security = $this->Security->get_security_id(2);
		$this->update_article_view(2, $get_security[0]['view']);
		$view_data = $this->merge_viewdata([
			'title'       => 'Chính sách bản quyền',
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
			'get_security' => $get_security
		]);

		echo $this->blade->run('frontend.pages.security', $view_data);
	}
	public function security_3()
	{
		$seo       = $this->Config->get_seo();
		$get_security = $this->Security->get_security_id(3);
		$this->update_article_view(3, $get_security[0]['view']);
		$view_data = $this->merge_viewdata([
			'title'       => 'Chính sách quảng cáo',
			'keyword'     => $seo['seo_keyword'],
			'description' => $seo['seo_description'],
			'get_security' => $get_security
		]);

		echo $this->blade->run('frontend.pages.security', $view_data);
	}
	public function update_article_view($id, $old_view)
	{
		$this->Security->update_view($id, $old_view);
	}
}
