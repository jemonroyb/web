<?php
/**
* Interesado Active Record
* @author  Renán Darío Gonzales Apaza
*/
class Interesado extends TRecord
{
    const TABLENAME = 'interesados';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max'; // {max, serial}


    /**
    * Constructor method
    */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        //Atributos de Interesado
        parent::addAttribute('full_name');
        parent::addAttribute('email');
        parent::addAttribute('phone_number');
        parent::addAttribute('state');
        parent::addAttribute('gender');
        parent::addAttribute('quiero');
        parent::addAttribute('tiempo_creacion');

    }

}