<?php 
session_start();

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
    $admins_controller->registration();
  } elseif ($action == 'user') {
    $admins_controller->go_to();
  } elseif ($action == 'mainAdmin') {
    $admins_controller->adminPage();
  } elseif ($action == 'all_admin') {
    $admins_controller->show_all_admin();
  } elseif ($action == 'add_admin') {
    $admins_controller->add_admin_page();
  } elseif ($action == 'add_new_admin') {
    $admins_controller->add_new_admin();
  } elseif ($action == 'change_password') {
    $admins_controller->change_password();
  } elseif ($action == 'new_pass') {
    $admins_controller->new_password();
  } elseif ($action == 'delAdmin') {
    $admins_controller->delAdmin();
  } elseif ($action == 'cancelDelAdmin') {
    $admins_controller->show_all_admin();
  } elseif ($action == 'confirmDelAdmin') {
    $admins_controller->confirmDelAdmin();
  } else {
    $admins_controller->index();
  }
  
} 

// if ($controller == 'cases') {
//   include 'controllers/cases_controller.php';
//   $cases_controller = new CasesController();
//   $cases_controller->index();
// }
// include 'controller/cases_controller.php';
// $cases_controller = new CasesController();
// if ($action == 'reg') {
//   $cases_controller->Registration();
// } elseif ($action == 'add') {
//   $cases_controller->add();
// } elseif ($action == 'update') {
//   $cases_controller->update();
// } elseif ($action == 'delete') {
//   $cases_controller->delete();
// }