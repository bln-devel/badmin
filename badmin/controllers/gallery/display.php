<?php

/**
 *
 */
class Display extends MGR_Controller {

	var $moduleName;
	
	function Display() {
		parent::MGR_Controller();
	}
	
	function index() {
		$data["pageTitle"] = "My Gallery name";
		
		$data["modulesCSS"] = array("views/gallery/resources/css/gallery.css");
		
		$this->load->view("core/header_v", $data);
		$this->load->view("gallery/display_v");
		$this->load->view("core/footer_v");
	}
}