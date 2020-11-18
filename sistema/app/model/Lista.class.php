<?php
/**
* Lista Active Record
* @author  Renán Darío Gonzales Apaza
*/
class Lista extends TRecord
{
    const TABLENAME = 'listas';
    const PRIMARYKEY = 'idlista';
    const IDPOLICY = 'max'; // {max, serial}

    //Variables de asociacion
    private $lista;
    private $coordinador;
    
    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de Lista
        parent::addAttribute('id_coord_ciudad');
        parent::addAttribute('grupo_lista');
        parent::addAttribute('des_lista');
        parent::addAttribute('visible');
        parent::addAttribute('id_lista_sup');
        parent::addAttribute('nu_orden');

    }

    /**
    * Method set_lista
    * @param $object Instance of Lista
    */
    public function set_coordinador(SystemUser $object)
    {
        $this->coordinador = $object;
        $this->id_coord_ciudad = $object->id;
    }

    /**
    * Method get_lista
    * @returns Lista instance
    */
    public function get_coordinador()
    {
        // loads the associated object
        if (empty($this->coordinador))
        $this->coordinador = new SystemUser($this->id_coord_ciudad);

        // returns the associated object
        return $this->coordinador;
    }

    /**
    * Method set_lista
    * @param $object Instance of Lista
    */
    public function set_lista(Lista $object)
    {
        $this->lista = $object;
        $this->id_lista_sup = $object->idlista;
    }

    /**
    * Method get_lista
    * @returns Lista instance
    */
    public function get_lista()
    {
        // loads the associated object
        if (empty($this->lista))
        $this->lista = new Lista($this->id_lista_sup);

        // returns the associated object
        return $this->lista;
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
        $id = isset($id) ? $id : $this->idlista;


        // delete the object itself
        parent::delete($id);
    }

}