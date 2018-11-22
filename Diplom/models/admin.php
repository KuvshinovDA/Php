<?php

class User {
  static function find_by_login($login, $password) {
    $old = "SELECT id FROM user WHERE login = '$login' AND password = '$password' ";
    $data = Di::get()->db()->query($old);
    return $data->fetch();
  }
}