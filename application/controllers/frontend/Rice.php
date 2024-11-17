<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 */
class Rice extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Rices_model', 'Rices');
		$this->load->model('Config_model', 'Config');
		$this->load->library('pagination'); // loaded codeigniter pagination liberary
		$this->load->library('functions'); // loaded my custom 'functions' library
	}
	/**
	 *
	 * Lấy danh sách tin tức của một danh mục
	 * @param: alias của danh mục
	 * @return: danh sách tin tức (status = 1)
	 */
	public function load_shop($alias,$per_page)
	{
		$rices = $this->Rices->get_shop_rice(6, $per_page);
		$view_data = $this->check_rices($rices);
		echo $this->blade->run('frontend.pages.blog_all', $view_data);
	}

	public function get_all_shop()
	{
		$rices = $this->Rices->get_shop_rice(6, 0);
		$view_data = $this->check_rices($rices);
		echo $this->blade->run('frontend.pages.blog_all', $view_data);
	}

	public function check_rices($rices)
	{
		if (empty($rices)) {
			$view_data = $this->merge_viewdata([
				'stt'    => 0
			]);
		} else {
			$view_data = $this->merge_viewdata([
				'stt' => 1,
				'data'    => $rices,
				'pagination' => $this->pagination()

			]);
		}
		return $view_data;
	}
	/**
	 *
	 * Lấy chi tiết tin tức
	 * @param: alias của tin tức: string; id của tin tức: int
	 *
	 */

	public function update_article_view($id, $old_view)
	{
		$this->Rices->update_view($id, $old_view);
	}
	public function pagination()
	{
		$total_rows      = $this->Rices->count_row();
		$url_type = "gao-sach/trang";
		$per_page_record = 6;
		$url                   = base_url($url_type);
		$config                = $this->functions->pagination_config($url, $total_rows, $per_page_record);
		$config['uri_segment'] = 3;
		$pagination            = $this->pagination->initialize($config)->create_links();
		return $pagination;
	}
}
