<?php

class Admin 
{
    static function findByLogin($login, $password) 
    {
        $sth = Di::get()->db()->prepare("SELECT id FROM admin WHERE login = :login AND password = :password");
        $sth->bindValue(':login', $login);
        $sth->bindValue(':password', $password);
        $sth->execute();
        return $sth->fetch();
    }

    static function showAllAdmin() 
    {
        $sth = Di::get()->db()->prepare("SELECT * FROM admin");
        $sth->execute();
        return $sth->fetchAll();
    }

    static function checkAdminName($login) 
    {
        $sth = Di::get()->db()->prepare("SELECT id FROM admin WHERE login = :login");
        $sth->bindValue(':login', $login);
        $sth->execute();
        return $sth->fetch();
    }

    static function addNewAdmin($login, $password) 
    {
        $sth = Di::get()->db()->prepare("INSERT INTO admin (login, password)
        VALUES (:login,:password)");
        $sth->bindValue(':login', $login);
        $sth->bindValue(':password', $password);
        return $sth->execute();
    }

    static function changePassword ($login,$password) 
    {
        $sth = Di::get()->db()->prepare("UPDATE admin SET password = :password WHERE login = :login");
        $sth->bindValue(':login', $login);
        $sth->bindValue(':password', $password);
        return $sth->execute();
    }
    
    static function confirmDelAdmin($login) 
    {
        $sth = Di::get()->db()->prepare("DELETE FROM admin WHERE login = :login");
        $sth->bindValue(':login', $login);
        return $sth->execute();
    }
}