<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Login extends MGR_Controller {
	
	function Login() {
		parent::MGR_Controller();
	}
	
	function index(){
		echo "<br>Login: ".$_POST["f_login"];
		echo "<br>Password: ".$_POST["f_pwd"];
		$come_from = $_POST["come_from"];
		if(empty($come_from)) $come_from = site_url();
		echo "<br>Come from: ".$come_from;
		
		$error = TRUE;
		
		if($error){
			$data["pageTitle"] = "Login";
			$data["come_from"] = $come_from;
			$data["error"] = "<p>Invalid login or username.</p>";
			$data["f_login"] = $_POST["f_login"];
			
			$this->load->view("core/login_v", $data);
		}else {
			redirect($come_from, "refresh");
		}
	}
}