<?php
    if (!isset($const) or $const != '12345678') {
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
        
    $kartice = array();

    $sql = "SELECT student.*,student_fakultet.broj_indeksa, zgrada.naziv, kartica.* 
    FROM kartica INNER JOIN student 
    ON kartica.student_id=student.student_id INNER JOIN student_fakultet
    ON student.student_id=student_fakultet.student_id INNER JOIN fakultet
    ON student_fakultet.fakultet_id=fakultet.fakultet_id INNER JOIN zgrada
    ON fakultet.fakultet_id=zgrada.fakultet_id
    ORDER BY student.student_id ASC";
    $rezultat = $konekcija->query($sql);
    while($r = $rezultat->fetch_assoc()){
        $student = new Student($r["ime"], $r["prezime"], $r["pol"], $r["broj_indeksa"], $r["datum_rodjenja"], $r["naziv"], $r["slika"]);
        $validna = ($r['validna']==1)?true:false;
        $beogradska = ($r['beogradska']==1)?true:false;
        $budzet = ($r['budzet']==1)?true:false;
        $dom = ($r['dom_id']!=null)?'true':'false';
        array_push($kartice,new Kartica($r["broj_kartice"], $r["isic_broj"], $r["datum_izdavanja"], $r["vazi_do"], $validna, $beogradska, $budzet, $student, $r["stanje_na_racunu"], $r["dorucak"], $r["rucak"], $r["vecera"], $dom));
    }
    
    $konekcija->close();
?>