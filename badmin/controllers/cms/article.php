<?php

/**
 *
 */
class Article extends MGR_Controller {

	function Article() {
		parent::MGR_Controller();
	}
	
	function index() {
		$this->edit();
	}
	
	function edit($id = 0) { //both create and edit
		//edit or create? determine if $id exists in articles ids
		
		//if yes, checks permissions and rights
		
		$data["pageTitle"] = "Unknown";
		$data["modulesJS"] = array(
			"views/cms/resources/MooEditable/MooEditable.js",
			"views/cms/resources/MooEditable/MooEditable.Smiley.js",
			"views/cms/resources/MooEditable/MooEditable.Forecolor.js",
			"views/cms/resources/MooEditable/MooEditable.Extras.js",
		);
		$data["modulesCSS"] = array(
			"views/cms/resources/MooEditable/MooEditable.css",
			"views/cms/resources/MooEditable/MooEditable.Smiley.css",
			"views/cms/resources/MooEditable/MooEditable.Forecolor.css",
			"views/cms/resources/MooEditable/MooEditable.Extras.css",
			"views/cms/resources/css/cms.css",
		);
		
		$this->load->view("core/header_v", $data);
		$this->load->view("cms/edit_article_v");
		$this->load->view("core/footer_v");
	}
}