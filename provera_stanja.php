<?php
	if (!isset($const) or $const != '12345678') {
		header("Location: ./");
	}    
    define('APP_KEY', '12345678');

    
    include("header.php");
    echo "<script>document.title='Provera stanja'</script>";
    $i = 0;
    while(list($indeks,$vrednost)=each($kartice)){
        if($brKartice == $vrednost->getBrojKartice() && $isic == $vrednost->getIsicBroj()){
            break;
        }
        $i++;
    }
    
    $st = $kartice[$i];

    $validna = ($st->getValidna())?"Validna":"Nije validna";
    $beogradska = ($st->getBeogradska())?"Beogradska":"Nije beogradska";
    $budzet = ($st->getBudzet())?"Budžet":"Samofinansiranje";
    $stanje = strval($st->getStanjeNaRacunu())." RSD";
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
    echo "<div class='tabela-uplata-provera'><div><div><img src=\"data:image/png;base64,".base64_encode($profilnaSlika)."\" alt=\"Profilna slika\"/></div><table>";
    for($i=0; $i<18; $i++){
        echo "<tr><td><label>";
        echo $tekst[$i];
        echo "</label></td>";
        echo "<td><label>";
        echo $podaci[$i];
        echo "</label></td></tr>";    
    }
    echo "</table><div class = 'cistac'></div></div></div>";

    include("footer.php");
?>