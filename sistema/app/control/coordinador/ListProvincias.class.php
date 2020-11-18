<?php
/**
* ListProvincias Form List
* @author  Renán Darío Gonzales Apaza
*/
class ListProvincias extends TPage
{
    protected $form; // form
    private $datagrid; // listing
    private $pageNavigation;
    private $formgrid;
    private $loaded;
    private $deleteButton;

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
        $this->form->setFormTitle('Lista de provincias');
        //$this->form->setFieldsByRow(1);


        $criterio     = new TCriteria;
        $criterio->add(new TFilter('grupo_lista','=','DEPARTAMENTO'));
        // define the fields
        $idlista      = new TEntry('idlista');
        $id_lista_sup = new TDBCombo('id_lista_sup','database','Lista','idlista','des_lista','des_lista',$criterio);
        $des_lista    = new TEntry('des_lista');

$id_lista_sup->enableSearch();

        $idlista->setSize('100%');
        $id_lista_sup->setSize('100%');
        $des_lista->setSize('100%');


        $des_lista->setSize('100%');
        $id_lista_sup->addValidation('Departamento', new TRequiredValidator);
        $des_lista->addValidation('Provincia', new TRequiredValidator);


        $this->form->addFields([new TLabel('ID')], [$idlista]);
        $this->form->addFields([new TLabel('Departamento')], [$id_lista_sup]);
        $this->form->addFields([new TLabel('Provincia')], [$des_lista]);




        if (!empty($idlista))
        {
            $idlista->setEditable(FALSE);
        }
        /** samples
        $this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
        $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
        $fieldX->setSize( 100, 40 ); // set size
        **/

        // create the form actions
        $save = $this->form->addAction(_t('Save'), new TAction(array($this,'onSave')), 'fa:floppy-o');
        $new = $this->form->addAction(_t('New'),  new TAction(array($this,'onClear')), 'bs:plus-sign green');
        //$list = $this->form->addAction(_t('List'),  new TAction(array($this, 'onLoad')), 'bs:plus - sign green');

        // creates a Datagrid
        $this->datagrid = new TDataGrid;
        $this->datagrid = new BootstrapDatagridWrapper( new TQuickGrid );
        $this->datagrid->style = 'width: 100%';
        // $this->datagrid->datatable = 'true';
        // $this->datagrid->makeScrollable();
        // $this->datagrid->disableDefaultClick();
        // $this->datagrid->setGroupColumn('city', ' < b > City</b > : < i > {city}</i > ');
        // $this->datagrid->enablePopover('Popover', 'Hi < b > {name} </b > ');

        // define columns
        $column_idlista = new TDataGridColumn('idlista', 'ID', 'left');
        $this->datagrid->addColumn($column_idlista);
        $order_idlista  = new TAction(array($this,'onReload'));
        $order_idlista->setParameter('order', 'idlista');##PARAMETERS##
        $column_idlista->setAction($order_idlista);

        $column_id_lista_sup = new TDataGridColumn('lista->des_lista', 'Departamento', 'left');
        $this->datagrid->addColumn($column_id_lista_sup);
        $column_des_lista    = new TDataGridColumn('des_lista', 'Provincia', 'left');
        $this->datagrid->addColumn($column_des_lista);
        $order_des_lista     = new TAction(array($this,'onReload'));
        $order_des_lista->setParameter('order', 'des_lista');##PARAMETERS##
        $column_des_lista->setAction($order_des_lista);

        $des_lista_edit = new TDataGridAction(array($this,'onInlineEdit'));
        $des_lista_edit->setField('idlista');##PARAMETERS##
        $column_des_lista->setEditAction($des_lista_edit);



        // creates two datagrid actions
        $action_edit = new TDataGridAction(array($this,'onEdit'));
        $action_edit->setUseButton(FALSE);
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel(_t('Edit'));
        $action_edit->setImage('fa:pencil-square-o blue fa-lg');
        $action_edit->setField('idlista');



