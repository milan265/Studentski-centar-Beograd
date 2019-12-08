$(document).ready(function(){
	//scroll-to-top
	$(window).scroll(function(){
        if ($(this).scrollTop() >= 400) {
            $('#scroll-to-top').fadeIn();
         } else {
            $('#scroll-to-top').fadeOut();
         }
	   });
	
	
	    $('#scroll-to-top').click(function(){
		  $('html').animate({scrollTop : 0},1300);
		  return false; 
	    });
	//-----------------------------------------------------------
	
	$('#vesti .vest .vest-slika img').hover(
		function(){
			$(this).parent().next().addClass('vest-promenjen-tekst');
			$(this).css('opacity','1');
			$(this).css('transform','scale(1.1)');
		},
		
		function(){
			$(this).parent().next().removeClass('vest-promenjen-tekst');
			$(this).css('opacity','0.8');
			$(this).css('transform','none');
		});
	//-----------------------------------------------------------	
	
	$('#main-navigacija .main-navigacija-class img').hover(function(){
		$('#main-navigacija .main-navigacija-class img').not(this).css('filter','blur(5px)');
		
	},function(){
		$('#main-navigacija .main-navigacija-class img').not(this).css('filter','none');
	});
	//-----------------------------------------------------------

	//domovi.php restorani.php fakulteti.php
	var k=0;
	$('.zgrade img').click(function(){
		if(k==0){
			
			$('.zgrade img').fadeOut(1200);
			$(this).fadeIn(1200);
			$(this).parent().children('p').delay(1800).slideDown();
			$(this).parent().children('div').delay(1800).slideDown();
			k=1;
		}else{
			$('.zgrade img').delay(1200).fadeIn(1200);
			$(this).parent().children('p').slideUp(1200);
			$(this).parent().children('div').slideUp(1200);
			k=0;
		}
	});
	//-----------------------------------------------------------
	
    //studentska_kartica.php
    $('#kartica-forma :submit').click(function(){
        var b = proveraBrojaKartice();
        var i = proveraIsic();
        if(b && i){
            return true;
        }else{
            return false;
        }  
	});
    
    function proveraBrojaKartice(){
        var brKarticeRegExp= new RegExp(/^[0-9]{9}$/);
        var brKartice = $("#tbBrojKartice").val();
        var b = brKarticeRegExp.test(brKartice);
        if(b){
            $('#tbBrojKartice').removeClass('poruka-border');
            $('#tbBrojKartice').next().children(':first').slideUp();
            return true;
        }else{
            $('#tbBrojKartice').addClass('poruka-border');
			$('#tbBrojKartice').next().children(':first').slideDown();
            return false;
        }
    }
    
    function proveraIsic(){
        var isicRegExp= new RegExp(/^[A-Z]{1} ([0-9]{3} ){4}[A-Z]$/);
        var isic = $("#tbIsicBroj").val();
        var i = isicRegExp.test(isic);
        if(i){
            $('#tbIsicBroj').removeClass('poruka-border');
            $('#tbIsicBroj').next().children(':first').slideUp();
            return true;
        }else{
            $('#tbIsicBroj').addClass('poruka-border');
			$('#tbIsicBroj').next().children(':first').slideDown();
            return false;
        }
    }
    
    
    //-----------------------------------------------------------
    
    //uplata.php
    $('#racun-forma :submit').click(function(){
        var budzet = $('#budzet-js').val();
        var stanje = parseInt($('#stanje-na-racunu-js').val());
        var dorucak = parseInt($('#Doručak').val());
        var rucak = parseInt($('#Ručak').val());
        var vecera = parseInt($('#Večera').val());
        var bg = $('#bg-js').val();
        var max = parseInt($('#max-js').val());

        var cena = 0;
        if(budzet == 1){
            cena = dorucak*40 + rucak*72 + vecera*59;
        }else{
            cena = dorucak*95 + rucak*205 + vecera*175;
        }
        if(stanje >= cena){
            $('#poruka-uplata').slideUp();
        }else{
			$('#poruka-uplata').slideDown();
            return false;
        }
        if(bg == 1){
           if((dorucak+rucak+vecera)>max){
               $('#poruka-uplata-1').slideDown();
               return false
           }else{
               $('#poruka-uplata-1').slideUp();
               return true;
           }
        }
        return true;
    });
    //-----------------------------------------------------------
    
	//kontakt.php
	
	var podaciOOsobi="";
	
	$('#kontakt-forma :submit').click(function(){
		var t=proveraTekst();
		var p=proveraPoruka();
		var r=proveraRegExp();
		if( t && p && r){
			podaciOOsobi={
				"ime":$('#tbIme').val(),
				"prezime":$('#tbPrezime').val(),
				"email":$('#tbEmail').val(),
				"naslov":$('#tbNaslov').val(),
				"poruka":$('#taPoruka').val()	
			};
			return true;
		}else{
			return false;
		}
	});
		
	
	function proveraTekst(){
		var t=true;
		$('#kontakt-forma :text').each(function(){
			if($(this).val().length==0){
				$(this).addClass('poruka-border');
				$(this).next().children(':eq(1)').slideUp();
				$(this).next().children(':first').slideDown();
				t=false;
			}else{
				$(this).removeClass('poruka-border');
				$(this).next().children(':first').slideUp();
			}
		});
		return t;
	}
	
	function proveraPoruka(){
		if($('#taPoruka').val()==0){
			$('#taPoruka').addClass('poruka-border');
			$('#taPoruka').next().children(':first').slideDown();
			return false;
		}else{
			$('#taPoruka').removeClass('poruka-border');
			$('#taPoruka').next().children(':first').slideUp();
			return true;
		}
	}
	function proveraRegExp(){
		var imeRegExp= new RegExp(/^[A-Z][a-z]+(\s[A-Z][a-z]+)*$/);
		var emailRegExp= new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
		var ime=$('#tbIme').val();
		var prezime=$('#tbPrezime').val();
		var email=$('#tbEmail').val();
		var i=imeRegExp.test(ime);
		var p=imeRegExp.test(prezime);
		var e=emailRegExp.test(email);
		if(i || ime.length==0){
			if(i){
				$('#tbIme').removeClass('poruka-border');
				$('#tbIme').next().children(':eq(1)').slideUp();
			}
		}else{
			$('#tbIme').addClass('poruka-border');
			$('#tbIme').next().children(':eq(1)').slideDown();
		}
		if(p || prezime.length==0){
			if(p){
				$('#tbPrezime').removeClass('poruka-border');
				$('#tbPrezime').next().children(':eq(1)').slideUp();
			}
		}else{
			$('#tbPrezime').addClass('poruka-border');
			$('#tbPrezime').next().children(':eq(1)').slideDown();
		}
		if(e || email.length==0){
			if(e){
				$('#tbEmail').removeClass('poruka-border');
				$('#tbEmail').next().children(':eq(1)').slideUp();
			}
		}else{
			$('#tbEmail').addClass('poruka-border');
			$('#tbEmail').next().children(':eq(1)').slideDown();
		}
		if(i && p && e){
			return true;
		}else{
			return false;
		}
	}
	//-----------------------------------------------------------	
});