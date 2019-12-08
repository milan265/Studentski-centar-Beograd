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
        
    $restorani = array();

    $sql = "SELECT * FROM restoran INNER JOIN zgrada ON restoran.restoran_id=zgrada.restoran_id";

    $rezultat = $konekcija->query($sql);
    while($r = $rezultat->fetch_assoc()){
        array_push($restorani,new Restoran($r["naziv"], $r["restoran_id"], $r["opstina"], $r["ulica"], $r["broj"], $r["opis"], $r["telefon"],    $r["kapacitet"], $r["broj_obroka"]));
    }
    
    $konekcija->close();
?>