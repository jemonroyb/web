<?php
/**
* Local Active Record
* @author  Renán Darío Gonzales Apaza
*/
class Local extends TRecord
{
    const TABLENAME = 'locales';
    const PRIMARYKEY = 'idlocal';
    const IDPOLICY = 'max'; // {max, serial}

    private $coordinadorlocal;
    private $distrito;

    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de Local
        parent::addAttribute('id_departamento');
        parent::addAttribute('id_provincia');
        parent::addAttribute('id_distrito');
        // parent::addAttribute('id_local');
        parent::addAttribute('id_coord_local');
        parent::addAttribute('nombre');
        parent::addAttribute('direccion');
        parent::addAttribute('mesas');
        parent::addAttribute('electores');

    }

    /**
    * Method set_lista
    * @param $object Instance of Lista
    */
    public function set_coordinadorlocal(SystemUser $object)
    {
        $this->systemuser = $object;
        $this->id_coord_local = $object->id;
    }

    /**
    * Method get_lista
    * @returns Lista instance
    */
    public function get_coordinadorlocal()
    {
        // loads the associated object
        if (empty($this->systemuser))
        $this->systemuser = new SystemUser($this->id_coord_local);

        // returns the associated object
        return $this->systemuser;
    }


    public function set_distrito(Lista $object)
    {
        $this->distrito = $object;
        $this->id_distrito = $object->idlista;
    }

    /**
    * Method get_distrito
    * @returns Lista instance
    */
    public function get_distrito()
    {
        // loads the associated object
        if (empty($this->distrito))
        $this->distrito = new Lista($this->id_distrito);

        // returns the associated object
        return $this->distrito;
    }
}