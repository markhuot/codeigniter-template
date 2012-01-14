<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Driver_Library {
	/**
	 * $valid_drivers
	 * An array of valid child classes
	 */
	public $valid_drivers = array(
		'template_html',
		'template_json',
		'template_mustache',
		'template_twig',
		'template_xml',
	);

	/**
	 * Render
	 * Renders out the method with the appropriate parser
	 */
	public function render($view, $data=array(), $return=FALSE) {
		$ci =& get_instance();
		$format = $ci->uri->format_from_uri($view);
		$this->{$format}->render($view, $data, $return);
	}

	public function responds_to($format) {
		return in_array("template_{$format}", $this->valid_drivers);
	}
}