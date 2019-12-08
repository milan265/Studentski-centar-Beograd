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
        
    $fakulteti = array();

    $sql = "SELECT * FROM fakultet INNER JOIN zgrada ON fakultet.fakultet_id=zgrada.fakultet_id";

    $rezultat = $konekcija->query($sql);
    while($r = $rezultat->fetch_assoc()){
        array_push($fakulteti,new Fakultet($r["naziv"], $r["fakultet_id"], $r["opstina"], $r["ulica"], $r["broj"], $r["opis"], $r["dekan"], $r["veb_sajt"], $r["email"]));
    }

    $konekcija->close();
?>