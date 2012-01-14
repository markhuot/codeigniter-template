<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_json extends CI_Driver {
	public $content_type = 'application/json';
	public function render($file, $vars=array(), $return=FALSE) {
		$json = json_encode($vars);

		if ($return) {
			return $json;
		}

		$ci =& get_instance();
		$ci->output->append_output($json);
	}
}