<?php 

// Обработка введенных данных от пользователя
session_start();

if (! isset($_REQUEST['c']) || ! isset($_REQUEST['a'])) {
  $controller = 'users';
} else {
  $controller = $_REQUEST['c'];
  $action = $_REQUEST['a'];
}

if ($controller == 'users') {
  include 'controllers/users_controller.php';

  $users_controller = new UsersController();
  if ($action == 'reg') {
    $users_controller->registration();
  } elseif ($action == 'auth') {
    $users_controller->auth();
  }
   else {
    $users_controller->index();
  }
} elseif ($controller == 'cases') {
  include 'controllers/cases_controller.php';
  $cases_controller = new CasesController();
  $cases_controller->index();
}
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