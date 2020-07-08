<?php

namespace TestModelManager;
/* file=ModelManagerClass.php.
 * PHP version 7.4
 * 
 * Singleton trait. 
 * Provides the standard code for a singleton pattern.
 * 
 * @author  Maaike Tromp
 * @copyright 2020.
 */

trait tSingleton    
{
    private static $_instance; // instantie van het object

    public static function getInstance() : Object  {
        $class = __CLASS__;
        if(isset(self::$_instance))  {
            return self::$_instance;
        }
        else {
            self::$_instance = new $class;
            return self::$_instance;
        }
    }

    public function __clone()   {
        throw new \Exception('Cloning '. __CLASS__ .' is not allowed.');
    }

    public function __wakeup()  {
        throw new \Exception('Unserializing '. __CLASS__ .' is not allowed.');
    }
}
