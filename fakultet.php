<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
	
	include("zgrada.php");
	
	class Fakultet extends Zgrada{
		private $dekan;
		private $vebSajt;
		private $email;
		function __construct($naziv, $id, $opstina, $ulica, $broj, $opis, $dekan, $vebSajt, $email){
			parent::__construct($naziv, $id, $opstina, $ulica, $broj, $opis);
			$this->dekan = $dekan;
			$this->vebSajt = $vebSajt;
			$this->email = $email;
		}
		public function setDekan($dekan){
			$this->dekan = $dekan;
		}
		public function getDekan(){
			return $this->dekan;
		}
		public function setVebSajt($vebSajt){
			$this->vebSajt = $vebSajt;
		}
		public function getVebSajt(){
			return $this->vebSajt;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getEmail(){
			return $this->email;
		}
	}

    include_once("fakultet_podaci.php");
?>