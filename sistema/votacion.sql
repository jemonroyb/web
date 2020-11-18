-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `listas`;
CREATE TABLE `listas` (
  `idlista` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL COMMENT 'id responsable sede',
  `grupo_lista` char(255) DEFAULT NULL,
  `des_lista` char(255) DEFAULT NULL,
  `visible` char(2) DEFAULT NULL,
  `id_lista_sup` int(11) DEFAULT NULL,
  `nu_orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`idlista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `listas` (`idlista`, `iduser`, `grupo_lista`, `des_lista`, `visible`, `id_lista_sup`, `nu_orden`) VALUES
(1,	0,	'DEPARTAMENTO',	'AREQUIPA',	'SI',	NULL,	NULL),
(2,	0,	'PROVINCIA',	'AREQUIPA',	NULL,	1,	NULL),
(3,	0,	'PROVINCIA',	'ISLAY',	NULL,	1,	NULL),
(6,	0,	'PROVINCIA',	'Camana',	NULL,	1,	NULL),
(7,	0,	'PROVINCIA',	'Caravelí',	NULL,	1,	NULL),
(8,	0,	'PROVINCIA',	'Castilla',	NULL,	1,	NULL),
(9,	0,	'PROVINCIA',	'Caylloma',	NULL,	1,	NULL),
(10,	0,	'PROVINCIA',	'Condesuyos',	NULL,	1,	NULL),
(11,	0,	'PROVINCIA',	'La Unión',	NULL,	1,	NULL),
(12,	4,	'DISTRITO',	'Camaná',	NULL,	6,	NULL),
(13,	0,	'DISTRITO',	'José María Quimper',	NULL,	6,	NULL),
(14,	0,	'DISTRITO',	'Mariano Nicolás Valcarcel',	NULL,	6,	NULL),
(15,	0,	'DISTRITO',	'Mariscal Cáceres',	NULL,	6,	NULL),
(16,	0,	'DISTRITO',	'Nicolás de Piérola',	NULL,	6,	NULL),
(17,	0,	'DISTRITO',	'Ocoña',	NULL,	6,	NULL),
(18,	0,	'DISTRITO',	'Quilca',	NULL,	6,	NULL),
(19,	0,	'DISTRITO',	'Samuel Pastor',	NULL,	6,	NULL),
(20,	0,	'DISTRITO',	'Caravelí',	NULL,	7,	NULL),
(21,	0,	'DISTRITO',	'Acarí',	NULL,	7,	NULL),
(22,	0,	'DISTRITO',	'Atico',	NULL,	7,	NULL),
(23,	0,	'DISTRITO',	'Atiquipa',	NULL,	7,	NULL),
(24,	0,	'DISTRITO',	'Bella Unión',	NULL,	7,	NULL),
(25,	0,	'DISTRITO',	'Cahuacho',	NULL,	7,	NULL),
(26,	0,	'DISTRITO',	'Chala',	NULL,	7,	NULL),
(27,	0,	'DISTRITO',	'Cháparra',	NULL,	7,	NULL),
(28,	0,	'DISTRITO',	'Huanuhuanu',	NULL,	7,	NULL),
(29,	0,	'DISTRITO',	'Jaquí',	NULL,	7,	NULL),
(30,	0,	'DISTRITO',	'Lomas',	NULL,	7,	NULL),
(31,	0,	'DISTRITO',	'Quicacha',	NULL,	7,	NULL),
(32,	0,	'DISTRITO',	'Yauca',	NULL,	7,	NULL),
(33,	0,	'DISTRITO',	'Aplao',	NULL,	8,	NULL),
(34,	0,	'DISTRITO',	'Andahua',	NULL,	8,	NULL),
(35,	0,	'DISTRITO',	'Ayo',	NULL,	8,	NULL),
(36,	0,	'DISTRITO',	'Chachas',	NULL,	8,	NULL),
(37,	0,	'DISTRITO',	'Chilcaymarca',	NULL,	8,	NULL),
(38,	0,	'DISTRITO',	'Choco',	NULL,	8,	NULL),
(39,	0,	'DISTRITO',	'Huancarqui',	NULL,	8,	NULL),
(40,	0,	'DISTRITO',	'Machaguay',	NULL,	8,	NULL),
(41,	0,	'DISTRITO',	'Orcopampa',	NULL,	8,	NULL),
(42,	0,	'DISTRITO',	'Pampacolca',	NULL,	8,	NULL),
(43,	0,	'DISTRITO',	'Tipán',	NULL,	8,	NULL),
(44,	0,	'DISTRITO',	'Uñón',	NULL,	8,	NULL),
(45,	0,	'DISTRITO',	'Uraca',	NULL,	8,	NULL),
(46,	0,	'DISTRITO',	'Viraco',	NULL,	8,	NULL),
(47,	0,	'DISTRITO',	'Achoma',	NULL,	9,	NULL),
(48,	0,	'DISTRITO',	'Cabanaconde',	NULL,	9,	NULL),
(49,	0,	'DISTRITO',	'Callalli',	NULL,	9,	NULL),
(50,	0,	'DISTRITO',	'Caylloma',	NULL,	9,	NULL),
(51,	0,	'DISTRITO',	'Chivay',	NULL,	9,	NULL),
(52,	0,	'DISTRITO',	'Coporaque',	NULL,	9,	NULL),
(53,	0,	'DISTRITO',	'Huambo',	NULL,	9,	NULL),
(54,	0,	'DISTRITO',	'Huanca',	NULL,	9,	NULL),
(55,	0,	'DISTRITO',	'Ichupampa',	NULL,	9,	NULL),
(56,	0,	'DISTRITO',	'Lari',	NULL,	9,	NULL),
(57,	0,	'DISTRITO',	'Lluta',	NULL,	9,	NULL),
(58,	0,	'DISTRITO',	'Maca',	NULL,	9,	NULL),
(59,	0,	'DISTRITO',	'Madrigal',	NULL,	9,	NULL),
(60,	0,	'DISTRITO',	'Majes',	NULL,	9,	NULL),
(61,	0,	'DISTRITO',	'San Antonio de Chuca',	NULL,	9,	NULL),
(62,	0,	'DISTRITO',	'Sibayo',	NULL,	9,	NULL),
(63,	0,	'DISTRITO',	'Tapay',	NULL,	9,	NULL),
(64,	0,	'DISTRITO',	'Tisco',	NULL,	9,	NULL),
(65,	0,	'DISTRITO',	'Tuti',	NULL,	9,	NULL),
(66,	0,	'DISTRITO',	'Yanque',	NULL,	9,	NULL),
(67,	0,	'DISTRITO',	'Chuquibamba',	NULL,	10,	NULL),
(68,	0,	'DISTRITO',	'Andaray',	NULL,	10,	NULL),
(69,	0,	'DISTRITO',	'Cayarani',	NULL,	10,	NULL),
(70,	0,	'DISTRITO',	'Cayarani',	NULL,	10,	NULL),
(71,	0,	'DISTRITO',	'Chichas',	NULL,	10,	NULL),
(72,	0,	'DISTRITO',	'Iray',	NULL,	10,	NULL),
(73,	0,	'DISTRITO',	'Río Grande',	NULL,	10,	NULL),
(74,	0,	'DISTRITO',	'Salamanca',	NULL,	10,	NULL),
(75,	0,	'DISTRITO',	'Yanaquihua',	NULL,	10,	NULL),
(76,	0,	'DISTRITO',	'Mollendo',	NULL,	3,	NULL),
(77,	0,	'DISTRITO',	'Cocachacra',	NULL,	3,	NULL),
(78,	0,	'DISTRITO',	'Deán Valdivia',	NULL,	3,	NULL),
(79,	0,	'DISTRITO',	'Islay',	NULL,	3,	NULL),
(80,	0,	'DISTRITO',	'Mejía',	NULL,	3,	NULL),
(81,	0,	'DISTRITO',	'Punta de Bombón',	NULL,	3,	NULL),
(82,	0,	'DISTRITO',	'Alca',	NULL,	11,	NULL),
(83,	0,	'DISTRITO',	'Charcana',	NULL,	11,	NULL),
(84,	0,	'DISTRITO',	'Cotahuasi',	NULL,	11,	NULL),
(85,	0,	'DISTRITO',	'Huaynacotas',	NULL,	11,	NULL),
(86,	0,	'DISTRITO',	'Pampamarca',	NULL,	11,	NULL),
(87,	0,	'DISTRITO',	'Puyca',	NULL,	11,	NULL),
(88,	0,	'DISTRITO',	'Quechualla',	NULL,	11,	NULL),
(89,	0,	'DISTRITO',	'Sayla',	NULL,	11,	NULL),
(90,	0,	'DISTRITO',	'Tauría',	NULL,	11,	NULL),
(91,	0,	'DISTRITO',	'Tomepampa',	NULL,	11,	NULL),
(92,	0,	'DISTRITO',	'Toro',	NULL,	11,	NULL),
(93,	1,	'DISTRITO',	'Alto Selva Alegre',	NULL,	2,	NULL),
(94,	0,	'DISTRITO',	'Arequipa',	NULL,	2,	NULL),
(95,	0,	'DISTRITO',	'Cayma',	NULL,	2,	NULL),
(96,	0,	'DISTRITO',	'Cerro Colorado',	NULL,	2,	NULL),
(97,	0,	'DISTRITO',	'Characato',	NULL,	2,	NULL),
(98,	0,	'DISTRITO',	'Chiguata',	NULL,	2,	NULL),
(99,	0,	'DISTRITO',	'Jacobo Hunter',	NULL,	2,	NULL),
(101,	0,	'DISTRITO',	'José Luis Bustamante y Rivero',	NULL,	2,	NULL),
(102,	0,	'DISTRITO',	'La Joya',	NULL,	2,	NULL),
(103,	4,	'DISTRITO',	'Mariano Melgar',	NULL,	2,	NULL),
(104,	0,	'DISTRITO',	'Miraflores',	NULL,	2,	NULL),
(105,	1,	'DISTRITO',	'Mollebaya',	NULL,	2,	NULL),
(106,	0,	'DISTRITO',	'Paucarpata',	NULL,	2,	NULL),
(107,	0,	'DISTRITO',	'Pocsi',	NULL,	2,	NULL),
(108,	0,	'DISTRITO',	'Polobaya',	NULL,	2,	NULL),
(109,	0,	'DISTRITO',	'Quequeña',	NULL,	2,	NULL),
(110,	0,	'DISTRITO',	'Sabandía',	NULL,	2,	NULL),
(111,	0,	'DISTRITO',	'Sachaca',	NULL,	2,	NULL),
(112,	0,	'DISTRITO',	'San Juan de Siguas',	NULL,	2,	NULL),
(113,	0,	'DISTRITO',	'San Juan de Tarucani',	NULL,	2,	NULL),
(114,	0,	'DISTRITO',	'Santa Isabel de Siguas',	NULL,	2,	NULL),
(115,	0,	'DISTRITO',	'Santa Rita de Siguas',	NULL,	2,	NULL),
(116,	0,	'DISTRITO',	'Socabaya',	NULL,	2,	NULL),
(117,	0,	'DISTRITO',	'Tiabaya',	NULL,	2,	NULL),
(118,	0,	'DISTRITO',	'Uchumayo',	NULL,	2,	NULL),
(119,	0,	'DISTRITO',	'Vitor',	NULL,	2,	NULL),
(120,	0,	'DISTRITO',	'Yanahuara',	NULL,	2,	NULL),
(121,	0,	'DISTRITO',	'Yarabamba',	NULL,	2,	NULL),
(122,	0,	'DISTRITO',	'Yura',	NULL,	2,	NULL);

DROP TABLE IF EXISTS `locales`;
CREATE TABLE `locales` (
  `idlocal` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_distrito` int(11) NOT NULL,
  `id_local` char(10) NOT NULL,
  `iduser` char(255) NOT NULL COMMENT 'id de coordinador de local',
  `nombre` char(255) NOT NULL,
  `direccion` char(255) NOT NULL,
  `mesas` int(11) NOT NULL,
  `electores` int(11) NOT NULL,
  PRIMARY KEY (`idlocal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `locales` (`idlocal`, `id_departamento`, `id_provincia`, `id_distrito`, `id_local`, `iduser`, `nombre`, `direccion`, `mesas`, `electores`) VALUES
(4,	1,	2,	93,	'0685',	'4',	'IE 40003 SANTÍSIMA VIRGEN DEL CARMEN',	'CALLE OSCAR NEVES 609',	24,	7156),
(5,	1,	2,	93,	'0686',	'1',	'IE 40024 MANUEL GONZALES PRADA',	'AV. OBRERA 100',	22,	6520),
(6,	1,	2,	93,	'0687',	'4',	'IE 40028 GUILLERMO MERCADO BARROSO',	'CALLE HUARAZ CUADRA 1',	14,	4120),
(7,	1,	2,	93,	'0688',	'1',	'IE 40034 MARIO VARGAS LLOSA',	'CALLE OSCAR NEVES CUADRA 4',	26,	7737),
(8,	1,	2,	93,	'0689',	'1',	'IE 41035 NICANOR RIVERA CACERES',	'AV. LOS INCAS SN',	14,	4160),
(9,	1,	2,	93,	'0690',	'2',	'IE SAN MARTIN DE PORRES - CIRCA',	'AV. ATLANTIDA 401',	36,	10704),
(10,	1,	2,	93,	'0691',	'1',	'IE SANTA ROSA DE LIMA - CIRCA NIVEL SECUNDARIO',	'CALLE PACIFICO CRUCE CON CALLE AMAZONAS',	16,	4740),
(11,	1,	2,	93,	'0692',	'4',	'IE SANTA ROSA DE LIMA Y LAS AMÉRICAS - CIRCA NIVEL PRIMARIA',	'CALLE VILCANOTA 208',	8,	2294),
(12,	1,	2,	93,	'0693',	'4',	'IE 40029 LUDWING VAN BEETHOVEN',	'AV. FRANCISCO MOSTAJO 900',	50,	14819),
(13,	1,	2,	93,	'7486',	'1',	'IE SAN JOSE OBRERO - CIRCA',	'AV. MANCO CAPAC SN',	16,	4790),
(14,	1,	2,	94,	'0572',	'',	'I.E JUANA CERVANTES DE BOLOGNESI',	'MALECON VALLECITO SN',	50,	14686),
(15,	1,	2,	94,	'0573',	'',	'IE 41008 MANUEL MUÑOZ NAJAR',	'PJE. FERNANDEZ DAVILA 107',	30,	8813),
(16,	1,	2,	94,	'0574',	'',	'IE MICAELA BASTIDAS',	'CALLE AYACUCHO SN',	28,	8076),
(17,	1,	2,	94,	'0575',	'',	'IE SALESIANO DON BOSCO',	'CALLE SAN PEDRO 218',	22,	6391),
(18,	1,	2,	94,	'0576',	'',	'UNIVERSIDAD CATOLICA SANTA MARIA',	'PJE. SAN JUAN SN',	43,	12639),
(19,	1,	2,	94,	'0579',	'',	'UNIVERSIDAD NACIONAL SAN AGUSTIN',	'AV. VENEZUELA SN',	60,	17849),
(20,	1,	2,	94,	'7060',	'',	'IE INDEPENDENCIA AMERICANA',	'AV. INDEPENDENCIA 1457',	27,	7838),
(21,	1,	2,	95,	'0585',	'',	'IE 40045 LIVIA BERNAL DE BALTAZAR',	'AV. CAYMA 213',	6,	1765),
(22,	1,	2,	95,	'0586',	'',	'IE 40046 JOSE LORENZO CORNEJO ACOSTA',	'CALLE LIBERTAD SN',	42,	12436),
(23,	1,	2,	95,	'0587',	'',	'IE 40049 CORONEL FRANCISCO BOLOGNESI CERVANTES',	'AV. CHACHANI SN',	25,	7370),
(24,	1,	2,	95,	'0589',	'',	'IE LEON XIII - CIRCA',	'AV. CHACHANI SN',	38,	11202),
(25,	1,	2,	95,	'0590',	'',	'IE MAYTA CAPAC',	'AV. BOLOGNESI SN',	32,	9495),
(26,	1,	2,	95,	'0591',	'',	'INSTITUTO SUPERIOR PEDAGOGICO AREQUIPA',	'AV. RAMON CASTILLA 700',	50,	14855),
(27,	1,	2,	95,	'0592',	'',	'IST HONORIO DELGADO ESPINOZA',	'CALLE LOS ARCES 202',	33,	9754),
(28,	1,	2,	95,	'7062',	'',	'IE 40616 CASIMIRO CUADROS',	'AV. HEROES DEL CENEPA 350',	25,	7331),
(29,	1,	2,	96,	'0594',	'',	'IE 40044 SAN MARTIN DE PORRES',	'URB. CIUDAD MUNICIPAL MZ Q LT 1',	20,	5928),
(30,	1,	2,	96,	'0595',	'',	'IE 40054 JUAN DOMINGO ZAMACOLA Y JAUREGUI',	'CALLE JORGE CHAVEZ 401',	70,	20743),
(31,	1,	2,	96,	'0596',	'',	'IE 40056 HORACIO ZEBALLOS GAMEZ',	'AV. NICOLAS DE PIEROLA SN',	12,	3541),
(32,	1,	2,	96,	'0597',	'',	'IE 40061 ESTADO DE SUECIA',	'AV. CHACHANI MZ C LT 13',	8,	2341),
(33,	1,	2,	96,	'0598',	'',	'IE 40670 EL EDEN FE Y ALEGRIA 51',	'ASOCIACION DE VIVIENDA LA TIERRA PROMETIDA MZ I -J LOTE 1',	48,	14281),
(34,	1,	2,	96,	'0599',	'',	'IE 41025 200 MILLAS PERUANAS LA LIBERTAD',	'CALLE 27 DE NOVIEMBRE 307',	16,	4748),
(35,	1,	2,	96,	'0600',	'',	'IE 41026 MARIA MURILLO DE BERNAL',	'CALLE MARIANO MELGAR 401',	34,	10073),
(36,	1,	2,	96,	'0601',	'',	'IE GRAN PACHACUTEC',	'AV. MANCO CAPAC SN',	19,	5421),
(37,	1,	2,	96,	'0602',	'',	'IE 40058 IGNACIO ALVAREZ THOMAS',	'AV. ALFONSO UGARTE 100',	12,	3409),
(38,	1,	2,	96,	'0603',	'',	'IE DIVINO NIÑO ALTO LIBERTAD',	'CALLE SANTA ROSA SN',	16,	4746),
(39,	1,	2,	96,	'0604',	'',	'IE JUAN DE LA CRUZ CALIENES',	'AV. CALIENES 101',	38,	11321),
(40,	1,	2,	96,	'0605',	'',	'IE 40103 LIBERTADORES DE AMERICA',	'AV. IQUITOS SN',	30,	8808),
(41,	1,	2,	96,	'0606',	'',	'IE NUESTRA SEÑORA DE LOS DOLORES',	'CALLE MIGUEL GRAU 301',	8,	2338),
(42,	1,	2,	96,	'0607',	'',	'IE SANTO THOMAS DE AQUINO - CIRCA',	'CALLE SAN MARTIN 214',	40,	11905),
(43,	1,	2,	96,	'0608',	'',	'IE 40055 ROMEO LUNA VICTORIA',	'CALLE YAPURA 306',	25,	7355),
(44,	1,	2,	96,	'7066',	'',	'IE 40677 SAN MIGUEL FEBRES CORDERO',	'AV. INDUSTRIAL SN',	21,	6106),
(45,	1,	2,	97,	'0609',	'',	'IE 40123 SAN JUAN BAUTISTA',	'CALLE SANTA ROSA SN',	11,	3226),
(46,	1,	2,	97,	'0610',	'',	'IE ANGEL FRANCISCO ALI GUILLEN',	'AV. COLEGIO NACIONAL SN',	14,	4168),
(47,	1,	2,	98,	'0611',	'',	'IE 40127 SEÑOR DEL ESPIRITU SANTO',	'CALLE 27 DE OCTUBRE SN',	12,	3371),
(48,	1,	2,	99,	'0678',	'',	'IE HUNTER',	'AV. ITALIA SN',	7,	1850),
(49,	1,	2,	99,	'0679',	'',	'IE 40033 SAN AGUSTIN DE HUNTER',	'MZ F LOTE 1 UPIS PAISAJISTA',	32,	9518),
(50,	1,	2,	99,	'0680',	'',	'IE 40043 NUESTRA SRA DE LA MEDALLA MILAGROSA',	'AV. ITALIA CUADRA 3',	13,	3726),
(51,	1,	2,	99,	'0681',	'',	'IE 40200 REPUBLICA FEDERAL DE ALEMANIA',	'AV. ITALIA 700',	19,	5615),
(52,	1,	2,	99,	'0682',	'',	'IE 40206 MILAGROS',	'CALLE SAN SALVADOR 401',	13,	3642),
(53,	1,	2,	99,	'0683',	'',	'IE 40207 MARIANO MELGAR VALDIVIESO',	'CALLE SANCHEZ CERRO 100',	15,	4340),
(54,	1,	2,	99,	'0684',	'',	'IE JUAN PABLO VIZCARDO Y GUZMAN',	'AV. VIÑA DEL MAR 1300',	39,	11474),
(55,	1,	2,	101,	'0694',	'',	'IE 41038 JOSE OLAYA BALANDRA',	'CALLE URUBAMBA 206',	15,	4370),
(56,	1,	2,	101,	'0696',	'',	'IE INMACULADA CONCEPCION',	'URB. PEDRO DIEZ CANSECO MZ I - LOTE 11',	36,	10708),
(57,	1,	2,	101,	'0697',	'',	'IE JORGE BASADRE GROHMANN',	'CALLE SANGARARA 100',	70,	20852),
(58,	1,	2,	101,	'0698',	'',	'UNIVERSIDAD ALAS PERUANAS  FILIAL AREQUIPA',	'URB. DANIEL ALCIDES CARRION MZ G - LOTE 14',	94,	27931),
(59,	1,	2,	101,	'7467',	'',	'IEP MUNDO ECOLÓGICO',	'COOP. DANIEL ALCIDES CARRIÓN  103',	2,	323),
(60,	1,	2,	102,	'0612',	'',	'IE 40037 HUMBERTO LEON GARCIA',	'CALLE MIGUEL GRAU 201',	18,	5206),
(61,	1,	2,	102,	'7526',	'',	'IE EL CRUCE',	'JR. JOSE CARLOS MARIATEGUI SN',	21,	6198),
(62,	1,	2,	102,	'7485',	'',	'IE 40062',	'AV. PAZ SOLDAN 107',	32,	9485),
(63,	1,	2,	103,	'0672',	'3',	'IE GUE MARIANO MELGAR',	'AV. JESUS 513',	63,	18458),
(64,	1,	2,	103,	'0674',	'',	'IE 41030 EDUARDO LOPEZ DE ROMAÑA',	'AV. SIMON BOLIVAR 1201',	22,	6535),
(65,	1,	2,	103,	'0675',	'',	'IE ANDREA VALDIVIESO DE MELGAR',	'CALLE JUNIN 600',	16,	4592),
(66,	1,	2,	103,	'0676',	'',	'IE 40129 MANUEL VERAMENDI E HIDALGO',	'CALLE COMANDANTE CANGA 2117',	30,	8888),
(67,	1,	2,	103,	'0677',	'',	'IE PIO XII',	'AV. BRASIL 325',	25,	7357),
(68,	1,	2,	103,	'7073',	'',	'IE 40134 MANDIL AZUL',	'CALLE BOLIVAR - GENERALISIMO SAN MARTIN 103',	14,	4159),
(69,	1,	2,	104,	'0614',	'',	'IE 40144 AUGUSTO SALAZAR BONDY',	'AV. PRO HOGAR 1002',	14,	3929),
(70,	1,	2,	104,	'0615',	'',	'IE 40148 GERARDO IQUIRA PIZARRO',	'AV. GOYENECHE 2900',	13,	3753),
(71,	1,	2,	104,	'0616',	'',	'IE 40151 CAP FAP JOSÉ ABELARDO QUIÑONES',	'CALLE MANUEL GONZALES PRADA 100',	5,	1419),
(72,	1,	2,	104,	'0617',	'',	'IE 40156 NUESTRA SEÑORA DEL CARMEN',	'AV. SAN MARTIN 3000',	12,	3564),
(73,	1,	2,	104,	'0618',	'',	'IE 40157 JORGE LUIS BORGES',	'CALLE ARTURO VILLEGAS 115',	10,	2969),
(74,	1,	2,	104,	'0619',	'',	'IE 40159 EJÉRCITO AREQUIPA',	'AV. PROGRESO 1220',	28,	8308),
(75,	1,	2,	104,	'0620',	'',	'IE 41016 REPÚBLICA DE ARGENTINA',	'CALLE ARICA 259',	10,	2828),
(76,	1,	2,	104,	'0621',	'',	'IE 41037 JOSÉ GALVEZ',	'CALLE JOSÉ GALVEZ 612',	28,	8338),
(77,	1,	2,	104,	'0622',	'',	'IE FRANCISCO JAVIER DE LUNA PIZARRO',	'AV. SAN MARTIN 2303',	26,	7730),
(78,	1,	2,	104,	'0623',	'',	'IE INICIAL MISTI',	'AV. ALTO DE LA ALIANZA 226',	8,	2205),
(79,	1,	2,	104,	'0624',	'',	'IE 40158 EL GRAN AMAUTA',	'AV. SAN MARTIN 4403',	17,	5048),
(80,	1,	2,	105,	'0625',	'4',	'IE 40160 OBDULIO BARRIGA VIZCARRA',	'AV. UNION SN',	8,	2217),
(81,	1,	2,	106,	'0626',	'',	'IE 40300 GUE MIGUEL GRAU',	'AV. VENEZUELA SN',	22,	6374),
(82,	1,	2,	106,	'0627',	'',	'IE 40010 JULIO C TELLO',	'CALLE MELGAR 1RA CUADRA',	30,	8636),
(83,	1,	2,	106,	'0628',	'',	'IE 40161 MONSEÑOR JOSE LUIS DEL CARPIO RIVERA',	'CALLE COLON 105',	14,	4148),
(84,	1,	2,	106,	'0629',	'',	'IE 40163 BENIGNO BALLON FARFAN',	'AV. BRASIL 300',	33,	9701),
(85,	1,	2,	106,	'0630',	'',	'IE 40164 JOSE CARLOS MARIATEGUI',	'CALLE AREQUIPA 100',	47,	13950),
(86,	1,	2,	106,	'0631',	'',	'IE 40178 VICTOR RAUL HAYA DE LA TORRE',	'JR. ELIAS AGUIRRE 100',	36,	10709),
(87,	1,	2,	106,	'0632',	'',	'IE JUAN XXIII CIRCA',	'AV. AREQUIPA 7MA CUADRA SN',	42,	12515),
(88,	1,	2,	106,	'0633',	'',	'IE NEPTALI VALDERRAMA AMPUERO',	'AV. PIZARRO 132',	30,	8882),
(89,	1,	2,	106,	'0634',	'',	'IE PAOLA FRASSINETTI FE Y ALEGRIA 45',	'AV. SOL 301',	56,	16633),
(90,	1,	2,	106,	'0635',	'',	'IE SAN PEDRO Y SAN PABLO CIRCA',	'AV. LA MAR SN',	24,	7127),
(91,	1,	2,	106,	'0636',	'',	'IE SOR ANA CIRCA',	'CALLE 24 DE JUNIO SN',	20,	5872),
(92,	1,	2,	106,	'0637',	'',	'IST PEDRO P DIAZ',	'AV. PIZARRO 130',	24,	7116),
(93,	1,	2,	106,	'7076',	'',	'IE 40220 HEROES DEL CENEPA',	'CALLE LOS CLAVELES SN',	2,	534),
(94,	1,	2,	107,	'0638',	'',	'IE 40188',	'AV. PLAZA PRINCIPAL SN',	4,	959),
(95,	1,	2,	108,	'0639',	'',	'IE 40190 SANTISIMA VIRGEN DE CHAPI',	'PLAZA PRINCIPAL SN',	4,	1131),
(96,	1,	2,	109,	'0640',	'',	'IE 40192',	'CALLE PLAZA PRINCIPAL SN',	6,	1505),
(97,	1,	2,	110,	'0641',	'',	'IE 40193 FLORENTINO PORTUGAL',	'CALLE PRINCIPAL 328',	13,	3804),
(98,	1,	2,	111,	'0643',	'',	'IE 40074 JOSE LUIS BUSTAMANTE Y RIVERO',	'AV. ROBERTO PONCE SN',	38,	11230),
(99,	1,	2,	111,	'0644',	'',	'IE 40075 HORACIO MORALES DELGADO',	'CALLE LAS ROSAS 200',	14,	4149),
(100,	1,	2,	111,	'7079',	'',	'IE EL MILAGRO DE FATIMA - CIRCA',	'CALLE JOSE OLAYA SN',	16,	4799),
(101,	1,	2,	111,	'7439',	'',	'IE 40079 VÍCTOR NUÑEZ VALENCIA',	'AV. SALAVERRY SN',	11,	3186),
(102,	1,	2,	112,	'0645',	'',	'IE 40072',	'PANAMERICANA SUR KM 918',	4,	931),
(103,	1,	2,	113,	'0646',	'',	'IE 40196 TECNICO AGROPECUARIO ARTESANAL',	'AV. BOLOGNESI 301',	5,	1332),
(104,	1,	2,	114,	'0647',	'',	'IE 40108',	'CALLE PLAZA PRINCIPAL MZ P LOTE 7',	3,	683),
(105,	1,	2,	115,	'0648',	'',	'IE 40073 VICTOR MANUEL PEROCHENA LUQUE',	'CALLE VICTOR A PEROCHENA SN',	17,	4800),
(106,	1,	2,	116,	'0649',	'',	'IE 40172 VILLA EL GOLF',	'CALLE PANAMA 101',	30,	8924),
(107,	1,	2,	116,	'0650',	'',	'IE 40199',	'CALLE SANCHEZ TRUJILLO 301',	21,	6167),
(108,	1,	2,	116,	'0651',	'',	'IE 40205 MANUEL BENITO LINARES ARENAS',	'CALLE CARAVELI 200',	34,	10075),
(109,	1,	2,	116,	'0652',	'',	'IE 40208 PADRE FRANCOIS DELATTE',	'CALLE LOS GERANIOS SN',	20,	5916),
(110,	1,	2,	116,	'0653',	'',	'IE 40256 CARLOS MANCHEGO RENDON',	'CALLE CESAR VALLEJO SN',	12,	3468),
(111,	1,	2,	116,	'0654',	'',	'IE SAN MARTIN DE SOCABAYA',	'CALLE IQUITOS 201',	34,	10046),
(112,	1,	2,	116,	'7080',	'',	'IE SAN LUIS GONZAGA  CIRCA',	'AV. JOSE CARLOS MARIATEGUI  SN',	22,	6504),
(113,	1,	2,	117,	'0656',	'',	'IE 40083 FRANKLIN ROOSEVELT',	'CALLE PROGRESO SN',	21,	6031),
(114,	1,	2,	117,	'0657',	'',	'IE FRANCISCO MOSTAJO',	'CALLE LOS PERALES SN',	13,	3603),
(115,	1,	2,	117,	'7082',	'',	'IE CARLOS JOSE ECHAVARRY OSACAR',	'CALLE JUAN MANUEL POLAR SN',	18,	5332),
(116,	1,	2,	118,	'0659',	'',	'IE 40092 JOSE DOMINGO ZUZUNAGA OBANDO',	'JR. TOQUEPALA SN',	30,	8859),
(117,	1,	2,	118,	'0660',	'',	'IE 40091 ALMA  MATER DE CONGATA',	'AV. CONGATA SN',	18,	5156),
(118,	1,	2,	119,	'0661',	'',	'IE VICTOR RAUL HAYA DE LA TORRE',	'CALLE ATAHUALPA SN',	8,	2390),
(119,	1,	2,	120,	'0662',	'',	'IE 40165 SAN JUAN BAUTISTA DE LA SALLE',	'PJE SAN JUAN SN',	36,	10491),
(120,	1,	2,	120,	'0663',	'',	'IEP LA RECOLETA',	'CALLE LA RECOLETA  117-B',	11,	3222),
(121,	1,	2,	120,	'0664',	'',	'IE 40048 ANTONIO JOSE DE SUCRE',	'CALLE LEON VELARDE SN',	22,	6544),
(122,	1,	2,	120,	'0665',	'',	'IE SANTA ROSA DE VITERBO',	'AV. ZAMACOLA 106',	14,	4106),
(123,	1,	2,	120,	'0666',	'',	'EST SENCICO',	'CALLE LEON VELARDE 405',	10,	2832),
(124,	1,	2,	121,	'7421',	'',	'I.E 40209 HEROES DE YARABAMBA',	'PJE LINO URQUIETA SN',	7,	1933),
(125,	1,	2,	122,	'0668',	'',	'IE 40100 LA CALERA',	'CALLE PRINCIPAL SN',	5,	1418),
(126,	1,	2,	122,	'0669',	'',	'IE 40102 NUESTRA SEÑORA DEL CARMEN LA ESTACION',	'PJE EL PORVENIR MZ L LT 1',	4,	941),
(127,	1,	2,	122,	'0670',	'',	'IE 40202 CHARLOTTE',	'KM 13.5 CARRETERA A YURA',	42,	12495),
(128,	1,	2,	122,	'0671',	'',	'IE SEÑOR DE LOS MILAGROS CIRCA',	'KM 13.5 CARRETERA A YURA',	11,	3083),
(129,	1,	3,	77,	'0795',	'',	'IE MARIANO EDUARDO DE RIVERO Y USTARIZ MERU',	'AV. PROGRESO 1200',	27,	7717),
(130,	1,	3,	78,	'0796',	'',	'IE 40484 VIRGEN DE FATIMA',	'CALLE FATIMA SN',	19,	5462),
(131,	1,	3,	79,	'0797',	'',	'IE 40479 MIGUEL GRAU',	'CALLE MIGUEL GRAU SN',	13,	3677),
(132,	1,	3,	80,	'0798',	'',	'IE 40494 JOSE ABELARDO QUIÑONES GONZALES',	'AV. TAMBO SN',	5,	1245),
(133,	1,	3,	76,	'0790',	'',	'IE 40473 JOSE EMILIO PACHECO ANTEZANA',	'CALLE PUNO 347',	11,	3035),
(134,	1,	3,	76,	'0791',	'',	'IE 40474 JOSE CARLOS MARIATEGUI',	'CALLE SAN MARTIN SN',	15,	4261),
(135,	1,	3,	76,	'0792',	'',	'IE 40472 CARLOS MANUEL FEBRES',	'CALLE TEOFILO NUÑEZ 201',	20,	5928),
(136,	1,	3,	76,	'0793',	'',	'IE 40476 MERCEDES MANRIQUE',	'URB. POPULAR LOURDES MZ  F-G  LA FLORIDA',	10,	2941),
(137,	1,	3,	76,	'0794',	'',	'IE SAN VICENTE DE PAUL',	'CALLE COMERCIO 1014',	16,	4723),
(138,	1,	3,	81,	'0799',	'',	'IE VICTOR MANUEL TORRES CACERES',	'CALLE VICTOR LIRA SN',	20,	5688);

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE `mesas` (
  `idmesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_local` int(11) NOT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `total_region` int(11) DEFAULT NULL,
  `total_consejero` int(11) DEFAULT NULL,
  `total_provincia` int(11) DEFAULT NULL,
  `total_distrito` int(11) DEFAULT NULL,
  `total_votantes` int(11) DEFAULT NULL,
  `voto_valido` int(11) DEFAULT NULL,
  `voto_blanco` int(11) DEFAULT NULL,
  `voto_nulo` int(11) DEFAULT NULL,
  `estado` char(10) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL COMMENT 'id de personero',
  `observacion` text,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idmesa`),
  UNIQUE KEY `grupo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `mesas` (`idmesa`, `id_local`, `grupo`, `total_region`, `total_consejero`, `total_provincia`, `total_distrito`, `total_votantes`, `voto_valido`, `voto_blanco`, `voto_nulo`, `estado`, `iduser`, `observacion`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1,	10,	'3423red',	66,	66,	66,	66,	33,	66,	6,	7,	'Enviado',	1,	NULL,	'2018-09-12 06:42:49',	'0000-00-00 00:00:00'),
(2,	7,	'3423red3',	45,	45,	45,	45,	33,	5,	5,	5,	'Enviado',	4,	NULL,	'2018-09-12 06:38:47',	'0000-00-00 00:00:00'),
(3,	7,	'3423redt',	333,	33,	33,	33,	33,	33,	33,	33,	'Enviado',	4,	NULL,	'2018-09-12 06:42:02',	'0000-00-00 00:00:00'),
(4,	63,	'455555',	423,	423,	423,	432,	55,	342,	342,	43,	'Enviado',	4,	'432',	'2018-09-12 06:51:54',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `personero`;
CREATE TABLE `personero` (
  `idPersonero` int(11) NOT NULL,
  `DNI` int(11) DEFAULT NULL,
  `clave` char(255) DEFAULT NULL,
  `Nombres` char(255) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Direccion` char(255) DEFAULT NULL,
  `Email` char(45) DEFAULT NULL,
  `Observacion` char(255) DEFAULT NULL,
  PRIMARY KEY (`idPersonero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `personero` (`idPersonero`, `DNI`, `clave`, `Nombres`, `Telefono`, `Direccion`, `Email`, `Observacion`) VALUES
(1,	436666,	'65455',	'gtfg',	343,	'egerg',	NULL,	NULL);

DROP TABLE IF EXISTS `system_group`;
CREATE TABLE `system_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `system_group` (`id`, `name`) VALUES
(1,	'Admin'),
(2,	'Standard'),
(3,	'Coordinador local'),
(4,	'Personero'),
(5,	'Coordinador distrital'),
(6,	'Administración');

DROP TABLE IF EXISTS `system_group_program`;
CREATE TABLE `system_group_program` (
  `id` int(11) NOT NULL,
  `system_group_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_group_program_program_idx` (`system_program_id`),
  KEY `sys_group_program_group_idx` (`system_group_id`),
  CONSTRAINT `system_group_program_ibfk_1` FOREIGN KEY (`system_group_id`) REFERENCES `system_group` (`id`),
  CONSTRAINT `system_group_program_ibfk_2` FOREIGN KEY (`system_program_id`) REFERENCES `system_program` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `system_group_program` (`id`, `system_group_id`, `system_program_id`) VALUES
(1,	1,	1),
(2,	1,	2),
(3,	1,	3),
(4,	1,	4),
(5,	1,	5),
(6,	1,	6),
(7,	1,	8),
(8,	1,	9),
(9,	1,	11),
(10,	1,	14),
(11,	1,	15),
(12,	2,	10),
(13,	2,	12),
(14,	2,	13),
(15,	2,	16),
(16,	2,	17),
(17,	2,	18),
(18,	2,	19),
(19,	2,	20),
(20,	1,	21),
(21,	2,	22),
(22,	2,	23),
(23,	2,	24),
(24,	2,	25),
(25,	1,	26),
(26,	1,	27),
(27,	1,	28),
(28,	1,	29),
(29,	2,	30),
(30,	1,	31),
(31,	1,	32),
(32,	1,	33),
(33,	1,	34),
(40,	4,	41),
(41,	4,	42),
(42,	4,	43),
(43,	3,	35),
(44,	3,	37),
(45,	3,	38),
(46,	3,	39),
(47,	3,	40),
(48,	3,	44),
(51,	5,	47),
(52,	3,	48),
(53,	3,	49),
(54,	6,	45),
(55,	6,	46);

DROP TABLE IF EXISTS `system_preference`;
CREATE TABLE `system_preference` (
  `id` text,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `system_preference` (`id`, `value`) VALUES
('mail_from',	'jhoedmon@gmail.com'),
('smtp_auth',	'1'),
('smtp_host',	'smtp.gmail.com'),
('smtp_port',	'465'),
('smtp_user',	'jhoedmon@gmail.com'),
('smtp_pass',	'nuevoedilberto'),
('mail_support',	'jhoedmon@gmail.com');

DROP TABLE IF EXISTS `system_program`;
CREATE TABLE `system_program` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `controller` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `system_program` (`id`, `name`, `controller`) VALUES
(1,	'System Group Form',	'SystemGroupForm'),
(2,	'System Group List',	'SystemGroupList'),
(3,	'System Program Form',	'SystemProgramForm'),
(4,	'System Program List',	'SystemProgramList'),
(5,	'System User Form',	'SystemUserForm'),
(6,	'System User List',	'SystemUserList'),
(7,	'Common Page',	'CommonPage'),
(8,	'System PHP Info',	'SystemPHPInfoView'),
(9,	'System ChangeLog View',	'SystemChangeLogView'),
(10,	'Welcome View',	'WelcomeView'),
(11,	'System Sql Log',	'SystemSqlLogList'),
(12,	'System Profile View',	'SystemProfileView'),
(13,	'System Profile Form',	'SystemProfileForm'),
(14,	'System SQL Panel',	'SystemSQLPanel'),
(15,	'System Access Log',	'SystemAccessLogList'),
(16,	'System Message Form',	'SystemMessageForm'),
(17,	'System Message List',	'SystemMessageList'),
(18,	'System Message Form View',	'SystemMessageFormView'),
(19,	'System Notification List',	'SystemNotificationList'),
(20,	'System Notification Form View',	'SystemNotificationFormView'),
(21,	'System Document Category List',	'SystemDocumentCategoryFormList'),
(22,	'System Document Form',	'SystemDocumentForm'),
(23,	'System Document Upload Form',	'SystemDocumentUploadForm'),
(24,	'System Document List',	'SystemDocumentList'),
(25,	'System Shared Document List',	'SystemSharedDocumentList'),
(26,	'System Unit Form',	'SystemUnitForm'),
(27,	'System Unit List',	'SystemUnitList'),
(28,	'System Access stats',	'SystemAccessLogStats'),
(29,	'System Preference form',	'SystemPreferenceForm'),
(30,	'System Support form',	'SystemSupportForm'),
(31,	'System PHP Error',	'SystemPHPErrorLogView'),
(32,	'System Database Browser',	'SystemDatabaseExplorer'),
(33,	'System Table List',	'SystemTableList'),
(34,	'System Data Browser',	'SystemDataBrowser'),
(35,	'List Provincias',	'ListProvincias'),
(37,	'Registro de local de votación',	'FormLocal'),
(38,	'List Locales',	'ListLocales'),
(39,	'Registro de mesa',	'FormMesa'),
(40,	'Mesas de votación',	'ListMesas'),
(41,	'Lista de mesas asignadas',	'ListaPersoneroMesas'),
(42,	'Envío de registro de acta',	'FormActualizacionMesa'),
(43,	'Registro de nueva mesa',	'RegistroNuevaMesa'),
(44,	'Estadisticas',	'Panel'),
(45,	'Coordinadores distritales',	'ListaDistritos'),
(46,	'Registro de distrito',	'FormDistrito'),
(47,	'Lista de locales de votación por distrito',	'ListLocalesVotacionDistrito'),
(48,	'Lista de mesas por local de votación',	'ListaMesasLocal'),
(49,	'Registro de mesa de votación del local',	'FormMesaLocal');

DROP TABLE IF EXISTS `system_unit`;
CREATE TABLE `system_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `system_user`;
CREATE TABLE `system_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `frontpage_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_user_program_idx` (`frontpage_id`),
  CONSTRAINT `system_user_ibfk_1` FOREIGN KEY (`frontpage_id`) REFERENCES `system_program` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `system_user` (`id`, `name`, `login`, `password`, `email`, `frontpage_id`, `system_unit_id`, `active`) VALUES
(1,	'Administrator',	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'admin@admin.net',	10,	NULL,	'Y'),
(2,	'User',	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'user@user.net',	7,	NULL,	'Y'),
(3,	'monroy barrios',	'jhon',	'4c25b32a72699ed712dfa80df77fc582',	'jhoedmon@gmail.com',	10,	NULL,	'Y'),
(4,	'ismodes',	'ismodes',	'4d257fe6d74f6df68c28944cce5040d8',	'ismodes@pagina.com',	10,	NULL,	'Y');

DROP TABLE IF EXISTS `system_user_group`;
CREATE TABLE `system_user_group` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_user_group_group_idx` (`system_group_id`),
  KEY `sys_user_group_user_idx` (`system_user_id`),
  CONSTRAINT `system_user_group_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  CONSTRAINT `system_user_group_ibfk_2` FOREIGN KEY (`system_group_id`) REFERENCES `system_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `system_user_group` (`id`, `system_user_id`, `system_group_id`) VALUES
(2,	2,	2),
(11,	1,	1),
(12,	1,	2),
(13,	1,	3),
(14,	1,	4),
(15,	1,	5),
(16,	1,	6),
(18,	4,	2),
(19,	4,	4),
(20,	4,	5),
(21,	3,	3),
(22,	3,	6);

DROP TABLE IF EXISTS `system_user_program`;
CREATE TABLE `system_user_program` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_user_program_program_idx` (`system_program_id`),
  KEY `sys_user_program_user_idx` (`system_user_id`),
  CONSTRAINT `system_user_program_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  CONSTRAINT `system_user_program_ibfk_2` FOREIGN KEY (`system_program_id`) REFERENCES `system_program` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `system_user_program` (`id`, `system_user_id`, `system_program_id`) VALUES
(1,	2,	7);

DROP TABLE IF EXISTS `system_user_unit`;
CREATE TABLE `system_user_unit` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_user_id` (`system_user_id`),
  KEY `system_unit_id` (`system_unit_id`),
  CONSTRAINT `system_user_unit_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  CONSTRAINT `system_user_unit_ibfk_2` FOREIGN KEY (`system_unit_id`) REFERENCES `system_unit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP VIEW IF EXISTS `view_locales`;
CREATE TABLE `view_locales` (`idlocal` int(11), `departamento` char(255), `provincia` char(255), `distrito` char(255), `id_departamento` int(11), `id_provincia` int(11), `id_distrito` int(11), `id_local` char(10), `nombre` char(255), `direccion` char(255), `mesas` int(11), `electores` int(11));


DROP VIEW IF EXISTS `view_locales_distritos`;
CREATE TABLE `view_locales_distritos` (`idlocal` int(11), `iduser` int(11), `id_coordinador` char(255), `id_distrito` int(11), `distrito` char(255), `nombre` char(255), `direccion` char(255), `mesas` int(11), `electores` int(11), `grupo_lista` char(255), `name` varchar(100));


DROP VIEW IF EXISTS `view_mesas`;
CREATE TABLE `view_mesas` (`idmesa` int(11), `grupo` varchar(10), `total_votantes` int(11), `nombre_local` char(255), `direccion` char(255), `departamento` char(255), `provincia` char(255), `distrito` char(255), `personero` varchar(100), `estado` char(10), `id_user` int(11), `idlocal` int(11), `id_departamento` int(11), `id_provincia` int(11), `id_distrito` int(11));


DROP VIEW IF EXISTS `view_mesas_locales`;
CREATE TABLE `view_mesas_locales` (`idmesa` int(11), `idlocal` int(11), `grupo` varchar(10), `id_departamento` int(11), `id_provincia` int(11), `id_distrito` int(11), `iduser` char(255), `id_personero` int(11), `name` varchar(100), `total_votantes` int(11), `estado` char(10));


DROP VIEW IF EXISTS `view_personero_mesas`;
CREATE TABLE `view_personero_mesas` (`id_user` int(11), `personero` varchar(100), `idmesa` int(11), `grupo` varchar(10), `nombre_local` char(255), `direccion` char(255), `distrito` char(255), `estado` char(10), `idlocal` int(11), `id_distrito` int(11), `total_region` int(11), `total_consejero` int(11), `total_provincia` int(11), `total_distrito` int(11), `voto_valido` int(11), `voto_blanco` int(11), `voto_nulo` int(11), `total_votantes` int(11));


DROP VIEW IF EXISTS `view_resumen`;
CREATE TABLE `view_resumen` (`id_departamento` int(11), `id_provincia` int(11), `id_distrito` int(11), `total_region` decimal(32,0), `total_consejero` decimal(32,0), `total_provincia` decimal(32,0), `total_distrito` decimal(32,0), `voto_valido` decimal(32,0), `voto_blanco` decimal(32,0), `voto_nulo` decimal(32,0), `total_votantes` decimal(32,0));


DROP TABLE IF EXISTS `view_locales`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_locales` AS select `locales`.`idlocal` AS `idlocal`,`departamentos`.`des_lista` AS `departamento`,`provincias`.`des_lista` AS `provincia`,`distritos`.`des_lista` AS `distrito`,`departamentos`.`idlista` AS `id_departamento`,`provincias`.`idlista` AS `id_provincia`,`distritos`.`idlista` AS `id_distrito`,`locales`.`id_local` AS `id_local`,`locales`.`nombre` AS `nombre`,`locales`.`direccion` AS `direccion`,`locales`.`mesas` AS `mesas`,`locales`.`electores` AS `electores` from (((`locales` join `listas` `departamentos` on((`departamentos`.`idlista` = `locales`.`id_departamento`))) join `listas` `provincias` on((`provincias`.`idlista` = `locales`.`id_provincia`))) join `listas` `distritos` on((`distritos`.`idlista` = `locales`.`id_distrito`)));

DROP TABLE IF EXISTS `view_locales_distritos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_locales_distritos` AS select `locales`.`idlocal` AS `idlocal`,`listas`.`iduser` AS `iduser`,`locales`.`iduser` AS `id_coordinador`,`locales`.`id_distrito` AS `id_distrito`,`listas`.`des_lista` AS `distrito`,`locales`.`nombre` AS `nombre`,`locales`.`direccion` AS `direccion`,`locales`.`mesas` AS `mesas`,`locales`.`electores` AS `electores`,`listas`.`grupo_lista` AS `grupo_lista`,`system_user`.`name` AS `name` from ((`listas` left join `locales` on((`locales`.`id_distrito` = `listas`.`idlista`))) left join `system_user` on((`system_user`.`id` = `locales`.`iduser`))) where (`listas`.`grupo_lista` = 'DISTRITO');

DROP TABLE IF EXISTS `view_mesas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_mesas` AS select `mesas`.`idmesa` AS `idmesa`,`mesas`.`grupo` AS `grupo`,`mesas`.`total_votantes` AS `total_votantes`,`locales`.`nombre` AS `nombre_local`,`locales`.`direccion` AS `direccion`,`departamento`.`des_lista` AS `departamento`,`provincia`.`des_lista` AS `provincia`,`distrito`.`des_lista` AS `distrito`,`system_user`.`name` AS `personero`,`mesas`.`estado` AS `estado`,`system_user`.`id` AS `id_user`,`locales`.`idlocal` AS `idlocal`,`locales`.`id_departamento` AS `id_departamento`,`locales`.`id_provincia` AS `id_provincia`,`locales`.`id_distrito` AS `id_distrito` from (((((`mesas` join `locales` on((`locales`.`idlocal` = `mesas`.`id_local`))) join `listas` `departamento` on((`departamento`.`idlista` = `locales`.`id_departamento`))) join `listas` `provincia` on((`provincia`.`idlista` = `locales`.`id_provincia`))) join `listas` `distrito` on((`distrito`.`idlista` = `locales`.`id_distrito`))) left join `system_user` on((`system_user`.`id` = `mesas`.`iduser`)));

DROP TABLE IF EXISTS `view_mesas_locales`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_mesas_locales` AS select `mesas`.`idmesa` AS `idmesa`,`locales`.`idlocal` AS `idlocal`,`mesas`.`grupo` AS `grupo`,`locales`.`id_departamento` AS `id_departamento`,`locales`.`id_provincia` AS `id_provincia`,`locales`.`id_distrito` AS `id_distrito`,`locales`.`iduser` AS `iduser`,`mesas`.`iduser` AS `id_personero`,`system_user`.`name` AS `name`,`mesas`.`total_votantes` AS `total_votantes`,`mesas`.`estado` AS `estado` from ((`locales` left join `mesas` on((`mesas`.`id_local` = `locales`.`idlocal`))) left join `system_user` on((`system_user`.`id` = `mesas`.`iduser`))) where (`mesas`.`idmesa` is not null);

DROP TABLE IF EXISTS `view_personero_mesas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_personero_mesas` AS select `system_user`.`id` AS `id_user`,`system_user`.`name` AS `personero`,`mesas`.`idmesa` AS `idmesa`,`mesas`.`grupo` AS `grupo`,`locales`.`nombre` AS `nombre_local`,`locales`.`direccion` AS `direccion`,`distrito`.`des_lista` AS `distrito`,`mesas`.`estado` AS `estado`,`locales`.`idlocal` AS `idlocal`,`locales`.`id_distrito` AS `id_distrito`,`mesas`.`total_region` AS `total_region`,`mesas`.`total_consejero` AS `total_consejero`,`mesas`.`total_provincia` AS `total_provincia`,`mesas`.`total_distrito` AS `total_distrito`,`mesas`.`voto_valido` AS `voto_valido`,`mesas`.`voto_blanco` AS `voto_blanco`,`mesas`.`voto_nulo` AS `voto_nulo`,`mesas`.`total_votantes` AS `total_votantes` from (((`mesas` join `locales` on((`locales`.`idlocal` = `mesas`.`id_local`))) join `listas` `distrito` on((`distrito`.`idlista` = `locales`.`id_distrito`))) left join `system_user` on((`system_user`.`id` = `mesas`.`iduser`)));

DROP TABLE IF EXISTS `view_resumen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_resumen` AS select `locales`.`id_departamento` AS `id_departamento`,`locales`.`id_provincia` AS `id_provincia`,`locales`.`id_distrito` AS `id_distrito`,sum(`mesas`.`total_region`) AS `total_region`,sum(`mesas`.`total_consejero`) AS `total_consejero`,sum(`mesas`.`total_provincia`) AS `total_provincia`,sum(`mesas`.`total_distrito`) AS `total_distrito`,sum(`mesas`.`voto_valido`) AS `voto_valido`,sum(`mesas`.`voto_blanco`) AS `voto_blanco`,sum(`mesas`.`voto_nulo`) AS `voto_nulo`,sum(`mesas`.`total_votantes`) AS `total_votantes` from (`mesas` join `locales` on((`locales`.`idlocal` = `mesas`.`id_local`))) group by `locales`.`id_departamento`,`locales`.`id_provincia`,`locales`.`id_distrito`;

-- 2018-09-12 21:27:28
