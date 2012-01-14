<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_php extends CI_Driver {
	public $content_type = 'text/html';
	public function render($file, $vars=array(), $return=FALSE) {
		$ci =& get_instance();
		return $ci->load->view($file, $vars, $return);
	}
}