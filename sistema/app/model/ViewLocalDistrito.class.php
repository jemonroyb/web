<?php
/**
* ViewLocalDistrito Active Record
* @author  Renán Darío Gonzales Apaza
*/
class ViewLocalDistrito extends TRecord
{
    const TABLENAME = 'view_locales_distritos';
    const PRIMARYKEY = 'idlocal';
    const IDPOLICY = 'max'; // {max, serial}


    private $local;

    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de ViewLocalDistrito
        parent::addAttribute('id_coord_local');
        parent::addAttribute('id_coord_ciudad');
        parent::addAttribute('id_distrito');
        parent::addAttribute('distrito');
        parent::addAttribute('nombre');
        parent::addAttribute('direccion');
        parent::addAttribute('mesas');
        parent::addAttribute('electores');
        parent::addAttribute('grupo_lista');
        parent::addAttribute('name');
    }

    public function get_local()
    {
        // loads the associated object
        if (empty($this->local))
        $this->local = new Local($this->idlocal);

        // returns the associated object
        return $this->local;
    }
}