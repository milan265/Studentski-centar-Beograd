<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
    if(isset($_COOKIE['cookie'])){
        if($_COOKIE['cookie']==0){
            session_start();
            $_SESSION['app_key'] = APP_KEY;
            echo "<div id=\"cookie-info\">
                <p>Ovaj sajt koristi kolačiće</p>
                <a href='cookie_potvrda.php'id=\"cookie-button\">Prihvatam</a>
                </div>";
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="slike/logo.jpg"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div id="okvir">
			<header>
				<div id="header-sadrzaj">
					<div id="logo">
						<a href="./"><img src="slike/header-logo.jpg" alt="logo"/></a>
					</div>
					<nav id="meni">
						<ul>
							<li><a href="./"> <span class="fa fa-home"></span></a></li>
							<li><a href="./index.php?stranica=domovi"> Domovi</a></li>
							<li><a href="./index.php?stranica=restorani"> Restorani</a></li>
							<li><a href="./index.php?stranica=fakulteti"> Fakulteti</a></li>
							<li><a href="./index.php?stranica=kartica"> Studentska kartica</a></li>
							<li><a href="./index.php?stranica=kontakt"> Kontakt</a></li>
						</ul>
					</nav>
				</div>
			</header>
			<div id="main">
				<div id="main-sadrzaj">
					