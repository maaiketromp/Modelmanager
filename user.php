<?php

/* file=ModelManagerClass.php.
 * PHP version 7.4
 * 
 * User Class. 
 * Stores user information.
 * 
 * @author  Maaike Tromp
 * @copyright 2020.
 */

namespace TestModelManager;

class User  
{
    
    private $username;
    private $id;
    private $password;
    
    public function __construct($id, $username, $password = '')
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    
    public function DoSomething()
    {
        // do stuff.
    }
}