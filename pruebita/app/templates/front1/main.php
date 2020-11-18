
<!DOCTYPE html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php $this->load->view('meta',$meta);?>

        <script src='<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/css3-animate-it.js'>
        </script>


        <link rel="stylesheet" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/animations.css" type="text/css">

        <script src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/vendor/modernizr-2.6.2.min.js">
        </script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Global site tag (gtag.js) - Google Analytics -->

        <!-- Facebook Pixel Code -->
        <!-- End Facebook Pixel Code -->

        <!-- Facebook Pixel Code -->
        <!-- End Facebook Pixel Code -->

        <!-- Google Tag Manager -->
        <!-- End Google Tag Manager -->

    </head>
    <body>

        <!-- Google Tag Manager (noscript) -->

        <!-- End Google Tag Manager (noscript) -->

        <div  class="contenedor">

        <!-- Preload -->
        <div id="loader-wrapper">
            <div id="loader">
            </div>
            <div class="loader-section section-left">
            </div>
            <!--<div class="loader-section section-right"></div>-->
        </div>
        <!-- Termina Preload -->

        <div id="form_home" class="cont_form_home"  style="display: none;">
            <div class="form_home">
                <div id="close_form" class="form_home_close">
                    <img alt="Botón de cerrar formulario" title="Botón de cerrar formulario" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/ico_close.png">
                </div>
                <iframe title="Formulario de contacto" class="iframe_home" src="<?php echo base_url("index.php?class=Unete")?>" scrolling="no" frameborder="0">
                </iframe>
            </div>
        </div>

        <div id="top">
        </div>

        <div class="cont_dias_eleccion" style="display: none;">
            Faltan
            <b>
                -27
            </b>días para las elecciones
        </div>



        <div id="caja-flotante" style="display: none;">
            <a title="Subir página" rel="NOFOLLOW" href="#top">
                <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/back-to-top.png" width="120" height="120" alt="Subir página" title="Subir página"/>
            </a>
        </div>

        <div id="menu" class="cont_menu" style="display: none;">

            <div id="close_menu" class="ico_close" style="display: none;">
                <img alt="Botón para cerrar menú" title="Botón para cerrar menú" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/ico_close.png">
            </div>

            <div class="menu">
                <a title="Conócenos." rel="NOFOLLOW" href="<?php echo site_url('conoceme')?>">
                    <div class="btn_menu">
                        CONÓCENOS
                    </div>
                </a>
                <a title="Propuestas" rel="NOFOLLOW" href="<?php echo site_url('plataforma-del-frente')?>">
                    <div class="btn_menu">
                        ÚNETE A NOSOTROS
                    </div>
                </a>
                <a title="Galería de imágenes de campaña" rel="NOFOLLOW" href="<?php echo site_url('propuestas')?>">
                    <div class="btn_menu">
                        NUESTRAS PROPUESTAS
                    </div>
                </a>
                <a title="Galería de videos de campaña" rel="NOFOLLOW" href="<?php echo site_url('videos')?>">
                    <div class="btn_menu">
                        EVENTOS
                    </div>
                </a>
                <a title="Sala de prensa" rel="NOFOLLOW" href="<?php echo site_url('sala-de-prensa')?>">
                    <div class="btn_menu">
                        NOTICIAS
                    </div>
                </a>




                <a title="Activismo" rel="NOFOLLOW" href="<?php echo site_url('activismo')?>">
                    <div class="btn_menu">
                        SÉ NUESTRO PERSONERO
                    </div>
                </a>

                <a title="Contacto, Únete al cambio" id="open_form" rel="NOFOLLOW">
                    <div class="btn_menu">
                        CONTACTO
                    </div>
                </a>

                <!--a title="Crea tu Avatar" rel="NOFOLLOW" href="<?php echo site_url('crea-tu-avatar')?>">
                <div class="btn_menu">
                CREA TU AVATAR
                </div>
                </a-->

                <div class="cont_redes_menu">

                    <a title="Facebook de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://www.facebook.com/RicardoAnayaC/" target="_blank">
                        <div class="redes_menu">
                            <img alt="Facebook de Javier Ísmodes, se abrirá en otra página" title="Facebook de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/facebook.png">
                        </div>
                    </a>

                    <a title="Twitter de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://twitter.com/ricardoanayac" target="_blank">
                        <div class="redes_menu">
                            <img alt="Twitter de Javier Ísmodes, se abrirá en otra página" title="Twitter de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/twitter.png">
                        </div>
                    </a>

                    <a title="Instagram de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://www.instagram.com/ricardoanayacortes/" target="_blank">
                        <div class="redes_menu">
                            <img alt="Instagram de Javier Ísmodes, se abrirá en otra página" title="Instagram de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/instagram.png">
                        </div>
                    </a>

                    <a title="Youtube de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://www.youtube.com/channel/UCaiZb12iRYQketTpEcM--nA" target="_blank">
                        <div class="redes_menu">
                            <img alt="Youtube de Javier Ísmodes, se abrirá en otra página" title="Youtube de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/youtube.png">
                        </div>
                    </a>

                    <a title="Teléfono de Javier Ísmodes, se abrirá aplicación requerida en caso de existir para realizar la llamada" rel="NOFOLLOW" href="tel:+525568130248" target="_blank">
                        <div class="redes_menu">
                            <img alt="Teléfono de Javier Ísmodes, se abrirá aplicación requerida en caso de existir para realizar la llamada" title="Teléfono de Javier Ísmodes, se abrirá aplicación requerida en caso de existir para realizar la llamada" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/telefono_1.png">
                        </div>
                    </a>

                </div>
            </div>

        </div>

        <div id="form_voluntario" class="cont_form_voluntario">

            <div id="open_voluntario" class="btn_form_voluntario">
                «
            </div>
            <div id="close_voluntario" class="btn_form_voluntario" style="display: none;">
                »
            </div>

            <div class="tit_form_voluntario">
                QUIERO SER VOLUNTARIO
            </div>

        </div>

        <h1 style="display: none;">
            Javier Ismodes | Gobierno regional
        </h1>
        <div class="header" style="background: none;" >

            <a title="Logo Javier Ísmodes Presidente" rel="NOFOLLOW" href="<?php echo base_url()?>">
                <div class="logo logo_top">
                    <img alt="Logo Javier Ísmodes Presidente" title="Logo Javier Ísmodes Presidente" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/logo_ismodes.png" >
                </div>
            </a>

            <div id="open_menu" class="ico_menu">
                <img id="icomenu" alt="Botón para abrir menú" title="Botón para abrir menú" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/ico_menu.png">
            </div>


            <!--<div id="barramenu" class="cont_redes_header" style="border-color: #160e41;">-->
            <div id="barramenu" class="cont_redes_header" style="border-color: #FFF;">

                <a title="Facebook de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://www.facebook.com/RicardoAnayaC/" target="_blank">
                    <div class="redes_header">
                        <img id="icofacebook" alt="Facebook de Javier Ísmodes, se abrirá en otra página" title="Facebook de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/facebook.png">
                    </div>
                </a>

                <a title="Twitter de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://twitter.com/ricardoanayac" target="_blank">
                    <div class="redes_header">
                        <img id="icotwitter" alt="Twitter de Javier Ísmodes, se abrirá en otra página" title="Twitter de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/twitter.png">
                    </div>
                </a>

                <a title="Instagram de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://www.instagram.com/ricardoanayacortes/" target="_blank">
                    <div class="redes_header">
                        <img id="icoinstagram" alt="Instagram de Javier Ísmodes, se abrirá en otra página" title="Instagram de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/instagram.png">
                    </div>
                </a>

                <a title="Youtube de Javier Ísmodes, se abrirá en otra página" rel="NOFOLLOW" href="https://www.youtube.com/channel/UCaiZb12iRYQketTpEcM--nA" target="_blank">
                    <div class="redes_header">
                        <img id="icoyoutube" alt="Youtube de Javier Ísmodes, se abrirá en otra página" title="Youtube de Javier Ísmodes, se abrirá en otra página" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/youtube.png">
                    </div>
                </a>

                <a title="Teléfono de Javier Ísmodes, se abrirá aplicación requerida en caso de existir para realizar la llamada" rel="NOFOLLOW" href="tel:+525568130248" target="_blank">
                    <div class="redes_header">
                        <img id="icotelefono" alt="Teléfono de Javier Ísmodes, se abrirá aplicación requerida en caso de existir para realizar la llamada" title="Teléfono de Javier Ísmodes, se abrirá aplicación requerida en caso de existir para realizar la llamada" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/telefono_1.png">
                    </div>
                </a>

            </div>


        </div>


        <link rel="stylesheet" type="text/css" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/jquery.pagepiling.css" media="all" style="display: none !important;"/>
        <script type="text/javascript" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/jquery.pagepiling.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/nav-home-7.js">
        </script>

        <div id="pagepiling">

        <!-- Home -->
        <div class="section bghome" id="section1">

            <!--<div id="animate_1" class='animatedParent' data-sequence='500' style="border: 1px solid #FF0000; text-align: center;">
            <div class="animated bounceInDown" data-id='1'>
            <h1>Horizontal Scroll</h1>
            </div>
            </div>-->

            <div id="op_video" class="cont_frase_home" style="display:none">

                <script>
                    $(document).ready(function(){
                            $("#play_video").on('ended', function(){
                                    $("#op_video").fadeOut();
                                });
                        });
                </script>

                <div class="frase_home"style="display:none">
                    <div id="close_video" class="form_home_close">
                        <img alt="Botón para cerrar video" title="Botón para cerrar video" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/ico_close.png">
                    </div>
                    <video width="320" height="240" id="play_video" controls>

                    </video>
                </div>

            </div>
            <!--respnse
            <div  class="container-fluid " >
            <div class="row">
            <div class="col-md-3" >

            </div>
            <div class="col-md-7">

            <span style="font-size:60px;color:red !important;"><b>ÚNETE AL CAMBIO </b></span>
            </div>
            <div class="col-md-3" >

            </div>
            </div>

            </div>-->


            <div class="cont_rac_home">
                <a href="https://declara.jne.gob.pe/ASSETS/PLANGOBIERNO/FILEPLANGOBIERNO/15049.pdf" target="_blank" class="btn btn-primary">
                    PLAN DE GOBIERNO

                </a>


                <!--<img alt="Botón para abrir video" title="Botón para abrir video" id="open_video" src="images/btn_rac_home.png">-->
                <br>
                <div>
                    ---
                </div>
                <a title="Conócenos" rel="Index, Follow" href="<?php echo site_url('conoceme')?>" style="text-decoration: none;">
                    <span class="btn_rac_home_1">
                        CONÓCENOS
                    </span>
                </a> |
                <a title="Únete a nosotros" rel="Index, Follow" href="<?php echo site_url('activismo')?>" style="text-decoration: none;">
                    <span class="btn_rac_home_2">
                        ÚNETE A NOSOTROS
                    </span>
                </a> |
                <a title="Propuestas, Un gobierno de coalición, en el que la participación ciudadana sea la base de la toma de decisiones." rel="Index, Follow" href="<?php echo site_url('propuestas')?>" style="text-decoration: none;">
                    <span class="btn_rac_home_3">
                        NUESTRAS PROPUESTAS
                    </span>
                </a>  |
                <a title="sé nuestro personero" rel="Index, Follow" href="<?php echo site_url('activismo')?>" style="text-decoration: none;">
                    <span class="btn_rac_home_1">
                        SÉ NUESTRO PERSONERO
                    </span>
                </a> |
                <a title="Eventos, Sigue el día a día" rel="Index, Follow" href="#eventos" style="text-decoration: none;">
                    <span class="btn_rac_home_2">
                        EVENTOS
                    </span>
                </a> |
                <a title="Sala de prensa" rel="Index, Follow" href="<?php echo site_url('sala-de-prensa')?>" style="text-decoration: none;">
                    <span class="btn_rac_home_3">
                        NOTICIAS
                    </span>
                </a> |
                <span title="Contacto, Únete al cambio" id="open_form_2" class="btn_rac_home_3">
                    CONTACTO
                </span>
                <!--p>
                Javier Ísmodes, CANDIDATO A LA PRESIDENCIA
                </p-->

            </div>

        </div>

        <!-- Conoceme -->
        <div class="section bg_cont_conoceme">

            <div class="cont_conoceme">

                <h2 id="tit_conoceme" style="display: none;  color: white;font-size:45px; margin-top:100px">
                    CONÓCENOS

                </h2>


                <div id="separador_conoceme" style="display: none;"  class="separador_conoceme">
                </div>

                <div id="desc_conoceme" style="display: none;" class="descripcion_conoceme">
                    Arequipa Transformación es un movimiento regional independiente, cuya propuesta
                    es impulsar las banderas de la región Arequipa, para el logro de las legítimas
                    aspiraciones de desarrollo de sus pueblos integrado por ciudadanos con vocación
                    de servicio.
                </div>

                <a title="Conóce más de Javier Ísmodes" rel="NOFOLLOW" href="<?php echo site_url('conoceme')?>">
                    <span id="btn_conoceme" style="display: none; padding: 9px 15px 0px 15px;" class="button_1">
                        VER MÁS
                    </span>
                </a>

            </div>

        </div>
        <!-- Termina Conoceme -->



        <!-- Plataforma de Frente -->
        <div class="section" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/banners/propuestas.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">

            <div class="cont_propuestas">

                <h2 id="tit_plataforma" class="tit_propuestas_h2" style="display: none;  color: white;">
                    ÚNETE A <br> NOSOTROS
                </h2>
                <div id="separador_plataforma"  style="display: none;" class="separador_propuestas margin_left_propuestas">
                </div>

                <div id="desc_plataforma" style="display: none;" class="descripcion_propuestas">
                    Teniendo como fortalezas el compromiso de nuestra población para asumir los retos
                    que presenta los actuales tiempos, asumimos nuestro rol de conducir los destinos de nuestra
                    región, para un franco desarrollo, para que cada arequipeño o arequipeña tenga el
                    derecho de gozar de su libertad, la igualdad y el acceso a la vida digna.
                    <br>
                    <a title="Ver más propuestas, plataforma de frente" rel="NOFOLLOW" href="<?php echo site_url('activismo')?>">
                        <span id="btn_conoceme" style="padding: 7px 15px 0px 15px;" class="button_1">
                            VER MÁS
                        </span>
                    </a>
                </div>

            </div>
        </div>
        <!-- Termina Plataforma de Frente -->

        <!-- Propuestas -->
        <div class="section" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/banners/noticias.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">

            <div class="cont_propuestas">

                <h2 id="tit_propuestas" style="display: none;  color: white;font-size:45px;">
                    PROPUESTAS
                </h2>
                <div id="separador_propuestas"  style="display: none;" class="separador_propuestas">
                </div>

                <div id="desc_propuestas" style="display: none;" class="descripcion_propuestas">
                    Nuestra propuesta de gobierno es abierta, es realista y predispuesta a acoger todo
                    aporte que sume al desarrollo regional, propone estrategias de desarrollo acordes
                    a la realidad regional, articuladas con la demanda y propuesta de desarrollo de las
                    08 provincias y 109 distritos.

                    <br>
                    <a title="Ver más propuestas, plataforma de frente" rel="NOFOLLOW" href="<?php echo site_url('propuestas')?>">
                        <span id="btn_conoceme" style="padding: 7px 15px 0px 15px;" class="button_1">
                            VER MÁS
                        </span>
                    </a>
                </div>

            </div>

        </div>
        <!-- Termina Propuestas -->

        <!-- Sala de prensa -->
        <div class="section" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/banners/noticias1.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">

            <div class="cont_tit_noticias">
                <h2 style="color: white">
                    NOTICIAS
                </h2>
            </div>

            <div class="cont_noticias">

                <div id="not_principal" style="display: none;" class="noticias">

                    <?php

                    foreach ($noticias as $contenido)
                    {
                        ?>

                        <a title="<?php echo $contenido->titulo;?>" rel="Index, Follow" href="<?php echo site_url(NOTICIAS.'/').strtolower($contenido->slug);?>">
                            <div class="img_noticias_1" style="background: url(<?php echo base_url()?>uploads/<?php echo $contenido->icon;?>); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                                <div class="txt_noticias_1">
                                    <?php echo $contenido->titulo;?>
                                </div>
                            </div>
                        </a>

                        <?php

                        break;
                    }

                    ?>


                </div>

                <div id="not_secundaria" style="display: none;" class="noticias">


                    <?php
                    $first = TRUE;
                    foreach ($noticias as $contenido)
                    {
                        if ($first) {

                            $first = FALSE;
                            continue;
                        }
                        ?>

                        <a title="<?php echo $contenido->titulo;?>" rel="Index, Follow" href="<?php echo site_url(NOTICIAS.'/').strtolower($contenido->slug);?>">
                            <div id="not_1" class="img_noticias_2" style="background: url(<?php echo base_url()?>uploads/<?php echo $contenido->icon;?>); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                                <div class="txt_noticias_2">
                                    <?php echo $contenido->titulo;?>
                                </div>
                            </div>
                        </a>


                        <?php


                    }

                    ?>

                </div>

                <div id="btn_principal" style="display: none;" class="btn_noticias">
                    <a title="Ver más eventos de Javier Ísmodes" rel="NOFOLLOW" href="<?php echo site_url('sala-de-prensa')?>">
                        <span id="btn_conoceme" style="padding: 10px 15px 0px 15px;" class="button_1">
                            VER MÁS
                        </span>
                    </a>
                </div>

            </div>

        </div>
        <!-- Termina Sala de prensa -->

        <!-- Activismo -->

        <!-- Termina Voluntariado -->

        <!-- Redes Sociales -->
        <!--<div id="redes_cont_slider">

        <div class="section" style="background: url(images/banners/redes-sociales.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">

        <div class="cont_tit_redes_secc"><h2 id="tit_redes" style="display: none;">SIGUE MI TRABAJO</h2></div>

        <div class="cont_redes_secc">

        <link href="css/curator.css" rel="stylesheet"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <div id="curator-feed"></div>
        <script type="text/javascript" src="js/curator.js"></script>
        <script type="text/javascript">
        var widget = new Curator.Widgets.Waterfall({
        container:'#curator-feed',
        feedId:"e1fa67a4-844d-4e9a-8b7d-0b067ff94b0f"
        });
        </script>

        </div>

        </div>
        Termina Redes Sociales-->

        <!-- Eventos -->
        <div class="section" id="section7" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/banners/eventos.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">

            <div class="cont_tit_eventos_secc">
                <h2 id="tit_eventos" style="display: none;">
                    EVENTOS
                </h2>
                <br>
                <span style="color: #FFF;">
                    
                </span>
            </div>

            <div class="cont_caja_eventos_secc">
