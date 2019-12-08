<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
	include("zgrada.php");
	
	class Dom extends Zgrada{
		private $telefon;
		private $brojSoba;
		private $kapacitet;
		private $brojStudenata;
		
		function __construct($naziv, $id, $opstina, $ulica, $broj, $opis, $telefon, $brojSoba, $kapacitet, $brojStudenata){
			parent::__construct($naziv, $id, $opstina, $ulica, $broj, $opis);
			$this->telefon = $telefon;
			$this->brojSoba = $brojSoba;
			$this->kapacitet = $kapacitet;
			$this->brojStudenata = $brojStudenata;
		}
		
		public function setTelefon($telefon){
			$this->telefon = $telefon;
		}
		public function setBrojSoba($brojSoba){
			$this->brojSoba = $brojSoba;
		}
		public function setKapacitet($kapacitet){
			$this->kapacitet = $kapacitet;
		}
		public function setBrojStudenata($brojStudenata){
			$this->brojStudenata = $brojStudenata;
		}
		public function getTelefon(){
			return $this->telefon;
		}
		public function getBrojSoba(){
			return $this->brojSoba;
		}
		public function getKapacitet(){
			return $this->kapacitet;
		}
		public function getBrojStudenata(){
			return $this->brojStudenata;
		}
	}
	
    include_once("dom_podaci.php");
?>