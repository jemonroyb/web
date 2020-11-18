<?php
/**
* ViewPersoneroMesa Active Record
* @author  Renán Darío Gonzales Apaza
*/
class ViewPersoneroMesa extends TRecord
{
    const TABLENAME = 'view_personero_mesas';
    const PRIMARYKEY = 'idmesa';
    const IDPOLICY = 'max'; // {max, serial}

    //Variables de asociacion
    private $mesa;
    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de ViewPersoneroMesa
        parent::addAttribute('id_personero');
        parent::addAttribute('personero');
        parent::addAttribute('grupo');
        parent::addAttribute('nombre_local');
        parent::addAttribute('direccion');
        parent::addAttribute('distrito');
        parent::addAttribute('estado');
        parent::addAttribute('idlocal');
        parent::addAttribute('id_distrito');
        parent::addAttribute('total_region');
        parent::addAttribute('total_consejero');
        parent::addAttribute('total_provincia');
        parent::addAttribute('total_distrito');
        parent::addAttribute('voto_valido');
        parent::addAttribute('voto_blanco');
        parent::addAttribute('voto_nulo');
        parent::addAttribute('voto_impugnado');
        parent::addAttribute('mesa_impugnada');
        parent::addAttribute('observacion');
        parent::addAttribute('total_votantes');
        parent::addAttribute('id_coord_local');

    }

    /**
    * Method get_mesa
    * @returns Mesa instance
    */
    public function get_mesa()
    {
        // loads the associated object
        if (empty($this->mesa))
        $this->mesa = new Mesa($this->idmesa);

        // returns the associated object
        return $this->mesa;
    }

    /**
    * Method set_mesa
    * @param $object Instance of Mesa
    */
    public function set_mesa(Mesa $object)
    {
        $this->mesa = $object;
        $this->idmesa = $object->idmesa;
    }

    /**
    * Reset agregaciones y composiciones
    */
    public function clearParts()
    {
    }



    /**
    * Load the object and the aggregates
    */
    public function load($id)
    {


        // load the object itself
        return parent::load($id);
    }

    /**
    * Store the object and its aggregates
    */
    public function store()
    {
        // store the object itself
        parent::store();
    }

    /**
    * Delete the object and its aggregates
    * @param $id object ID
    */
    public function delete($id = NULL)
    {
        $id = isset($id) ? $id : $this->idmesa;


        // delete the object itself
        parent::delete($id);
    }

}