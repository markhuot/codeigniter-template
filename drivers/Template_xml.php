<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_xml extends CI_Driver {
	public $content_type = 'application/xml';
	public function render($file, $vars=array(), $return=FALSE) {
		$ci =& get_instance();
		$ci->load->helper('inflector');

		$xml_object = new SimpleXMLElement("<?xml version=\"1.0\"?><root></root>");
		$this->_array_to_xml($vars,$xml_object);
		$xml = $xml_object->asXML();

		if ($return) {
			return $xml;
		}

		$ci->output->append_output($xml);
	}
	
	private function _array_to_xml($student_info, &$xml_student_info) {
	    foreach($student_info as $key => $value) {
	        if(is_array($value)) {
	            if(!is_numeric($key)){
	                $subnode = $xml_student_info->addChild("$key");
	                $this->_array_to_xml($value, $subnode);
	            }
	            else{
	                $this->_array_to_xml($value, $xml_student_info);
	            }
	        }
	        else {
	        	if (is_numeric($key)) {
	        		$key = singular($xml_student_info->getName());
	        	}
	            $xml_student_info->addChild($key, $value);
	        }
	    }
	}
}