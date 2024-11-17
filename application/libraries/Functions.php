<?php

class Functions
{
	function __construct()
	{
		$this->obj = &get_instance();
	}

	//--------------------------------------------------------
	// Paginaiton function
	public function pagination_config($url, $count, $perpage)
	{
		$config = array();
		$config["base_url"] = $url;
		$config["total_rows"] = $count;
		$config["per_page"] = $perpage;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open']    = '<li><a class="active" href="#/" aria-label="Next">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		//$config['first_link'] = '&lt;&lt;';
		//$config['last_link'] = '&gt;&gt;';
		return $config;
	}

	// Paginaiton function
	public function user_pagination_config($url, $count, $perpage)
	{
		$config = array();
		$config["base_url"]        = $url;
		$config["total_rows"]      = $count;
		$config["per_page"]        = $perpage;
		$config['full_tag_open']   = '<ul class ="pagination';
		$config['full_tag_close']  = '</ul>';
		$config['prev_link']       = '<span aria-hidden="true">&laquo;</span>';
		$config['prev_link']       = true;
		$config['prev_tag_open']   = '<li class="prev">';
		$config['prev_tag_close']  = '</li>';
		$config['next_link']       = '<span aria-hidden="true">&laquo;</span>';
		$config['next_link']       = true;
		$config['next_tag_open']   = '<li class="next">';
		$config['next_tag_close']  = '</li>';
		$config['cur_tag_open']    = '<li><a href="#" aria-label="Previous">';
		$config['cur_tag_close']   = '</a></li>';
		$config['num_tag_open']    = '<li><a href="#" aria-label="Next">';
		$config['num_tag_close']   = '</li>';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';



		$config['num_links']       = 2;

		// $config['first_link'] = '<i class="fas fa-angle-double-left"></i>';
		// $config['last_link'] = '<i class="fas fa-angle-double-right"></i>';
		$config['first_link']      = FALSE;
		$config['last_link']       = FALSE;
		return $config;
	}
}
