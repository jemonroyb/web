<!DOCTYPE html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php $this->load->view('meta',$meta);?>
        
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <!-- End Google Tag Manager (noscript) -->

        <div  class="contenedor">
            <?php $this->load->view('menu');?>
            <div class="cont_secc_int">
                <?php
                if (isset($articulo))
                {
                    ?>

                    <div class="cont_detalle_secc_int" style="background: url(<?php echo base_url()?>uploads/<?php echo $articulo->image_head;?>); background-position: top center; background-repeat: no-repeat; background-size: cover;">

                        <div class="tit_detalle_secc_int">
                            <?php echo $articulo->titulo;?>
                        </div>

                    </div>

                    <div class="detalle_secc_int">

                        <div style="float: left; width: 100%; margin-bottom: 15px;">

                            <div class="cont_tit_detalle_secc_int_resp">
                                Sala de prensa
                            </div>
                            <p>
                                <br><br>
                            </p>
                            <?php echo $articulo->contenido;?>

                            <a title="Regresar a Sala de prensa" rel="NOFOLLOW" href="<?php echo site_url(NOTICIAS);?>">
                                <button id="btn_conoceme" type="button" class="button_1" style="margin-top: 0; letter-spacing: 1px; z-index: 1;">
                                    Regresar
                                </button>
                            </a>
                        </div>

                    </div>

                    <?php
                }

                ?>
            </div>

            <?php $this->load->view('foot');?>

        </div>
    </body>
</html>