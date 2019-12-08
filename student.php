<?php
    if (!isset($const) or $const != '12345678') {
		header("Location: ./");
	}

    class Student{
        private $ime;
        private $prezime;
        private $pol;
        private $brojIndeksa;
        private $datumRodjenja;
        private $fakultet;
        private $slika;
        
        function __construct($ime, $prezime, $pol, $brojIndeksa, $datumRodjenja, $fakultet, $slika){
			$this->ime = $ime;
            $this->prezime = $prezime;
            $this->pol = $pol;
            $this->brojIndeksa = $brojIndeksa;
            $this->datumRodjenja = $datumRodjenja;
            $this->fakultet = $fakultet;
            $this->slika = $slika;
		}
        
        public function setIme($ime){
            $this->ime = $ime;
        }
        public function setPrezime($prezime){
            $this->prezime = $prezime;
        }
        public function setPol($pol){
            $this->pol = $pol;
        }
        public function setBrojIndeksa($brojIndeksa){
            $this->brojIndeksa = $brojIndeksa;
        }
        public function setDatumRodjenja($datumRodjenja){
            $this->datumRodjenja = $datumRodjenja;
        }
        public function setFakultet($fakultet){
            $this->fakultet = $fakultet;
        }
        public function setSlika($slika){
            $this->slika = $slika;
        }
        
        public function getIme(){
            return $this->ime;
        }
        public function getPrezime(){
            return $this->prezime;
        }
        public function getPol(){
            return $this->pol;
        }
        public function getBrojIndeksa(){
            return $this->brojIndeksa;
        }
        public function getDatumRodjenja(){
            return $this->datumRodjenja;
        }
        public function getFakultet(){
            return $this->fakultet;
        }
        public function getSlika(){
            return $this->slika;
        }
        
        public function prikaziStudenta(){
            return "Ime: $this->ime <br/>
                    Prezime: $this->prezime <br/>
                    Pol: $this->pol <br/>
                    Broj indeksa: $this->brojIndeksa <br/>
                    Datum rođenja: $this->datumRodjenja <br/>
                    Fakultet: $this->fakultet";
        }
    }

?>