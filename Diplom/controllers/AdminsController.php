<?php
include 'BaseController.php';
include $_SERVER['DOCUMENT_ROOT'].'/Php/Diplom/models/admin.php';

class AdminsController extends BaseController {
  function index() {
    $this->render('users/index');
  }

  function registration() {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $admin = Admin::find_by_login($login, $password);
    if (empty($login) || empty($password)) {
      $error = 'Для входа введите имя и пароль';
      $this->render('users/index', ['error' => $error]);
      return;
    } elseif (!$admin) {
      $error = 'Неправильный логин и/или пароль';
      $this->render('users/index', ['error' => $error]);
      return;
    } else {
        $this->render('cases/admin_page');
    }
  }

  function go_to() {
    $this->render('cases/main');
  }

  function adminPage() {
    $this->render('cases/admin_page');
  }

  function show_all_admin() {
    $show_admin = Admin::show_all_admin();
    if ($show_admin) {
      $this->render('users/AllAdmin', ['show_admin' => $show_admin]);
    }
  }

  function add_admin_page() {
    $this->render('users/add_new_admin');
  }

  function add_new_admin() {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (empty($login) || empty($password)) {
      $error = 'Для создания нового администратора необходимо ввести имя и пароль';
      $this->render('users/add_new_admin', ['error' => $error]);
    } elseif (!empty($login) && !empty($password)) {
        $check_admin_name = Admin::check_admin_name($login);
        if ($check_admin_name) {
          $error = 'Администратор с таким именем уже существует';
          $this->render('users/add_new_admin', ['error' => $error]);
        } else {
          $add_admin = Admin::add_new_admin($login, $password);
          self::show_all_admin(); 
        }
      }
  } 
  function change_password() {
    $this->render('users/change_password');
    self::show_all_admin();
  }

  function new_password() {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (!empty($password)) {
      $change_pass = Admin::change_password($login,$password);
      self::show_all_admin();
    } else {
      self::show_all_admin();
    }
  }

  function delAdmin () {
    $this->render('users/delAdmin');
    self::show_all_admin();
  }

  function confirmDelAdmin() {
    $login = $_POST['login'];
    $confirmDell = Admin::confirmDelAdmin($login);
    self::show_all_admin();
  }
}