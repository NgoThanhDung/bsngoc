<?php


defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */


class Answer extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $view_data = $this->merge_viewdata([
            'title'          => 'Giải đáp thắc mắc',
            'keyword'        => 'Giải đáp thắc mắc',
            'description'    => 'Giải đáp thắc mắc'
        ]);

        echo $this->blade->run('frontend.pages.answer', $view_data);
    }
}
