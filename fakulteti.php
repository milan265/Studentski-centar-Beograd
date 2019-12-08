<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
	include("fakultet.php");

	for($i=0;$i<31;$i++){
		$src="slike/fakulteti/".strval($fakulteti[$i]->getId()).".jpg";
		echo "<div class='zgrade'>";
		$alt_title = $fakulteti[$i]->getNaziv();
		echo "<img src=\"$src\"	alt=\"$alt_title\" title=\"$alt_title\"/>";
		echo "<div class=\"opis_zgrade\">";
		echo "Naziv: "; 
		echo $fakulteti[$i]->getNaziv();
		echo "<br/>";
		echo "Id: ";
		echo $fakulteti[$i]->getId();
		echo "<br/>";
		echo "Opština: "; 
		echo $fakulteti[$i]->getOpstina();
		echo "<br/>";
		echo "Ulica: ";
		echo $fakulteti[$i]->getUlica();
		echo "<br/>";
		echo "Dekan: ";
		echo $fakulteti[$i]->getDekan();
		echo "<br/>";
		echo "Veb sajt: ";
		$vebSajt = $fakulteti[$i]->getVebSajt();
		echo "<a href=\"$vebSajt\" target=\"_blank\">";
		preg_match("/\/[a-z\.]+/",$vebSajt,$a);
		echo substr($a[0],1);
		echo "</a>";
		echo "<br/>";
		echo "email: ";
		$email = $fakulteti[$i]->getEmail();
		echo "<a href=\"mailto:$email\">";
		echo $fakulteti[$i]->getEmail();
		echo "</a>";
		echo "<br/>";
		echo "</div>";
		echo "<p>";
		echo $fakulteti[$i]->getOpis();
		echo "</p>";
		echo "</div>";
	}
	echo "<div class = 'cistac'></div>";
?>