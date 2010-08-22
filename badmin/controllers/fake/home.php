<?php

/**
 * <p>This controller is a dummy which does pretty much nothing instead of
 * demonstrating the way to use default views.</p>
 */
class Home extends MGR_Controller {

	function Home() {
		parent::MGR_Controller();
	}

	function index() {
		$data["pageTitle"] = "Home";
		
		$this->load->view("core/header_v", $data);
		$this->load->view("fake/home_v");
		$this->load->view("core/footer_v");
	}
	
	function php(){
		phpinfo();
	}
	
	function login(){
		$data["pageTitle"] = "Login";
		
		$this->load->view("core/login_v", $data);
	}
}
