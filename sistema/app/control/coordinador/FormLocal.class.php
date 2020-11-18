<?php
/**
* FormLocal Form
* @author  Renán Darío Gonzales Apaza
*/
class FormLocal extends TPage
{
    protected $form; // form

    /**
    * Form constructor
    * @param $param Request
    */
    public function __construct( $param )
    {
        parent::__construct();

        // creates the form
        $this->form = new TQuickForm('form_Local');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormBuilder('form_Local');
        $this->form->style = 'display: table;width:100%'; // change style
        //$this->form->setFieldsByRow(1);

        // define the form title
        $this->form->setFormTitle('Local');
        
        $criterio     = new TCriteria;
        $criterio->add(new TFilter('grupo_lista','=','DISTRITO'));
        
        // define the fields
        $idlocal     = new TEntry('idlocal');
        $id_distrito = new TDBCombo('id_distrito','database','Lista','idlista','des_lista','des_lista',$criterio);
        $id_local    = new TEntry('id_local');
        $nombre      = new TEntry('nombre');
        $direccion   = new TEntry('direccion');
        $mesas       = new TEntry('mesas');
        $electores   = new TEntry('electores');

		$id_distrito->enableSearch();

        $idlocal->setSize('100%');
        $id_distrito->setSize('100%');
        $id_local->setSize('100%');
        $nombre->setSize('100%');
        $direccion->setSize('100%');
        $mesas->setSize('100%');
        $electores->setSize('100%');


        $electores->setSize('100%');
        $id_distrito->addValidation('Distrito', new TNumericValidator);
        $id_distrito->addValidation('Distrito', new TNumericValidator);
        $nombre->addValidation('Nombre', new TRequiredValidator);
        $direccion->addValidation('Dirección', new TRequiredValidator);
       // $mesas->addValidation('Nº Mesas', new TNumericValidator);
       // $electores->addValidation('Nº Electores', new TNumericValidator);


        $this->form->addFields([new TLabel('ID')], [$idlocal]);
        $this->form->addFields([new TLabel('Distrito')], [$id_distrito]);
        $this->form->addFields([new TLabel('ID Local')], [$id_local]);
        $this->form->addFields([new TLabel('Nombre')], [$nombre]);
        $this->form->addFields([new TLabel('Dirección')], [$direccion]);
        //$this->form->addFields([new TLabel('Nº Mesas')], [$mesas],[new TLabel('Nº Electores')], [$electores]);





        if (!empty($idlocal)) {
            $idlocal->setEditable(FALSE);
        }

        /** samples
        $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
        $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
        $fieldX->setSize( 100, 40 ); // set size
        **/

        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this,'onSave')), 'fa:floppy-o');
        $new = $this->form->addAction(_t('New'),  new TAction(array($this,'onClear')), 'bs:plus-sign green');
        $list = $this->form->addAction(_t('List'), new TAction(array('ListLocalesVotacionDistrito', 'onLoad')), 'bs:list');



        ##BOOTSTRAP##

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);

        parent::add($container);
    }
    
    public function onLoad( $param )
    {
    	
    }

    /**
    * Save form data
    * @param $param Request
    */
    public function onSave( $param )
    {
        try
        {
            TTransaction::open('database'); // open a transaction

            /**
            // Enable Debug logger for SQL operations inside the transaction
            TTransaction::setLogger(new TLoggerSTD); // standard output
            TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
            **/

            $this->form->validate(); // validate form data
$data = $this->form->getData(); // get form data as array
            $object = (empty($data->idlocal)) ? new Local : new Local($data->idlocal, true); // create an empty object
            
            $object->fromArray( (array) $data); // load the object with data
            
$distrito = Lista::find($object->id_distrito);
        
            $object->id_departamento=$distrito->lista->lista->idlista;
            $object->id_provincia=$distrito->lista->idlista;
            
            $object->store(); // save the object

            // get the generated idlocal
            $data->idlocal = $object->idlocal;

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
    * Clear form data
    * @param $param Request
    */
    public function onClear( $param )
    {
        $this->form->clear();
    }

    /**
    * Load object to form data
    * @param $param Request
    */
    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key'])) {
                $key    = $param['key'];  // get the parameter $key
                TTransaction::open('database'); // open a transaction
                $object = new Local($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}