        // create DELETE action
        $action_del = new TDataGridAction(array($this,'onDelete'));
        $action_del->setUseButton(FALSE);
        $action_del->setButtonClass('btn btn-default');
        $action_del->setLabel(_t('Delete'));
        $action_del->setImage('fa:trash-o red fa-lg');
        $action_del->setField('idlista');



        $this->datagrid->addAction($action_edit);
        $this->datagrid->addAction($action_del);

        // create the datagrid model
        $this->datagrid->createModel();

        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this,'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

        ##LIST_FORM_COLLECTION##

        ##BOOTSTRAP##

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add(TPanelGroup::pack('', $this->datagrid));
        $container->add($this->pageNavigation);

        parent::add($container);
    }




    /**
    * Load the datagrid with data
    */
    public function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'votacion'
            TTransaction::open('database');

            // creates a repository for Lista
            $repository = new TRepository('Lista');
            $limit      = 10;
            // creates a criteria
            $criteria   = new TCriteria;

            // default order
            if (empty($param['order']))
            {
                $param['order'] = 'idlista';
                $param['direction'] = 'asc';
            }
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);

            if (TSession::getValue('Lista_filter'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('Lista_filter'));
            }
            
            $criteria->add(new TFilter('grupo_lista','=','PROVINCIA'));

            // load the objects according to criteria
            $objects = $repository->load($criteria, FALSE);

            if (is_callable($this->transformCallback)) {
                call_user_func($this->transformCallback, $objects, $param);
            }

            $this->datagrid->clear();
            if ($objects)
            {
                // iterate the collection of active records
                foreach ($objects as $object)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }

            // reset the criteria for record count
            $criteria->resetProperties();
            $count = $repository->count($criteria);

            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit

            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());

            // undo all pending operations
            TTransaction::rollback();
        }
    }

    /**
    * Ask before deletion
    */
    public function onDelete($param)
    {
        // define the delete action
        $action = new TAction(array($this,'Delete'));
        $action->setParameters($param); // pass the key parameter ahead

        // shows a dialog to the user
        new TQuestion(TAdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
    }

    /**
    * Delete a record
    */
    public function Delete($param)
    {
        try
        {
            $key    = $param['key']; // get the parameter $key
            TTransaction::open('database'); // open a transaction with database
            $object = new Lista($key, FALSE); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            $this->onReload( $param ); // reload the listing
            new TMessage('info', TAdiantiCoreTranslator::translate('Record deleted')); // success message
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
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

            $object = (empty($data->idgrupo)) ? new Lista : new Lista($data->idlista, true); // create an empty object
            $object->fromArray( (array) $data); // load the object with data
            $object->grupo_lista='PROVINCIA';
            $object->store(); // save the object

            // get the generated idlista
            $data->idlista = $object->idlista;

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved')); // success message
            $this->onReload(); // reload the listing
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
            if (isset($param['key']))
            {
                $key    = $param['key'];  // get the parameter $key
                TTransaction::open('database'); // open a transaction
                $object = new Lista($key); // instantiates the Active Record
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

    ##LIST_DELETE_COLLECTION##

    ##LIST_FORMAT_CHECK##

    /**
    * Inline record editing
    * @param $param Array containing:
    *              key: object ID value
    *              field name: object attribute to be updated
    *              value: new attribute content
    */
    public function onInlineEdit($param)
    {
        try
        {
            // get the parameter $key
            $field = $param['field'];
            $key   = $param['key'];
            $value = $param['value'];

            TTransaction::open('database'); // open a transaction with database
            $object= new Lista($key); // instantiates the Active Record
            $object->
            {
                $field
            } = $value;
            $object->store(); // update the object in the database
            TTransaction::close(); // close the transaction

            $this->onReload($param); // reload the listing
            new TMessage('info', "Record Updated");
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
    * method show()
    * Shows the page
    */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded AND (!isset($_GET['method']) OR $_GET['method'] !== 'onReload') )
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
