<?php
    if (!isset($const) or $const != '12345678') {
        header("Location: ./");
	}

    include("student.php");
    class Kartica{
        private $brojKartice;
        private $isicBroj;
        private $datumIzdavanja;
        private $vaziDo;
        private $validna;
        private $beogradska;
        private $budzet;
        private $student;
        private $stanjeNaRacunu;
        private $dorucak;
        private $rucak;
        private $vecera;
        private $dom;
        
        function __construct($brojKartice, $isicBroj, $datumIzdavanja, $vaziDo, $validna, $beogradska, $budzet, $student, $stanjeNaRacunu, $dorucak, $rucak, $vecera, $dom){
            $this->brojKartice = $brojKartice;
            $this->isicBroj = $isicBroj;
            $this->datumIzdavanja = $datumIzdavanja;
            $this->vaziDo = $vaziDo;
            $this->validna = $validna;
            $this->beogradska = $beogradska;
            $this->budzet = $budzet;
            $this->student = $student;
            $this->stanjeNaRacunu = $stanjeNaRacunu;
            $this->dorucak = $dorucak;
            $this->rucak = $rucak;
            $this->vecera = $vecera;
            $this->dom = $dom;
        }
        
        public function setBrojKartice($brojKartice){
            $this->brojKartice = $brojKartice;
        }
        public function setIsicBroj($isicBroj){
            $this->isicBroj = $isicBroj;
        }
        public function setDatumIzdavanja($datumIzdavanja){
            $this->datumIzdavanja = $datumIzdavanja;
        }
        public function setVaziDo($vaziDo){
            $this->vaziDo = $vaziDo;
        }
        public function setValidna($validna){
            $this->validna = $validna;
        }
        public function setBeogradska($beogradska){
            $this->beogradska = $beogradska;
        }
        public function setBudzet($budzet){
            $this->budzet = $budzet;
        }
        public function setStudent($student){
            $this->student = $student;
        }
        public function setStanjeNaRacunu($stanjeNaRacunu){
            $this->stanjeNaRacunu = $stanjeNaRacunu;
        }
        public function setDorucak($dorucak){
            $this->dorucak = $dorucak;
        }
        public function setRucak($rucak){
            $this->rucak = $rucak;
        }
        public function setVecera($vecera){
            $this->vecera = $vecera;
        }
        public function setDom($dom){
            $this->dom = $dom;
        }
        
        public function getBrojKartice(){
            return $this->brojKartice;
        }
        public function getIsicBroj(){
            return $this->isicBroj;
        }
        public function getDatumIzdavanja(){
            return $this->datumIzdavanja;
        }
        public function getVaziDo(){
            return $this->vaziDo;
        }
        public function getValidna(){
            return $this->validna;
        }
        public function getBeogradska(){
            return $this->beogradska;
        }
        public function getBudzet(){
            return $this->budzet;
        }
        public function getStudent(){
            return $this->student;
        }
        public function getStanjeNaRacunu(){
            return $this->stanjeNaRacunu;
        }
        public function getDorucak(){
            return $this->dorucak;
        }
        public function getRucak(){
            return $this->rucak;
        }
        public function getVecera(){
            return $this->vecera;
        }
        public function getDom(){
            return $this->dom;
        }
        
        public function prikaziKarticu(){
            $v = ($this->validna)?"Validna":"Nije validna";
            $bg = ($this->beogradska)?"Beogradska":"Nije beogradska";
            $b = ($this->budzet)?"Budzet":"Samofinansiranje";
            $s = $this->student->prikaziStudenta();
            $d = ($this->dom)?"Smešten u domu":"Nije smeštetn u domu";
            return "Broj kartice: $this->brojKartice <br/>
                    ISIC broj: $this->isicBroj <br/>
                    Datum izdavanja: $this->datumIzdavanja <br/>
                    Važi do: $this->vaziDo <br/>
                    Validna: $v <br/>
                    Beogradska: $bg <br/>
                    Budžet: $b <br/>
                    $s <br/>
                    Stanje na računu: $this->stanjeNaRacunu RSD <br/>
                    Doručak: $this->dorucak <br/>
                    Ručak: $this->rucak <br/>
                    Večera: $this->vecera <br/>
                    Dom: $d <br/>
            ";
        }
    }
    
    include_once("kartica_podaci.php");
?>
