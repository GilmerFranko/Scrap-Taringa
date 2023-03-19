<?php defined('SUPERNATURAL') || exit;

/**
 *-------------------------------------------------------/
 * @file        common.php                               \
 * @author      Gilmer <gilmerfranko@hotmail.com>        |
 * @copyright   (c) 2020 Gilmer Franco                  /
 *                                                       /
 *=======================================================
 *
 * @Description Se definen los directorios y se incluyen las configuraciones, funciones y clases a utilizar.
 *
 *
*/

/* Tiempo de ejecución y memoria utilizada inicialmente */
define('START_MEMORY', memory_get_usage());
define('START_TIME', array_sum(explode(' ', microtime())));

/* Separador */
define('DS', DIRECTORY_SEPARATOR);

/* Directorio de includes */
define('BG_INC', __DIR__ . DS);

/* Directorio principal */
define('BG_DIR', dirname(__DIR__) . DS);

/* Directorio de librerías */
define('BG_LIB', BG_INC . 'library' . DS);

/* Directorio de configuración */
define('BG_CONF', BG_INC . 'config' . DS);

/* Directorios de módulos */
define('BG_MODS', BG_DIR . 'modules' . DS);

/* Directorios de las plantillas predefinidas */
define('BG_TEMPLATES', BG_INC . 'templates' . DS);

/* Directorios de subidas */
define('BG_UPLOADS', BG_DIR . 'filestore' . DS . 'uploads');

// ---------------------------------------------


/* Núcleo */
require BG_LIB . 'core.class.php';
    
/* Modelo padre */
require BG_LIB . 'model.class.php';

/* Configuración predeterminada */
require BG_CONF . 'config.inc.php';

/* Archivo que cargará SH-MVC */
require Core::controller('init');
