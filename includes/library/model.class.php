<?php defined('SUPERNATURAL') || exit;

/**
 *-------------------------------------------------------/
 * @file        model.class.php                          \
 * @author      Gilmer <gilmerfranko@hotmail.com>        |
 * @copyright   (c) 2020 Gilmer Franco                  /
 *                                                       /
 *=======================================================
 *
 * @Description Este modelo se encarga de incluir las clases que se utilizan en todos los modelos/clases
 *
 *
*/

class Model 
{
    // Base de Datos (opc)
    public $db;
    
    // Configuración (opc)
    public $config;
    
    // Sesión actual (opc)
    public $session;
    
    // Constructor
    function __construct()
    {
        /* Archivo de configuración de la base de datos */
        require BG_CONF . 'config.db.php';
        
        /* Creamos la conexión */
        $this->db = new MySQLi($db['hostname'], $db['username'], $db['userpass'], $db['database']);
        
        /* Si hay algún error, lo mostramos */
        if ($this->db->connect_errno) 
        {
            die('Error al conectar: ' . $this->db->connect_error);
        }
        
        /* Se obtiene y establece la configuración */
        $query = $this->db->query('SELECT * FROM `site_configuration` ORDER BY `id` DESC LIMIT 1');
        //
        if($query == true && $query->num_rows > 0)
        {
            $config = $query->fetch_assoc();
            require BG_CONF . 'config.site.php';
            //
            $this->config = $config;
        }

        /* Se obtiene y se establece la sesión */
    }
}
