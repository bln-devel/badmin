<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MGR_Controller extends Controller {
	
	
	/**
	 *
	 * @var String
	 */
	var $_config;
	
	function MGR_Controller($config = "") { //allow no configuration
		parent::Controller();
		
		$this->_config = $config;
		
		//load specific configuration
		if(!empty($this->_config)){
			$this->config->load($this->_config, TRUE); //TRUE avoid collisions
		}
	}
}