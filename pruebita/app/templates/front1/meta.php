		<meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>
            <?php if(isset($titulo)){echo $titulo;}?>
        </title>
        
        <meta name="robots" content="index,follow"/>
        <meta name="googlebot" content="index, follow"/>
        
        <meta http-equiv="Expires" content="0"/>
        <meta http-equiv="Last-Modified" content="0"/>
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate"/>
        <meta http-equiv="Pragma" content="no-cache"/>

        <meta name="Title" content="<?php if(isset($titulo)){echo $titulo;}?>" />
        <meta name="Language" content="Spanish" />
        <meta name="Description" content="<?php if(isset($description)){echo $description;}?>" />
        <meta name="author" content="Ricardo Anaya | Vamos de Frente al Futuro" />
        <meta name="copyright" content="Ricardo Anaya | Vamos de Frente al Futuro" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        
        <!--fb-->
		<meta property="og:title" content="<?php if(isset($titulo)){echo $titulo;}?>" />
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="<?php echo current_url(); ?>" />
		<meta property="og:image" content="<?php if(isset($img)){echo $img;}?>" />
		<meta property="og:site_name" content="<?php if(isset($site_name)){echo $site_name;}?>" />
        <meta property="og:image:width" content="720"/>
        <meta property="og:image:height" content="405"/>
        <meta property="og:image:alt" content="Ricardo Anaya México en Paz" />

		<!--tw-->
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:site" content="@academiagauss"/>
        <meta name="twitter:title" content="<?php if(isset($titulo)){echo $titulo;}?>"/>
        <meta name="twitter:description" content="<?php if(isset($description)){echo $description;}?>"/>
        <meta name="twitter:image" content="<?php if(isset($img)){echo $img;}?>"/>
        
        <link rel="icon" type="image/png" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img')?>/apple-icon.png" />
        <link rel="apple-touch-icon" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img')?>/apple-icon.png" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT.'/img')?>/favicon.ico" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/rac5.css" media="all" style="display: none !important;"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/racm5.css" media="all" style="display: none !important;" />
        <link rel="stylesheet" href="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/css/animations.css" type="text/css" />

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url('app/templates/'.PLANTILLA_FRONT)?>/js/script-1.js">
        </script>


        <!-- Global site tag (gtag.js) - Google Analytics -->

        <!-- Facebook Pixel Code -->
        <!-- End Facebook Pixel Code -->

        <!-- Facebook Pixel Code -->
        <!-- End Facebook Pixel Code -->

        <!-- Google Tag Manager -->
       
        <!-- End Google Tag Manager -->