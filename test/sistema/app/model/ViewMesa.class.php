<?php
/**
* ViewMesa Active Record
* @author  Renán Darío Gonzales Apaza
*/
class ViewMesa extends TRecord
{
    const TABLENAME = 'view_mesas';
    const PRIMARYKEY = 'idmesa';
    const IDPOLICY = 'max'; // {max, serial}

    //Variables de asociacion
    private $local;
    private $mesa;
    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de ViewMesa
        parent::addAttribute('grupo');
        parent::addAttribute('total_votantes');
        parent::addAttribute('nombre_local');
        parent::addAttribute('direccion');
        parent::addAttribute('departamento');
        parent::addAttribute('provincia');
        parent::addAttribute('distrito');
        parent::addAttribute('personero');
        parent::addAttribute('estado');
        parent::addAttribute('id_personero');
        parent::addAttribute('id_coord_local');
        parent::addAttribute('idlocal');
        parent::addAttribute('id_departamento');
        parent::addAttribute('id_provincia');
        parent::addAttribute('id_distrito');

    }

    /**
    * Method get_mesa
    * @returns Mesa instance
    */
    public function get_mesa()
    {
        // loads the associated object
        if (empty($this->idmesa))
        $this->mesa = new Mesa($this->idmesa);

        // returns the associated object
        return $this->mesa;
    }

    /**
    * Method get_local
    * @returns Local instance
    */
    public function get_local()
    {
        // loads the associated object
        if (empty($this->local))
        $this->local = new Local($this->idlocal);

        // returns the associated object
        return $this->local;
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