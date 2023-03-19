<?php defined('SUPERNATURAL') || exit;

/**
 *-------------------------------------------------------/
 * @file        core.class.php                           \
 * @author      Gilmer <gilmerfranko@hotmail.com>        |
 * @copyright   (c) 2020 Gilmer Franco                  /
 *                                                       /
 *=======================================================
 *
 * @Description Este modelo ayudará a cargar archivos y evitar algunas lineas de código
 *
 *
*/

final class Core
{
    /**
     * Módulo actual
     * 
     * @var string
     */
    public static $sModule = 'core';
    
    /**
     * Sección actual
     * 
     * @var string
     */
    public static $sSection = 'posts';
    
    /**
     * Config
     * 
     * @var array
     */
    private static $aConfig = array();
    
    /**
     * Modelos cargados
     * 
     * @var objects
     */
    public static $oModels = array();
    
    /**
     * Establecer módulo
     */
    public static function setModule($sModule, $sSection, $config)
    {
        self::$sModule = $sModule;
        //
        self::$sSection = $sSection;
        //
        self::$aConfig = $config;
    }

    /**
     * Cargar controlador
     */
    public static function controller($sController = 'index', $sModule = '')
    {
        $sFile = BG_MODS . ( !empty($sModule) ? $sModule : self::$sModule ) . DS . 'controller' . DS . $sController . '.php';
        
        return self::file($sFile);
    }
    
    /**
     * Cargar modelo
     */
    public static function model($sModel, $sModule = '')
    {
        $sFile = self::file(BG_MODS . (($sModule) ? $sModule : self::$sModule) . DS . 'model' . DS . $sModel . '.class.php');
        
        if($sFile)
        {
            $sHash = md5($sModel);
            if(isset(self::$oModels[$sHash]))
            {
                return self::$oModels[$sHash];
            }
            
            require $sFile;
                        
            self::$oModels[$sHash] = new $sModel();
            
            return self::$oModels[$sHash];
        }
    }
    /**
     * Cargar plantilla
     */
    public static function view($sTemplate, $sModule = '', $alternative = false)
    {
        $sFile = BG_MODS . (($sModule) ? $sModule : self::$sModule) . DS . 'view' . DS . $sTemplate . '.html.php';
        
        return self::file($sFile, $alternative);
    }
    
    /**
     * Cargar Archivo
     */
    public static function file($sFile, $alternative = false)
    {
        if(file_exists($sFile))
        {
            return $sFile;
        }
        else
        {
            if($alternative == false)
            {
                echo 'Lo sentimos el archivo <strong>'.$sFile.'</strong> no fue localizado.';
                exit;
            }
            else
            {
                $alternative = is_string($alternative) ? $alternative : 'index';
                $section = isset($_GET['section']) ? stripslashes($_GET['section']) : 'index';
                //
                return self::view($alternative, '', $section);
            }
        }

        return false;
    }
    
    /**
     * Configs
     */
    public static function config($sName)
    {
        if(isset(self::$aConfig[$sName]))
        {
            return self::$aConfig[$sName];
        }
        
        exit('Falta la variable: ' . $sName);
    }
}
