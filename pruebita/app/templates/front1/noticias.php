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


                <div class="banner_secc_int" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/banners/prensa-int.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">

                    <div class="tit_banner_secc_int">
                        <h2>
                            Noticias
                        </h2>
                    </div>

                </div>

                <div class="cont_caja_info animatedParent" data-sequence="500">

                    <?php
                    if (isset($entradas)) {
                        foreach ($entradas as $item)
                        {

                            ?>

                            <a title="<?php echo $item->titulo;?>" rel="Index, Follow" href="<?php echo site_url(NOTICIAS.'/').strtolower($item->slug);?>">
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

             

            </div>

            <?php $this->load->view('foot');?>

        </div>


    </body>
</html>