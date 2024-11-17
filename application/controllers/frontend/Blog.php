<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Blog extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('News_model', 'News');
		$this->load->model('Config_model', 'Config');
		$this->load->model('News_category_model', 'NewsCategory');
		$this->load->library('pagination'); // loaded codeigniter pagination liberary
		$this->load->library('functions'); // loaded my custom 'functions' library
	}
	/**
	 *
	 * Lấy danh sách tin tức của một danh mục
	 * @param: alias của danh mục
	 * @return: danh sách tin tức (status = 1)
	 */
	public function get_all_news()
	{
		$data = $this->News->get_new_page(6, 0);
		$view_data = $this->merge_viewdata([
			'title'        => 'PGS.TS.BS Cao Thanh Ngọc',
			'keyword'      => 'PGS.TS.BS Cao Thanh Ngọc',
			'description'  => 'PGS.TS.BS Cao Thanh Ngọc',
			'data'      => $data,
			'style'       => 1,
		]);
		echo $this->blade->run('frontend.pages.blog_all', $view_data);
	}
	public function load_blog($page, $per_page)
	{
		$news = $this->News->get_new_page(6, $per_page);
		$view_data = $this->check_news($news);
		echo $this->blade->run('frontend.pages.blog_all', $view_data);
	}

	public function check_news($news)
	{
		if (empty($news)) {
			$view_data = $this->merge_viewdata([
				'stt'    => 0
			]);
		} else {
			$view_data = $this->merge_viewdata([
				'stt' => 1,
				'data'    => $news,
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

	public function get_news_detail($alias, $id)
	{

		$detail_news = $this->News->get_news_detail($alias, $id);

		if (!$detail_news = $this->News->get_news_detail($alias, $id)) {
			$this->front_404();
		}
		$get_blog_related = $this->News->get_blog_related($detail_news[0]['category_id']);

		$this->update_article_view($id, $detail_news[0]['view']);
		$view_data = $this->merge_viewdata([
			'title'        => $detail_news[0]['title'],
			'keyword'      => $detail_news[0]['keyword'],
			'description'  => $detail_news[0]['description'],
			'detail_news'      => $detail_news,
			'get_blog_related'				=> $get_blog_related,


		]);
		echo $this->blade->run('frontend.pages.blog_detail', $view_data);
	}

	public function update_article_view($id, $old_view)
	{
		$this->News->update_view($id, $old_view);
	}
	public function pagination()
	{
		$total_rows      = $this->News->count_row();
		$url_type = "tin-tuc/trang";
		$per_page_record = 6;
		$url                   = base_url($url_type);
		$config                = $this->functions->pagination_config($url, $total_rows, $per_page_record);
		$config['uri_segment'] = 3;
		$pagination            = $this->pagination->initialize($config)->create_links();
		return $pagination;
	}
	public function search_news_by_name()
	{
		$keyword  = $this->input->get('search');
		$News = $this->News->search_news_by_name($keyword);
		$view_data = $this->merge_viewdata([
			'search_keyword' => $keyword,
			'data'       => $News,
			'style'       => 1,
		]);

		echo $this->blade->run('frontend.pages.blog_all', $view_data);
	}
	public function get_news_by_category($alias, $id)
	{

		$news = $this->NewsCategory->get_news_by_category($id);
		$view_data = $this->merge_viewdata([
			'title'       => 'PGS.TS.BS Cao Thanh Ngọc',
			'keyword'     => 'PGS.TS.BS Cao Thanh Ngọc',
			'description' => 'PGS.TS.BS Cao Thanh Ngọc',
			'data'    => $news,
			'style'       => 0,
		]);

		echo $this->blade->run('frontend.pages.blog_all', $view_data);
	}
}