<!--
                <div id="close_rep" class="cont_caja_eventos_secc_close">
                    <img alt="Botón para cerrar ventana actual de eventos" title="Botón para cerrar ventana actual de eventos" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/ico_close.png">
                </div>-->

                <!-- Eventos -->
                <div id="repositorio">


                    <?php
                    foreach ($eventos as $contenido)
                    {

                        //strftime(" % A % d de % B del % Y",strtotime($contenido->fecha_visible));
                        //martes 07 de agosto del 2018
                        $mes    = ucfirst(strftime("%B",strtotime($contenido->fecha_visible)));
                        $dia    = strftime("%d",strtotime($contenido->fecha_visible));
                        $nombre = utf8_encode(strftime("%A",strtotime($contenido->fecha_visible)));
                        ?>

                        <div class="caja_eventos_secc">
                            <div class="caja_eventos_secc_fecha">
                                <?php echo $mes;?>
                                <p>
                                    <?php echo $dia;?>
                                </p>
                                <?php echo $nombre;?>
                            </div>
                            <?php echo $contenido->titulo;?>
                            <div class="caja_eventos_secc_desc">
                                <p>
                                    <?php echo $contenido->contenido;?>
                                </p>
                            </div>

                        </div>
                        <?php
                    }
                    ?>

                </div>
                <!-- Termina Eventos -->

            </div>

            <div class="cont_eventos_secc">
                <style>
                    .map {
                        margin: 10px;
                        position: relative;
                        /*border: 1px solid #FF0000;*/
                    }

                    .container {
                        max-width: 800px;
                        height: 550px;
                        margin: auto;
                        overflow: hidden;
                        /*border: 1px solid #FF0000;*/
                    }
                </style>

                <div class="container">
                    <div class="maparea2">
                        <div class="map">
                        </div>
                    </div>
                </div>

                <!--<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
                <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.0/raphael-min.js'>
                </script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'>
                </script>
                <!--script src='https://rawgit.com/neveldo/jQuery-Mapael/2.0.0/js/jquery.mapael.js'>
                </script-->


                <!--<img src="images/mapa.png">-->
            </div>

        </div>
        <!-- Termina Eventos -->



        <div class="footer">

            <div id="arrow" class="arrow_footer">
                <!--<img src="images/iconos/ico_logo.png">
                <link rel="stylesheet" href="css/style_arrow.css">
                <p class="scroll-down">
                <a id="urlnext" href="#conoceme" class="animate"></a>
                </p>-->


                <link rel="stylesheet" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/style_arrow.css">
                <link rel="stylesheet" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/style_arrow_2.css">

                <a title="Ir a siguiente página" rel="NOFOLLOW"  id="urlnext" href="#conoceme">

                    <div id="ico_cursor_m">
                        <div class="button">
                            <div class="scroll">
                            </div>
                            <div class="arrow">
                                <img alt="Botón para continuar a la siguiente página, solo de clic o avance con el scroll" title="Botón para continuar a la siguiente página, solo de clic o avance con el scroll" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/caret_down.png" width="23" height="13" alt="" />
                            </div>
                        </div>
                    </div>

                    <div id="ico_cursor_desk">
                        <span class="scroll-btn">
                            <span class="mouse">
                                <span>
                                </span>
                            </span>
                            <div class="txtclic">
                                <!--clic-->
                            </div>
                        </span>
                    </div>

                </a>

            </div>

            <!--div class="redes">
            <a title="Descarga el aviso de privacidad" rel="NOFOLLOW" href="contenido/AP-visitantes-Internet-RSoc-VD-29ago17.pdf" target="_blank" style="color: #FFF; text-decoration: none;">
            Aviso de privacidad
            </a>
            </div-->

        </div>




        <script>
            window.jQuery || document.write('<script src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/vendor/jquery-1.9.1.min.js"><\/script>')
        </script>
        <script src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/main.js">
        </script>


    </body>
</html>