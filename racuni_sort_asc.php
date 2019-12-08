<?php
    session_start();
    if(isset($_SESSION["app_key"])){
        $const = $_SESSION["app_key"];
        define('APP_KEY', $const);
    }
    session_unset();
    if (!isset($const) or $const != '12345678') {
        header("Location: ./");
	}

    include("header.php");
    echo "<script>document.title='Svi računi'</script>";

    if(isset($_COOKIE['broj_kartice'])){
        $brojKartice = $_COOKIE['broj_kartice'];
    }else{
        $brojKartice = '';
    }
    $sql = "SELECT transakcija_id, vreme, dorucak, rucak, vecera, FORMAT(iznos,2) AS iznos, broj_kartice
            FROM transakcija
            WHERE broj_kartice=$brojKartice
            ORDER BY transakcija_id ASC";
    include("prikazi_racune.php");

    include("footer.php");
?>