<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
	include("zgrada.php");
	
	class Restoran extends Zgrada{
		private $telefon;
		private $kapacitet;
		private $brojObroka;
		function __construct($naziv, $id, $opstina, $ulica, $broj, $opis, $telefon, $kapacitet, $brojObroka){
			parent::__construct($naziv, $id, $opstina, $ulica, $broj, $opis);
			$this->telefon = $telefon;
			$this->kapacitet = $kapacitet;
			$this->brojObroka = $brojObroka;
		}
		
		public function setTelefon($telefon){
			$this->telefon = $telefon;
		}
		public function setKapacitet($kapacitet){
			$this->kapacitet = $kapacitet;
		}
		public function setBrojObroka($brojObroka){
			$this->brojObroka = $brojObroka;
		}
		public function getTelefon(){
			return $this->telefon;
		}
		public function getKapacitet(){
			return $this->kapacitet;
		}
		public function getBrojObroka(){
			return $this->brojObroka;
		}
	}
	
    include_once("restoran_podaci.php");
?>