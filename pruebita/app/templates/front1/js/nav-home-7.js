/* - Caja Flotante / Icono Deslizar ---- */
$(function(){
	$(window).scroll(function(){
		
		if ($(window).scrollTop() > 10){
			$("#caja-flotante").fadeIn();
			$("#back-menu").fadeIn();
	
		}else{
			$("#caja-flotante").fadeOut();
			$("#back-menu").fadeOut();
		}

	});
});

/* - Desplazamiento de contenido ---- */
$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
});

/* - Menu responsivo ---- */
$(document).ready(function(){

	$("#open_menu").click(function(){
		//alert('Abre menu');

		$("#open_menu").fadeOut();
		$("#close_menu").fadeIn();

		$("body").css("overflow", "hidden");
		$("#menu").fadeIn();
		/*$("#menu").animate({
            height: 'toggle'
    	});*/
	});

	$("#close_menu").click(function(){
		//alert('Cierra menu');

		$("#open_menu").fadeIn();
		$("#close_menu").fadeOut();
		
		$("body").css("overflow", "auto");
		$("#menu").fadeOut();
		/*$("#menu").animate({
            height: 'toggle'
    	});*/
	});

});

/* - Form Voluntariado ---- */
$(document).ready(function(){

	$("#open_voluntario").click(function(){
		//alert('Abre voluntario');

		$("#open_voluntario").fadeOut();
		$("#close_voluntario").fadeIn();

		$("#form_voluntario").animate({
            right: '0px'
    	});
	});

	$("#close_voluntario").click(function(){
		//alert('Abre voluntario');
		
		$("#open_voluntario").fadeIn();
		$("#close_voluntario").fadeOut();

		$("#form_voluntario").animate({
            right: '-350px'
    	});
	});

});

/* - Despegable ---- */
$(document).ready(function(){
	
	$("#open_despegable").click(function(){
		//alert('Despegable');

		$("#despegable").animate({
            height: 'toggle'
    	});
	});

});

/* - Share Landing ---- */
$(document).ready(function(){
	
	$("#open_share").hover(function(){
        $("#share_landing").fadeIn(200);
    },
        function(){
        $("#share_landing").fadeOut(200);
    });

});

