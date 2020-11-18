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

	//document.oncontextmenu = function(){return false;}

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

	$("#btneventos").click(function(){
		//alert('Cierra menu');

		$("#open_menu").fadeIn();
		$("#close_menu").fadeOut();
		
		$("body").css("overflow", "auto");
		$("#menu").fadeOut();
		/*$("#menu").animate({
            height: 'toggle'
    	});*/
	});

	$("#open_form").click(function(){
		//alert('Abre form');
		$("#form_home").fadeIn();
	});

	$("#close_form").click(function(){
		//alert('Cierra form');
		$("#form_home").fadeOut();
		//$("#play_video").get(0).play();
	});
	
	$("#mnucontacto").click(function(){
		//alert('Abre form');
		$("#open_menu").fadeIn();
		$("#close_menu").fadeOut();
		
		$("body").css("overflow", "auto");
		$("#menu").fadeOut();
		
		$("#form_home").fadeIn();
	});
	
	$("#linkcontacto").click(function(){
		//alert('Abre form');
		$("#open_menu").fadeIn();
		$("#close_menu").fadeOut();
		
		$("body").css("overflow", "auto");
		$("#menu").fadeOut();
		$("#form_home").fadeIn();
	});

	$("#close_repositorio_1").click(function(){
		//alert('Cierra repositorio 1');
		$("#repositorio_eventos_1").fadeOut();
		$("#repositorio_eventos_1").empty();
	});

});

/* - Video Home ---- */
$(document).ready(function(){

	$("#open_video").click(function(){
		//alert('Abre Video');
		$("#op_video").fadeIn();
		$("#play_video").get(0).play();
	});

	$("#close_video").click(function(){
		//alert('Abre Video');
		$("#op_video").fadeOut();
		$("#play_video").get(0).pause();
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

/* - Repositorio Eventos ---- */
$(document).ready(function(){

	$("#close_rep").click(function(){
		//alert('Cierra repositorio 1');
		$("#repositorio").fadeOut();
		$("#close_rep").fadeOut();
	});

});

function evento(id){
	
	//alert('Estado #'+id+'');
	$("#repositorio").fadeIn();
	$("#close_rep").fadeIn();
	$("#repositorio").load('../includes/frame_eventos.php', {
	    id: id
	});
	
}

function masinfo(info_id){
	
	//alert('Info #'+info_id+'');
	$("#repositorio").fadeIn();
	$("#close_rep").fadeIn();
	$("#repositorio").load('../includes/frame_eventos.php', {
	    info_id: info_id
	});
	
}