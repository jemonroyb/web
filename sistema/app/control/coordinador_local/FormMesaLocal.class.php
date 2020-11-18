<?php
/**
* FormMesaLocal Form
* @author  Renán Darío Gonzales Apaza
*/
class FormMesaLocal extends TPage
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
        $this->form = new TQuickForm('form_Mesa');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormBuilder('form_Mesa');
        $this->form->style = 'display: table;width:100%'; // change style
        //$this->form->setFieldsByRow(1);

        // define the form title
        $this->form->setFormTitle('Mesa');


        $criterio       = new TCriteria;
        $criterio->add(new TFilter('active','=','Y'));
        
        $criterio2       = new TCriteria;
        $criterio2->add(new TFilter('id_coord_local','=',TSession::getValue('userid')));

        // define the fields

        $idmesa         = new TEntry('idmesa');
        $id_local       = new TDBCombo('id_local','database','Local','idlocal','nombre','nombre',$criterio2);
        $grupo          = new TEntry('grupo');
        $total_votantes = new TEntry('total_votantes');
        $iduser         = new TDBUniqueSearch('iduser','permission','SystemUser','id','name','name',$criterio);

        $id_local->enableSearch();
        $iduser->setMinLength(2);

        $idmesa->setSize('100%');
        $id_local->setSize('100%');
        $grupo->setSize('100%');
        $total_votantes->setSize('100%');
        $iduser->setSize('100%');


        $iduser->setSize('100%');
        $id_local->addValidation('Local', new TRequiredValidator);
        $grupo->addValidation('Grupo', new TRequiredValidator);
        $total_votantes->addValidation('Total Votantes', new TNumericValidator);
        // $iduser->addValidation('Personero', new TRequiredValidator);

        $this->form->addFields([new TLabel('ID')], [$idmesa]);
        $this->form->addFields([new TLabel('Local')], [$id_local]);
        $this->form->addFields([new TLabel('Grupo de votación')], [$grupo]);
        $this->form->addFields([new TLabel('Total Votantes')], [$total_votantes]);
        $this->form->addFields([new TLabel('Personero')], [$iduser]);


        if (!empty($idmesa))
        {
            $idmesa->setEditable(FALSE);
        }

        /** samples
        $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
        $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
        $fieldX->setSize( 100, 40 ); // set size
        **/

        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this,'onSave')), 'fa:floppy-o');
        $new = $this->form->addAction('Limpiar',  new TAction(array($this,'onClear')), 'bs:plus-sign green');
        $list = $this->form->addAction(_t('List'), new TAction(array('ListaMesasLocal', 'onLoad')), 'bs:list');



        ##BOOTSTRAP##

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);

        parent::add($container);
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

            $object = (empty($data->idgrupo)) ? new Mesa : new Mesa($data->idmesa, true); // create an empty object
            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object

            // get the generated idmesa
            $data->idmesa = $object->idmesa;

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e) // in case of exception
        {
            if ($e->getCode() == 23000)
            {
                new TMessage('error', 'Error ' . 'El código de grupo de votación ya existe en el sistema');
            }else
            {
                new TMessage('error', 'Error ' .$e->getCode(). '-' . $e->getMessage()); // shows the exception error message
            }
            //new TMessage('error', $e->getMessage()); // shows the exception error message
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
            if (isset($param['key']))
            {
                $key    = $param['key'];  // get the parameter $key
                TTransaction::open('database'); // open a transaction
                $object = new Mesa($key); // instantiates the Active Record
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
