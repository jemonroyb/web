<?php
/**
* ListaPersoneroMesas Listing
* @author  RenᮠDar�Gonzales Apaza
*/
class ListaPersoneroMesas extends TPage
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
        $this->form = new TQuickForm('form_search_ViewPersoneroMesa');
        $this->form->class = 'tform'; // change CSS class
        $this->form = new BootstrapFormWrapper( new TQuickForm );
        $this->form->style = 'display: table;width:100%'; // change style
        $this->form->setFormTitle('Mesas asignadas');

        $criterio    = new TCriteria;
        $criterio->add(new TFilter('grupo_lista','=','DISTRITO'));
        // define the fields
        $id_distrito = new TDBCombo('id_distrito','database','Lista','idlista','des_lista','des_lista',$criterio);


        $this->form->addQuickField('Distrito', $id_distrito,  '100%' /*, new TRequiredValidator */);


        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue('ViewPersoneroMesa_filter_data') );

        // add the search form actions
        $this->form->addQuickAction(_t('Find'), new TAction(array($this,'onSearch')), 'fa:search');
        $this->form->addQuickAction(_t('New'),  new TAction(array('FormMesa','onEdit')), 'bs:plus-sign green');

        // creates a Datagrid
        $this->datagrid = new TDataGrid;
        $this->datagrid = new BootstrapDatagridWrapper( new TQuickGrid );
        $this->datagrid->style = 'width: 100%';
        //$this->datagrid->datatable = 'true';
        // $this->datagrid->makeScrollable();
        $this->datagrid->disableDefaultClick();
       // $this->datagrid->setGroupColumn('idlocal', ' <b> Local</b> : <i> {nombre_local} -  {distrito} </i > ');
        // $this->datagrid->enablePopover('Popover', 'Hi < b > {name} </b > ');

        // define columns
        $column_idmesa = new TDataGridColumn('idmesa', 'ID', 'left');
        $this->datagrid->addColumn($column_idmesa);
        $order_idmesa  = new TAction(array($this,'onReload'));
        $order_idmesa->setParameter('order', 'idmesa');##PARAMETERS##
        $column_idmesa->setAction($order_idmesa);

        $column_grupo           = new TDataGridColumn('grupo', 'Grupo', 'left');
        $this->datagrid->addColumn($column_grupo);
        $column_nombre_local    = new TDataGridColumn('nombre_local', 'Local', 'left');
        $this->datagrid->addColumn($column_nombre_local);
        $column_distrito        = new TDataGridColumn('distrito', 'Distrito', 'left');
        $this->datagrid->addColumn($column_distrito);
        $column_total_region    = new TDataGridColumn('total_region', 'Región', 'center');
        $this->datagrid->addColumn($column_total_region);
        $column_total_consejero = new TDataGridColumn('total_consejero', 'Consejero', 'center');
        $this->datagrid->addColumn($column_total_consejero);
        $column_total_provincia = new TDataGridColumn('total_provincia', 'Provincial', 'center');
        $this->datagrid->addColumn($column_total_provincia);
        $column_total_distrito  = new TDataGridColumn('total_distrito', 'Distrital', 'center');
        $this->datagrid->addColumn($column_total_distrito);
        
        
        /*
        
        $column_voto_valido     = new TDataGridColumn('voto_valido', 'Valido', 'center');
        $this->datagrid->addColumn($column_voto_valido);
        $column_voto_blanco     = new TDataGridColumn('voto_blanco', 'Blanco', 'center');
        $this->datagrid->addColumn($column_voto_blanco);
        $column_voto_nulo       = new TDataGridColumn('voto_nulo', 'Nulo', 'center');
        $this->datagrid->addColumn($column_voto_nulo);
        $column_voto_impugnado       = new TDataGridColumn('voto_impugnado', 'Impugados', 'center');
        $this->datagrid->addColumn($column_voto_impugnado);
        
        */
        
        $column_mesa_observada       = new TDataGridColumn('mesa_impugnada', 'Mesa Observada', 'center');
        $this->datagrid->addColumn($column_mesa_observada);
        
        
        
        
        $column_total_votantes  = new TDataGridColumn('total_votantes', 'Total', 'center');
        //$this->datagrid->addColumn($column_total_votantes);
        $column_estado          = new TDataGridColumn('estado', 'Estado', 'right');
        $this->datagrid->addColumn($column_estado);
        $order_estado           = new TAction(array($this,'onReload'));
        $order_estado->setParameter('order', 'estado');##PARAMETERS##
        $column_estado->setAction($order_estado);

        // define the transformer method over image
        $column_estado->setTransformer(
            function($value, $object, $row)
            {
                $div = new TElement('span');
                $info= 'danger';

                if ($value == 'Enviado')
                {
                    $info = 'success';
                }else{
					$object->estado='No enviado';
				}

                $div->class = "label label-{$info}";
                $div->style = "text-shadow:none; font-size:12px";
                $div->add($object->estado);
                return $div;

            });


        // create EDIT action
        $action_edit = new TDataGridAction(array('FormActualizacionMesa','onEdit'));
        $action_edit->setUseButton(FALSE);
        $action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel('Enviar');
        $action_edit->setImage('fa:pencil-square-o blue fa-lg');
        $action_edit->setField('idmesa');
        $action_edit->setDisplayCondition( array($this, 'displayEnvio') );
        //$this->datagrid->addAction($action_edit);



        ##LIST_DELETE_ACTION##

        $this->datagrid->addAction($action_edit);


        // create the datagrid model
        $this->datagrid->createModel();

        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this,'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

        ##LIST_FORM_COLLECTION##


        $action = new TAction(array('RegistroNuevaMesa','onEdit'));
        $button = new TButton('asb');
        $button->setAction($action, 'dasdsa');
        $button->setLabel('Envio de registro de nueva mesa');
        $button->setImage('fa:circle-o blue fa-lg');
        
        

        $form   = new TForm('form');
        $form->add($button);
        $form->setFields(array($button));



        $opciones = new TPanelGroup('Opciones');
        $opciones->add($form);

        $panel    = new TVBox;
        //$panel->add($form);
        $panel->add($this->datagrid);
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
        //$container->add($panel);
        
        $panel2 = new TPanelGroup('');
        $panel2->add($this->datagrid);
        $panel2->getBody()->style = "overflow-x:auto;";
        
        
        //$container->add(TPanelGroup::pack('Mesas asignadas', $panel,$this->pageNavigation));
        $container->add($panel2);
        $container->add($this->pageNavigation);


        parent::add($container);
    }
    
    /**
     * Define when the action can be displayed
     */
    public function displayEnvio( $object )
    {
        if ($object->estado!='Enviado' || $object->mesa->local->id_coord_local==TSession::getValue('userid'))
        {
            return TRUE;
        }
        return FALSE;
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
            $object= new ViewPersoneroMesa($key); // instantiates the Active Record
            $object->
            {
                $field
            } = $value;
            //  $object->store(); // update the object in the database
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
        TSession::setValue('ViewPersoneroMesa_filters',   array());
        TSession::setValue('ViewPersoneroMesa_id_distrito', '');
        // check if the user has filled the form

        if ($data->id_distrito)
        {
            // creates a filter using what the user has typed
            $filter = new TFilter('id_distrito', 'Like', "%{$data->id_distrito}%");

            // stores the filter in the session
            TSession::setValue('ViewPersoneroMesa_id_distrito', $data->id_distrito);
            $filters[] = $filter;
        }


        // fill the form with data again
        $this->form->setData($data);
        TSession::setValue('ViewPersoneroMesa_filter_data', $data);

        // keep the search data in the session
        TSession::setValue('ViewPersoneroMesa_filters_data', $filters);

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

            // get the form data into an active record ViewPersoneroMesa
            $formdata   = $this->form->getData();

            $repository = new TRepository('ViewPersoneroMesa');
            $criteria   = new TCriteria;

            if (TSession::getValue('ViewPersoneroMesa_filters_data'))
            {
                foreach (TSession::getValue('ViewPersoneroMesa_filters_data') as $filter)
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
                $widths = array(100,100,100,100,100,100,100,100,100,100,100,100,100);

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
                    $tr->addCell('ViewPersoneroMesa', 'center', 'header', 5);

                    // add titles row
                    $tr->addRow();
                    $tr->addCell('idmesa',      'left', 'title');
                    $tr->addCell('grupo',      'left', 'title');
                    $tr->addCell('nombre_local',      'left', 'title');
                    $tr->addCell('distrito',      'left', 'title');
                    $tr->addCell('total_region',      'center', 'title');
                    $tr->addCell('total_consejero',      'center', 'title');
                    $tr->addCell('total_provincia',      'center', 'title');
                    $tr->addCell('total_distrito',      'center', 'title');
                    $tr->addCell('voto_valido',      'center', 'title');
                    $tr->addCell('voto_blanco',      'center', 'title');
                    $tr->addCell('voto_nulo',      'center', 'title');
                    $tr->addCell('total_votantes',      'center', 'title');
                    $tr->addCell('estado',      'right', 'title');

                    // controls the background filling
                    $colour = FALSE;

                    // data rows
                    foreach ($objects as $object)
                    {
                        $style = $colour ? 'datap' : 'datai';
                        $tr->addRow();
                        $tr->addCell($object->idmesa,'left', $style);
                        $tr->addCell($object->grupo,'left', $style);
                        $tr->addCell($object->nombre_local,'left', $style);
                        $tr->addCell($object->distrito,'left', $style);
                        $tr->addCell($object->total_region,'center', $style);
                        $tr->addCell($object->total_consejero,'center', $style);
                        $tr->addCell($object->total_provincia,'center', $style);
                        $tr->addCell($object->total_distrito,'center', $style);
                        $tr->addCell($object->voto_valido,'center', $style);
                        $tr->addCell($object->voto_blanco,'center', $style);
                        $tr->addCell($object->voto_nulo,'center', $style);
                        $tr->addCell($object->total_votantes,'center', $style);
                        $tr->addCell($object->estado,'right', $style);


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
            $this->form->setData(TSession::getValue('ViewPersoneroMesa_filter_data'));

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

            // creates a repository for ViewPersoneroMesa
            $repository = new TRepository('ViewPersoneroMesa');
            $limit      = 10;
            // creates a criteria
            $criteria   = new TCriteria;

            // default order
            if (empty($param['order']))
            {
                $param['order'] = 'estado';
                $param['direction'] = 'asc';
            }
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);


            if (TSession::getValue('ViewPersoneroMesa_filters_data'))
            {
                foreach (TSession::getValue('ViewPersoneroMesa_filters_data') as $filter)
                {
                    if ($filter instanceof TFilter)
                    {
                        // add the filter stored in the session to the criteria
                        $criteria->add($filter);
                    }
                }
            }


            $criteria->add(new TFilter('id_personero','=',TSession::getValue('userid')),TExpression::OR_OPERATOR);
            $criteria->add(new TFilter('id_coord_local','=',TSession::getValue('userid')),TExpression::OR_OPERATOR);


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

    public function onLoad($param)
    {

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
        new TQuestion(AdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
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
            $object = new ViewPersoneroMesa($key, FALSE); // instantiates the Active Record
            //$object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            $this->onReload( $param ); // reload the listing
            new TMessage('info', AdiantiCoreTranslator::translate('Record deleted')); // success message
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
