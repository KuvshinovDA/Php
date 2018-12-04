<?php
include 'BaseController.php';
include $_SERVER['DOCUMENT_ROOT'].'/Diplom/models/user.php';

class UsersController extends BaseController 
{

    function ChangeAuthor()
    {
        $this->render('users/change_author_name');
    }

    
 }    