<?php

/**
 *
 */
class Upload extends MGR_Controller {

	function Upload() {
		parent::MGR_Controller("core/browser-config");
		$this->load->helper("form");
	}
	
	function _remove_resource($resource){
		if (is_dir($resource)) {
			$objects = scandir($resource);
			$recursive_ok = TRUE;
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					$recursive_ok &= $this->_remove_resource($resource.'/'.$object);
				}
			}
			reset($objects);
			return @rmdir($resource);
		}else{
			return @unlink($resource);
		}
	}
	
	function remove($resource) {
		if(!file_exists($resource)){
			return FALSE;
		}
		return $this->_remove_resource($resource);
	}
	
	function _remap() {
		$media_dir = $this->config->item("media.dir", $this->_config);
		
		$tokens = $this->uri->segment_array();
		
		$nb_tokens = count($tokens);
		
		//for sure, nb_tokens >= 2 ($tokens[1] = module name, $tokens[2] = controller name)
		
		$nb_to_slice = 2;
		
		//FIXME use a specific controller for each action
		
		
		//TODO required feature -> folder rename (file rename?)
		
		$remove = FALSE;
		$mkdir = FALSE;
		if($nb_tokens >= 3){
			switch($tokens[3]){
				case "remove":
					$nb_to_slice++;
					$remove = TRUE;
					break;
				case "mkdir":
					$nb_to_slice++;
					$mkdir = TRUE;
					break;
			}
		}
		
		$path_tokens = array_slice($tokens, $nb_to_slice); //remove first tokens
		
		$path = "";
		foreach($path_tokens as $token){
			$path .= $token."/";
		}
		$absolute_path = $media_dir."/".$path; //path may be empty
		
		if($mkdir){
			$dir_name = $_POST["f_mkdir"];
			$dir = $absolute_path.$dir_name; //TODO remove bad characaters -> see URL allowed ones
			@mkdir($dir);
			@copy($media_dir."/index.html",$dir."/index.html");
			redirect("documents/browser/".$path, "refresh");
		}
		
		if($remove) {
			$resource = substr($absolute_path, 0, -1);
			$resource_name = basename($resource);
			$was_a_file = is_file($resource);
			if($this->remove($resource)){
				$path = str_replace($resource_name, "", $path); //FIXME remove last "$resource_name" token
				redirect("documents/browser/".$path, "refresh");
			}else{
				echo "<br>error while removing: ".$absolute_path;
			}
		}
		
		//this is an effective upload
		$config["upload_path"] = $absolute_path;
//		$config["allowed_types"] = ""; //allow anything
		$config["disallowed_types"] = ""; //allow anything
		$config["max_size"]	= "0"; //kbytes, 0 for no limit, PHP limit mostly == 2048 kbytes
//		$config["remove_spaces"] = TRUE;

		//TODO remove bad characaters -> see URL allowed ones
		
		$this->load->library("upload", $config);
	
		if(!$this->upload->do_upload()) {
			//error, provide
			$data["error"] = $this->upload->display_errors();
			
			$path = substr($path, 0, -1);
			$root = $this->config->item("media.root.name", $this->_config);
			$title_path = $root;
			if(!empty($path)) $title_path .= "/".$path;
			$data["root"] = $root;
			$data["path"] = $path;
			
			$data["pageTitle"] = "Upload a file into ".$title_path;
			
			$this->load->view("core/header_v", $data);
			$this->load->view("documents/file_upload_v", $data);
			$this->load->view("core/footer_v", $data);
		} else {
			//success, redirect on previous page
			redirect("documents/browser/".$path, "refresh");
		}
		
	}
}