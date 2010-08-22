<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");

if ( ! function_exists("ranks")) {
	function ranks() {
		return array("NC",
				"D4","D3","D2","D1",
				"C4","C3","C2","C1",
				"B4","B3","B2","B1",
				"A4","A3","A2","A1",
				"T50","T20","T10","T5");
	}
}

if ( ! function_exists("rank2id")) {
	function rank2id($rank) {
		$ranks = ranks();
		$rank = strtoupper($rank);
		for($i = count($ranks); --$i >= 0; ){
			if($ranks[$i] == $rank) return $i;
		}
		return -1;
	}
}

if ( ! function_exists("id2rank")) {
	function id2rank($id) {
		$ranks = ranks();
		if($id < 0 || $id >= count($ranks)) return "n/a";
		return $rank = strtoupper($ranks[$id]);
	}
}