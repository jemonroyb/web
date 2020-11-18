<?php
/**
* ListaMesasLocal Listing
* @author  RenᮠDar�Gonzales Apaza
*/
class ListaMesasLocal extends TPage
{
    private $form; // form
    private $datagrid; // listing
    private $pageNavigation;
    private $formgrid;
    private $loaded;
    private $deleteButton;

    /**
    * Class constructor
    * Creates the page, the form and the listing
    */
    public function __construct()
    {
        parent::__construct();

        // creates the form
        $this->form = new TQuickForm('form_search_ViewMesaLocal');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormWrapper( new TQuickForm );
        $this->form->style = 'display: table;width:100%'; // change style
        $this->form->setFormTitle('Lista de mesas por local de votación');

        $criterio     = new TCriteria;
        $criterio->add(new TFilter('active','=','Y'));

        // define the fields
        $grupo        = new TEntry('grupo');
        $id_personero = new TDBUniqueSearch('id_personero','permission','SystemUser','id','name','name',$criterio);


        $this->form->addQuickField('Grupo De Votación', $grupo,  '100%' /*, new TRequiredValidator */);
        $this->form->addQuickField('Personero', $id_personero,  '100%' /*, new TRequiredValidator */);


        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue('ViewMesaLocal_filter_data') );

        // add the search form actions
        $this->form->addQuickAction(_t('Find'), new TAction(array($this,'onSearch')), 'fa:search');
        //$this->form->addQuickAction(_t('New'),  new TAction(array('FormMesaLocal','onEdit')), 'bs:plus-sign green');

        // creates a Datagrid
        $this->datagrid = new TDataGrid;
        $this->datagrid = new BootstrapDatagridWrapper( new TQuickGrid );
        $this->datagrid->style = 'width: 100%';
        // $this->datagrid->datatable = 'true';
        // $this->datagrid->makeScrollable();
        $this->datagrid->disableDefaultClick();
        // $this->datagrid->setGroupColumn('city', ' < b > City</b > : < i > {city}</i > ');
        // $this->datagrid->enablePopover('Popover', 'Hi < b > {name} </b > ');

        // define columns
        $column_idmesa         = new TDataGridColumn('idmesa', 'ID', 'left');
        $this->datagrid->addColumn($column_idmesa);
        $column_idlocal        = new TDataGridColumn('idlocal', 'IDlocal', 'left');
        $this->datagrid->addColumn($column_idlocal);
        $column_grupo          = new TDataGridColumn('grupo', 'Grupo de votación', 'left');
        $this->datagrid->addColumn($column_grupo);
        $column_name           = new TDataGridColumn('name', 'Personero', 'left');
        $this->datagrid->addColumn($column_name);
        $column_total_votantes = new TDataGridColumn('total_votantes', 'Total Votantes', 'right');
        $this->datagrid->addColumn($column_total_votantes);
        $column_estado         = new TDataGridColumn('estado', 'Estado', 'left');
        $this->datagrid->addColumn($column_estado);
        // define the transformer method over image
        $column_estado->setTransformer(
            function($value, $object, $row)
            {
                $div = new TElement('span');
                $info= 'danger';

                if ($value == 'Enviado') {
                    $info = 'success';
                }else
                {
                    $object->estado = 'No enviado';
                }

                $div->class = "label label-{$info}";
                $div->style = "text-shadow:none; font-size:12px";
                $div->add($object->estado);
                return $div;

            });

        // create EDIT action
        $action_edit = new TDataGridAction(array('FormMesa','onEdit'));
        $action_edit->setUseButton(TRUE);
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel('Asignar personero');
        $action_edit->setImage('fa:pencil-square-o blue fa-lg');
        $action_edit->setField('idmesa');
        //$this->datagrid->addAction($action_edit);



        // create DELETE action
        $action_del = new TDataGridAction(array($this,'onDelete'));
        $action_del->setUseButton(FALSE);
        $action_del->setButtonClass('btn btn-default');
        $action_del->setLabel(_t('Delete'));
        $action_del->setImage('fa:trash-o red fa-lg');
        $action_del->setField('idmesa');


        $this->datagrid->addAction($action_edit);
        $this->datagrid->addAction($action_del);

        // create the datagrid model
        $this->datagrid->createModel();

        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this,'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

        ##LIST_FORM_COLLECTION##

        $panel = new TPanelGroup('Lista de mesas por local de votación');
        $panel->add($this->form);
        $this->alertBox = new TElement('div');

