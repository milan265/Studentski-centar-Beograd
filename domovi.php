<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
	include("dom.php");
	
	for($i=0;$i<12;$i++){
		$src="slike/domovi/".strval($domovi[$i]->getId()).".jpg";
		echo "<div class='zgrade'>";
		$alt_title = $domovi[$i]->getNaziv();
		echo "<img src=\"$src\"	alt=\"$alt_title\" title=\"$alt_title\"/>";
		echo "<div class=\"opis_zgrade\">";
		echo "Naziv: "; 
		echo $domovi[$i]->getNaziv();
		echo "<br/>";
		echo "Id: ";
		echo $domovi[$i]->getId();
		echo "<br/>";
		echo "Opština: "; 
		echo $domovi[$i]->getOpstina();
		echo "<br/>";
		echo "Ulica: ";
		echo $domovi[$i]->getUlica();
		echo "<br/>";
		echo "Telefon: ";
		echo $domovi[$i]->getTelefon();
		echo "<br/>";
		echo "Broj soba: ";
		echo $domovi[$i]->getBrojSoba();
		echo "<br/>";
		echo "Kapacitet: ";
		echo $domovi[$i]->getKapacitet();
		echo "<br/>";
		echo "Broj studenata: ";
		echo $domovi[$i]->getBrojStudenata();
		echo "<br/>";
		echo "</div>";
		echo "<p>";
		echo $domovi[$i]->getOpis();
		echo "</p>";
		echo "</div>";
	}
	echo "<div class = 'cistac'></div>";
?>