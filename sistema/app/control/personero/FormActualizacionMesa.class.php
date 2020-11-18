<?php
/**
* FormActualizacionMesa Form
* @author  Renán Darío Gonzales Apaza
*/
class FormActualizacionMesa extends TPage
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
		$this->form->setFormTitle('Envío de registro de acta');

		// define the fields
		$idmesa          = new TEntry('idmesa');
		$grupo           = new TEntry('grupo');
		$total_region    = new TEntry('total_region');
		$total_consejero = new TEntry('total_consejero');
		$total_provincia = new TEntry('total_provincia');
		$total_distrito  = new TEntry('total_distrito');
		/*$voto_valido     = new TEntry('voto_valido');
		$voto_blanco     = new TEntry('voto_blanco');
		$voto_nulo       = new TEntry('voto_nulo');
		$voto_impugnado  = new TEntry('voto_impugnado');*/
		$mesa_impugnada  = new TCombo('mesa_impugnada');
		$id_personero    = new THidden('id_personero');
		$observacion     = new TText('observacion');

		$idmesa->setSize('100%');
		$grupo->setSize('100%');
		$total_region->setSize('100%');
		$total_consejero->setSize('100%');
		$total_provincia->setSize('100%');
		$total_distrito->setSize('100%');
		/*
		$voto_valido->setSize('100%');
		$voto_blanco->setSize('100%');
		$voto_nulo->setSize('100%');
		$voto_impugnado->setSize('100%');*/

		$mesa_impugnada->setSize('100%');
		$id_personero->setSize('100%');
		$observacion->setSize('100%');

		$estado_mesa     = array();
		$estado_mesa['NO'] = 'NO';
		$estado_mesa['SI'] = 'SI';
		$mesa_impugnada->addItems($estado_mesa);
		$mesa_impugnada->setValue('NO');
		$mesa_impugnada->setChangeAction(new TAction(array($this,'alCambiarMesaImpugada')));
		self::alCambiarMesaImpugada( ['mesa_impugnada' => 'NO'] );
		$mesa_impugnada->setTip('dasdsad');

		$idmesa->addValidation('ID', new TRequiredValidator);
		$grupo->addValidation('Grupo de votación', new TRequiredValidator);
		$total_region->addValidation('Total Ismodes', new TNumericValidator);
		$total_consejero->addValidation('Total Llica', new TNumericValidator);
		//$total_provincia->addValidation('Total Provincia', new TNumericValidator);
		//$total_distrito->addValidation('Total Distrito', new TNumericValidator);
		/*
		$voto_valido->addValidation('Votos Válidos', new TNumericValidator);
		$voto_blanco->addValidation('Votos en Blanco', new TNumericValidator);
		$voto_nulo->addValidation('Votos Nulos', new TNumericValidator);
		$voto_impugnado->addValidation('Votos Impugados', new TNumericValidator);*/

		$mesa_impugnada->addValidation('Mesa Observada', new TRequiredValidator);
		// $id_personero->addValidation('Personero', new TRequiredValidator);


		$grupo->setEditable(FALSE);


		$this->form->addFields([new TLabel('ID')], [$idmesa]);
		$this->form->addFields([new TLabel('Grupo de votación')], [$grupo]);
		$this->form->addFields([new TLabel('Total Ismodes')], [$total_region]);
		$this->form->addFields([new TLabel('Total Llica')], [$total_consejero]);
		//$this->form->addFields([new TLabel('Total Provincia')], [$total_provincia]);
		//$this->form->addFields([new TLabel('Total Distrito')], [$total_distrito]);

		/*
		$this->form->addFields([new TLabel('Votos Válidos')], [$voto_valido]);
		$this->form->addFields([new TLabel('Votos en Blanco')], [$voto_blanco]);
		$this->form->addFields([new TLabel('Votos Nulos')], [$voto_nulo]);
		$this->form->addFields([new TLabel('Votos Impugados')], [$voto_impugnado]);
		*/
		$this->form->addFields([new TLabel('Mesa Observada')], [$mesa_impugnada]);
		$this->form->addFields([$id_personero]);
		$this->form->addFields([new TLabel('Observacion')], [$observacion]);




		if(!empty($idmesa))
		{
			$idmesa->setEditable(FALSE);
		}

		/** samples
		$this->form->addQuickFields('Date', array($date1, new TLabel('to'), $date2)); // side by side fields
		$fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
		$fieldX->setSize( 100, 40 ); // set size
		**/

		// create the form actions
		$save = $this->form->addAction(_t('Save'), new TAction(array($this,'vistaPrevia')), 'fa:floppy-o');
		$save->class = 'btn btn-primary';
		//$new = $this->form->addAction(_t('New'),  new TAction(array($this,'onClear')), 'bs:plus - sign green');
		//$list = $this->form->addAction(_t('List'), new TAction(array($this, 'onLoad')), 'bs:plus - sign green');



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


	public function vistaPrevia( $param )
	{
		try
		{
			$this->form->validate(); // validate form data

			$data            = $this->form->getData(); // get form data as array
			$this->form->setData($data); // fill form data

			$tabla           = new TTable;
			$row             = $tabla->addRow();
			$row->addCell('Grupo de votación');
			$row->addCell($data->grupo);

			$row             = $tabla->addRow();
			$row->addCell('Total Ismodes');
			$row->addCell($data->total_region);

			$row             = $tabla->addRow();
			$row->addCell('Total Llica');
			$row->addCell($data->total_consejero);

			//$row             = $tabla->addRow();
			//$row->addCell('Total provincia');
			//$row->addCell($data->total_provincia);

			//$row             = $tabla->addRow();
			//$row->addCell('Total distrito');
			//$row->addCell($data->total_distrito);
			/*
			$row             = $tabla->addRow();
			$row->addCell('Votos válidos');
			$row->addCell($data->voto_valido);

			$row             = $tabla->addRow();
			$row->addCell('Votos blanco');
			$row->addCell($data->voto_blanco);

			$row             = $tabla->addRow();
			$row->addCell('Votos nulos');
			$row->addCell($data->voto_nulo);

			$row             = $tabla->addRow();
			$row->addCell('Votos impugnados');
			$row->addCell($data->voto_impugnado);*/

			$row             = $tabla->addRow();
			$row->addCell('Mesa Impugnada');
			$row->addCell($data->mesa_impugnada);

			$idmesa          = new THidden('idmesa');
			$grupo           = new THidden('grupo');
			$total_region    = new THidden('total_region');
			$total_consejero = new THidden('total_consejero');
			//$total_provincia = new THidden('total_provincia');
			//$total_distrito  = new THidden('total_distrito');
			/*$voto_valido     = new THidden('voto_valido');
			$voto_blanco     = new THidden('voto_blanco');
			$voto_nulo       = new THidden('voto_nulo');
			$voto_impugnado  = new THidden('voto_impugnado');*/
			$mesa_impugnada  = new THidden('mesa_impugnada');
			$id_personero    = new THidden('id_personero');
			$observacion     = new THidden('observacion');

			$form            = new TQuickForm('form_enviar');
			$form->style = 'padding:20px; align: center;';
			$form->class = 'sen_prev';

			$row = $tabla->addRow();
			$row->addCell($idmesa);
			$row->addCell($grupo);

			$row = $tabla->addRow();
			$row->addCell($total_region);
			$row->addCell($total_consejero);

			$row = $tabla->addRow();
			//$row->addCell($total_provincia);
			//$row->addCell($total_distrito);
			/*
			$row = $tabla->addRow();
			$row->addCell($voto_valido);
			$row->addCell($voto_blanco);

			$row = $tabla->addRow();
			$row->addCell($voto_nulo);
			$row->addCell($voto_impugnado);*/

			$row = $tabla->addRow();
			$row->addCell($mesa_impugnada);
			$row->addCell($id_personero);

			$row = $tabla->addRow();
			$row->addCell($observacion);
			$row->addCell('');

			$form->add($tabla);

			if($data->mesa_impugnada == 'SI'){
				$tabla = new TTable;
				$row   = $tabla->addRow();
				$row->addCell('Observación');
				$row->addCell($data->observacion);
				$form->add($tabla);
			}

			$style = new TElement('style');
			$style->add('.tformaction > td {
				padding: 0px !important;
				}');
			$form->add($style);


			$form->setFields([$idmesa,$grupo,$total_region,$total_consejero,$mesa_impugnada,$id_personero,$observacion]);
			//$form->setFields([$idmesa,$grupo,$total_region,$total_consejero,$total_provincia,$total_distrito,$mesa_impugnada,$id_personero,$observacion]);
			$form->addQuickAction('Enviar', new TAction(array($this,'onSave')), 'ico_save.png');

			$form->setData($data); // fill form data

			// show the input dialog
			new TInputDialog('¿Está seguro de los resultados a enviar?', $form);

		}
		catch(Exception $e) // in case of exception
		{
			new TMessage('error', $e->getMessage()); // shows the exception error message
			$this->form->setData( $this->form->getData() ); // keep form data
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

			$this->form->validate(); // validate form data
			$data   = $this->form->getData(); // get form data as array

			$object = (empty($data->idmesa)) ? new Mesa : new Mesa($data->idmesa, true); // create an empty object

			$object->fromArray( (array) $data); // load the object with data

			$object->total_region = $data->total_region;
			$object->total_consejero = $data->total_consejero;
			//$object->total_provincia = $data->total_provincia;
			//$object->total_distrito = $data->total_distrito;
			/* $object->voto_valido = $data->voto_valido;
			$object->voto_blanco = $data->voto_blanco;
			$object->voto_nulo = $data->voto_nulo;
			$object->voto_impugnado = $data->voto_impugnado;*/
			$object->mesa_impugnada = $data->mesa_impugnada;
			$object->observacion = $data->observacion;
			$object->estado = 'Enviado';

			if($object->id_personero == TSession::getValue('userid') || $object->local->id_coord_local == TSession::getValue('userid'))
			{

				$object->store(); // save the object
				// get the generated idmesa
				$data->idmesa = $object->idmesa;
				$this->form->setData($data); // fill form data

			}
			else
			{
				if(TSession::getValue('userid') == '4')
				{
					$object->store(); // save the object
					// get the generated idmesa
					$data->idmesa = $object->idmesa;
					$this->form->setData($data); // fill form data
				}else{
					throw new Exception('Ud no tiene acceso a esta mesa de votación');
				}
				
			}

			TTransaction::close(); // close the transaction

			$ok = new TAction(array('ListaPersoneroMesas','onLoad'));
			new TMessage('info', 'Información enviada',$ok);
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
			if(isset($param['key']))
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
		catch(Exception $e) // in case of exception
		{
			new TMessage('error', $e->getMessage()); // shows the exception error message
			TTransaction::rollback(); // undo all pending operations
		}
	}
}
