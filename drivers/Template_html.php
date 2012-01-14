<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_html extends CI_Driver {
	public $content_type = 'text/html';
	public function render($file, $vars=array(), $return=FALSE) {
		$ci =& get_instance();
		$file = preg_replace('/\.html$/', '.php', $file);
		return $ci->load->view($file, $vars, $return);
	}
}