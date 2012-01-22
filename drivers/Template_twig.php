<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/Template/drivers/Template_Twig/Twig/Autoloader.php';

class Template_twig extends CI_Driver {
	public $content_type = 'text/html';
	public function render($file, $vars=array(), $return=FALSE) {
		$ci =& get_instance();

		$html = 'twig';

		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem(APPPATH.'views');
		$twig = new Twig_Environment($loader, array(
		  'cache' => APPPATH.'cache/twig',
		  'auto_reload' => ENVIRONMENT=='development'?TRUE:FALSE
		));
		$functions = get_defined_functions();
		foreach ($functions['user'] as $func) {
			$twig->addFunction($func, new Twig_Function_Function($func));
		}
		$html = $twig->render($file, (array)$vars);

		if ($return) {
			return $html;
		}

		$ci->output->append_output($html);
	}
}