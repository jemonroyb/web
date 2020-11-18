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
                if ($opcion == 2)
                {
                    ?>
                    <?php echo $contenido->contenido;?>
                    <?php
                }

                ?>



                <?php
                if ($opcion == 4)
                {
                    ?>

                    <div class="banner_secc_int" style="height: 175px; background: url(<?php echo base_url()?>uploads/<?php echo $contenido->image_head;?>); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                        <div class="tit_banner_secc_int">
                            <h2>
                                <?php echo $contenido->titulo;?>
                            </h2>
                        </div>
                    </div>
                    <?php echo $contenido->contenido;?>
                    <?php

                }

                ?>
                <?php
                if ($opcion == 5)
                {
                    ?>

                    <div class="banner_secc_int" style="background: url(<?php echo base_url()?>uploads/<?php echo $contenido->image_head;?>); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                        <div class="tit_banner_secc_int">
                            <h2>
                                <?php echo $contenido->titulo;?>
                            </h2>
                        </div>
                    </div>
                    <?php echo $contenido->contenido;?>
                    <?php

                }

                ?>




            </div>

            <?php $this->load->view('foot');?>

        </div>


    </body>
</html>