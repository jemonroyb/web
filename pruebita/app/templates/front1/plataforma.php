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
                if (isset($contenido))
                {
                    foreach ($contenido as $item) {
                        ?>
                        <?php 
                        
                        $img_head = $item->image_head;
                        $contenido = $item->contenido;
                        $titulo = $item->titulo;
                        
                        ?>
                        <?php
                    }
                }
                ?>


                <div class="banner_secc_int" style="background: url(<?php echo base_url()?>uploads/<?php echo $img_head;?>); background-position: top center; background-repeat: no-repeat; background-size: cover;">

                    <div class="tit_banner_secc_int">
                        <h2>

                                    <?php echo $titulo;?>

                        </h2>
                    </div>

                </div>


                <div class="cont_descripcion_propuestas_info">

                            <?php echo $contenido;?>


                    <style>
                        .btn_libro {
                            width: auto;
                            height: auto;
                            position: relative;
                            top: 20px;
                        }
                        @media screen and (max-width: 1190px){
                            .btn_libro {
                                top: -15px;
                            }
                            .btn_libro img {
                                width: 280px;
                                height: auto;
                            }
                        }
                    </style>
                    <div class="btn_libro">
                        <a href="https://declara.jne.gob.pe/ASSETS/PLANGOBIERNO/FILEPLANGOBIERNO/15049.pdf" target="_blank">
                            <img alt="PLAN DE GOBIERNO REGIONAL " title="PLAN DE GOBIERNO REGIONAL " src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/btn_rac_libro.png">
                        </a>
                    </div>

                </div>

                <div class="cont_caja_info animatedParent" data-sequence="500">

                    <?php
                    if (isset($entradas))
                    {
                        foreach ($entradas as $item) {

                            ?>

                            <a title="<?php echo $item->titulo;?>" rel="Index, Follow" href="<?php echo site_url(PLATAFORMA.'/').strtolower($item->slug);?>">
                                <div class="caja_info animated fadeIn go" data-id="1">

                                    <div class="caja_info_cont caja_info_cont_img_propuestas" style="background: url(<?php echo base_url()?>uploads/<?php echo $item->icon;?>); background-position: center center; background-repeat: no-repeat; background-size: 100%;;">
                                    </div>

                                </div>
                            </a>


                            <?php
                        }
                    }
                    ?>

                </div>


            </div>

           

        </div>


    </body>
</html>