<?php
/**
* FormDistrito Form
* @author  Renán Darío Gonzales Apaza
*/
class FormDistrito extends TPage
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
        $this->form = new TQuickForm('form_Lista');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormBuilder('form_Lista');
        $this->form->style = 'display: table;width:100%'; // change style
        //$this->form->setFieldsByRow(1);

        // define the form title
        $this->form->setFormTitle('Registro de distrito');

        $criterio1    = new TCriteria;
        $criterio1->add(new TFilter('grupo_lista','=','PROVINCIA'));

        $criterio2    = new TCriteria;
        $criterio2->add(new TFilter('active','=','Y'));

        // define the fields
        $idlista      = new TEntry('idlista');
        $id_lista_sup = new TEntry('id_lista_sup'/*,'database','Lista','idlista','des_lista','des_lista',$criterio1*/);
        $des_lista    = new TEntry('des_lista');
        $iduser       = new TDBUniqueSearch('id_coord_ciudad','permission','SystemUser','id','login','name',$criterio2);

        $iduser->setMask('({dni}) <b>{name}</b>');
        $iduser->setOperator('like');

        $idlista->setSize('100%');
        $id_lista_sup->setSize('100%');
        $des_lista->setSize('100%');
        $iduser->setSize('100%');


        //$id_lista_sup->enableSearch();


        $idlista->addValidation('ID', new TRequiredValidator);
        $id_lista_sup->addValidation('Provincia', new TRequiredValidator);
        $des_lista->addValidation('Distrito', new TRequiredValidator);
        //$iduser->addValidation('Coodinador Distrital', new TRequiredValidator);


        $this->form->addFields([new TLabel('ID')], [$idlista]);
        $this->form->addFields([new TLabel('Provincia')], [$id_lista_sup]);
        $this->form->addFields([new TLabel('Distrito')], [$des_lista]);
        $this->form->addFields([new TLabel('Coodinador Distrital')], [$iduser]);




        if (!empty($idlista)) {
            $idlista->setEditable(FALSE);
        }
        
        $id_lista_sup->setEditable(FALSE);
        $des_lista->setEditable(FALSE);

        /** samples
        $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
        $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
        $fieldX->setSize( 100, 40 ); // set size
        **/

        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this,'onSave')), 'fa:floppy-o');
       // $new = $this->form->addAction(_t('New'),  new TAction(array($this,'onClear')), 'bs:plus-sign green');
        $list = $this->form->addAction(_t('List'), new TAction(array('ListaDistritos','onLoad')), 'bs:list');



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
            $data = $this->form->getData(); // get form data as array

            //$object = (empty($data->idlista)) ? new Lista : new Lista($data->idlista, true); // create an empty object

            if (empty($data->idlista))
            {
                $object = new Lista;
            }else
            {
                $object = new Lista($data->idlista, true);

                if ($object->id_coord_ciudad != $data->id_coord_ciudad)
                {
                    $ciudades_a_cargo = Lista::where('id_coord_ciudad', '=', $object->id_coord_ciudad)->count();
                    if ($ciudades_a_cargo <= 1)
                    {
                        SystemUserGroup::where('system_user_id', '=', $object->id_coord_ciudad)
                        ->where('system_group_id','=','5')
                        ->delete();
                    }

                    if (!empty($data->id_coord_ciudad))
                    {
                        $ciudades_a_cargo = Lista::where('id_coord_ciudad', '=', $data->id_coord_ciudad)->count();
                        if ($ciudades_a_cargo == 0)
                        {
                            SystemUserGroup::create(
                                [ 'system_group_id' => '5',
                                    'system_user_id' => $data->id_coord_ciudad]);
                        }
                    }
                }
            }
            
            //$object->fromArray( (array) $data); // load the object with data
            $object->id_coord_ciudad = $data->id_coord_ciudad;
            $object->store(); // save the object

            // get the generated idlista
            $data->idlista = $object->idlista;

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
                $object = new Lista($key); // instantiates the Active Record
                $object->id_lista_sup = $object->lista->des_lista;
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
