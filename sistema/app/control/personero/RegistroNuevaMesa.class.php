<?php
/**
* RegistroNuevaMesa Form
* @author  Renán Darío Gonzales Apaza
*/
class RegistroNuevaMesa extends TPage
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
		$this->form->setFormTitle('Envío de registro de nueva mesa');

		// define the fields
		$idmesa          = new TEntry('idmesa');
		$id_local        = new TDBUniqueSearch('id_local','database','Local','idlocal','nombre','nombre');
		$grupo           = new TEntry('grupo');
		$total_region    = new TEntry('total_region');
		$total_consejero = new TEntry('total_consejero');
		$total_provincia = new TEntry('total_provincia');
		$total_distrito  = new TEntry('total_distrito');
		$mesa_impugnada  = new TCombo('mesa_impugnada');
		$observacion     = new TText('observacion');

		$id_local->setMinLength(2);


		$idmesa->setSize('100%');
		$id_local->setSize('100%');
		$grupo->setSize('100%');
		$total_region->setSize('100%');
		$total_consejero->setSize('100%');
		$total_provincia->setSize('100%');
		$total_distrito->setSize('100%');
		$observacion->setSize('100%');


		$observacion->setSize('100%');
		$id_local->addValidation('Local De Votación', new TRequiredValidator);
		$grupo->addValidation('Grupo de votación', new TRequiredValidator);
		$total_region->addValidation('Total Region', new TNumericValidator);
		$total_consejero->addValidation('Total Consejero', new TNumericValidator);
		$total_provincia->addValidation('Total Provincia', new TNumericValidator);
		$total_distrito->addValidation('Total Distrito', new TNumericValidator);


		$this->form->addFields([new TLabel('ID')], [$idmesa]);
		$this->form->addFields([new TLabel('Local De Votación')], [$id_local]);
		$this->form->addFields([new TLabel('Grupo de votación')], [$grupo]);
		$this->form->addFields([new TLabel('Total Region')], [$total_region]);
		$this->form->addFields([new TLabel('Total Consejero')], [$total_consejero]);
		$this->form->addFields([new TLabel('Total Provincia')], [$total_provincia]);
		$this->form->addFields([new TLabel('Total Distrito')], [$total_distrito]);
		$this->form->addFields([new TLabel('Mesa Observada')], [$mesa_impugnada]);
        $this->form->addFields([new TLabel('Observacion')], [$observacion]);
		
		
		 $estado_mesa     = array();
        $estado_mesa['NO'] = 'NO';
        $estado_mesa['SI'] = 'SI';
        $mesa_impugnada->addItems($estado_mesa);
        $mesa_impugnada->setValue('NO');
        $mesa_impugnada->setChangeAction(new TAction(array($this,'alCambiarMesaImpugada')));
        self::alCambiarMesaImpugada( ['mesa_impugnada' => 'NO'] );
        $mesa_impugnada->addValidation('Mesa Observada', new TRequiredValidator);
        
        




		if(!empty($idmesa)){
			$idmesa->setEditable(FALSE);
		}

		/** samples
		$this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
		$fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
		$fieldX->setSize( 100, 40 ); // set size
		**/

		// create the form actions
		$save = $this->form->addAction('Enviar registro', new TAction(array($this,'onSave')), 'fa:floppy-o');
		$save->class = 'btn btn-primary';
		$new = $this->form->addAction('Limpiar formulario',  new TAction(array($this,'onClear')), 'fa:eraser red');
		$list = $this->form->addAction('Volver a la lista de mesas asignadas', new TAction(array('ListaPersoneroMesas','onLoad')), 'bs:list ');



		##BOOTSTRAP##

		// vertical box container
		$container = new TVBox;
		$container->style = 'width: 100%';
		// $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
		$container->add($this->form);

		parent::add($container);

	}

	/**
	* Event executed when type is changed
	*/
	public static function alCambiarMesaImpugada($param)
	{
		if($param['mesa_impugnada'] == 'SI')
		{
			TQuickForm::showField('form_Mesa', 'observacion');
		}
		else
		{
			TQuickForm::hideField('form_Mesa', 'observacion');
		}
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

			if(!empty($data->idgrupo)){
				throw new Exception('No tiene permiso para realizar esta acción');
			}

			$object = (empty($data->idgrupo)) ? new Mesa : new Mesa($data->idmesa, true); // create an empty object
			$data = $this->form->getData(); // get form data as array
			$object->fromArray( (array) $data); // load the object with data
			$object->estado = 'Enviado';
			$object->iduser = TSession::getValue('userid');
			$object->store(); // save the object

			// get the generated idmesa
			$data->idmesa = $object->idmesa;

			$this->form->setData($data); // fill form data
			TTransaction::close(); // close the transaction

			new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
		}
		catch(Exception $e) // in case of exception
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
			if(isset($param['key'])){
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
		catch(Exception $e) // in case of exception
		{
			new TMessage('error', $e->getMessage()); // shows the exception error message
			TTransaction::rollback(); // undo all pending operations
		}
	}
}
