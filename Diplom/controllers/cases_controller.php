<?php 
include 'base_controller.php';

class CasesController extends BaseController {
  function index() {
    $this->render('cases/index');
  }
}