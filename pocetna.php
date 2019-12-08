<?php	
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
?>
<div id="main-navigacija">
	<div class="main-navigacija-class">
		<a href="./index.php?stranica=fakulteti">
			<img id="slika-gore-levo" src="slike/pocetna-fakulteti.jpg" alt="fakulteti"/>
		</a>
		<div class="slike-tekst">
			Fakulteti
		</div>
	</div>
	<div class="main-navigacija-class">
		<a href="./index.php?stranica=domovi">
			<img id="slika-gore-desno" src="slike/pocetna-domovi.jpg" alt="domovi"/>
		</a>
		<div class="slike-tekst">
			Domovi
		</div>
	</div>
	<div class="main-navigacija-class">
		<a href="./index.php?stranica=restorani">
			<img id="slika-dole-levo" src="slike/pocetna-restorani.jpg" alt="restorani"/>
		</a>
		<div class="slike-tekst">
			Restorani
		</div>		
	</div>
	<div class="main-navigacija-class">
		<a href="./index.php?stranica=kartica">
			<img id="slika-dole-desno" src="slike/pocetna-uplata.jpg" alt="uplata"/>
		</a>
		<div class="slike-tekst">
			Kartica
		</div>
	</div>
	<div class="cistac">
	</div>
</div>

<div id="vesti">
	<div class="vest">
		<div class="vest-slika">
			<img src="slike/vest1.jpg" alt="vest 1"/>
			</div>
		<div class="vest-tekst">
			<h2>Prva vest</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Suspendisse et mauris consectetur, auctor mi
					maximus, tristique mi. Vestibulum pulvinar 
					fermentum tortor, in convallis nisl molestie
					sit amet. Sed ex arcu, mattis nec interdum 
					posuere, sodales non purus. Donec id erat 
					convallis, varius felis sodales, tempor ex. 
					Sed viverra malesuada tortor. Duis nulla 
					ipsum, dignissim id purus et, mollis 
					ullamcorper odio. Proin et varius elit.		
				</p>
		</div>
	</div>
	<div class="vest">
		<div class="vest-slika">
			<img src="slike/vest2.jpg"alt="vest 2"/>
		</div>
		<div class="vest-tekst">
			<h2>Druga vest</h2>
			<p>
				Suspendisse velit purus, blandit non facilisis a,
				lacinia vitae diam. Morbi quis varius lectus. 
				Aliquam a pharetra mi. Praesent consectetur 
				velit ut metus sodales ultrices. Morbi eget 
				auctor est, at pharetra tortor. Sed ullamcorper 
				sed ligula ac porttitor. Morbi porttitor mauris 
				non elementum fermentum.				
			</p>
		</div>
	</div>
	<div class="cistac">
	</div>
</div>