<?php
/**
 *
 */
class MY_Exceptions extends CI_Exceptions
{

  // protected $views = APPPATH.'views';
	// protected $cache = APPPATH.'cache';
	// protected $blade;
  //
	// protected $_CI;

	function __construct()
	{
		parent::__construct();
		// echo phpinfo();

	}

  public function show_404($page = '', $log_error = TRUE)
	{
    $CI =& get_instance();
    echo $CI->website->website[0]['website_name'];
    // $_CI->load->library('bladeone');
    // $blade = new \eftec\bladeone\BladeOne($this->views, $this->cache);
    // $blade->setBaseUrl(base_url().'public');
    // $view_data = [
    //   'title' => 'Không tìm thấy trang',
    //   '_CI'   => $this->_CI
    // ];
    // echo $blade->run('frontend.errors.error_404');
		exit;
	}
}
