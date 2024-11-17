<?php

	defined('BASEPATH') or exit('No direct script access allowed');


	/**
	 *
	 */
	class Home extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('config_model', 'Config');
			$this->load->model('News_model', 'New');
			$this->load->model('News_category_model', 'New_category');
			$this->load->model('Treatment_model', 'Treatment');
			$this->load->model('Doctor_model', 'Doctor');
			$this->load->model('Slideshow_slide_model', 'Slideshow');
		}
		public function index()
		{
			if (defined('REQUEST') && REQUEST === 'external') {
				return;
			}
			$latest_new = $this->New->get_latest_articles();
			$new_cate = $this->New_category->get_all_news_cate();
			$blog_hot = $this->New->get_all_blog_hot();
			$get_blog_1 =  $this->New->get_blog_by_cate(1);
			$get_blog_2 =  $this->New->get_blog_by_cate(2);
			$treatment =  $this->Treatment->get_all();
			$doctor =  $this->Doctor->get_doctor();
			$Slideshow =  $this->Slideshow->get_slides_for_slideshow(2);

			$view_data = $this->merge_viewdata([
				'blog_hot'					=> $blog_hot,
				'get_blog_1'				=> $get_blog_1,
				'get_blog_2'				=> $get_blog_2,
				'latest_new'			=> $latest_new,
				'treatment'			=> $treatment,
				'new_cate'			=> $new_cate,
				'doctor'			=> $doctor,
				'Slideshow'			=> $Slideshow,

			]);

			echo $this->blade->run('frontend.pages.index', $view_data);
		}
	}
