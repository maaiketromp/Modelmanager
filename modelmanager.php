<?php
/* file=ModelManagerClass.php.
 * PHP version 7.4
 * 
 * Modelmanager class. 
 * Provides, creates and stores models. Ensures that, for each modelclass the same instance is returned.
 * 
 * @author  Maaike Tromp
 * @copyright 2020.
 */

namespace TestModelManager;

abstract class ModelManager  
{
    
    private static $_elementModel;
    private static $_userModel;
    private static $_shopModel;

    public function getUserModel(User $user = null) : UserModel
    {
        if (!isset(self::$_userModel))
        {
            self::$_userModel = new UserModel($user);
        }
        
        return self::$_userModel;
    }

    public function getElementModel(int $pageId = 0) : ElementModel
    {
        if (!isset(self::$_elementModel))
        {
            self::$_elementModel = new ElementModel($pageId);
        }

        return self::$_elementModel;
    }

    public function getShopModel() : ShopModel
    {
        if (!isset(self::$_shopModel))
        {
            self::$_shopModel = new ShopModel();
        }

        return self::$_shopModel;
    }
}
