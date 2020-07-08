<?php

/* file=UserModel.php.
 * PHP version 7.4
 * 
 * UserModel class. 
 * Model for all user actions..
 * 
 * @author  Maaike Tromp
 * @copyright 2020.
 */

namespace TestModelManager;

class UserModel  
{
    
    private Crud $_crud;
    private int $_user;
    
    public function __construct(User $user)
    {
        $this->_crud = Crud::getInstance(); 
        $this->_user = $user;
    }
    
    public function DoSomething($param)
    {
        // do something
    }
}