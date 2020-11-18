<?php

class Panel extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();

        $html = new THtmlRenderer('app/resources/main.html');
        
        try
        {

            TTransaction::open('database');
            $conn = TTransaction::get(); // obtém a conexão 
            
        
           /* $sth = $conn->prepare('SELECT total_region from view_total_votos_provincia
                                   WHERE id_provincia = ?'); 
            $sth->execute(array(2));
            $result = $sth->fetchAll();
            $data = array();
            foreach ($result as $row) 
            { 
                $data= [(int)$row['total_region'],5,5,5];
            } 
*/


            TTransaction::close();
        }
        catch (exception $e)
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            TTransaction::rollback();
        }


        $panel = new TPanelGroup('Line chart');
        $panel->add($html);
        
        $fecha_hoy = date('Y-m-d');


        // replace the main section variables
        $html->enableSection('main', array(
            'data' => '',
            'width' => '100%',
            'height' => '700px',
            'title' => 'Ingresos en el mes',
            'ytitle' => 'Ingres',
            'xtitle' => 'Dias',
            'resumen_provincia' => '',
            'total_tareas' => rand(37000,43000),
            'total_clases' => rand(37000,43000),
            'total_examenes' => rand(37000,43000),
            'total_paquetes' => rand(37000,43000),
            'ingresos_hoy' => rand(37000,43000),
            'ingresos_semana' => rand(3800,5000),
            'ingresos_mes' => rand(2000,5000),
            'egresos_mes' => rand(2000,5000),
            'fecha_hoy' => strftime("%d de %B de %Y", strtotime($fecha_hoy)),
            'mes_hoy' => strtoupper(strftime("%B - %Y", strtotime($fecha_hoy)))
            ));

        // add the template to the page
        $container = new TVBox;
        $container->style = 'width:100%';
        //$container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($html);

        parent::add($container);
    }


    /** Actual month last day **/
    public function _data_last_month_day()
    {
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));

        return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
    }

    /** Actual month first day **/
    public function _data_first_month_day()
    {
        $month = date('m');
        $year = date('Y');
        return date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
    }

    public function _date_first_week($fecha)
    {
        $diaInicio = 'Monday';

        $strFecha = strtotime($fecha);
        $fechaInicio = date('Y-m-d', strtotime('last ' . $diaInicio, $strFecha));

        if (date("l", $strFecha) == $diaInicio)
        {
            $fechaInicio = date("Y-m-d", $strFecha);
        }

        return $fechaInicio;
    }

    public function _date_last_week($fecha)
    {
        $diaFin = 'Sunday';
        $strFecha = strtotime($fecha);

        $fechaFin = date('Y-m-d', strtotime('next ' . $diaFin, $strFecha));

        if (date("l", $strFecha) == $diaFin)
        {
            $fechaFin = date("Y-m-d", $strFecha);
        }

        return $fechaFin;
    }
}
