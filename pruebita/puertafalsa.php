<?php

require_once 'init.php';
$theme = $ini['general']['theme'];
$class = isset($_REQUEST['class']) ? $_REQUEST['class'] : '';
$public = in_array($class, $ini['permission']['public_classes']);
new TSession;
$site_url = '';

TTransaction::open('database');
$libro = new Libro;
$libro->descripcion = $libro->asiento(803);
$libro->comprobante = '';
$libro->cuenta = 803;
$libro->asiento = $libro->asiento(803);
$libro->debe = 40.00;
$libro->set_servicio(new Servicio(111));
$libro->store();
//TTransaction::close();
