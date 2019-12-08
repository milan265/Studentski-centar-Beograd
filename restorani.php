<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
	include("restoran.php");
	for($i=0;$i<14;$i++){
		$src="slike/restorani/".strval($restorani[$i]->getId()).".jpg";
		echo "<div class='zgrade'>";
		$alt_title = $restorani[$i]->getNaziv();
		echo "<img src=\"$src\"	alt=\"$alt_title\" title=\"$alt_title\"/>";
		echo "<div class=\"opis_zgrade\">";
		echo "Naziv: "; 
		echo $restorani[$i]->getNaziv();
		echo "<br/>";
		echo "Id: ";
		echo $restorani[$i]->getId();
		echo "<br/>";
		echo "Opština: "; 
		echo $restorani[$i]->getOpstina();
		echo "<br/>";
		echo "Ulica: ";
		echo $restorani[$i]->getUlica();
		echo "<br/>";
		echo "Telefon: ";
		echo $restorani[$i]->getTelefon();
		echo "<br/>";
		echo "Kapacitet: ";
		echo $restorani[$i]->getKapacitet();
		echo "<br/>";
		echo "Broj obroka: ";
		echo $restorani[$i]->getBrojObroka();
		echo "<br/>";
		echo "</div>";
		echo "</div>";
	}
	echo "<div class = 'cistac'></div>";
?>
