<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Manager extends MGR_Controller {
	
	function Manager() {
		parent::MGR_Controller();
	}
	
	function index() {
		$data["pageTitle"] = "Welcome to ".$this->config->item("tool.name");
		$data["content"] = "<p>This is an administration tool for Badminton association which provides a
		set of useful modules to manage all your association related activities.</p>";
		
		//TODO retrieve all available modules and list them on home (title + desc + link to module home)
		$modules = array(
		array(	"name"=>"Document Browser",
				"desc"=>"The document browser module allow you to recursively browse
				a specified directory and to download contained files.",
				"ctrl"=>"documents/browser",
				"version"=>"0.2"),
		array(	"name"=>"Membership",
				"desc"=>"The membership module allow you to manage the player registration according
				to time slots.",
				"ctrl"=>"membership/manage",
				"version"=>"0.1"),
//		array(	"name"=>"Content Management System",
//				"desc"=>"CMS, as its name indicates, is a module used to manage content (articles, news, ...)",
//				"ctrl"=>"cms/article",
//				"version"=>"0.1"),
//		array(	"name"=>"Gallery",
//				"desc"=>"Image gallery",
//				"ctrl"=>"gallery/display",
//				"version"=>"0.1"),
//		array(	"name"=>"Fake Module",
//				"desc"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit.
//				Nulla rhoncus sapien id arcu euismod tempus.",
//				"ctrl"=>"fake/home",
//				"version"=>"0.2"),
		);
		$data["modules"] = $modules;
		
		$this->load->view("core/header_v",$data);
		$this->load->view("core/home_v");
		$this->load->view("core/footer_v");
	}
}