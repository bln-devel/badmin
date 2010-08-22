<?php

/**
 * <p>This controller is used to manage the membership process of players.</p>
 */
class Manage extends MGR_Controller {

	function Manage() {
		parent::MGR_Controller();
		
		$this->load->helper("date");
	}
	
	function index(){
		$this->display();
	}

	function display($season = "", $category = "") {
		//TODO checks on empty($season) and empty($category)
			
		$data["moduleName"] = "Membership";
		
		$data["modulesCSS"] = array(
			"views/membership/resources/css/membership.css",
			"views/membership/resources/date-picker/css/datepicker.css",
		);
		$data["modulesJS"] = array(
			"views/membership/resources/date-picker/js/datepicker.js",
			"views/membership/resources/date-picker/js/lang/fr.js",
		);
		
		$data["toolName"] = $this->config->item("tool.name");
		$data["toolVersion"] = $this->config->item("tool.version");
		$data["toolURL"] = $this->config->item("tool.url");
		
		$data["season"] = $season;
		
		if(empty($season)){
			//list season available
			$data["pageTitle"] = "List of seasons";
			$seasons = array("2010-2011", "2009-2010");
			rsort($seasons);
			$data["seasons"] = $seasons;
			
			$this->load->view("core/header_v", $data);
			$this->load->view("membership/seasons_v", $data);
			$this->load->view("core/footer_v", $data);
		}else {
			
			if(empty($category)){
				//list categories of this $season
				$data["pageTitle"] = "List of categories for ".$season;
				$data["categories"] = array("Leasure","Competition","Young");
				
				$this->load->view("core/header_v", $data);
				$this->load->view("membership/categories_v");
			}else{
				$data["pageTitle"] = "Manage members";
				$data["category"] = $category;
				
				$this->load->view("core/header_v", $data);
				$this->load->view("membership/members_v");
			}
			$this->load->view("core/footer_v");
		}
	}
}