        $dropdown = new TDropDown('Exportar', 'fa:print');

        $pdf      = new TAction(array($this,'onGenerate'));
        $csv = new TAction(array($this,'onGenerate'));
        $rtf = new TAction(array($this,'onGenerate'));
        $html = new TAction(array($this,'onGenerate'));

        $pdf->setParameter('output_type','pdf');
        $csv->setParameter('output_type','csv');
        $rtf->setParameter('output_type','rtf');
        $html->setParameter('output_type','html');

        $dropdown->addAction( 'Exportar a PDF', $pdf,'fa:file-pdf-o');
        $dropdown->addAction( 'Exportar a CSV', $csv,'fa:file-text-o');
        $dropdown->addAction( 'Exportar a RTF', $rtf,'fa:file-word-o');
        $dropdown->addAction( 'Exportar a HTML', $html,'fa:html5');

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->alertBox);
        $container->add($panel);
        // $container->add($dropdown);
        $container->add(TPanelGroup::pack('', $this->datagrid));
        $container->add($this->pageNavigation);

        parent::add($container);
    }


    public function onLoad()
    {

    }




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
            $object= new ViewMesaLocal($key); // instantiates the Active Record
            $object->
            {
                $field
            } = $value;
            //$object->store(); // update the object in the database
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
    * Register the filter in the session
    */
    public function onSearch()
    {
        // get the search form data
        $data    = $this->form->getData();

        // clear session filters
        // define the filter field
        $filters = array();
        TSession::setValue('ViewMesaLocal_filters',   array());
        TSession::setValue('ViewMesaLocal_grupo', '');
        TSession::setValue('ViewMesaLocal_id_personero', '');
        // check if the user has filled the form

        if ($data->grupo)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('grupo', 'Like', "%{$data->grupo}%");

            // stores the filter in the session
            TSession::setValue('ViewMesaLocal_grupo', $data->grupo);
            $filters[] = $filter;
        }

        if ($data->id_personero)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('id_personero', 'Like', "%{$data->id_personero}%");

            // stores the filter in the session
            TSession::setValue('ViewMesaLocal_id_personero', $data->id_personero);
            $filters[] = $filter;
        }


        // fill the form with data again
        $this->form->setData($data);
        TSession::setValue('ViewMesaLocal_filter_data', $data);

        // keep the search data in the session
        TSession::setValue('ViewMesaLocal_filters_data', $filters);

        $param = array();
        $param['offset'] = 0;
        $param['first_page'] = 1;
        $this->onReload($param);
    }

    /**
    * method onGenerate()
    * Executed whenever the user clicks at the generate button
    */
    public function onGenerate($param = null)
    {
        try
        {
            // open a transaction with database 'database'
            TTransaction::open('database');

            // get the form data into an active record ViewMesaLocal
            $formdata   = $this->form->getData();

            $repository = new TRepository('ViewMesaLocal');
            $criteria   = new TCriteria;

            if (TSession::getValue('ViewMesaLocal_filters_data'))
            {
                foreach (TSession::getValue('ViewMesaLocal_filters_data') as $filter)
                {
                    if ($filter instanceof TFilter)
                    {
                        // add the filter stored in the session to the criteria
                        $criteria->add($filter);
                    }
                }
            }

            ##FILTERS##

            $objects = $repository->load($criteria);
            $format  = (isset($param['output_type']))?$param['output_type']:'pdf';

            if ($objects)
            {
                $widths = array(100,100,100,100,100,100);

                switch ($format)
                {
                    case 'html':
                    $tr = new TTableWriterHTML($widths);
                    break;
                    case 'pdf':
                    $tr = new TTableWriterPDF($widths);
                    break;
                    case 'rtf':
                    if (!class_exists('PHPRtfLite_Autoloader'))
                    {
                        PHPRtfLite::registerAutoloader();
                    }
                    $tr = new TTableWriterRTF($widths);
                    break;
                    case 'csv':
                    $tr = new TTableWriterCSV(',');
                    break;

                }

                if (!empty($tr))
                {
                    // create the document styles
                    $tr->addStyle('title', 'Arial', '10', 'B',   '#ffffff', '#9898EA');
                    $tr->addStyle('datap', 'Arial', '10', '',    '#000000', '#EEEEEE');
                    $tr->addStyle('datai', 'Arial', '10', '',    '#000000', '#ffffff');
                    $tr->addStyle('header', 'Arial', '16', '',   '#ffffff', '#494D90');
                    $tr->addStyle('footer', 'Times', '10', 'I',  '#000000', '#B1B1EA');
                    // add a header row
                    $tr->addRow();
                    $tr->addCell('ViewMesaLocal', 'center', 'header', 5);

                    // add titles row
                    $tr->addRow();
                    $tr->addCell('idmesa',      'left', 'title');
                    $tr->addCell('idlocal',      'left', 'title');
                    $tr->addCell('grupo',      'left', 'title');
                    $tr->addCell('name',      'left', 'title');
                    $tr->addCell('total_votantes',      'right', 'title');
                    $tr->addCell('estado',      'left', 'title');

                    // controls the background filling
                    $colour = FALSE;

                    // data rows
                    foreach ($objects as $object)
                    {
                        $style = $colour ? 'datap' : 'datai';
                        $tr->addRow();
                        $tr->addCell($object->idmesa,'left', $style);
                        $tr->addCell($object->idlocal,'left', $style);
                        $tr->addCell($object->grupo,'left', $style);
                        $tr->addCell($object->name,'left', $style);
                        $tr->addCell($object->total_votantes,'right', $style);
                        $tr->addCell($object->estado,'left', $style);


                        $colour= !$colour;
                    }

                    // footer row
                    $tr->addRow();
                    $tr->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 5);
                    // stores the file
                    if (!file_exists("app/output/tabular.{$format}") OR is_writable("app/output/tabular.{$format}"))
                    {
                        $tr->save("app/output/tabular.{$format}");
                    }
                    else
                    {
                        throw new Exception(_t('Permission denied') . ': ' . "app/output/tabular.{$format}");
                    }

                    parent::openFile("app/output/tabular.{$format}");

                    // shows the success message
                    new TMessage('info', 'Report generated. Please, enable popups in the browser (just in the web).');
                }
            }
            else
            {
                new TMessage('error', 'No records found');
            }

            // fill the form with the active record data
            $this->form->setData(TSession::getValue('ViewMesaLocal_filter_data'));

            // close the transaction
            TTransaction::close();
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
    * Load the datagrid with data
    */
    public function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'database'
            TTransaction::open('database');

            // creates a repository for ViewMesaLocal
            $repository = new TRepository('ViewMesaLocal');
            $limit      = 200;
            // creates a criteria
            $criteria   = new TCriteria;

            // default order
            if (empty($param['order']))
            {
                $param['order'] = 'idmesa';
                $param['direction'] = 'asc';
            }
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);


            if (TSession::getValue('ViewMesaLocal_filters_data'))
            {
                foreach (TSession::getValue('ViewMesaLocal_filters_data') as $filter)
                {
                    if ($filter instanceof TFilter)
                    {
                        // add the filter stored in the session to the criteria
                        $criteria->add($filter);
                    }
                }
            }


            $criteria->add(new TFilter('id_coord_local','=',TSession::getValue('userid')));



            // load the objects according to criteria
            $objects = $repository->load($criteria, FALSE);

            if (is_callable($this->transformCallback))
            {
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
            new TMessage('error', $e->getMessage());
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
        new TQuestion('¿Deseas eliminar al personero de la mesa de votación?', $action);


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
            $object = new Mesa($key, FALSE); // instantiates the Active Record

            if ($object->local->id_coord_local != TSession::getValue('userid'))
            {
                throw new Exception('No estas autorizado en este local');
            }

            $mesas_asignadas_actual = Mesa::where('id_personero', '=', $object->id_personero)->count();

            if ($mesas_asignadas_actual <= 1)
            {
                SystemUserGroup::where('system_user_id', '=', $object->id_personero)
                ->where('system_group_id','=','4')
                ->delete();
            }

            $object->id_personero = '';
            $object->store(); // deletes the object from the database


            TTransaction::close(); // close the transaction
            $this->onReload( $param ); // reload the listing
            new TMessage('info', 'El personero ha sido eliminado'); // success message
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
    * method show()
    * Shows the page
    */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded AND (!isset($_GET['method']) OR !(in_array($_GET['method'],  array('onReload', 'onSearch')))) )
        {
            if (func_num_args() > 0)
            {
                $this->onReload( func_get_arg(0) );
            }
            else
            {
                $this->onReload();
            }
        }
        parent::show();
    }
}
