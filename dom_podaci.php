<?php
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $baza = 'studentski_centar';
    
    
    $konekcija = new mysqli($server, $username, $password, $baza);
    if($konekcija->connect_error){
        die("Neuspešna konekcija: " . $konekcija->connect_error);
    }
        
    $domovi = array();

    $sql = "SELECT * FROM dom INNER JOIN zgrada ON dom.dom_id=zgrada.dom_id";

    $rezultat = $konekcija->query($sql);
    while($r = $rezultat->fetch_assoc()){
        array_push($domovi,new Dom($r["naziv"], $r["dom_id"], $r["opstina"], $r["ulica"], $r["broj"], $r["opis"], $r["telefon"], $r["broj_soba"], $r["kapacitet"], $r["broj_studenata"]));
    }
    
    $konekcija->close();
?>