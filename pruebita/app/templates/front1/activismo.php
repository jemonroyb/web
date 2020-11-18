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


                <div class="banner_secc_int" style="height: auto;">

                    <div class="cont_activismo">

                        <div class="activismo">

                            <?php
                            if (isset($contenido))
                            {
                                foreach ($contenido as $item) {
                                    ?>
                                    <?php

                                    $img_head = $item->image_head;
                                    $contenido= $item->contenido;
                                    $titulo   = $item->titulo;

                                    ?>
                                    <?php
                                }
                            }
                            ?>


                            <h2 style="line-height: 35px;">
                                <?php echo $titulo;?>
                            </h2>

                            <div class="separador_conoceme">
                            </div>

                            <div style="float: left;">

                                <?php echo $contenido;?>
                            </div>

                        </div>
                        
                        <!--

                        <div id="img_footer_activismo_1" class="footer_img_activismo" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img')?>/banners/activismo1-int.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                        </div>

                        <div id="img_footer_activismo_2" class="footer_img_activismo" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img')?>/banners/activismo1-resp-int.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                        </div>-->

                    </div>

                    <div class="cont_activismo" style="background-color:blue; background-position: top center; background-repeat: no-repeat; background-size: cover;">

                        <div class="activismo" style="text-align: center;">
                            <iframe class="iframe_activismo" src="<?php echo base_url('index.php?class=Unete')?>" frameborder="0" scrolling="no">
                            </iframe>
                        </div>

                        <!--div class="footer_img_activismo" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img')?>/banners/activismo2-int.jpg); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                        </div-->

                    </div>

                   

                </div>


            </div>

            <?php $this->load->view('foot');?>

        </div>


    </body>
</html>