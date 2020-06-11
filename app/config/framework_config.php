<?php
// Saber si se está trabajando de forma local o remota. La funcion in_array devuelve true o false
define('IS_LOCAL'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

// Definir el uso horario o timezone del sistema
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Lenguaje
define('LANG'       , 'es');

// Ruta base del proyecto
define('BASEPATH'   , IS_LOCAL ? '/Florencia/' : '____BASEPATH DE PRODUCCIÓN___');

// Sal del sistema
define('AUTH_SALT'  , 'Th3S4ltBy2M');

// Puerto y URL del sitio
define('PORT'       , '');
define('URL'        , IS_LOCAL ? 'http://localhost:'.PORT.'/Florencia/' : '___URL DE PRODUCCIÓN___');

// Rutas de directorios y archivos
define('DS'         , DIRECTORY_SEPARATOR);
define('ROOT'       , getcwd().DS);

define('APP'        , ROOT.'app'.DS);
define('CLASSES'    , APP.'classes'.DS);
define('CONFIG'     , APP.'config'.DS);
define('CONTROLLERS', APP.'controllers'.DS);
define('FUNCTIONS'  , APP.'functions'.DS);
define('MODELS'     , APP.'models'.DS);

define('TEMPLATES'  , ROOT.'templates'.DS);
define('INCLUDES'   , TEMPLATES.'includes'.DS);
define('MODULES'    , TEMPLATES.'modules'.DS);
define('VIEWS'      , TEMPLATES.'views'.DS);

// Rutas de archivos o assets con base URL
define('ASSETS'     , URL.'assets/');
define('CSS'        , ASSETS.'css/');
define('FAVICON'    , ASSETS.'favicon/');
define('FONTS'      , ASSETS.'fonts/');
define('IMAGES'     , ASSETS.'images/');
define('JS'         , ASSETS.'js/');
define('PLUGINS'    , ASSETS.'plugins/');
define('UPLOADS'    , ASSETS.'uploads/');

// Setear conexión local o de desarrollo
define('LDB_ENGINE' , 'mysql');
define('LDB_HOST'   , 'localhost');
define('LDB_NAME'   , 'mifadu');
define('LDB_USER'   , 'root');
define('LDB_PASS'   , 'root');
define('LDB_CHARSET', 'utf8');

// Setear conexión en producción o servidor real
define('DB_ENGINE'  , 'mysql');
define('DB_HOST'    , 'localhost');
define('DB_NAME'    , '___REMOTE DB___');
define('DB_USER'    , '___REMOTE DB___');
define('DB_PASS'    , '___REMOTE DB___');
define('DB_CHARSET' , '___REMOTE CHARTSET___');

// El controlador por defecto, el método por defecto y el controlador de errores por defecto
define('DEFAULT_CONTROLLER'      , 'login');
define('DEFAULT_ERROR_CONTROLLER', 'error');
define('DEFAULT_METHOD'          , 'index');
