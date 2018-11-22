<?php

include 'base_controller.php';
include $_SERVER['DOCUMENT_ROOT'].'/Php/Diplom/models/user.php';

class UsersController extends BaseController {
  function index() {
    $this->render('users/index');
  }

  function registration() {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $user = User::find_by_login($login, $password);
    if (empty($login) || empty($password)) {
      $error_reg = 'Для входа введите имя и пароль';
      $this->render('users/index', ['error' => $error_reg]);
      return;
    }
    
    if ($user) {
      $_SESSION['user_id'] = $user->id;
      $this->redirect('cases', 'index');

    } elseif ($user) {
      $user = User::same($login, $password); 
        $error_reg = 'Пользователь с таким именем уже существует';
        $this->render('users/index', ['error' => $error_reg]);
        return; 
    }
    else {
      $user = User::add($login, $password);
      $_SESSION['user_id'] = $user->id;
      $this->redirect('cases', 'index');
    } 
  }
  function auth() {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = User::find_by_login($login, $password);
    if (empty($login) || empty($password)) {
      $error_auth = 'Для входа введите имя и пароль';
      $this->render('users/index', ['error' => $error_auth]);
      return;
    }
    if ($user) {
      $_SESSION['user_id'] = $user->id;
      $this->redirect('cases', 'index');
    } else {
      $error_auth = 'Неверное имя или пароль';
      $this->render('users/index', ['error' => $error_auth]);
    }
  }
}