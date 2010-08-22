<?php

/**
 * <p>This controller is part of the internal documents module manager.</p>
 * <p>This is the default controller which.</p>
 */
class Browser extends MGR_Controller {
	
	function Browser() {
		parent::MGR_Controller("core/browser-config");
	}
	
	function _remap() {
		$media_dir = $this->config->item("media.dir", $this->_config);
		
		$tokens = $this->uri->segment_array();
		
		$nb_tokens = count($tokens);
		
		//for sure, nb_tokens >= 2 ($tokens[0] = module name, $tokens[1] = controller name)
		
		$path_tokens = array_slice($tokens, 2); //remove 2 first tokens
		
		$path = "";
		foreach($path_tokens as $token){
			$path .= $token."/";
		}
		
		$absolute_path = $media_dir."/".$path; //path may be empty
		
		
		//FIXME bug where? create subfolders named as parent (tests/tests)
		//display folder tests/tests -> no "/" between tests and tests in path or tokens?
		
		//we have built the full path according to URI tokens, determine kind of resource
		if(is_dir($absolute_path)){
			$dirs = array();
			$files = array();
			// let's traverse the directory
			if ($handle = @opendir($absolute_path)) {
				while($name = readdir($handle)){
					if (($name != "." && $name != "..")) {
						//XXX display or not hidden files? -> yes
						$resource = $absolute_path."/".$name;
						if(is_dir($resource)){
							$dirs[] = $path.$name;
						}else if(!preg_match("[^index.]", $name)){
							//exclude special "index.*" for hiding purpose
							$files[] = $path.$name;
						}
					}
				}
				closedir($handle);
				natcasesort($dirs);
				natcasesort($files);
			}
			$dirs_and_files = array("dirs"=>$dirs,"files"=>$files);
			
			$data["uri_chunks"] = $path_tokens;
			$data["dirs_and_files"] = $dirs_and_files;
			$path = substr($path, 0, -1);
			$root = $this->config->item("media.root.name", $this->_config);
			$title_path = $root;
			if(!empty($path)) $title_path .= "/".$path;
			$data["root"] = $root;
			$data["path"] = $path;
			$data["media_dir"] = $media_dir;
			
			$data["pageTitle"] = "Content of ".$title_path;

			$this->load->view("core/header_v", $data);
			$this->load->view("documents/files_as_table_v");
			$this->load->view("core/footer_v");
			
		}else {
			$file_path = substr($absolute_path, 0, -1);
			if(file_exists($file_path)){
				//force download
				header ("Cache-Control: no-store, no-cache, must-revalidate");
				header ("Cache-Control: pre-check=0, post-check=0, max-age=0");
				header ("Pragma: no-cache");

				header("Content-Description: File Transfer");
				header("Content-Type: application/octet-stream");
				header("Content-Length: " . filesize($file_path));
				header("Content-Disposition: attachment; filename=" . basename($file_path));

				@readfile($file_path);
			} else {
				show_404(); //XXX use this controller way of 404 (integrated to the template with links to parent folder etc.)
			}
		}
	}
}