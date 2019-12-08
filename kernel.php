<?php
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
	   header("Location: ./");
    }
    include('header.php');

    $stranica = isset($_GET['stranica']) ? $_GET['stranica'] : '';
    switch ($stranica){
	   case '':
		  echo "<script>document.title='Pocetna'</script>";
		  include('pocetna.php');
		  break;
	   case 'domovi':
		  echo "<script>document.title='Domovi'</script>";
		  include('domovi.php');
		  break;
	   case 'restorani':
		  echo "<script>document.title='Restorani'</script>";
		  include('restorani.php');
		  break;
	   case 'fakulteti':
		  echo "<script>document.title='Fakulteti'</script>";
		  include('fakulteti.php');
		  break;
	   case 'kartica':
		  echo "<script>document.title='Studentksa kartica'</script>";
		  include('studentska_kartica.php');
		  break;
	   case 'kontakt':
		  echo "<script>document.title='Kontakt'</script>";
		  include('kontakt.php');
		  break;
	   default:
		  echo "<script>document.title='GRESKA'</script>";
		  include('404.php');
		  break;		
    }

    include('footer.php');
?>