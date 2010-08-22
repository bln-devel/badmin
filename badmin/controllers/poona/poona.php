<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poona extends MGR_Controller {

	var $upload_config;
	
	function Poona() {
		parent::MGR_Controller();
		
		$config["upload_path"] = "media/upload";
		$config["disallowed_types"] = "text/xml";
		$config["max_size"]	= "0"; //kbytes, 0 for no limit, PHP limit mostly == 2048 kbytes;
		$this->upload_config = $config;
		$this->load->library("upload", $this->upload_config);
		
		$this->lang->load("poona/messages", "french");
		
		$this->load->helper("date");
		$this->load->helper("ranking");
	}
	
	function index() {
		$data["pageTitle"] = $this->lang->line("poona_import");
		$this->load->view("core/header_v", $data);
		$this->load->view("poona/import_v");
		$this->load->view("core/footer_v");
	}
	
	function player($license = -1){
		if($license > 0){
			$this->db->select("*");
			$this->db->from("players");
			$this->db->where("license", $license);

			$query = $this->db->get();
			
			$result = $query->result();
			if(count($result) == 1){
				$player = $result[0];
				$data["player"] = $player;
				$data["pageTitle"] = $player->firstname." ".$player->name;
			}else{
				$data["pageTitle"] = "Error";
				$data["error"] = $this->lang->line("poona_no_player").$license;
			}
		}else{
			$data["pageTitle"] = "Error";
			$data["error"] = $this->lang->line("poona_no_license");
		}
		$this->load->view("core/header_v", $data);
		$this->load->view("poona/player_v");
		$this->load->view("core/footer_v");
	}
	
	function show($season = -1){
		if($season > 0){
			$data["pageTitle"] = $this->lang->line("poona_list_by_season").$season."/".($season+1);
			$this->db->select("*");
			$this->db->from("seasons2players");
			$this->db->where("season", $season);
			$this->db->join("players", "seasons2players.license = players.license");
			$this->db->order_by("name", "asc");
			$this->db->order_by("firstname", "asc");

			$query = $this->db->get();
			$data["players"] = $query->result();
			
			//FIXME check empty result (invalid season)
			
			$this->load->view("core/header_v", $data);
			$this->load->view("poona/players_v");
			$this->load->view("core/footer_v");
		}else{
			$data["pageTitle"] = $this->lang->line("poona_list_of_season");
			$this->db->distinct();
			$this->db->select("season");
			$query = $this->db->get("seasons2players");
			$data["seasons"] = $query->result();
			
			$this->load->view("core/header_v", $data);
			$this->load->view("poona/seasons_v");
			$this->load->view("core/footer_v");
		}
	}
	
	function import(){
		$data["pageTitle"] = $this->lang->line("poona_import");
		
		if(!$this->upload->do_upload()) {
			//error, provide
			$data["error"] = $this->upload->display_errors();

		} else {
			$dataUpload = $this->upload->data();
			$xmlRaw = file_get_contents($dataUpload["full_path"]);
			$players = $this->_getXML(new SimpleXMLElement($xmlRaw));
			@unlink($dataUpload["full_path"]); //remove file (uploaded as temporary one)
			
			foreach($players as $player){
				//if exists, update
				$this->db->set($player);
				
				$this->db->where("license", $player["license"]);
				if($this->db->count_all_results("players") == 0){
					$this->db->insert("players");
				}else{
					$this->db->where("license", $player["license"]);
					$this->db->update("players");
				}

				//FIXME how to handles the season where to import data...?
				$season = 2010;
				$this->db->where(array("season"=>$season, "license"=>$player["license"]));
				if($this->db->count_all_results("seasons2players") == 0){
					$this->db->insert("seasons2players", array("season"=>$season, "license"=>$player["license"]));
				}
			}
			
			$data["players"] = $players;
		}
		$this->load->view("core/header_v", $data);
		$this->load->view("poona/import_v");
		$this->load->view("core/footer_v");
	}
	
	
	function _getXML($xmlData) {
		$result = array();
		foreach($xmlData->joueur as $row) {
 			$time = strtotime((string)$row->dateNaissance);
 			$rs["birthdate"] = mdate("%Y%m%d");
			$rs["phone"] = (string)$row->telPortable;
			
			$rs["name"] = (string)$row->nom;
			$rs["firstname"] = (string)$row->prenom;
			$rs["license"] = (int)$row->licence;
			$rs["gender"] = ($row->sexe == "H") ? 0 : 1;
			$rs["category"] = (string)$row->categorie;
			$rs["rank_simple"] = rank2id((string)$row->classSimple);
			$rs["rank_double"] = rank2id((string)$row->classDouble);
			$rs["rank_mixed"] = rank2id((string)$row->classMixte);
			$rs["email"] = (string)$row->emailPerso;
			
			$result[] = $rs;
		}
		return $result;
	}
}