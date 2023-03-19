<?php defined('SUPERNATURAL') || exit;

/**
 *-------------------------------------------------------/
 * @file        modules\core\model\db.class.php          \
 * @author      Gilmer <gilmerfranko@hotmail.com>        |
 * @copyright   (c) 2020 Gilmer Franco                  /
 *                                                       /
 *=======================================================
 *
 * @Description Este modelo incluye funciones variadas MySQL
 * 
 *
*/

class Db extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->session = Core::model('session', 'core');
    }


    /**
     * Obtiene la cuenta de una columna
     * 
     * @param string $table
     * @param string $column
     * @param array $where
     * @return string/int/array $input
     */
    public function getCount($table = null, $column = null, $where = null)
    {
        $query = $this->db->query('SELECT COUNT(`'.$column.'`) FROM `'.$table.'` WHERE `'.$where[0].'` = \''.$this->db->real_escape_string($where[1]).'\'');
        if ($query == true && $query->num_rows > 0)
        {
            $result = $query->fetch_row();
            //
            return $result[0];
        }

        return 0;
    }
    
   /**
     * Obtiene uno o más columnas de una fila
     * 
     * @param string $table
     * @param string/array $columns
     * @param array $where
     * @return string/int/array $input
     */
    public function getColumns($table = null, $input = null, $where = null, $limit = 1, $sentence = false)
    {
        $columns = is_array($input) ? implode('`,`', $input) : $input;
        $where = is_null($where) ? 'ORDER BY RAND()' : 'WHERE `'.$where[0].'` = \''.$this->db->real_escape_string($where[1]).'\'';
        $query = $this->db->query('SELECT `'.$columns.'` FROM `'.$table.'` '.$where.' LIMIT '.$limit);
        if ($query == true && $query->num_rows > 0)
        {
            $result = $sentence == true ? $query : $query->fetch_assoc();
            //
            return is_array($input) ? $result : $result[$input];
        }

        return false;
    }

    /**
     * Elimina una fila de la base de datos
     * 
     * @param string $table     // NOMBRE DE LA TABLA
     * @param string $where     // NOMBRE COLUMNA WHERE
     * @param int $id           // ID A ELIMINAR
     * @param int $limit        // LIMITE A ELIMINAR
     * @return boolean/integer
     */
    function deleteRow($table = null, $id = null, $where = 'id', $limit = 1)
    {
        // BORRAR FILA
        $query = $this->db->query('DELETE FROM `'.$table.'` WHERE `'.$where.'` = \''.$id.'\' LIMIT '.$limit);
        //
        if ($query == true && $this->db->affected_rows > 0)
        {
            return true;
        }
        // RETORNA FALSE SI NO SE HA ELIMINADO NADA
        return false;
    }

    /**
     * Suma o Resta valor a un campo de una tabla
     * 
     * @param string $table
     * @param string $column
     * @param int $id
     * @param string $value
     * @param string $where
     * @param int $limit
     * @return boolean
     */
    function updateCount($table = null, $column = null, $id = null, $value = '+1', $where = 'id', $limit = 1)
    {
        $query = $this->db->query('UPDATE `'.$table.'` SET `'.$column.'` = `'.$column.'` '.$value.' WHERE `'.$where.'` = \''.$id.'\' LIMIT '.$limit);
        // RETORNAR
        if ($query == true && $this->db->affected_rows > 0)
        {
            return true;
        }
        //
        return false;
    }
}
