<?php
	if (!isset($const) or $const != '12345678') {
		header("Location: ./");
	}
    
    function prestupna($godina){
        if(($godina%100!=0 && $godina%4==0)||$godina%400==0){
            return true;
        }else{
            return false;
        }
    }

    function izracunajBrojDanaUMesecu($mesec, $godina){
        switch($mesec){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $brojDana = 31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $brojDana = 30;
                break;
            case 2:
                if(prestupna($godina)){
                    $brojDana = 29;
                }else{
                    $brojDana = 28;
                }
                break;
        }
        return $brojDana;
    }

    define('APP_KEY', $const);
    
    include("header.php");
    echo "<script>document.title='Uplata'</script>";
    $i = 0;
    while(list($indeks,$vrednost)=each($kartice)){
        if($brKartice == $vrednost->getBrojKartice() && $isic == $vrednost->getIsicBroj()){
            break;
        }
        $i++;
    }

    $st = $kartice[$i];
    
    $brKartice = $st->getBrojKartice();
    $isicBr = $st->getIsicBroj();
    setcookie("broj_kartice", $brKartice, time() + 86400, "/");
    setcookie("isic_broj", $isicBr, time() + 86400, "/");

    $br = $brKartice."\n";
    $fajl = fopen('korisnici.txt', 'a');
	fwrite($fajl, $br);
	fclose($fajl);
    
    if(!isset($_SESSION)){
        session_start();
    }
    $_SESSION["app_key"] = $const;
    
    $validna = ($st->getValidna())?"Validna":"Nije validna";
    $beogradska = ($st->getBeogradska())?"Beogradska":"Nije beogradska";
    $budzet = ($st->getBudzet())?"Budžet":"Samofinansiranje";
    $stanje = strval($st->getStanjeNaRacunu())."RSD";
    $dom = ($st->getDom())?"Smešten u domu":"Nije smešten u domu";
    
    $tekst = array();
    array_push($tekst,"Broj kartice");
    array_push($tekst,"ISIC broj");
    array_push($tekst,"Datum izdavanja");
    array_push($tekst,"Važi do");
    array_push($tekst,"Validna");
    array_push($tekst,"Beogradska");
    array_push($tekst,"Budžet");
    array_push($tekst,"Ime");
    array_push($tekst,"Prezime");
    array_push($tekst,"Pol");
    array_push($tekst,"Broj indeksa");
    array_push($tekst,"Datum rođenja");
    array_push($tekst,"Fakultet");
    array_push($tekst,"Stanje na računu");
    array_push($tekst,"Doručak");
    array_push($tekst,"Ručak");
    array_push($tekst,"Večera");
    array_push($tekst,"Dom");
    
    $podaci = array();
    array_push($podaci,$st->getBrojKartice());
    array_push($podaci,$st->getIsicBroj());
    array_push($podaci,$st->getDatumIzdavanja());
    array_push($podaci,$st->getVaziDo());
    array_push($podaci,$validna);
    array_push($podaci,$beogradska);
    array_push($podaci,$budzet);
    array_push($podaci,$st->getStudent()->getIme());
    array_push($podaci,$st->getStudent()->getPrezime());
    array_push($podaci,$st->getStudent()->getPol());
    array_push($podaci,$st->getStudent()->getBrojIndeksa());
    array_push($podaci,$st->getStudent()->getDatumRodjenja());
    array_push($podaci,$st->getStudent()->getFakultet());
    array_push($podaci,$stanje);
    array_push($podaci,$st->getDorucak());
    array_push($podaci,$st->getRucak());
    array_push($podaci,$st->getVecera());
    array_push($podaci,$dom);

    $profilnaSlika = $st->getStudent()->getSlika();
    echo "<div class='dugme-uplata'><a id=\"odjavi-se\" href=\"./odjava.php\">Odjavi se</a><a id=\"odjavi-se\" href=\"./racuni_sort_asc.php\">Prikaži račune u rastućem poretku</a><a id=\"odjavi-se\" href=\"./racuni_sort_desc.php\">Prikaži račune u opadajućem poretku</a></div>";
    echo "<div id='uplata'><div class='tabela-uplata-provera' id='uplata-info'><div><div><div><img src=\"data:image/png;base64,".base64_encode($profilnaSlika)."\" alt=\"Profilna slika\"/></div></div><table>";
    for($i=0; $i<18; $i++){
        echo "<tr><td><label>";
        echo $tekst[$i];
        echo "</label></td>";
        echo "<td><label>";
        echo $podaci[$i];
        echo "</label></td></tr>";    
    }
    echo "</table></div></div>";
    
    $dan = date("d");
    $mesec = date("m");
    $godina = date("Y");
    $brojDanaUMesecu = izracunajBrojDanaUMesecu($mesec,$godina);
    if($dan>20 || !$st->getBudzet()){
        $korak = 1;
    }else{
        $korak = 10;
    }
    
    $maxBrojObroka = array();
    if($st->getBeogradska()){
        $maxBrojObroka[14] = $brojDanaUMesecu - $st->getDorucak() - $st->getRucak() - $st->getVecera();
        $maxBrojObroka[15] = $maxBrojObroka[14];
        $maxBrojObroka[16] = $maxBrojObroka[14];
    }else{
        $maxBrojObroka[14] = $brojDanaUMesecu - $st->getDorucak();
        $maxBrojObroka[15] = $brojDanaUMesecu - $st->getRucak();
        $maxBrojObroka[16] = $brojDanaUMesecu - $st->getVecera();
    }
    $budzetJs = $st->getBudzet();
    $stanjeJs = $st->getStanjeNaRacunu();
    $bgJs = $st->getBeogradska();
    $maxJs = $maxBrojObroka[14];
    echo "<input type='hidden' id='budzet-js' name='budzet-js' value=\"$budzetJs\"/>";
    echo "<input type='hidden' id='bg-js' name='bg-js' value=\"$bgJs\"/>";
    echo "<input type='hidden' id='stanje-na-racunu-js' name='stanje-na-racunu-js' value=\"$stanjeJs\"/>";
    echo "<input type='hidden' id='max-js' name='max-js' value=\"$maxJs\"/>";

    
    $brKart = $st->getBrojKartice();
    $stanjeKart = $st->getStanjeNaRacunu();
    if($st->getValidna()){
        echo "<div class='tabela-uplata-provera' id='obroci'><div><form action='racun.php' method='post' name='racun-forma' id='racun-forma'><table>";
        echo "<input type='hidden' id='brKartice-racun' name='brKartice-racun' value=\"$brKart\"/>";
        echo "<input type='hidden' id='stanje-racun' name='stanje-racun' value=\"$stanjeKart\"/>";
        echo "<input type='hidden' id='budzet-racun' name='budzet-racun' value=\"$budzetJs\"/>";
        echo "<input type='hidden' id='const-racun' name='const-racun' value=\"$const\"/>";
        $j = 0;
        for($i=14; $i<17; $i++){
            echo "<tr><td><label>";
            echo $tekst[$i];
            echo "</label></td>";
            echo "<td><input type='number' id=\"$tekst[$i]\" name=\"$tekst[$i]\" min='0' max=\"$maxBrojObroka[$i]\" step=\"$korak\" value=\"0\"/></td></tr>";
            $j++;
        }
        echo "<tr><td colspan='2'><div class='poruka'><span id='poruka-uplata'>Nemate dovoljno novca na računu!</span></div></td></tr>";
        echo "<tr><td colspan='2'><div class='poruka'><span id='poruka-uplata-1'>Ne možete uplatiti ovu količinu obroka!</span></div></td></tr>";
        echo "<tr><td colspan='2'><input type='submit' value='Uplati'/></td></tr>";
        echo "</table>";
        echo "</form></div></div>";
    }else{
        echo "<div class='tabela-uplata-provera' id='uplata-levo'><div><h1>Kartica nije validna!</h1></div></div>";
    }
    echo "</div>";
    echo "<div class='cistac'></div>";
    
    
    include("footer.php");
?>