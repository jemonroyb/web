




            <div class="footer_secc_int">

                <img alt="Logo Ricardo Anaya Presidente" title="Logo Ricardo Anaya Presidente" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/logo_ismodes.png">

                <div class="redes" style="pointer-events: none;">
                    Javier Ismodes, 2018
                </div>

                <div class="cont_redes_secc_int">

                    <a title="Facebook de Ricardo Anaya, se abrirá en otra página" rel="NOFOLLOW" href="https://www.facebook.com/RicardoAnayaC/" target="_blank">
                        <div class="redes_secc_int">
                            <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/facebook.png">
                        </div>
                    </a>

                    <a title="Twitter de Ricardo Anaya, se abrirá en otra página" rel="NOFOLLOW" href="https://twitter.com/ricardoanayac" target="_blank">
                        <div class="redes_secc_int">
                            <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/twitter.png">
                        </div>
                    </a>

                    <a title="Instagram de Ricardo Anaya, se abrirá en otra página" rel="NOFOLLOW" href="https://www.instagram.com/ricardoanayacortes/" href="https://www.instagram.com/ricardoanayacortes/" target="_blank">
                        <div class="redes_secc_int">
                            <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/instagram.png">
                        </div>
                    </a>

                    <a title="Youtube de Ricardo Anaya, se abrirá en otra página" rel="NOFOLLOW" href="https://www.youtube.com/channel/UCaiZb12iRYQketTpEcM--nA" target="_blank">
                        <div class="redes_secc_int">
                            <img src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/img/iconos/youtube.png">
                        </div>
                    </a>

                </div>

            </div>
        

        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
        </script>
        <script src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/main.js">
        </script>

        <script type="text/javascript">
            $(function(){
                    $maparea2 = $(".maparea2");
                    $maparea2.mapael({

                            map : {
                                name : "EstadosMexico"
                                , zoom: {
                                    enabled: false,
                                    maxLevel : 10
                                }
                                , defaultPlot : {
                                    attrs : {
                                        opacity : 0.6
                                    }
                                }
                                , defaultArea : {
                                    attrs : {
                                        fill : "#57518a"
                                        , stroke: "#1b1647"
                                    }
                                    , text : {
                                        attrs : {
                                            //fill : "#505444"
                                            fill : ""
                                        }
                                        , attrsHover : {
                                            //fill : "#000"
                                            fill : ""
                                        }
                                    }
                                }
                            },

                            legend : {
                                area : {
                                    display : false,
                                    title :"",
                                    slices : [
                                        {
                                            min :1000000,
                                            attrs : {
                                                fill : "#a4a1d1"
                                            },
                                            label :""
                                        }
                                    ]
                                }
                            },

                            areas: {


                            }

                        });

                });
        </script>
		<script src='<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/css3-animate-it.js'>
		</script>