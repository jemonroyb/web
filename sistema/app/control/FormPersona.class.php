<?php

class FormPersona extends TPage
{
    protected $form; // form
    protected $program_list;

    /**
    * Class constructor
    * Creates the page and the registration form
    */
    function __construct()
    {
        parent::__construct();

        // creates the form
        $this->form = new BootstrapFormBuilder('form_registration');
        $this->form->setFormTitle('Registro de personas' );

        // create the form fields
        $login      = new TEntry('login');
        $name       = new TEntry('name');
        $email      = new TEntry('email');
        $password   = new TPassword('password');
        $repassword = new TPassword('repassword');

        $dni        = new TEntry('dni');
        $telefone   = new TEntry('telefone');

        $this->form->addAction( _t('Save'),  new TAction([$this, 'onSave']), 'fa:floppy-o')->
        {
            'class'
        } = 'btn btn-sm btn-primary';
        $this->form->addAction( _t('Clear'), new TAction([$this, 'onClear']), 'fa:eraser red' );
        //$this->form->addActionLink( _t('Back'),  new TAction(['LoginForm','onReload']), 'fa:arrow - circle - o - left blue' );

        // define the sizes
        $name->setSize('100%');
        $login->setSize('100%');
        $password->setSize('100%');
        $repassword->setSize('100%');
        $email->setSize('100%');

        $dni->setSize('100%');
        $telefone->setSize('100%');

        //$this->form->addFields( [new TLabel(_t('Login'), 'red')],    [$login] );
        $this->form->addFields( [new TLabel('DNI (login)', 'red')],    [$dni] );
        $this->form->addFields( [new TLabel('Nombres y apellidos completos', 'red')],     [$name] );
        $this->form->addFields( [new TLabel('Teléfono', 'red')],    [$telefone] );
        $this->form->addFields( [new TLabel('Email', 'red')],    [$email] );
        $this->form->addFields( [new TLabel(_t('Password'), 'red')], [$password] );
        $this->form->addFields( [new TLabel(_t('Password confirmation'), 'red')], [$repassword] );

        // add the container to the page
        parent::add($this->form);
    }

    /**
    * Clear form
    */
    public function onClear()
    {
        $this->form->clear( true );
    }

    /**
    * method onSave()
    * Executed whenever the user clicks at the save button
    */
    public static function onSave($param)
    {
        try
        {
            $ini = AdiantiApplicationConfig::get();
            if ($ini['permission']['user_register'] !== '1') {
                // throw new Exception( _t('The user registration is disabled') );
            }

            // open a transaction with database 'permission'
            TTransaction::open('permission');

            if ( empty($param['dni']) ) {
                throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', 'DNI'));
            }else
            {
                if (!is_numeric($param['dni']))
                {
                    throw new Exception('El DNI tiene que ser un número');
                }

                if (strlen($param['dni']) < 8)
                {
                    throw new Exception('El DNI tiene que ser de 8 Digitos');
                }
            }
            
            
            if ( empty($param['name']) ) {
                throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', _t('Name')));
            }

            if ( empty($param['telefone']) ) {
                throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', 'Teléfono'));
            }


            if ( empty($param['email']) ) {
                throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', _t('Email')));
            }

            if ( empty($param['password']) ) {
                throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', _t('Password')));
            }

            if ( empty($param['repassword']) ) {
                throw new Exception(TAdiantiCoreTranslator::translate('The field ^1 is required', _t('Password confirmation')));
            }

            if (SystemUser::newFromLogin($param['dni']) instanceof SystemUser) {
                throw new Exception('Un usuario ya está registrado con este DNI');
            }

            if (SystemUser::newFromEmail($param['email']) instanceof SystemUser) {
                throw new Exception(_t('An user with this e-mail is already registered'));
            }

            if ( $param['password'] !== $param['repassword'] ) {
                throw new Exception(_t('The passwords do not match'));
            }

            $object = new SystemUser;
            $object->active = 'Y';
            $object->fromArray( $param );
            $object->login = $param['dni'];
            $object->id_creador = TSession::getValue('userid');
            $object->password = md5($object->password);
            $object->frontpage_id = $ini['permission']['default_screen'];
            $object->clearParts();
            $object->store();

            $default_groups = explode(',', $ini['permission']['default_groups']);

            if ( count($default_groups) > 0 ) {
                foreach ( $default_groups as $group_id ) {
                    $object->addSystemUserGroup( new SystemGroup($group_id) );
                }
            }

            TTransaction::close(); // close the transaction

            new TMessage('info','La cuenta ha sido creada'); // shows the success message

        }
        catch (Exception $e) {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
}
