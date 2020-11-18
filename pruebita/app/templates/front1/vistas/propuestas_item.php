<!DOCTYPE html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
    
        <?php $this->load->view('meta',$meta);?>


        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/css/estilos.css')?>" media="all" style="display: none !important;">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/css/m.css')?>" media="all" style="display: none !important;">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/js/script.js')?>">
        </script>

    </head>
    <body>

        <div  class="cont_landing">

            <div class="landing">

                <div class="banner_landing">
                    <img alt="" title="" width="750px" height="220px" src="<?php if(isset($img)){echo $img;}?>">
                    

                    <div id="open_share" class="share_landing">
                        <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/share.png')?>">

                        <div id="share_landing" class="caja_share_landing">
                            <div class="triangulo_share_landing">
                            </div>
                            <div class="cont_redes_share_landing">

                                <div class="redes_share_landing">
                                    <a data-site="" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo current_url(); ?>' , 'ventana1' , 'width=600,height=700,scrollbars=NO, top=50%, left=50%')">
                                        <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/facebook.png')?>">
                                    </a>
                                </div>

                                <div class="redes_share_landing">
                                    <a onClick="window.open('https://twitter.com/intent/tweet?ref_src=twsrc%5Etfw&text=<?php if(isset($titulo)){echo $titulo;}?>&tw_p=tweetbutton&url=<?php echo current_url(); ?>' , 'ventana1' , 'width=600,height=700,scrollbars=NO, top=50%, left=50%')">
                                        <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/twitter.png')?>">
                                    </a>
                                </div>

                                <div class="redes_share_landing">
                                    <a href="https://api.whatsapp.com/send?text=<?php if(isset($titulo)){echo $titulo;}?>:  <?php echo current_url(); ?>" target="_blank">
                                        <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/whatsapp.png')?>">
                                    </a>
                                </div>

                                <div class="redes_share_landing">
                                    <a href="mailto:?subject=<?php if(isset($titulo)){echo $titulo;}?>&body=<br><br><?php echo current_url(); ?>">
                                        <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/email.png')?>">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="cont_caja_landing" style="background: url(<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/fondo_propuesta.jpg')?>);background-position: top center; background-repeat: no-repeat; background-size: cover;">

                    <div class="caja_landing">

                        <div class="tit_landing">
                            <?php echo $articulo->titulo;?>
                        </div>
                        
                        <?php echo $articulo->contenido;?>


                    </div>

                    <div class="caja_landing caja_landing_width">
                        <iframe title="Formulario de contacto" class="iframe_caja_landing_width" src="<?php echo base_url('index.php?class=Unete')?>" allowtransparency="true" type="text/html" frameborder="0">
                        </iframe>
                    </div>

                </div>

                <div class="footer_landing">

                    <img alt="Javier ismodes" title="Javier ismodes" style="width:120px;" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/logo_ismodes.png')?>">

                    <div class="redes" style="margin-top: 12px; margin-left: 15px; pointer-events: none;">
                        Javier Ismodes
                    </div>

                    <div class="cont_redes_landing">

                        <a title="Facebook de ......, se abrir� en otra p�gina" rel="NOFOLLOW" href="https://www.facebook.com//" target="_blank">
                            <div class="redes_landing">
                                <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/facebook.png')?>">
                            </div>
                        </a>

                        <a title="Twitter de ........, se abrir� en otra p�gina" rel="NOFOLLOW" href="https://twitter.com/" target="_blank">
                            <div class="redes_landing">
                                <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/twitter.png')?>">
                            </div>
                        </a>

                        <a title="Instagram de ......, se abrir� en otra p�gina" rel="NOFOLLOW" href="https://www.instagram.com//" target="_blank">
                            <div class="redes_landing">
                                <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/instagram.png')?>">
                            </div>
                        </a>

                        <a title="Youtube de ........., se abrir� en otra p�gina" rel="NOFOLLOW" href="https://www.youtube.com/" target="_blank">
                            <div class="redes_landing">
                            <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img/iconos/youtube.png')?>">
                            </div>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </body>
</html>
