<?php


defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */


class Contact extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model', 'News');
    }

    public function index()
    {
        $get_blog_3 = $this->News->get_all_blog_cate_id(3);
        $get_blog_4 = $this->News->get_all_blog_cate_id(4);
        $view_data = $this->merge_viewdata([
            'title'          => 'Liên hệ ',
            'keyword'        => '',
            'description'    => '',
            'get_blog_3'                => $get_blog_3,
            'get_blog_4'                => $get_blog_4,
        ]);

        echo $this->blade->run('frontend.pages.contact', $view_data);
    }
}
