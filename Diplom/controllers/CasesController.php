<?php 
include 'BaseController.php';

class CasesController extends BaseController {
  function index() {
    $this->render('cases/index');
  }
}