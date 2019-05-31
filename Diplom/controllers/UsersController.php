<?php
include 'BaseController.php';

class UsersController extends BaseController 
{
    function ChangeAuthor()
    {
        $this->render('users/ChangeAuthorName');
    }
}    