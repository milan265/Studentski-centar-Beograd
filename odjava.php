<?php
    session_start();
    $const = $_SESSION["app_key"];
    session_unset();
    if (!isset($const) or $const != '12345678') {
        header("Location: ./");
	}
    setcookie("broj_kartice", "0", time() - 86400, "/");
    setcookie("isic_broj", "0", time() - 86400, "/");
    
    header("Location: ./index.php?stranica=kartica");
?>