/* - Navegacion Home ---- */

		$(document).ready(function() {
			/*
			* Plugin intialization
			*/
	    	$('#pagepiling').pagepiling({
	          	direction: 'horizontal',
	    		menu: '#menu',
	    		/*anchors: ['home', 'conoceme', 'plataforma-del-frente', 'propuestas', 'sala-de-prensa', 'activismo', 'redes-sociales', 'eventos'],
			    sectionsColor: ['#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000'],*/
			    anchors: ['home', 'conoceme', 'plataforma-del-frente', 'propuestas', 'sala-de-prensa', 'activismo', 'eventos'],
			    sectionsColor: ['#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000'],
			    navigation: {
			    	'position': 'right'
			   		//'tooltips': ['Home', 'Conóceme', 'Propuestas', 'Sala de prensa', 'Activismo', 'Redes Sociales', 'Eventos']
			   	},
			   	/*navigation: false,*/
			    afterRender: function(){
			    	$('#pp-nav').addClass('custom');
			    },
			    afterLoad: function(anchorLink, index){
			    	if(index>1){
			    		$('#pp-nav').removeClass('custom');
			    	}else{
			    		$('#pp-nav').addClass('custom');
			    	}

			    	if(index==1){
			    		//alert('Slide #'+index+' / Home');

			    		//$("#play_video").get(0).play();
			    		$("#urlnext").attr("href", "#conoceme");

						document.getElementById("tit_conoceme").style.display = 'none';
						document.getElementById("desc_conoceme").style.display = 'none';
						document.getElementById("separador_conoceme").style.display = 'none';
						document.getElementById("btn_conoceme").style.display = 'none';

						document.getElementById("tit_plataforma").style.display = 'none';
						document.getElementById("desc_plataforma").style.display = 'none';
						document.getElementById("separador_plataforma").style.display = 'none';
						
						document.getElementById("tit_propuestas").style.display = 'none';
						document.getElementById("desc_propuestas").style.display = 'none';
						document.getElementById("separador_propuestas").style.display = 'none';

						document.getElementById("not_principal").style.display = 'none';
						document.getElementById("not_secundaria").style.display = 'none';
						document.getElementById("btn_principal").style.display = 'none';

						document.getElementById("tit_activismo").style.display = 'none';
						document.getElementById("desc_activismo").style.display = 'none';
						document.getElementById("separador_activismo").style.display = 'none';
						document.getElementById("btn_activismo").style.display = 'none';

						document.getElementById("tit_redes").style.display = 'none';

						document.getElementById("tit_eventos").style.display = 'none';

						document.getElementById("arrow").style.display = '';

						//document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
						//document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
						//document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
						//document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
						//document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
						//document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
						//document.getElementById("barramenu").style.borderColor = '#FFFFFF';

						/*document.getElementById("icofacebook").src = 'images/iconos/facebook_2.png';
						document.getElementById("icotwitter").src = 'images/iconos/twitter_2.png';
						document.getElementById("icoinstagram").src = 'images/iconos/instagram_2.png';
						document.getElementById("icoyoutube").src = 'images/iconos/youtube_2.png';
						document.getElementById("icotelefono").src = 'images/iconos/telefono_1_2.png';
						document.getElementById("icomenu").src = 'images/iconos/ico_menu_2.png';
						document.getElementById("barramenu").style.borderColor = '#160e41';*/


						//$("#form_home").fadeIn();

			    	}else if(index==2){
			    		//alert('Slide #'+index+' / Conoceme');

			    		$("#play_video").get(0).pause();
			    		$("#urlnext").attr("href", "#plataforma-del-frente");
 
			    		$("#tit_conoceme").animate({ height: 'toggle' });
				    	$("#desc_conoceme").animate({ height: 'toggle' });
				    	$("#separador_conoceme").animate({ width: 'toggle' });
				    	$("#btn_conoceme").animate({ height: 'toggle' });

				    	document.getElementById("tit_plataforma").style.display = 'none';
						document.getElementById("desc_plataforma").style.display = 'none';
						document.getElementById("separador_plataforma").style.display = 'none';

				    	document.getElementById("tit_propuestas").style.display = 'none';
						document.getElementById("desc_propuestas").style.display = 'none';
						document.getElementById("separador_propuestas").style.display = 'none';

						document.getElementById("not_principal").style.display = 'none';
						document.getElementById("not_secundaria").style.display = 'none';
						document.getElementById("btn_principal").style.display = 'none';

						document.getElementById("tit_activismo").style.display = 'none';
						document.getElementById("desc_activismo").style.display = 'none';
						document.getElementById("separador_activismo").style.display = 'none';
						document.getElementById("btn_activismo").style.display = 'none';

						document.getElementById("tit_redes").style.display = 'none';

						document.getElementById("tit_eventos").style.display = 'none';

						document.getElementById("arrow").style.display = '';

						document.getElementById("form_home").style.display = 'none';

					//	document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
					//	document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
					//	document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
					//	document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
					//	document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
					//	document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
					//	document.getElementById("barramenu").style.borderColor = '#FFFFFF';

					}else if(index==3){
			    		//alert('Slide #'+index+' / Conoceme');

			    		$("#play_video").get(0).pause();
			    		$("#urlnext").attr("href", "#propuestas");

			    		document.getElementById("tit_conoceme").style.display = 'none';
						document.getElementById("desc_conoceme").style.display = 'none';
						document.getElementById("separador_conoceme").style.display = 'none';
						document.getElementById("btn_conoceme").style.display = 'none';
 
			    		$("#tit_plataforma").animate({ height: 'toggle' });
				    	$("#desc_plataforma").animate({ height: 'toggle' });
				    	$("#separador_plataforma").animate({ width: 'toggle' });
				    	$("#btn_plataforma").animate({ height: 'toggle' });

				    	document.getElementById("tit_propuestas").style.display = 'none';
						document.getElementById("desc_propuestas").style.display = 'none';
						document.getElementById("separador_propuestas").style.display = 'none';

						document.getElementById("not_principal").style.display = 'none';
						document.getElementById("not_secundaria").style.display = 'none';
						document.getElementById("btn_principal").style.display = 'none';

						document.getElementById("tit_activismo").style.display = 'none';
						document.getElementById("desc_activismo").style.display = 'none';
						document.getElementById("separador_activismo").style.display = 'none';
						document.getElementById("btn_activismo").style.display = 'none';

						document.getElementById("tit_redes").style.display = 'none';

						document.getElementById("tit_eventos").style.display = 'none';

						document.getElementById("arrow").style.display = '';

						document.getElementById("form_home").style.display = 'none';

						//document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
					//	document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
					//	document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
					//	document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
					//	document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
					//	document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
					//	document.getElementById("barramenu").style.borderColor = '#FFFFFF';


			    	}else if(index==4){
			    		//alert('Slide #'+index+' / Propuestas');

			    		$("#play_video").get(0).pause();
			    		$("#urlnext").attr("href", "#sala-de-prensa");

			    		document.getElementById("tit_conoceme").style.display = 'none';
						document.getElementById("desc_conoceme").style.display = 'none';
						document.getElementById("separador_conoceme").style.display = 'none';
						document.getElementById("btn_conoceme").style.display = 'none';

						document.getElementById("tit_plataforma").style.display = 'none';
						document.getElementById("desc_plataforma").style.display = 'none';
						document.getElementById("separador_plataforma").style.display = 'none';

			    		$("#tit_propuestas").animate({ height: 'toggle' });
				    	$("#desc_propuestas").animate({ height: 'toggle' });
				    	$("#separador_propuestas").animate({ height: 'toggle' });

				    	document.getElementById("not_principal").style.display = 'none';
						document.getElementById("not_secundaria").style.display = 'none';
						document.getElementById("btn_principal").style.display = 'none';

						document.getElementById("tit_activismo").style.display = 'none';
						document.getElementById("desc_activismo").style.display = 'none';
						document.getElementById("separador_activismo").style.display = 'none';
						document.getElementById("btn_activismo").style.display = 'none';

						document.getElementById("tit_redes").style.display = 'none';

						document.getElementById("tit_eventos").style.display = 'none';

						document.getElementById("arrow").style.display = '';

						document.getElementById("form_home").style.display = 'none';

						//document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
						//document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
						//document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
						//document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
						//document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
						//document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
						//document.getElementById("barramenu").style.borderColor = '#FFFFFF';


			    	}else if(index==5){
			    		//alert('Slide #'+index+' / Noticias');

			    		$("#play_video").get(0).pause();
			    		$("#urlnext").attr("href", "#activismo");

			    		document.getElementById("tit_conoceme").style.display = 'none';
						document.getElementById("desc_conoceme").style.display = 'none';
						document.getElementById("separador_conoceme").style.display = 'none';
						document.getElementById("btn_conoceme").style.display = 'none';

						document.getElementById("tit_plataforma").style.display = 'none';
						document.getElementById("desc_plataforma").style.display = 'none';
						document.getElementById("separador_plataforma").style.display = 'none';

						document.getElementById("tit_propuestas").style.display = 'none';
						document.getElementById("desc_propuestas").style.display = 'none';
						document.getElementById("separador_propuestas").style.display = 'none';

			    		$("#not_principal").animate({ height: 'toggle' });
			    		$("#not_secundaria").animate({ height: 'toggle' });
			    		$("#btn_principal").animate({ height: 'toggle' });
			    		
			    		document.getElementById("tit_activismo").style.display = 'none';
						document.getElementById("desc_activismo").style.display = 'none';
						document.getElementById("separador_activismo").style.display = 'none';
						document.getElementById("btn_activismo").style.display = 'none';

						document.getElementById("tit_redes").style.display = 'none';

						document.getElementById("tit_eventos").style.display = 'none';

						document.getElementById("arrow").style.display = '';

						document.getElementById("form_home").style.display = 'none';

					//	document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
					//	document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
					//	document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
//document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
//document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
						//document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
					//	document.getElementById("barramenu").style.borderColor = '#FFFFFF';
			    		

			    	}else if(index==6){
			    		//alert('Slide #'+index+' / Activismo');

			    		$("#play_video").get(0).pause();
			    		$("#urlnext").attr("href", "#redes-sociales");

			    		document.getElementById("tit_conoceme").style.display = 'none';
						document.getElementById("desc_conoceme").style.display = 'none';
						document.getElementById("separador_conoceme").style.display = 'none';
						document.getElementById("btn_conoceme").style.display = 'none';

						document.getElementById("tit_plataforma").style.display = 'none';
						document.getElementById("desc_plataforma").style.display = 'none';
						document.getElementById("separador_plataforma").style.display = 'none';

						document.getElementById("tit_propuestas").style.display = 'none';
						document.getElementById("desc_propuestas").style.display = 'none';
						document.getElementById("separador_propuestas").style.display = 'none';

						document.getElementById("not_principal").style.display = 'none';
						document.getElementById("not_secundaria").style.display = 'none';
						document.getElementById("btn_principal").style.display = 'none';


			    		$("#tit_activismo").animate({ height: 'toggle' });
				    	$("#desc_activismo").animate({ height: 'toggle' });
				    	$("#separador_activismo").animate({ width: 'toggle' });
				    	$("#btn_activismo").animate({ height: 'toggle' });

				    	document.getElementById("tit_redes").style.display = 'none';

						document.getElementById("tit_eventos").style.display = 'none';

						document.getElementById("arrow").style.display = '';

						document.getElementById("form_home").style.display = 'none';

						//document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
						//document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
						//document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
						//document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
						//document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
						//document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
						//document.getElementById("barramenu").style.borderColor = '#FFFFFF';


			    	}else if(index==7){
			    		//alert('Slide #'+index+' / Redes Sociales');

			    		$("#play_video").get(0).pause();
			    		$("#urlnext").attr("href", "#eventos");
			    		
			    		document.getElementById("tit_conoceme").style.display = 'none';
						document.getElementById("desc_conoceme").style.display = 'none';
						document.getElementById("separador_conoceme").style.display = 'none';
						document.getElementById("btn_conoceme").style.display = 'none';

						document.getElementById("tit_plataforma").style.display = 'none';
						document.getElementById("desc_plataforma").style.display = 'none';
						document.getElementById("separador_plataforma").style.display = 'none';

						document.getElementById("tit_propuestas").style.display = 'none';
						document.getElementById("desc_propuestas").style.display = 'none';
						document.getElementById("separador_propuestas").style.display = 'none';

						document.getElementById("not_principal").style.display = 'none';
						document.getElementById("not_secundaria").style.display = 'none';
						document.getElementById("btn_principal").style.display = 'none';

						document.getElementById("tit_activismo").style.display = 'none';
						document.getElementById("desc_activismo").style.display = 'none';
						document.getElementById("separador_activismo").style.display = 'none';
						document.getElementById("btn_activismo").style.display = 'none';

						$("#tit_redes").animate({ height: 'toggle' });

				    	document.getElementById("tit_eventos").style.display = 'none';

				    	document.getElementById("arrow").style.display = '';

				    	document.getElementById("form_home").style.display = 'none';

				    	//document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
						//document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
						//document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
						//document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
						//document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
						//document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
						//document.getElementById("barramenu").style.borderColor = '#FFFFFF';

			    	}else if(index==8){
			    		//alert('Slide #'+index+' / Eventos');

			    		$("#play_video").get(0).pause();
			    		$("#urlnext").attr("href", "#home");
			    		
			    		document.getElementById("tit_conoceme").style.display = 'none';
						document.getElementById("desc_conoceme").style.display = 'none';
						document.getElementById("separador_conoceme").style.display = 'none';
						document.getElementById("btn_conoceme").style.display = 'none';

						document.getElementById("tit_plataforma").style.display = 'none';
						document.getElementById("desc_plataforma").style.display = 'none';
						document.getElementById("separador_plataforma").style.display = 'none';

						document.getElementById("tit_propuestas").style.display = 'none';
						document.getElementById("desc_propuestas").style.display = 'none';
						document.getElementById("separador_propuestas").style.display = 'none';

						document.getElementById("not_principal").style.display = 'none';
						document.getElementById("not_secundaria").style.display = 'none';
						document.getElementById("btn_principal").style.display = 'none';

						document.getElementById("tit_activismo").style.display = 'none';
						document.getElementById("desc_activismo").style.display = 'none';
						document.getElementById("separador_activismo").style.display = 'none';
						document.getElementById("btn_activismo").style.display = 'none';

						document.getElementById("tit_redes").style.display = 'none';

						$("#tit_eventos").animate({ height: 'toggle' });

						$("#arrow").fadeOut();

						document.getElementById("form_home").style.display = 'none';

						//document.getElementById("icofacebook").src = 'images/iconos/facebook.png';
						//document.getElementById("icotwitter").src = 'images/iconos/twitter.png';
						//document.getElementById("icoinstagram").src = 'images/iconos/instagram.png';
						//document.getElementById("icoyoutube").src = 'images/iconos/youtube.png';
						//document.getElementById("icotelefono").src = 'images/iconos/telefono_1.png';
						//document.getElementById("icomenu").src = 'images/iconos/ico_menu.png';
						//document.getElementById("barramenu").style.borderColor = '#FFFFFF';

			    	}

			    }
			});
	    });