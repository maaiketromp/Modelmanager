<?php

/* file=ModelManagerClass.php.
 * PHP version 7.4
 * 
 * Crud class. 
 * Handles all database requests from the models. Singleton.
 * 
 * @author  Maaike Tromp
 * @copyright 2020.
 */

namespace TestModelManager;

class Crud implements iSingleton
{
    use tSingleton;
    
    private $_dbparams = [
        'host'  => 'localhost',
        'user'  => 'db_user_root',
        'pwd'   => 'password',
        'db'    => 'databasename'
    ];
    private $_pdo;
    
    public function __construct() 
    {
        if(!$this->_initialise())
        {
            die("Cannot make connection to database");
        }
    }
    
    private function _initialise()   
    {
        $result = false;
        for ($i = 0; $i < 5; $i++)
        {
            $dsn = sprintf('mysql:host=%s;dbname=%s',
            $this->_dbparams['host'], $this->_dbparams['db']);
            $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->_pdo = new PDO($dsn, $this->_dbparams['user'],
                                $this->_dbparams['pwd'], $opt);
            if ($this->_pdo != null)    
            {
                $result = true;
                break;
            }
            sleep(0.8);
        }
        return $result;
    }
    
    public function Insert($sql, $params)
    {
        $st = $this->_pdo->prepare($sql);
        foreach ($params as $param)    
        {
            // ensures user provided the three arguments for bindvalue().
            if (count($param) != 3)
            {
                throw new \Throwable('format parameter incorrect.');
            }
            else if(gettype($param[1]) == 'string' and $param[2] == PDO::PARAM_INT)
            {
                throw new \Throwable('Incompatible data type for parameter' . $param[0]);
            }
            else
            {
                $st->bindValue($param[0], $param[1], $param[2]);
            }
        }
        
        try
        {
            $st->execute();
            return $this->_pdo->lastInsertId();
        } 
        catch (PDOException $e) 
        {
            // log e->message.
            return -1; 
        }
    }
    
    public function Select($sql, $params)
    {
        $st = $this->_pdo->prepare($sql);
        foreach ($params as $param)    
        {
            // ensures user provided the three arguments for bindvalue().
            if (count($param) != 3)
            {
                throw new \Throwable('format parameter incorrect.');
            }
            else if(gettype($param[1]) == 'string' and $param[2] == PDO::PARAM_INT)
            {
                throw new \Throwable('Incompatible data type for parameter' . $param[0]);
            }
            else
            {
                $st->bindValue($param[0], $param[1], $param[2]);
            }
        }
        
        try
        {
            $st->execute();
            $result = $st->fetchAll(PDO::FETCH_ASSOC);
            return $result;    
        } 
        catch (PDOException $e) 
        {
            // log e->message.
            return null; 
        }
    }
    
    public function Update(string $sql, array &$params)
    {
        $st = $this->_pdo->prepare($sql);
        foreach ($params as $param)    
        {
            // ensures user provided the three arguments for bindvalue().
            if (count($param) != 3)
            {
                throw new \Throwable('format parameter incorrect.');
            }
            else if(gettype($param[1]) == 'string' and $param[2] == PDO::PARAM_INT)
            {
                throw new \Throwable('Incompatible data type for parameter' . $param[0]);
            }
            else
            {
                $st->bindValue($param[0], $param[1], $param[2]);
            }
        }
        
        try
        {
            $result = $st->execute();
            return $result;
        }
        catch(PDOException $e)
        {
            // log error.
            return $false;
        }
    }
}