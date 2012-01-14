<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/Template/drivers/Template_mustache/mustache'.EXT;

class Template_mustache extends CI_Driver {
	public $content_type = 'text/html';
	public function render($file, $vars=array(), $return=FALSE) {
		$ci =& get_instance();

		$m = new Mustache;
		$html = $m->render($ci->load->file(APPPATH.'views/'.$file, TRUE), $vars);

		if ($return) {
			return $html;
		}

		$ci->output->append_output($html);
	}
}