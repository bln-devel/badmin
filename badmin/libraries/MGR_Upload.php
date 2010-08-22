<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * copied from: http://www.blueemberdesign.com/blog/2009/07/29/codeigniter-file-upload-setting-disallowed-file-types/
 */
class MGR_Upload extends CI_Upload {
	
	// declare disallowed types variable
	var $disallowed_types = "";
	
	// add in the 'disallowed_types' default during initialization
	function initialize($config = array()) {
		parent::initialize($config);
		
		$custom = array(
			"disallowed_types" => "",
		);
 
		foreach ($custom as $key => $val) {
			if (isset($config[$key])) {
				$method = "set_".$key;
				if (method_exists($this, $method)) {
					$this->$method($config[$key]);
				} else {
					$this->$key = $config[$key];
				}
			} else {
				$this->$key = $val;
			}
		}
	}
 
	// set disallowed filetypes
	function set_disallowed_types($types) {
		$this->disallowed_types = explode("|", $types);
	}
 
	// adapted to not require allowed_types and to check for disallowed types if it exists
	function is_allowed_filetype() {
		// if allowed file type list is not defined
		if (count($this->allowed_types) == 0 OR ! is_array($this->allowed_types)) {
			// if disallowed file type list is not defined
			if (count($this->disallowed_types) == 0 OR ! is_array($this->disallowed_types))
				return TRUE;
 
			// check for disallowed file types and return
			// negated because is_disallowed_filetype returns opposite result as this function
			return ! $this->is_disallowed_filetype();
		}
 
		// proceed as usual with allowed file type list check
		return parent::is_allowed_filetype();
	}
 
	// check for disallowed file types
	function is_disallowed_filetype() {
		// no file types provided
		if (count($this->disallowed_types) == 0 OR ! is_array($this->disallowed_types))
			return FALSE;
 
		// search through disallowed for this file type
		foreach ($this->disallowed_types as $val) {
			$mime = $this->mimes_types(strtolower($val));
 
			if (is_array($mime)) {
				if (in_array($this->file_type, $mime, TRUE)) {
					return TRUE;
				}
			}
			else {
				if ($mime == $this->file_type) {
					return TRUE;
				}
			}
		}
 
		return FALSE;
	}
}
 
	
	
