<?php
/**
 * ApplicationTranslator
 *
 * @version    5.5
 * @package    util
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ApplicationTranslator
{
    private static $instance; // singleton instance
    private $messages;
    private $enWords;
    private $lang;            // target language
    
    /**
     * Class Constructor
     */
    private function __construct()
    {
        $this->messages['en'][] = 'File not found';
        $this->messages['en'][] = 'Search';
        $this->messages['en'][] = 'Register';
        $this->messages['en'][] = 'Record saved';
        $this->messages['en'][] = 'Do you really want to delete ?';
        $this->messages['en'][] = 'Record deleted';
        $this->messages['en'][] = 'Function';
        $this->messages['en'][] = 'Table';
        $this->messages['en'][] = 'Tool';
        $this->messages['en'][] = 'Data';
        $this->messages['en'][] = 'Open';
        $this->messages['en'][] = 'New';
        $this->messages['en'][] = 'Save';
        $this->messages['en'][] = 'Find';
        $this->messages['en'][] = 'Edit';
        $this->messages['en'][] = 'Delete';
        $this->messages['en'][] = 'Cancel';
        $this->messages['en'][] = 'Yes';
        $this->messages['en'][] = 'No';
        $this->messages['en'][] = 'January';
        $this->messages['en'][] = 'February';
        $this->messages['en'][] = 'March';
        $this->messages['en'][] = 'April';
        $this->messages['en'][] = 'May';
        $this->messages['en'][] = 'June';
        $this->messages['en'][] = 'July';
        $this->messages['en'][] = 'August';
        $this->messages['en'][] = 'September';
        $this->messages['en'][] = 'October';
        $this->messages['en'][] = 'November';
        $this->messages['en'][] = 'December';
        $this->messages['en'][] = 'Today';
        $this->messages['en'][] = 'Close';
        $this->messages['en'][] = 'The field ^1 can not be less than ^2 characters';
        $this->messages['en'][] = 'The field ^1 can not be greater than ^2 characters';
        $this->messages['en'][] = 'The field ^1 can not be less than ^2';
        $this->messages['en'][] = 'The field ^1 can not be greater than ^2';
        $this->messages['en'][] = 'The field ^1 is required';
        $this->messages['en'][] = 'The field ^1 has not a valid CNPJ';
        $this->messages['en'][] = 'The field ^1 has not a valid CPF';
        $this->messages['en'][] = 'The field ^1 contains an invalid e-mail';
        $this->messages['en'][] = 'Permission denied';
        $this->messages['en'][] = 'Generate';
        $this->messages['en'][] = 'List';
        $this->messages['en'][] = 'Wrong password';
        $this->messages['en'][] = 'User not found';
        $this->messages['en'][] = 'User';
        $this->messages['en'][] = 'Users';
        $this->messages['en'][] = 'Password';
        $this->messages['en'][] = 'Login';
        $this->messages['en'][] = 'Name';
        $this->messages['en'][] = 'Group';
        $this->messages['en'][] = 'Groups';
        $this->messages['en'][] = 'Program';
        $this->messages['en'][] = 'Programs';
        $this->messages['en'][] = 'Back to the listing';
        $this->messages['en'][] = 'Controller';
        $this->messages['en'][] = 'Email';
        $this->messages['en'][] = 'Record Updated';
        $this->messages['en'][] = 'Password confirmation';
        $this->messages['en'][] = 'Front page';
        $this->messages['en'][] = 'Page name';
        $this->messages['en'][] = 'The passwords do not match';
        $this->messages['en'][] = 'Log in';
        $this->messages['en'][] = 'Date';
        $this->messages['en'][] = 'Column';
        $this->messages['en'][] = 'Operation';
        $this->messages['en'][] = 'Old value';
        $this->messages['en'][] = 'New value';
        $this->messages['en'][] = 'Database';
        $this->messages['en'][] = 'Profile';
        $this->messages['en'][] = 'Change password';
        $this->messages['en'][] = 'Leave empty to keep old password';
        $this->messages['en'][] = 'Results';
        $this->messages['en'][] = 'Invalid command';
        $this->messages['en'][] = '^1 records shown';
        $this->messages['en'][] = 'Administration';
        $this->messages['en'][] = 'SQL Panel';
        $this->messages['en'][] = 'Access Log';
        $this->messages['en'][] = 'Change Log';
        $this->messages['en'][] = 'SQL Log';
        $this->messages['en'][] = 'Clear form';
        $this->messages['en'][] = 'Send';
        $this->messages['en'][] = 'Message';
        $this->messages['en'][] = 'Messages';
        $this->messages['en'][] = 'Subject';
        $this->messages['en'][] = 'Message sent successfully';
        $this->messages['en'][] = 'Check as read';
        $this->messages['en'][] = 'Check as unread';
        $this->messages['en'][] = 'Action';
        $this->messages['en'][] = 'Read';
        $this->messages['en'][] = 'From';
        $this->messages['en'][] = 'Checked';
        $this->messages['en'][] = 'Object ^1 not found in ^2';
        $this->messages['en'][] = 'Notification';
        $this->messages['en'][] = 'Notifications';
        $this->messages['en'][] = 'Categories';
        $this->messages['en'][] = 'Send document';
        $this->messages['en'][] = 'My documents';
        $this->messages['en'][] = 'Shared with me';
        $this->messages['en'][] = 'Document';
        $this->messages['en'][] = 'File';
        $this->messages['en'][] = 'Title';
        $this->messages['en'][] = 'Description';
        $this->messages['en'][] = 'Category';
        $this->messages['en'][] = 'Submission date';
        $this->messages['en'][] = 'Archive date';
        $this->messages['en'][] = 'Upload';
        $this->messages['en'][] = 'Download';
        $this->messages['en'][] = 'Next';
        $this->messages['en'][] = 'Documents';
        $this->messages['en'][] = 'Permission';
        $this->messages['en'][] = 'Unit';
        $this->messages['en'][] = 'Units';
        $this->messages['en'][] = 'Add';
        $this->messages['en'][] = 'Active';
        $this->messages['en'][] = 'Activate/Deactivate';
        $this->messages['en'][] = 'Inactive user';
        $this->messages['en'][] = 'Send message';
        $this->messages['en'][] = 'Read messages';
        $this->messages['en'][] = 'An user with this login is already registered';
        $this->messages['en'][] = 'Access Stats';
        $this->messages['en'][] = 'Accesses';
        $this->messages['en'][] = 'Preferences';
        $this->messages['en'][] = 'Mail from';
        $this->messages['en'][] = 'SMTP Auth';
        $this->messages['en'][] = 'SMTP Host';
        $this->messages['en'][] = 'SMTP Port';
        $this->messages['en'][] = 'SMTP User';
        $this->messages['en'][] = 'SMTP Pass';
        $this->messages['en'][] = 'Ticket';
        $this->messages['en'][] = 'Open ticket';
        $this->messages['en'][] = 'Support mail';
        $this->messages['en'][] = 'Day';
        $this->messages['en'][] = 'Folders';
        $this->messages['en'][] = 'Compose';
        $this->messages['en'][] = 'Inbox';
        $this->messages['en'][] = 'Sent';
        $this->messages['en'][] = 'Archived';
        $this->messages['en'][] = 'Archive';
        $this->messages['en'][] = 'Recover';
        $this->messages['en'][] = 'Value';
        $this->messages['en'][] = 'View all';
        $this->messages['en'][] = 'Reload';
        $this->messages['en'][] = 'Back';
        $this->messages['en'][] = 'Clear';
        $this->messages['en'][] = 'View';
        $this->messages['en'][] = 'No records found';
        $this->messages['en'][] = 'Drawing successfully generated';
        $this->messages['en'][] = 'QR Codes successfully generated';
        $this->messages['en'][] = 'Barcodes successfully generated';
        $this->messages['en'][] = 'Document successfully generated';
        $this->messages['en'][] = 'Value';
        $this->messages['en'][] = 'User';
        $this->messages['en'][] = 'Password';
        $this->messages['en'][] = 'Port';
        $this->messages['en'][] = 'Database type';
        $this->messages['en'][] = 'Root user';
        $this->messages['en'][] = 'Root password';
        $this->messages['en'][] = 'Create database/user';
        $this->messages['en'][] = 'Test connection';
        $this->messages['en'][] = 'Database name';
        $this->messages['en'][] = 'Insert permissions/programs';
        $this->messages['en'][] = 'Database and user created successfully';
        $this->messages['en'][] = 'Permissions and programs successfully inserted';
        $this->messages['en'][] = 'Update config';
        $this->messages['en'][] = 'Configuration file: ^1 updated successfully';
        $this->messages['en'][] = 'Connection successfully completed';
        $this->messages['en'][] = "The database ^1 doesn't exists";
        $this->messages['en'][] = 'Permissions/programs successfully inserted';
        $this->messages['en'][] = 'Programs/permissions have already been inserted';
        $this->messages['en'][] = 'Installing your application';
        $this->messages['en'][] = 'PHP version verification and installed extensions';
        $this->messages['en'][] = 'PHP verification';
        $this->messages['en'][] = 'Directory and files verification';
        $this->messages['en'][] = 'Database configuration/creation';
        $this->messages['en'][] = 'Admin user';
        $this->messages['en'][] = 'Admin password';
        $this->messages['en'][] = 'Insert data';
        $this->messages['en'][] = 'Of database:';
        $this->messages['en'][] = 'Connecton to database ^1 failed';
        $this->messages['en'][] = 'Install';
        $this->messages['en'][] = 'Databases successfully installed';
        $this->messages['en'][] = 'Databases have already been installed';
        $this->messages['en'][] = 'Main unit';
        $this->messages['en'][] = 'Time';
        $this->messages['en'][] = 'Type';
        $this->messages['en'][] = 'Failed to read error log (^1)';
        $this->messages['en'][] = 'Error log (^1) is not writable by web server user, so the messages may be incomplete';
        $this->messages['en'][] = 'Check the owner of the log file. He must be the same as the web user (usually www-data, www, etc)';
        $this->messages['en'][] = 'Error log is empty or has not been configured correctly. Define the error log file, setting <b>error_log</b> at php.ini';
        $this->messages['en'][] = 'Errors are not being logged. Please turn <b>log_errors = On</b> at php.ini';
        $this->messages['en'][] = 'Errors are not currently being displayd because the <b>display_errors</b> is set to Off in php.ini';
        $this->messages['en'][] = 'This configuration is usually recommended for production, not development purposes';
        $this->messages['en'][] = 'The php.ini current location is <b>^1</b>';
        $this->messages['en'][] = 'The error log current location is <b>^1</b>';
        $this->messages['en'][] = 'PHP Log';
        $this->messages['en'][] = 'Database explorer';
        $this->messages['en'][] = 'Tables';
        $this->messages['en'][] = 'Report generated. Please, enable popups';
        $this->messages['en'][] = 'File saved';
        $this->messages['en'][] = 'Edit page';
        $this->messages['en'][] = 'Update page';
        $this->messages['en'][] = 'Module';
        $this->messages['en'][] = 'Directory';
        $this->messages['en'][] = 'Source code';
        $this->messages['en'][] = 'Invalid return';
        $this->messages['en'][] = 'Page';
        $this->messages['en'][] = 'Connection failed';
        $this->messages['en'][] = 'Summary database install';
        $this->messages['en'][] = 'No write permission on file';
        $this->messages['en'][] = 'In order to continue with the installation you must grant read permission to the directory';
        $this->messages['en'][] = 'In order to continue with the installation you must grant write permission to the directory';
        $this->messages['en'][] = 'Installed';
        $this->messages['en'][] = 'Path';
        $this->messages['en'][] = 'File';
        $this->messages['en'][] = 'Write';
        $this->messages['en'][] = 'Read';
        $this->messages['en'][] = 'In order to continue with the installation you must grant read permission to the file';
        $this->messages['en'][] = 'In order to continue with the installation you must grant write permission to the file';
        $this->messages['en'][] = 'Photo';
        $this->messages['en'][] = 'Reset password';
        $this->messages['en'][] = 'A new seed is required in the application.ini for security reasons';
        $this->messages['en'][] = 'Password reset';
        $this->messages['en'][] = 'Token expired. This operation is not allowed';
        $this->messages['en'][] = 'The password has been changed';
        $this->messages['en'][] = 'An user with this e-mail is already registered';
        $this->messages['en'][] = 'Invalid LDAP credentials';
        $this->messages['en'][] = 'Update menu overwriting existing file?';
        $this->messages['en'][] = 'Menu updated successfully';
        $this->messages['en'][] = 'Menu path';
        $this->messages['en'][] = 'Add to menu';
        $this->messages['en'][] = 'Remove from menu';
        $this->messages['en'][] = 'Item removed from menu';
        $this->messages['en'][] = 'Item added to menu';
        $this->messages['en'][] = 'Icon';
        $this->messages['en'][] = 'User registration';
        $this->messages['en'][] = 'The user registration is disabled';
        $this->messages['en'][] = 'The password reset is disabled';
        $this->messages['en'][] = 'Account created';
        $this->messages['en'][] = 'Create account';
        
        
        $this->messages['pt'][] = 'Archivo no encontrado';
        $this->messages['pt'][] = 'Buscar';
        $this->messages['pt'][] = 'Registrar';
        $this->messages['pt'][] = 'Registro guardado';
        $this->messages['pt'][] = '¿Desea realmente eliminar?';
        $this->messages['pt'][] = 'Registro eliminado';
        $this->messages['pt'][] = 'Función';
        $this->messages['pt'][] = 'Tabla';
        $this->messages['pt'][] = 'Herramienta';
        $this->messages['pt'][] = 'Datos';
        $this->messages['pt'][] = 'Abrir';
        $this->messages['pt'][] = 'Nuevo registro';
        $this->messages['pt'][] = 'Guardar';
        $this->messages['pt'][] = 'Buscar';
        $this->messages['pt'][] = 'Editar';
        $this->messages['pt'][] = 'Eliminar';
        $this->messages['pt'][] = 'Cancelar';
        $this->messages['pt'][] = 'Si';
        $this->messages['pt'][] = 'No';
        $this->messages['pt'][] = 'Enero';
        $this->messages['pt'][] = 'Febrero';
        $this->messages['pt'][] = 'Marzo';
        $this->messages['pt'][] = 'Abril';
        $this->messages['pt'][] = 'Mayo';
        $this->messages['pt'][] = 'Junio';
        $this->messages['pt'][] = 'Julio';
        $this->messages['pt'][] = 'Agosto';
        $this->messages['pt'][] = 'Septiembre';
        $this->messages['pt'][] = 'Octubre';
        $this->messages['pt'][] = 'Noviembre';
        $this->messages['pt'][] = 'Diciembre';
        $this->messages['pt'][] = 'Hoy';
        $this->messages['pt'][] = 'Cerrar';
        $this->messages['pt'][] = 'El campo ^1 no puede tener menos de ^2 carácteres';
        $this->messages['pt'][] = 'El campo ^1 no puede tener más de ^2 carácteres';
        $this->messages['pt'][] = 'El campo ^1 no puede ser menor que ^2';
        $this->messages['pt'][] = 'El campo ^1 no puede ser mayor que ^2';
        $this->messages['pt'][] = 'El campo ^1 es obligatorio';
        $this->messages['pt'][] = 'El campo ^1 no contiene un CNPJ válido';
        $this->messages['pt'][] = 'El campo ^1 no contiene un CPF válido';
        $this->messages['pt'][] = 'El campo ^1 contiene un e-mail inválido';
        $this->messages['pt'][] = 'Permiso negado';
        $this->messages['pt'][] = 'Generar';
        $this->messages['pt'][] = 'Listar';
        $this->messages['pt'][] = 'Contraseña equivocada';
        $this->messages['pt'][] = 'Usuario no encontrado';
        $this->messages['pt'][] = 'Usuario';
        $this->messages['pt'][] = 'Usuarios';
        $this->messages['pt'][] = 'Contraseña';
        $this->messages['pt'][] = 'Login';
        $this->messages['pt'][] = 'Nombre';
        $this->messages['pt'][] = 'Grupo';
        $this->messages['pt'][] = 'Grupos';
        $this->messages['pt'][] = 'Programa';
        $this->messages['pt'][] = 'Programas';
        $this->messages['pt'][] = 'Regresar al listado';
        $this->messages['pt'][] = 'Clase de control';
        $this->messages['pt'][] = 'Email';
        $this->messages['pt'][] = 'Registro actualizado';
        $this->messages['pt'][] = 'Confirma la contraseña';
        $this->messages['pt'][] = 'Ventana inicial';
        $this->messages['pt'][] = 'Nombre de la ventana';
        $this->messages['pt'][] = 'Las contraseñas no coinciden';
        $this->messages['pt'][] = 'Entrar';
        $this->messages['pt'][] = 'Dato';
        $this->messages['pt'][] = 'Columna';
        $this->messages['pt'][] = 'Operación';
        $this->messages['pt'][] = 'Valor antiguo';
        $this->messages['pt'][] = 'Valor nuevo';
        $this->messages['pt'][] = 'Banco de datos';
        $this->messages['pt'][] = 'Perfil';
        $this->messages['pt'][] = 'Cambiar contraseña';
        $this->messages['pt'][] = 'Deje vacío para mantener la contraseña anterior';
        $this->messages['pt'][] = 'Resultados';
        $this->messages['pt'][] = 'Comando inválido';
        $this->messages['pt'][] = '^1 registros encontrados';
        $this->messages['pt'][] = 'Administraçión';
        $this->messages['pt'][] = 'Panel SQL';
        $this->messages['pt'][] = 'Log de acesso';
        $this->messages['pt'][] = 'Log de alteraciones';
        $this->messages['pt'][] = 'Log de SQL';
        $this->messages['pt'][] = 'Limpiar formulario';
        $this->messages['pt'][] = 'Enviar';
        $this->messages['pt'][] = 'Mensage';
        $this->messages['pt'][] = 'Mensages';
        $this->messages['pt'][] = 'Asunto';
        $this->messages['pt'][] = 'Mensage enviado con éxito';
        $this->messages['pt'][] = 'Marcar como leída';
        $this->messages['pt'][] = 'Marcar como no leída';
        $this->messages['pt'][] = 'Acción';
        $this->messages['pt'][] = 'Leer';
        $this->messages['pt'][] = 'Origem';
        $this->messages['pt'][] = 'Verificado';
        $this->messages['pt'][] = 'Objeto ^1 no encontrado en ^2';
        $this->messages['pt'][] = 'Notificación';
        $this->messages['pt'][] = 'Notificaciones';
        $this->messages['pt'][] = 'Categorías';
        $this->messages['pt'][] = 'Enviar documentos';
        $this->messages['pt'][] = 'Mis documentos';
        $this->messages['pt'][] = 'Compartidos conmigo';
        $this->messages['pt'][] = 'Documento';
        $this->messages['pt'][] = 'Archivo';
        $this->messages['pt'][] = 'Título';
        $this->messages['pt'][] = 'Descripción';
        $this->messages['pt'][] = 'Categoría';
        $this->messages['pt'][] = 'Fecha de envío';
        $this->messages['pt'][] = 'Fecha de archivamiento';
        $this->messages['pt'][] = 'Subir';
        $this->messages['pt'][] = 'Descargar';
        $this->messages['pt'][] = 'Próximo';
        $this->messages['pt'][] = 'Documentos';
        $this->messages['pt'][] = 'Permiso';
        $this->messages['pt'][] = 'Unidad';
        $this->messages['pt'][] = 'Unidades';
        $this->messages['pt'][] = 'Adicionar';
        $this->messages['pt'][] = 'Activo';
        $this->messages['pt'][] = 'Activar/desactivar';
        $this->messages['pt'][] = 'Usuário inactivo';
        $this->messages['pt'][] = 'Envío de mensaje';
        $this->messages['pt'][] = 'Leer mensages';
        $this->messages['pt'][] = 'Un usuario ya esta registrado con este login';
        $this->messages['pt'][] = 'Estadisticas de acceso';
        $this->messages['pt'][] = 'Accesos';
        $this->messages['pt'][] = 'Preferencias';
        $this->messages['pt'][] = 'E-mail de origen';
        $this->messages['pt'][] = 'Autenticación SMTP';
        $this->messages['pt'][] = 'Host SMTP';
        $this->messages['pt'][] = 'Puerto SMTP';
        $this->messages['pt'][] = 'Usuario SMTP';
        $this->messages['pt'][] = 'Contraseña SMTP';
        $this->messages['pt'][] = 'Ticket';
        $this->messages['pt'][] = 'Abrir ticket';
        $this->messages['pt'][] = 'Email de soporte';
        $this->messages['pt'][] = 'Dia';
        $this->messages['pt'][] = 'Carpetas';
        $this->messages['pt'][] = 'Redactar';
        $this->messages['pt'][] = 'Entrada';
        $this->messages['pt'][] = 'Enviados';
        $this->messages['pt'][] = 'Archivados';
        $this->messages['pt'][] = 'Archivar';
        $this->messages['pt'][] = 'Recuperar';
        $this->messages['pt'][] = 'Valor';
        $this->messages['pt'][] = 'Ver todos';
        $this->messages['pt'][] = 'Recargar';
        $this->messages['pt'][] = 'Volver';
        $this->messages['pt'][] = 'Limpiar';
        $this->messages['pt'][] = 'Visualizar';
        $this->messages['pt'][] = 'Ningún registro fue encontrado';
        $this->messages['pt'][] = 'Diseño generado con éxito';
        $this->messages['pt'][] = 'Código QR generado con éxito';
        $this->messages['pt'][] = 'Códigos de barra generados con éxito';
        $this->messages['pt'][] = 'Documento generado con éxito';
        $this->messages['pt'][] = 'Valor';
        $this->messages['pt'][] = 'Usuario';
        $this->messages['pt'][] = 'Contraseña';
        $this->messages['pt'][] = 'Puerto';
        $this->messages['pt'][] = 'Tipo de la base de datos';
        $this->messages['pt'][] = 'Usuario admin';
        $this->messages['pt'][] = 'Contraseña del usuario admin';
        $this->messages['pt'][] = 'Crear base de datos/usuario';
        $this->messages['pt'][] = 'Probar conexión';
        $this->messages['pt'][] = 'Nombre de la base de datos';
        $this->messages['pt'][] = 'Ingresar programas/permisos';
        $this->messages['pt'][] = 'Base de datos y usuario creado con éxito';
        $this->messages['pt'][] = 'Permisos y programas ingresados con éxito';
        $this->messages['pt'][] = 'Actualizar configuración';
        $this->messages['pt'][] = 'Archivo de configuración: ^1 actualizado con éxito';
        $this->messages['pt'][] = 'Conexión realizada con éxito';
        $this->messages['pt'][] = 'La base de datos ^1 no existe';
        $this->messages['pt'][] = 'Permisos/programas ingresados con éxito';
        $this->messages['pt'][] = 'Los programas/permisos ya fueron ingresados';
        $this->messages['pt'][] = 'Instalando su aplicación';
        $this->messages['pt'][] = 'Verificación de la versión de PHP y extensiones instaladas';
        $this->messages['pt'][] = 'Verificación do PHP';
        $this->messages['pt'][] = 'Verificación de directorios y archivos';
        $this->messages['pt'][] = 'Configuración/creación de base de datos';
        $this->messages['pt'][] = 'Usuario admin';
        $this->messages['pt'][] = 'Contraseña del usuario admin';
        $this->messages['pt'][] = 'Insertar datos';
        $this->messages['pt'][] = 'De la base de datos:';
        $this->messages['pt'][] = 'La conexión con la base de datos ^1 falló';
        $this->messages['pt'][] = 'Instalar';
        $this->messages['pt'][] = 'Bases de datos instaladas con éxito';
        $this->messages['pt'][] = 'Las bases de datos ya fueron instaladas';
        $this->messages['pt'][] = 'Unidad principal';
        $this->messages['pt'][] = 'Hora';
        $this->messages['pt'][] = 'Tipo';
        $this->messages['pt'][] = 'Fallo al leer el log de errores (^1)';
        $this->messages['pt'][] = 'El log de errores (^1) no permite escritura por el usuario web, asi como también los mensajes deben estar incompletos';
        $this->messages['pt'][] = 'Revise el propietario del archivo de log. Debe ser igual al usuario web (generalmente www-data, www, etc)';
        $this->messages['pt'][] = 'Logs de errres esta vacío o no fue configurado correctamente. Defina el archivo de log de errores, configurando <b>error_log</b> en el php.ini';
        $this->messages['pt'][] = 'Los errores no están siendo registrados. Por favor, cambie <b>log_errors = On</b> en el php.ini';
        $this->messages['pt'][] = 'Los errores no están actualmente siendo mostrados porque <b>display_errors</b> está configurado en Off en el php.ini';
        $this->messages['pt'][] = 'Esta configuración normalmente es recomendada para produccion, no para el propósito de de despliege';
        $this->messages['pt'][] = 'La localización actual de php.ini es <b>^1</b>';
        $this->messages['pt'][] = 'La localización actual del log de errores es <b>^1</b>';
        $this->messages['pt'][] = 'Log de PHP';
        $this->messages['pt'][] = 'Database explorer';
        $this->messages['pt'][] = 'Tablas';
        $this->messages['pt'][] = 'Reporte generado. Favor de habilitar los popus';
        $this->messages['pt'][] = 'Arquivo guardado';
        $this->messages['pt'][] = 'Editar página';
        $this->messages['pt'][] = 'Actualizar página';
        $this->messages['pt'][] = 'Módulo';
        $this->messages['pt'][] = 'Directorio';
        $this->messages['pt'][] = 'Código-fuente';
        $this->messages['pt'][] = 'Retorno inválido';
        $this->messages['pt'][] = 'Página';
        $this->messages['pt'][] = 'Fallas en la conexión';
        $this->messages['pt'][] = 'Resumen de la instalación de la base de datos';
        $this->messages['pt'][] = 'Sin permiso de escritura en el archivo';
        $this->messages['pt'][] = 'Para que sea posible continuar con la instalación usted debe dar permisos de lectura para el directorio';
        $this->messages['pt'][] = 'Para que sea posible continuar con la instalación usted debe dar permisos de escritura para el directorio';
        $this->messages['pt'][] = 'Instalada';
        $this->messages['pt'][] = 'Directorio';
        $this->messages['pt'][] = 'Archivo';
        $this->messages['pt'][] = 'Escritura';
        $this->messages['pt'][] = 'Lectura';
        $this->messages['pt'][] = 'Para que sea posible continuar con la instalación usted debe dar permisos de lectura para el archivo';
        $this->messages['pt'][] = 'Para que sea posible continuar con la instalación usted debe dar permisos de escritura para el archivo';
        $this->messages['pt'][] = 'Foto';
        $this->messages['pt'][] = 'Redefinir contraseña';
        $this->messages['pt'][] = 'Una nueva seed es necesaria en application.ini por motivos de seguridad';
        $this->messages['pt'][] = 'Cambio de contraseña';
        $this->messages['pt'][] = 'Token expirado. Esta operación no es permitida';
        $this->messages['pt'][] = 'La contraseña fué alterada';
        $this->messages['pt'][] = 'Un usuario ya está registrado con este email';
        $this->messages['pt'][] = 'Credenciais LDAP erradas';
        $this->messages['pt'][] = 'Actualizar el menu sobregravando archivo existente?';
        $this->messages['pt'][] = 'Menu actualizado con éxito';
        $this->messages['pt'][] = 'Camino menu';
        $this->messages['pt'][] = 'Adiciona al menu';
        $this->messages['pt'][] = 'Remover del menu';
        $this->messages['pt'][] = 'Item removido del menu';
        $this->messages['pt'][] = 'Item adicionado al menu';
        $this->messages['pt'][] = 'Ícono';
        $this->messages['pt'][] = 'Registro de usuario';
        $this->messages['pt'][] = 'El registro de usuario está desabilitado';
        $this->messages['pt'][] = 'La recuperación de contraseñas está desabilitada';
        $this->messages['pt'][] = 'Cuenta creada';
        $this->messages['pt'][] = 'Crear cuenta';
        
        
        $this->enWords = [];
        foreach ($this->messages['en'] as $key => $value)
        {
            $this->enWords[$value] = $key;
        }
    }
    
    /**
     * Returns the singleton instance
     * @return  Instance of self
     */
    public static function getInstance()
    {
        // if there's no instance
        if (empty(self::$instance))
        {
            // creates a new object
            self::$instance = new self;
        }
        // returns the created instance
        return self::$instance;
    }
    
    /**
     * Define the target language
     * @param $lang     Target language index
     */
    public static function setLanguage($lang)
    {
        $instance = self::getInstance();
        $instance->lang = $lang;
    }
    
    /**
     * Returns the target language
     * @return Target language index
     */
    public static function getLanguage()
    {
        $instance = self::getInstance();
        return $instance->lang;
    }
    
    /**
     * Translate a word to the target language
     * @param $word     Word to be translated
     * @return          Translated word
     */
    public static function translate($word, $param1 = NULL, $param2 = NULL, $param3 = NULL)
    {
        // get the self unique instance
        $instance = self::getInstance();
        // search by the numeric index of the word
        
        if (isset($instance->enWords[$word]) and !is_null($instance->enWords[$word]))
        {
            $key = $instance->enWords[$word]; //$key = array_search($word, $instance->messages['en']);
            
            // get the target language
            $language = self::getLanguage();
            // returns the translated word
            $message = $instance->messages[$language][$key];
            
            if (isset($param1))
            {
                $message = str_replace('^1', $param1, $message);
            }
            if (isset($param2))
            {
                $message = str_replace('^2', $param2, $message);
            }
            if (isset($param3))
            {
                $message = str_replace('^3', $param3, $message);
            }
            return $message;
        }
        else
        {
            return 'Message not found: '. $word;
        }
    }
    
    /**
     * Translate a template file
     */
    public static function translateTemplate($template)
    {
        // get the self unique instance
        $instance = self::getInstance();
        // search by translated words
        if(preg_match_all( '!_t\{(.*?)\}!i', $template, $match ) > 0)
        {
            foreach($match[1] as $word)
            {
                $translated = _t($word);
                $template = str_replace('_t{'.$word.'}', $translated, $template);
            }
        }
        return $template;
    }
}

/**
 * Facade to translate words
 * @param $word  Word to be translated
 * @param $param1 optional ^1
 * @param $param2 optional ^2
 * @param $param3 optional ^3
 * @return Translated word
 */
function _t($msg, $param1 = null, $param2 = null, $param3 = null)
{
        return ApplicationTranslator::translate($msg, $param1, $param2, $param3);
}
