<?php
/**
* FormEditCoordinadorLocal Form
* @author  Renán Darío Gonzales Apaza
*/
class FormEditCoordinadorLocal extends TPage
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

        $criterio          = new TCriteria;
        $criterio->add(new TFilter('grupo_lista','=','DISTRITO'));

        $criterio2         = new TCriteria;
        $criterio2->add(new TFilter('active','=','Y'),TExpression::OR_OPERATOR);


        // define the fields
        $idlocal           = new TEntry('idlocal');
        $id_provincia      = new TEntry('id_provincia'/*,'database','Lista','idlista','des_lista','des_lista',$criterio*/);
        $id_distrito       = new TEntry('id_distrito'/*,'database','Lista','idlista','des_lista','des_lista',$criterio*/);
        $nombre            = new TEntry('nombre');
        $direccion         = new TEntry('direccion');
        $mesas             = new TEntry('mesas');
        $electores         = new TEntry('electores');


        $coordinador_local = new TDBUniqueSearch('id_coord_local','permission','SystemUser','id','login','name',$criterio2);
        $coordinador_local->setMask('({dni}) <b>{name}</b>');
        $coordinador_local->setOperator('like');

        $idlocal->setSize('100%');
        $id_provincia->setSize('100%');
        $id_distrito->setSize('100%');
        $nombre->setSize('100%');
        $direccion->setSize('100%');
        $mesas->setSize('100%');
        $electores->setSize('100%');


        $electores->setSize('100%');
        $id_provincia->addValidation('Provincia', new TRequiredValidator);
        $id_distrito->addValidation('Distrito', new TRequiredValidator);
        $nombre->addValidation('Nombre', new TRequiredValidator);
        //$electores->addValidation('Nº Electores', new TNumericValidator);
        $idlocal->addValidation('ID', new TNumericValidator);


        $this->form->addFields([new TLabel('ID')], [$idlocal]);
        $this->form->addFields([new TLabel('Distrito')], [$id_distrito]);
        $this->form->addFields([new TLabel('Nombre')], [$nombre]);
        $this->form->addFields([new TLabel('Dirección')], [$direccion]);
        //$this->form->addFields([new TLabel('Nº Mesas')], [$mesas],[new TLabel('Nº Electores')], [$electores]);
        $this->form->addFields([new TLabel('Coodinador local')], [$coordinador_local]);





        if (!empty($idlocal)) {
            $idlocal->setEditable(FALSE);
        }

        $id_provincia->setEditable(FALSE);
        $id_distrito->setEditable(FALSE);
        $nombre->setEditable(FALSE);
        $direccion->setEditable(FALSE);


        /** samples
        $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
        $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
        $fieldX->setSize( 100, 40 ); // set size
        **/

        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this,'onSave')), 'fa:floppy-o');
        // $new = $this->form->addAction(_t('New'),  new TAction(array($this,'onClear')), 'bs:plus - sign green');
        $list = $this->form->addAction(_t('List'), new TAction(array('ListLocalesVotacionDistrito','onLoad')), 'bs:list');



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
            $data   = $this->form->getData(); // get form data as array

            $object = (empty($data->idlocal)) ? new Local : new Local($data->idlocal, true); // create an empty object

            if ($object->distrito->coordinador->id != TSession::getValue('userid'))
            {
                throw new Exception('El local al cual quiere asignar un coordinador de local de votación, no está en la administración de su(s) distrito(s)');
            }

            if ($object->id_coord_local != $data->id_coord_local) {

                $locales_a_cargo = Local::where('id_coord_local', '=', $object->id_coord_local)->count();
                if ($locales_a_cargo <= 1)
                {
                    SystemUserGroup::where('system_user_id', '=', $object->id_coord_local)
                    ->where('system_group_id','=','3')
                    ->delete();
                }


                if (!empty($data->id_coord_local)) {
                    $locales_a_cargo = Local::where('id_coord_local', '=', $data->id_coord_local)->count();
                    if ($locales_a_cargo == 0) {
                        SystemUserGroup::create(
                            [ 'system_group_id' => '3',
                                'system_user_id' => $data->id_coord_local]);
                    }
                }

                $object->id_coord_local = $data->id_coord_local;
                $object->store(); // update the object in the database
            }


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
                $object->id_provincia = $object->distrito->lista->des_lista;
                $object->id_distrito = $object->distrito->des_lista;
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
