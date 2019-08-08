<?php
session_start();
include 'BaseController.php';
// include $_SERVER['DOCUMENT_ROOT'].'/models/Admin.php';  ---- Версия для ftp
// include $_SERVER['DOCUMENT_ROOT'].'/models/Questions.php';

// include $_SERVER['DOCUMENT_ROOT'].'/dip2/models/Admin.php';
// include $_SERVER['DOCUMENT_ROOT'].'/dip2/models/Questions.php';

class AdminsController extends BaseController 
{
    function index() 
    {
        $this->render('users/index');
    }

    function enter($login) 
    {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['level'] = $_POST['level'];
        $_SESSION['instructor'] = $_POST['instructor'];
        $uploadDir = 'files';
        $fileName = $_SESSION['level'];
        $path = 'C:\OSPanel\domains\WindTest\files\novice.json';
        //$data = json_decode(file_get_contents(__DIR__ .DIRECTORY_SEPARATOR .$uploadDir .DIRECTORY_SEPARATOR .$fileName), true);
        $data = json_decode(file_get_contents($path), true);
        foreach ($data as $q) {
            $name = $q['testNumber'];
            $quest = $q['question'];
            $answer = $q['options'];
            $correctAnswer = $q['answer'];
            foreach ($answer as $w => $option) {
                $options = $option;
            }
        }

        if (empty($login)) {
            $error = 'Для входа введите имя!';
            $this->render('users/index', ['error' => $error]);
            return;
        } elseif ($_POST['level'] == 'novice') {
            $this->render('users/TestPageNovice', ['options' => $options, 'name' => $name]);
        } elseif ($_POST['level'] == 'advanced') {
            $this->render('users/TestPageAdvanced');
        } elseif ($_POST['level'] == 'pro') {
            $this->render('users/TestPagePro');  
        }
    }

    

    // function goUsers() 
    // {
    //     $editCategory = Questions::editCat();
    //     $allUserQuestions = Questions::allUserQuestions();
    //     $this->render('cases/index', ['editCategory' => $editCategory, 
    //     'allUserQuestions' => $allUserQuestions]);
    // }

    // function adminPage() 
    // {
    //     $this->render('users/AdminPage');
    // }

    // function showAllAdmin() 
    // {
    //     $show_admin = Admin::showAllAdmin();
    //     if ($show_admin) {
    //         $this->render('users/AllAdmin', ['show_admin' => $show_admin]);
    //     }
    // }

    // function addAdminPage() 
    // {
    //     $this->render('users/AddNewAdmin');
    // }

    // function addNewAdmin($login, $password) 
    // {
    //     if (empty($login) || empty($password)) {
    //         $error = 'Для создания нового администратора необходимо ввести имя и пароль';
    //         $this->render('users/AddNewAdmin', ['error' => $error]);
    //     } elseif (!empty($login) && !empty($password)) {
    //         $check_admin_name = Admin::checkAdminName($login);
    //         if ($check_admin_name) {
    //             $error = 'Администратор с таким именем уже существует';
    //             $this->render('users/AddNewAdmin', ['error' => $error]);
    //         } else {
    //             $add_admin = Admin::addNewAdmin($login, $password);
    //             BaseController::redirect('users', 'allAdmin');
    //         }
    //     }
    // } 

    // function changePassword() 
    // {
    //     $this->render('users/ChangePassword');
    //     self::showAllAdmin();
    // }

    // function newPassword($login, $password) 
    // {
    //     if (!empty($password)) {
    //         $change_pass = Admin::changePassword($login,$password);
    //         BaseController::redirect('users', 'allAdmin');   
    //     } else {
    //         BaseController::redirect('users', 'allAdmin');
    //     }
    // }

    // function delAdmin () 
    // {
    //     $this->render('users/DelAdmin');
    //     self::showAllAdmin();
    // }

    // function confirmDelAdmin($login) 
    // {
    //     $confirmDell = Admin::confirmDelAdmin($login);
    //     self::showAllAdmin();
    // }
}

