<?php
/**
* EstadisticaRegional Listing
* @author  Renán Darío Gonzales Apaza
*/
class EstadisticaRegional extends TPage
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
		$this->form = new TQuickForm('form_search_ViewLocal');
		$this->form->class = 'tform'; // change CSS class
		$this->form = new BootstrapFormBuilder( 'form_search_ViewLocal' );
		$this->form->style = 'display: table;width:100%'; // change style
		$this->form->setFormTitle('Lista de locales');

		$criterio1       = new TCriteria;
		$criterio1->add(new TFilter('grupo_lista','=','DEPARTAMENTO'));

		$criterio2       = new TCriteria;
		$criterio2->add(new TFilter('grupo_lista','=','PROVINCIA'));

		$criterio3       = new TCriteria;
		$criterio3->add(new TFilter('grupo_lista','=','DISTRITO'));

		// define the fields
		$id_departamento = new TDBCombo('id_departamento','database','Lista','idlista','des_lista','des_lista',$criterio1);
		$id_provincia    = new TDBCombo('id_provincia','database','Lista','idlista','des_lista','des_lista',$criterio2);
		$id_distrito     = new TDBCombo('id_distrito','database','Lista','idlista','des_lista','des_lista',$criterio3);
		$id_local        = new TEntry('id_local');
		$nombre          = new TEntry('nombre');
		$direccion       = new TEntry('direccion');

		$id_departamento->enableSearch();
		$id_provincia->enableSearch();
		$id_distrito->enableSearch();


		$id_departamento->setSize('100%');
		$id_provincia->setSize('100%');
		$id_distrito->setSize('100%');
		$id_local->setSize('100%');
		$nombre->setSize('100%');
		$direccion->setSize('100%');


		$this->form->addFields([new TLabel('Departamento')], [$id_departamento],[new TLabel('Provincia')], [$id_provincia],[new TLabel('Distrito')], [$id_distrito]);

		$this->form->addFields([new TLabel('ID Local')], [$id_local]);
		$this->form->addFields([new TLabel('Nombre')], [$nombre]);
		$this->form->addFields([new TLabel('Direccion')], [$direccion]);


		// keep the form filled during navigation with session data
		$this->form->setData( TSession::getValue('ViewLocal_filter_data') );


		// add the search form actions
		$this->form->addAction(_t('Find'), new TAction(array($this,'onSearch')), 'fa:search');
		$this->form->addAction(_t('New'),  new TAction(array('FormLocal','onEdit')), 'bs:plus-sign green');

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

		$column_departamento = new TDataGridColumn('id_departamento', 'ID', 'left');
		$this->datagrid->addColumn($column_departamento);


		$column_provincia    = new TDataGridColumn('departamento', 'Departamento', 'left');
		$this->datagrid->addColumn($column_provincia);


		$column_distrito     = new TDataGridColumn('total', 'Total', 'right');
		$this->datagrid->addColumn($column_distrito);




		// create EDIT action
		$action_edit         = new TDataGridAction(array($this,'onShowDetail'));
		$action_edit->setUseButton(FALSE);
		$action_edit->setButtonClass('btn btn-default');
		$action_edit->setLabel('Detalle');
		$action_edit->setImage('ico_view.png');
		$action_edit->setField('id_departamento');
		//$this->datagrid->addAction($action_edit);



		$this->datagrid->addAction($action_edit);

		// create the datagrid model
		$this->datagrid->createModel();

		// creates the page navigation
		$this->pageNavigation = new TPageNavigation;
		$this->pageNavigation->setAction(new TAction(array($this,'onReload')));
		$this->pageNavigation->setWidth($this->datagrid->getWidth());

		//$this->datagrid->disableDefaultClick();

		// put datagrid inside a form
		$this->formgrid = new TForm('form_del');
		$this->formgrid->add($this->datagrid);

		// creates the delete collection button
		$this->deleteButton = new TButton('delete_collection');
		$this->deleteButton->setAction(new TAction(array($this,'onDeleteCollection')), AdiantiCoreTranslator::translate('Delete selected'));
		$this->deleteButton->setImage('fa:remove red');
		$this->formgrid->addField($this->deleteButton);

		$gridpack = new TVBox;
		$gridpack->style = 'width: 100%';
		$gridpack->add($this->formgrid);
		//$gridpack->add($this->deleteButton)->style = 'background:whiteSmoke;border:1px solid #cccccc; padding: 3px;padding: 5px;';

		$this->transformCallback = array($this,'onBeforeLoad');

		/*
		$panel = new TPanelGroup('Lista de locales');
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
		$dropdown->addAction( 'Exportar a HTML', $html,'fa:html5');*/

		// vertical box container
		$container = new TVBox;
		$container->style = 'width: 100%';
		// $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
		$container->add($this->alertBox);
		//$container->add($this->form);
		//$container->add($dropdown);
		$container->add(TPanelGroup::pack('Votos para presidente regional', $gridpack));
		$container->add($this->pageNavigation);

		parent::add($container);
	}

	public function onLoad( $param )
	{

	}


	/**
	* Show record detail
	*/
	public function onShowDetail( $param )
	{


		try
		{
			// open a transaction with database 'database'
			TTransaction::open('database');
			$conn        = TTransaction::get(); // obtém a conexão


			// get row position
			$pos         = $this->datagrid->getRowIndex('id_departamento', $param['key']);

			// get row by position
			$current_row = $this->datagrid->getRow($pos);
			$current_row->style = "background-color: #8D8BC8; color:white; text-shadow:none";

			// create a new row
			$row = new TTableRow;
			$row->style = "background-color: #E0DEF8";
			$row->addCell('');


			$datagrid = new TDataGrid;
			$datagrid = new BootstrapDatagridWrapper( new TQuickGrid );
			$datagrid->style = 'width: 100%';
			$datagrid->disableDefaultClick();

			// define columns

			$column_departamento = new TDataGridColumn('id_distrito', 'ID', 'left');
			$datagrid->addColumn($column_departamento);


			$column_provincia    = new TDataGridColumn('distrito', 'Distrito (votos para presidente regional)', 'left');
			$datagrid->addColumn($column_provincia);


			$column_distrito     = new TDataGridColumn('total', 'Total', 'right');
			$datagrid->addColumn($column_distrito);

			// create the datagrid model
			$datagrid->createModel();


			$sth                 = $conn->prepare('SELECT
				locales.id_distrito,
				dist.des_lista AS distrito,
				Sum(mesas.total_region) AS total
				FROM
				mesas
				LEFT JOIN locales ON mesas.id_local = locales.idlocal
				INNER JOIN listas AS dist ON dist.idlista = locales.id_distrito
				WHERE
				locales.id_distrito IS NOT NULL
				GROUP BY
				locales.id_distrito
				ORDER BY
				total DESC
				');

			$sth->execute();
			$result              = $sth->fetchAll(PDO::FETCH_OBJ);

			$datagrid->clear();
			if($result)
			{

				// exibe os resultados
				foreach($result as $object){
					// add the object inside the datagrid
					$datagrid->addItem($object);
				}
			}

			$cell = $row->addCell($datagrid);
			$cell->colspan = 3;
			$cell->style = 'padding:10px;';

			// insert the new row
			$this->datagrid->insert($pos + 1, $row);






			TTransaction::close();
		}
		catch(Exception $e) // in case of exception
		{
			// shows the exception error message
			new TMessage('error', $e->getMessage());
			// undo all pending operations
			TTransaction::rollback();
		}




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
			$object= new ViewLocal($key); // instantiates the Active Record
			$object->
			{
				$field
			} = $value;
			$object->store(); // update the object in the database
			TTransaction::close(); // close the transaction

			$this->onReload($param); // reload the listing
			new TMessage('info', "Record Updated");
		}
		catch(Exception $e) // in case of exception
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
		TSession::setValue('ViewLocal_filters',   array());
		TSession::setValue('ViewLocal_id_departamento', '');
		TSession::setValue('ViewLocal_id_provincia', '');
		TSession::setValue('ViewLocal_id_distrito', '');
		TSession::setValue('ViewLocal_id_local', '');
		TSession::setValue('ViewLocal_nombre', '');
		TSession::setValue('ViewLocal_direccion', '');
		// check if the user has filled the form

		if($data->id_departamento)
		{
			// creates a filter using what the user has typed
			$filter = new TFilter('id_departamento', '=', "{$data->id_departamento}");

			// stores the filter in the session
			TSession::setValue('ViewLocal_id_departamento', $data->id_departamento);
			$filters[] = $filter;
		}

		if($data->id_provincia)
		{
			// creates a filter using what the user has typed
			$filter = new TFilter('id_provincia', '=', "{$data->id_provincia}");

			// stores the filter in the session
			TSession::setValue('ViewLocal_id_provincia', $data->id_provincia);
			$filters[] = $filter;
		}

		if($data->id_distrito)
		{
			// creates a filter using what the user has typed
			$filter = new TFilter('id_distrito', '=', "{$data->id_distrito}");

			// stores the filter in the session
			TSession::setValue('ViewLocal_id_distrito', $data->id_distrito);
			$filters[] = $filter;
		}

		if($data->id_local)
		{
			// creates a filter using what the user has typed
			$filter = new TFilter('id_local', 'Like', "%{$data->id_local}%");

			// stores the filter in the session
			TSession::setValue('ViewLocal_id_local', $data->id_local);
			$filters[] = $filter;
		}

		if($data->nombre)
		{
			// creates a filter using what the user has typed
			$filter = new TFilter('nombre', 'Like', "%{$data->nombre}%");

			// stores the filter in the session
			TSession::setValue('ViewLocal_nombre', $data->nombre);
			$filters[] = $filter;
		}

		if($data->direccion)
		{
			// creates a filter using what the user has typed
			$filter = new TFilter('direccion', 'Like', "%{$data->direccion}%");

			// stores the filter in the session
			TSession::setValue('ViewLocal_direccion', $data->direccion);
			$filters[] = $filter;
		}


		// fill the form with data again
		$this->form->setData($data);
		TSession::setValue('ViewLocal_filter_data', $data);

		// keep the search data in the session
		TSession::setValue('ViewLocal_filters_data', $filters);

		$param = array();
		$param['offset'] = 0;
		$param['first_page'] = 1;
		$this->onReload($param);
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


			$conn   = TTransaction::get(); // obtém a conexão

			$sth    = $conn->prepare('
				SELECT
				locales.id_departamento,
				dep.des_lista AS departamento,
				Sum(mesas.total_region) AS total
				FROM
				mesas
				LEFT JOIN locales ON mesas.id_local = locales.idlocal
				INNER JOIN listas AS dep ON dep.idlista = locales.id_departamento
				WHERE
				locales.id_distrito IS NOT NULL
				GROUP BY
				locales.id_departamento
				');

			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_OBJ);




			$this->datagrid->clear();
			if($result)
			{
				// exibe os resultados
				foreach($result as $object){
					// add the object inside the datagrid
					$this->datagrid->addItem($object);
				}
			}

			// reset the criteria for record count
			// $criteria->resetProperties();
			// $count = $repository->count($criteria);

			//  $this->pageNavigation->setCount($count); // count of records
			// $this->pageNavigation->setProperties($param); // order, page
			// $this->pageNavigation->setLimit($limit); // limit

			// close the transaction
			TTransaction::close();
			$this->loaded = true;
		}
		catch(Exception $e) // in case of exception
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
			$object = new Local($key, FALSE); // instantiates the Active Record
			$object->delete(); // deletes the object from the database
			TTransaction::close(); // close the transaction
			$this->onReload( $param ); // reload the listing
			new TMessage('info', AdiantiCoreTranslator::translate('Record deleted')); // success message
		}
		catch(Exception $e) // in case of exception
		{
			new TMessage('error', $e->getMessage()); // shows the exception error message
			TTransaction::rollback(); // undo all pending operations
		}
	}

	/**
	* Ask before delete record collection
	*/
	public function onDeleteCollection( $param )
	{
		$data = $this->formgrid->getData(); // get selected records from datagrid
		$this->formgrid->setData($data); // keep form filled

		if($data)
		{
			$selected = array();

			// get the record id's
			foreach($data as $index => $check)
			{
				if($check == 'on')
				{
					$selected[] = substr($index,5);
				}
			}

			if($selected)
			{
				// encode record id's as json
				$param['selected'] = json_encode($selected);

				// define the delete action
				$action = new TAction(array($this,'deleteCollection'));
				$action->setParameters($param); // pass the key parameter ahead

				// shows a dialog to the user
				new TQuestion(AdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
			}
		}
	}

	/**
	* method deleteCollection()
	* Delete many records
	*/
	public function deleteCollection($param)
	{
		// decode json with record id's
		$selected = json_decode($param['selected']);

		try
		{
			TTransaction::open('database');
			if($selected)
			{
				// delete each record from collection
				foreach($selected as $id)
				{
					$object = new Local;
					$object->delete( $id );
				}
				$posAction = new TAction(array($this,'onReload'));
				$posAction->setParameters( $param );
				new TMessage('info', AdiantiCoreTranslator::translate('Records deleted'), $posAction);
			}
			TTransaction::close();
		}
		catch(Exception $e)
		{
			new TMessage('error', $e->getMessage());
			TTransaction::rollback();
		}
	}


	/**
	* Transform datagrid objects
	* Create the checkbutton as datagrid element
	*/
	public function onBeforeLoad($objects, $param)
	{
		// update the action parameters to pass the current page to action
		// without this, the action will only work for the first page
		$deleteAction = $this->deleteButton->getAction();
		$deleteAction->setParameters($param); // important!

		$gridfields   = array($this->deleteButton );

		foreach($objects as $object)
		{
			$object->check = new TCheckButton('check' . $object->idlocal);
			$object->check->setIndexValue('on');
			$gridfields[] = $object->check; // important
		}

		$this->formgrid->setFields($gridfields);
	}


	/**
	* method show()
	* Shows the page
	*/
	public function show()
	{
		// check if the datagrid is already loaded
		if(!$this->loaded AND (!isset($_GET['method']) OR !(in_array($_GET['method'],  array('onReload', 'onSearch')))) )
		{
			if(func_num_args() > 0)
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
