<?php
/**
* Mesa Active Record
* @author  Renán Darío Gonzales Apaza
*/
class Mesa extends TRecord
{
    const TABLENAME = 'mesas';
    const PRIMARYKEY = 'idmesa';
    const IDPOLICY = 'max'; // {max, serial}

    //Variables de asociacion
    private $local;
    private $personero;
    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de Mesa
        parent::addAttribute('id_local');
        parent::addAttribute('grupo');
        parent::addAttribute('total_region');
        parent::addAttribute('total_consejero');
        parent::addAttribute('total_provincia');
        parent::addAttribute('total_distrito');
        parent::addAttribute('total_votantes');
        parent::addAttribute('voto_valido');
        parent::addAttribute('voto_blanco');
        parent::addAttribute('voto_nulo');
        parent::addAttribute('voto_impugnado');
        parent::addAttribute('mesa_impugnada');
        parent::addAttribute('estado');
        parent::addAttribute('id_personero');
        parent::addAttribute('observacion');
        parent::addAttribute('fecha_envio');
        parent::addAttribute('id_user_envio');

    }


    public function set_personero(SystemUser $object)
    {
        $this->personero = $object;
        $this->id_personero = $object->id;
    }

    public function get_personero()
    {
        // loads the associated object
        if (empty($this->personero))
        $this->personero = new SystemUser($this->id_personero);

        // returns the associated object
        return $this->personero;
    }

    /**
    * Method get_local
    * @returns Local instance
    */
    public function get_local()
    {
        // loads the associated object
        if (empty($this->local))
        $this->local = new Local($this->id_local);

        // returns the associated object
        return $this->local;
    }

    /**
    * Method set_local
    * @param $object Instance of Local
    */
    public function set_local(Local $object)
    {
        $this->local = $object;
        $this->id_local = $object->idlocal;
    }


    public function onBeforeStore($object)
    {
        if (isset($object->idmesa))
        {
            $object->fecha_envio = date('y-m-d h:i:s');
            $object->id_user_envio = TSession::getValue('userid');
        }
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