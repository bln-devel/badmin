<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Install extends Controller {
	
	var $stepNumber;
	
	function Install() {
		parent::Controller();
		$this->stepNumber = 5;
	}

	function index(){
		$this->step(); //first step
	}
	
	function step($step = 1){
		if($step < 1 || $step > $this->stepNumber){
			//ERROR
		}
		$data["step"] = $step;
		$data["stepNumber"] = $this->stepNumber;
		$this->load->view("install/step_v.php", $data);
	}
}