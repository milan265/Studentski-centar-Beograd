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

    $tekstRacun = array();
    array_push($tekstRacun,"Broj kartice");
    array_push($tekstRacun,"Doručak");
    array_push($tekstRacun,"Ručak");
    array_push($tekstRacun,"Večera");
    array_push($tekstRacun,"Iznos");
    array_push($tekstRacun,"Vreme");
    array_push($tekstRacun,"Transakcija id");
    
    $rezultat = $konekcija->query($sql);
    while($r = $rezultat->fetch_assoc()){
        $vrednosti = array();
        array_push($vrednosti,$r["broj_kartice"]);
        array_push($vrednosti,$r["dorucak"]);
        array_push($vrednosti,$r["rucak"]);
        array_push($vrednosti,$r["vecera"]);
        array_push($vrednosti,strval($r["iznos"])." RSD");
        array_push($vrednosti,$r["vreme"]);
        array_push($vrednosti,$r["transakcija_id"]);

        echo "<div class='tabela-uplata-provera'><div><table>";
            for($i=0; $i<7; $i++){
                echo "<tr><td><label>";
                echo $tekstRacun[$i];
                echo "</label></td>";
                echo "<td><label>";
                echo $vrednosti[$i];
                echo "</label></td></tr>";    
            }
        echo "</table></div></div>";
    }
    
    $konekcija->close();

?>