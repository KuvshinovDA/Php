<?php
session_start();
include 'BaseController.php';
include $_SERVER['DOCUMENT_ROOT'].'/Diplom/models/Admin.php';
include $_SERVER['DOCUMENT_ROOT'].'/Diplom/models/Questions.php';

class AdminsController extends BaseController 
{
    function index() 
    {
        $this->render('users/index');
    }

    function registration($login, $password) 
    {
        $admin = Admin::findByLogin($login, $password);
        if (empty($login) || empty($password)) {
            $error = 'Для входа введите имя и пароль';
            $this->render('users/index', ['error' => $error]);
            return;
        } elseif (!$admin) {
            $error = 'Неправильный логин и/или пароль';
            $this->render('users/index', ['error' => $error]);
            return;
        } else {
            $_SESSION['login'] = $_POST['login'];
            $this->render('users/AdminPage');
        }
    }

    function goUsers() 
    {
        $editCategory = Questions::editCat();
        $allUserQuestions = Questions::allUserQuestions();
        $this->render('cases/index', ['editCategory' => $editCategory, 
        'allUserQuestions' => $allUserQuestions]);
    }

    function adminPage() 
    {
        $this->render('users/AdminPage');
    }

    function showAllAdmin() 
    {
        $show_admin = Admin::showAllAdmin();
        if ($show_admin) {
            $this->render('users/AllAdmin', ['show_admin' => $show_admin]);
        }
    }

    function addAdminPage() 
    {
        $this->render('users/AddNewAdmin');
    }

    function addNewAdmin($login, $password) 
    {
        if (empty($login) || empty($password)) {
            $error = 'Для создания нового администратора необходимо ввести имя и пароль';
            $this->render('users/AddNewAdmin', ['error' => $error]);
        } elseif (!empty($login) && !empty($password)) {
            $check_admin_name = Admin::checkAdminName($login);
            if ($check_admin_name) {
                $error = 'Администратор с таким именем уже существует';
                $this->render('users/AddNewAdmin', ['error' => $error]);
            } else {
                $add_admin = Admin::addNewAdmin($login, $password);
                BaseController::redirect('users', 'allAdmin');
            }
        }
    } 

    function changePassword() 
    {
        $this->render('users/ChangePassword');
        self::showAllAdmin();
    }

    function newPassword($login, $password) 
    {
        if (!empty($password)) {
            $change_pass = Admin::changePassword($login,$password);
            BaseController::redirect('users', 'allAdmin');   
        } else {
            BaseController::redirect('users', 'allAdmin');
        }
    }

    function delAdmin () 
    {
        $this->render('users/DelAdmin');
        self::showAllAdmin();
    }

    function confirmDelAdmin($login) 
    {
        $confirmDell = Admin::confirmDelAdmin($login);
        self::showAllAdmin();
    }
}

