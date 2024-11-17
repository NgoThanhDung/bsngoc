<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function sendEmail($to = '', $subject  = '', $body = '', $attachment = '', $cc = '')
{
	$controller =& get_instance();
	// $controller->load->helper('path');

	$config = array();
	$config['useragent']      = "AngelMedia";
	$config['mailpath']       = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
	$config['protocol']       = "smtp";
	$config['smtp_host']      = "mailserver.angelz.vn";
	$config['smtp_port']      = "25";
	$config['smtp_timeout'] 	= '30';
	$config['smtp_user']    	= "noreply@angelz.vn";
	$config['smtp_pass']    	= "ledai123";
	$config['mailtype'] 			= 'html';
	$config['charset']  			= 'utf-8';
	$config['newline']  			= "\r\n";
	$config['wordwrap'] 			= TRUE;

	$controller->load->library('email');

	$controller->email->initialize($config);
	// $controller->email->set_newline("\r\n");

	$controller->email->from('noreply@angelz.vn', $controller->website->website[0]['website_name']);

	$controller->email->to($to);

	$controller->email->subject($subject);

	$controller->email->message($body);
	if($cc != '')
	{
		$controller->email->cc($cc);
	}
	if($attachment != '')
	{
		$controller->email->attach(base_url()."pdfs/" . $attachment );

	}
	// $controller->email->send();
	if($controller->email->send()){
		return true;
	}
	else
	{
		return false;
	}
}
?>
