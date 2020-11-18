<?php
/**
* ViewLocal Active Record
* @author  Renán Darío Gonzales Apaza
*/
class ViewLocal extends TRecord
{
    const TABLENAME = 'view_locales';
    const PRIMARYKEY = 'idlocal';
    const IDPOLICY = 'max'; // {max, serial}

    private $local;
    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de ViewLocal
        parent::addAttribute('departamento');
        parent::addAttribute('provincia');
        parent::addAttribute('distrito');
        parent::addAttribute('id_departamento');
        parent::addAttribute('id_provincia');
        parent::addAttribute('id_distrito');
        parent::addAttribute('id_local');
        parent::addAttribute('nombre');
        parent::addAttribute('direccion');
        parent::addAttribute('mesas');
        parent::addAttribute('electores');
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