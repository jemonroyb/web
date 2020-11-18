<?php
/**
* ViewMesaLocal Active Record
* @author  Renán Darío Gonzales Apaza
*/
class ViewMesaLocal extends TRecord
{
    const TABLENAME = 'view_mesas_locales';
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
        //Atributos de ViewMesaLocal
        parent::addAttribute('idlocal');
        parent::addAttribute('grupo');
        parent::addAttribute('id_departamento');
        parent::addAttribute('id_provincia');
        parent::addAttribute('id_distrito');
        parent::addAttribute('id_coord_ciudad');
        parent::addAttribute('id_coord_local');
        parent::addAttribute('id_personero');
        parent::addAttribute('name');
        parent::addAttribute('total_votantes');
        parent::addAttribute('estado');
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
}