<?php 

$action = '';
$controller = '';

if (! isset($_REQUEST['c']) || ! isset($_REQUEST['a'])) {
    $controller = 'users';
} else {
    $controller = $_REQUEST['c'];
    $action = $_REQUEST['a'];
}

if ($controller == 'users') {
    include 'controllers/AdminsController.php';

    $admins_controller = new AdminsController();
    if ($action == 'auth') {
        $admins_controller->registration($_POST['login'], $_POST['password']);
    } elseif ($action == 'user') {
        $admins_controller->go_to();
    } elseif ($action == 'mainAdmin') {
        $admins_controller->adminPage();
    } elseif ($action == 'all_admin') {
        $admins_controller->show_all_admin();
    } elseif ($action == 'add_admin') {
        $admins_controller->add_admin_page();
    } elseif ($action == 'add_new_admin') {
        $admins_controller->add_new_admin($_POST['login'], $_POST['password']);
    } elseif ($action == 'change_password') {
        $admins_controller->change_password();
    } elseif ($action == 'new_pass') {
        $admins_controller->new_password($_POST['login'], $_POST['password']);
    } elseif ($action == 'delAdmin') {
        $admins_controller->delAdmin();
    } elseif ($action == 'cancelDelAdmin') {
        $admins_controller->show_all_admin();
    } elseif ($action == 'confirmDelAdmin') {
        $admins_controller->confirmDelAdmin($_GET['login']);
    } else {
        $admins_controller->index();
    } 
} 

if ($controller == 'cases') {
include 'controllers/CasesController.php';
$casesController = new CasesController();

    if ($action == 'allCategories') {
        $casesController->ShowAllCategories();
    } elseif ($action == 'addNewCategory') {
        $casesController->AddNewCategory();
    } elseif ($action == 'addCategory') {
        $casesController->FindCategory($_POST['newCategory'], $_POST['login']);
    } elseif ($action == 'delCategory') {
        $casesController->DelCategory();
    } elseif ($action == 'confirmDelCategory') {
        $casesController->ConfirmDelCategory($_GET['category']);
    } elseif ($action == 'openCategory') {
        $casesController->OpenCategory($_GET['catId']);
    } elseif ($action == 'delQuestion') {
        $casesController->DelQuestion();
    } elseif ($action == 'confirmDelQuestion') {
        $casesController->ConfirmDelQuestion($_GET['catId']);
    } elseif ($action == 'openQuestion') {
        $casesController->OpenQuestion();
    } elseif ($action == 'changeQuest') {
        $casesController->ChangeQuest($_GET['changeId']);
    } elseif ($action == 'confirmChangeAuthor') {
        $casesController->ConfirmChangeAuthor($_POST['changeId'], $_POST['new_name']);
    } elseif ($action == 'changeDesc') {
        $casesController->ChangeDesc(); 
    } elseif ($action == 'confirmChangeDescription') {
        $casesController->ConfirmChangeDescription($_POST['changeId'], $_POST['description']); 
    } elseif ($action == 'publish') {
        $casesController->Publish($_POST['changeId']); 
    } elseif ($action == 'hide') {
        $casesController->Hide($_POST['changeId']); 
    } elseif ($action == 'changeCategory') {
        $casesController->ChangeCategory($_POST['changeId'], $_POST['categoryEdit']); 
    } elseif ($action == 'editAnswer') {
        $casesController->EditAnswer($_GET['changeId']); 
    } elseif ($action == 'allNotanswerQuest') {
        $casesController->AllNotanswerQuest(); 
    } elseif ($action == 'newAnswer') {
        $casesController->NewAnswer($_POST['changeId'], $_POST['answer']); 
    } elseif ($action == 'editOldAnswer') {
        $casesController->EditOldAnswer(); 
    } elseif ($action == 'confirmChangeAnswer') {
        $casesController->ConfirmChangeAnswer($_POST['changeId'], $_POST['answer']); 
    } elseif ($action == 'newQuestion') {
        $casesController->NewQuestion(); 
    } elseif ($action == 'newUserQuestion') {
        $casesController->NewUserQuestion(); 
    }  
}

    if ($controller == 'newUser') {
        include 'controllers/UsersController.php';
        $UsersController = new UsersController();

    if ($action == 'changeAuthor') {
        $UsersController->ChangeAuthor();
    } 
        
}
    