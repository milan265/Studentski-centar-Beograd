<?php
    $const = $_POST['const-racun'];
	if (!isset($const) or $const != '12345678') {
		header("Location: ./");
	}
    if(!isset($_POST["brKartice-racun"]) || !isset($_POST["stanje-racun"]) || !isset($_POST["budzet-racun"]) || !isset($_POST["Doručak"]) || !isset($_POST["Ručak"]) || !isset($_POST["Večera"])){
        echo "Greska";
        exit();
    }
     define('APP_KEY', '12345678');

    
    include("header.php");
    echo "<script>document.title='Račun'</script>";

    $brKartice = $_POST['brKartice-racun'];
    $stanje = $_POST['stanje-racun'];
    $budzet = $_POST['budzet-racun'];
    $dorucak = $_POST['Doručak'];
    $rucak = $_POST['Ručak'];
    $vecera = $_POST['Večera'];


    $cena = 0;
    if($budzet == 1){
        $cena = $dorucak*40 + $rucak*72 + $vecera*59;
        $dor = strval($dorucak)." x 40 RSD";
        $ruc = strval($rucak)." x 72 RSD";
        $vec = strval($vecera)." x 59 RSD";
    }else{
        $cena = $dorucak*95 + $rucak*205 + $vecera*175;
        $dor = strval($dorucak)." x 95 RSD";
        $ruc = strval($rucak)." x 205 RSD";
        $vec = strval($vecera)." x 175 RSD";
    }
    $stanje -= $cena;
    include ('kartica.php');
    
    $i = 0;
    while(list($indeks,$vrednost)=each($kartice)){
        if($brKartice == $vrednost->getBrojKartice()){
            break;
        }
        $i++;
    }
    $st = $kartice[$i];
    
    $d = $dorucak + $st->getDorucak();
    $r = $rucak + $st->getRucak();
    $v = $vecera + $st->getVecera();
        
    
    $vreme = date('Y-m-d H:i:s');

    $tekstRacun = array();
    array_push($tekstRacun,"Broj kartice");
    array_push($tekstRacun,"Doručak");
    array_push($tekstRacun,"Ručak");
    array_push($tekstRacun,"Večera");
    array_push($tekstRacun,"Ukupno");
    array_push($tekstRacun,"Vreme");
    array_push($tekstRacun,"Stanje na računu");

    $vrednosti = array();
    array_push($vrednosti,$brKartice);
    array_push($vrednosti,$dor);
    array_push($vrednosti,$ruc);
    array_push($vrednosti,$vec);
    array_push($vrednosti,strval($cena)." RSD");
    array_push($vrednosti,$vreme);
    array_push($vrednosti,strval($stanje)." RSD");

    

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $baza = 'studentski_centar';
    
    $konekcija = new mysqli($server, $username, $password, $baza);
    if($konekcija->connect_error){
        die("Neuspešna konekcija: " . $konekcija->connect_error);
    }

    
    $sql = "INSERT INTO transakcija (vreme, dorucak, rucak, vecera, iznos, broj_kartice) VALUES('$vreme', $dorucak, $rucak, $vecera, $cena, $brKartice)";
    try{
        if($konekcija->query($sql)===true){
            $sql = "UPDATE kartica SET stanje_na_racunu=$stanje, dorucak=$d, rucak = $r, vecera=$v WHERE broj_kartice=$brKartice";
            $konekcija->query($sql);
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
        }else{
            throw new Exception("GREŠKA PRILIKOM UPISA U BAZU", 15);
        }
    }catch(Exception $e){
        echo "Desio se izuzetak pod brojem: " . $e->getCode() . " sa porukom: " . $e->getMessage();
    }
    
    $konekcija->close();
    
    include("footer.php");
?>