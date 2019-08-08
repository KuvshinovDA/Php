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
        $admins_controller->enter($_POST['login']);
    // } elseif ($action == 'user') {
    //     $admins_controller->goUsers();
    // } elseif ($action == 'mainAdmin') {
    //     $admins_controller->adminPage();
    // } elseif ($action == 'allAdmin') {
    //     $admins_controller->showAllAdmin();
    // } elseif ($action == 'addAdmin') {
    //     $admins_controller->addAdminPage();
    // } elseif ($action == 'addNewAdmin') {
    //     $admins_controller->addNewAdmin($_POST['login'], $_POST['password']);
    // } elseif ($action == 'changePassword') {
    //     $admins_controller->changePassword();
    // } elseif ($action == 'newPass') {
    //     $admins_controller->newPassword($_POST['login'], $_POST['password']);
    // } elseif ($action == 'delAdmin') {
    //     $admins_controller->delAdmin();
    // } elseif ($action == 'cancelDelAdmin') {
    //     $admins_controller->showAllAdmin();   
    // } elseif ($action == 'confirmDelAdmin') {
    //     $admins_controller->confirmDelAdmin($_GET['login']);
     } else {
         $admins_controller->index();
       } 
} 

if ($controller == 'cases') {
include 'controllers/CasesController.php';
$casesController = new CasesController();

//     if ($action == 'allCategories') {
//         $casesController->showAllCategories();
//     } elseif ($action == 'addNewCategory') {
//         $casesController->addNewCategory();
//     } elseif ($action == 'addCategory') {
//         $casesController->findCategory($_POST['newCategory'], $_POST['login']);
//     } elseif ($action == 'delCategory') {
//         $casesController->delCategory();
//     } elseif ($action == 'confirmDelCategory') {
//         $casesController->confirmDelCategory($_GET['category']);
//     } elseif ($action == 'openCategory') {
//         $casesController->openCategory($_GET['catId']);
//     } elseif ($action == 'delQuestion') {
//         $casesController->delQuestion();
//     } elseif ($action == 'confirmDelQuestion') {
//         $casesController->confirmDelQuestion($_GET['catId']); 
//     } elseif ($action == 'changeQuest') {
//         $casesController->changeQuest($_GET['changeId']);
//     } elseif ($action == 'confirmChangeAuthor') {
//         $casesController->confirmChangeAuthor($_POST['changeId'], $_POST['new_name']);
//     } elseif ($action == 'changeDesc') {
//         $casesController->changeDesc(); 
//     } elseif ($action == 'confirmChangeDescription') {
//         $casesController->confirmChangeDescription($_POST['changeId'], $_POST['description']); 
//     } elseif ($action == 'publish') {
//         $casesController->publish($_POST['changeId']); 
//     } elseif ($action == 'hide') {
//         $casesController->hide($_POST['changeId']); 
//     } elseif ($action == 'changeCategory') {
//         $casesController->changeCategory($_POST['changeId'], $_POST['categoryEdit']); 
//     } elseif ($action == 'editAnswer') {
//         $casesController->editAnswer($_GET['changeId']); 
//     } elseif ($action == 'allNotanswerQuest') {
//         $casesController->allNotanswerQuest(); 
//     } elseif ($action == 'newAnswer') {
//         $casesController->newAnswer($_POST['changeId'], $_POST['answer']); 
//     } elseif ($action == 'editOldAnswer') {
//         $casesController->editOldAnswer(); 
//     } elseif ($action == 'confirmChangeAnswer') {
//         $casesController->confirmChangeAnswer($_POST['changeId'], $_POST['answer']); 
//     } elseif ($action == 'newQuestion') {
//         $casesController->newQuestion(); 
//     } elseif ($action == 'newUserQuestion') {
//         $casesController->newUserQuestion(); 
//     }  
}

    if ($controller == 'newUser') {
        include 'controllers/UsersController.php';
        $UsersController = new UsersController();

    if ($action == 'changeAuthor') {
        $UsersController->ChangeAuthor();
    } 
        
}


    