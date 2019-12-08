<?php
    if(isset($_POST["const"])){
        $const = $_POST["const"];
    }else{
        session_start();
        $const = $_SESSION["app_key"];
        $_SESSION['app_key'] = "";
        $_POST = $_SESSION["post_podaci"];
    }
    
    if (!isset($const) or $const != "12345678") {
        header("Location: ./");
	}
    if((!isset($_POST["provera"]) && !isset($_POST["uplata"])) || !isset($_POST["tbBrojKartice"]) || !isset($_POST["tbIsicBroj"])){
        echo "Greska";
        exit();
    }
    
    include("kartica.php");
    $brKartice = $_POST['tbBrojKartice'];
    $isic = $_POST['tbIsicBroj'];
    if(isset($_POST['provera']) && $_POST['provera']=="provera"){
        if(proveri($brKartice,$isic, $kartice)){
            include("provera_stanja.php");
        }else{
            include("kartica_ne_postoji.php");
        }
    }else if(isset($_POST['uplata']) && $_POST['uplata']=="uplata"){
        if(proveri($brKartice,$isic, $kartice)){
            include("uplata.php");
        }else{
            include("kartica_ne_postoji.php");
        }
    }else{
        header("Location: ./index.php?stranica=greska");
    }

    function proveri($brKartice, $isic, $kartice){
        while(list($indeks,$vrednost)=each($kartice)){
            if($brKartice == $vrednost->getBrojKartice() && $isic == $vrednost->getIsicBroj()){
                return true;
            }
        }
        return false;
    }
?>