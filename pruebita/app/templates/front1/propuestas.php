<!DOCTYPE html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php $this->load->view('meta');?>

    </head>
    <body>

        <!-- Google Tag Manager (noscript) -->
        <!-- End Google Tag Manager (noscript) -->

        <div  class="contenedor">


            <?php $this->load->view('menu');?>

            <div class="cont_secc_int">

                <div class="banner_secc_int" style="height: 175px; background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/banners/prensa-int.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">

                    <div class="tit_banner_secc_int">
                        <h2>
                            PROPUESTAS
                        </h2>
                    </div>

                    <style>
                        .btn_libro {
                            width: auto;
                            height: auto;
                            position: relative;
                            top: 145px;
                        }

                        @media screen and (max-width: 1190px){

                            .btn_libro img {
                                width: 280px;
                                height: auto;
                            }

                        }
                    </style>
                    <div class="btn_libro">
                        <a href="https://declara.jne.gob.pe/ASSETS/PLANGOBIERNO/FILEPLANGOBIERNO/15049.pdf" target="_blank">
                            <img alt="Descargar libro de propuestas" title="Descargar libro de propuestas" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/btn_rac_libro.png">
                        </a>
                    </div>

                </div>


                <div class="cont_caja_info animatedParent" data-sequence="500">

                    <?php
                    if (isset($entradas))
                    {
                        foreach ($entradas as $item) {

                            ?>

                            <a title="<?php echo $item->titulo;?>" rel="Index, Follow" href="<?php echo site_url(PROPUESTAS.'/').strtolower($item->slug);?>">
                                <div class="caja_info animated fadeIn" data-id="1">

                                    <div class="caja_info_cont caja_info_cont_img" style="background: url(<?php echo base_url()?>uploads/<?php echo $item->icon;?>); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                                    </div>

                                    <div class="caja_info_cont" style="background: #ebebeb;">
                                        <div class="tit_caja_info_cont">
                                            <?php echo strtoupper($item->titulo);?>
                                        </div>
                                        <div class="caja_info_fecha">

                                            <?php echo strtoupper($item->fecha_creacion);?>

                                        </div>
                                    </div>
                                    <!--<button type="button" class="button_1" style="position: absolute; bottom: 30px; right: 30px;">VER MÁS</button>-->
                                </div>
                            </a>


                            <?php
                        }
                    }
                    ?>








                    <!--
                    <div class="caja_info_paginacion">

                    <div class="caja_info_paginacion_flecha flecha_left" style="pointer-events: none;">
                    <img alt="Página anterior" title="Página anterior" rel="NOFOLLOW" src="../images/controls_paginacion.png"/>
                    </div>
                    <div class="caja_info_paginacion_flecha flecha_right" onclick=location.href="../sala-de-prensa/page/2">
                    <img alt="Siguiente página" title="Siguiente página" rel="NOFOLLOW" src="../images/controls_paginacion.png"/>
                    </div>
                    </div>-->

                </div>

                <!--div class="cont_caja_info" style="font-family: 'Arial'; padding: 0px 10px 40px 10px; box-sizing: border-box; border: 0px solid #FF0000;">

                    <div class="cont_caja_info" style="font-family: 'Arial'; padding: 0px 0px 70px 0px;">
                        <div class="tit_banner_secc_int">
                            <h2 style="text-align: center; font-size: 22px; color: #333; margin: 0;">
                                Recursos para Prensa
                            </h2>

                            <span style="text-align: center; font-size: 17px; color: #333; margin: 0; margin-left: -13px">
                                <a title="Flickr de Ricardo Anaya, se abrirá en otra página" rel="NOFOLLOW" href="https://www.flickr.com/photos/ricardoanayacortes" target="_blank" style="color: #333;">
                                    Fotografía
                                </a>
                            </span>&nbsp;
                            <span style="text-align: center; font-size: 17px; color: #333; margin: 0;">
                                |
                            </span>&nbsp;
                            <span style="text-align: center; font-size: 17px; color: #333; margin: 0;">
                                <a title="Google Drive de Ricardo Anaya, se abrirá en otra página" rel="NOFOLLOW" href="https://drive.google.com/drive/folders/1bY3RWwh5CGLu_pCYWi4kwHv6D_ZUJDWI" target="_blank" style="color: #333;">
                                    Video
                                </a>
                            </span>

                        </div>
                    </div>

                    <link href="css/curator_int.css" rel="stylesheet"/>
                    <link href="css/bootstrap.min.css" rel="stylesheet" />
                   
                    <div id="curator-feed">
                        <a href="https://curator.io" target="_blank" class="crt-logo crt-tag">
                        </a>
                    </div>
                   
                    <script type="text/javascript">
                        /* curator-feed */
                        (function(){
                                var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
                                i.src = "https://cdn.curator.io/published/da57b88b-2e49-49fe-9bf8-5392f706.js";
                                e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
                            })();
                    </script>

                </div-->

            </div>

            <?php $this->load->view('foot');?>

        </div>


    </body>
</html>