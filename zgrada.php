<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
	class Zgrada{
		private $naziv;
		private $id;
		private $opstina;
		private $ulica;
		private $broj;
		private $opis;
		
		function __construct($naziv, $id, $opstina, $ulica, $broj, $opis){
			$this->naziv = $naziv;
			$this->id = $id;
			$this->opstina = $opstina;
			$this->ulica = $ulica;
			$this->broj = $broj;
			$this->opis = $opis;
		}
		
		public  function setNaziv($naziv){
			$this->naziv = $naziv;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function setOpstina($opstina){
			$this->opstina = $opstina;
		}
		public function setUlica($ulica){
			$this->ulica = $ulica;
		}
		public function setBroj($broj){
			$this->broj = $broj;
		}
		public function setOpis($opis){
			$this->opis = $opis;
		}
		public function getNaziv(){
			return $this->naziv;
		}
		public function getId(){
			return $this->id;
		}
		public function getOpstina(){
			return $this->opstina;
		}
		public function getUlica(){
			return $this->ulica;
		}
		public function getBroj(){
			return $this->broj;
		}
		public function getOpis(){
			return $this->opis;
		}
		
	}
?>