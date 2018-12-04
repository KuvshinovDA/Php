<?php 
session_start();
include 'BaseController.php';
include $_SERVER['DOCUMENT_ROOT'].'/Diplom/models/Questions.php';

class CasesController extends BaseController 
{
    function index() 
    {
        $this->render('cases/index');
    }

    function ShowAllCategories() 
    {
        $showAllategories = Questions::showAllCategories();
        $this->render('cases/allCategories',['showAllategories' => $showAllategories]);
    }

    function AddNewCategory() 
    {
        $admLogin = $_SESSION['login'];
        $this->render('cases/addNewCategory', ['admLogin' => $admLogin]);
        self::ShowAllCategories();
    }

    function FindCategory()
    {
        $name = $_POST['newCategory'];
        $login = $_POST['login'];
        $sameCategory = Questions::find_category($name);
        if ($sameCategory) {
            $error = 'Такая категория уже существует!';
            $this->render('cases/addNewCategory', ['error' => $error]);
            self::ShowAllCategories();
            return;
        } else {
            $addCategory = Questions::add_category($login, $name);
            self::ShowAllCategories(); 
        }
    }

    function DelCategory()
    {
        $this->render('cases/delCategory');
        self::ShowAllCategories();
    }

    function ConfirmDelCategory()
    {
        $category = $_POST['category'];
        $confirmDelCat = Questions::delete_category($category);
        self::ShowAllCategories();
    }

    function OpenCategory()
    {
        $catId = $_POST['catId'];
        $showCatQuest = Questions::show_cat_questions($catId);
        $this->render('cases/allCategoryQuest', ['showCatQuest' => $showCatQuest]);
    }

    function DelQuestion()
    {
        $this->render('cases/delQuestion');
        //self::OpenCategory();
    }

    function ConfirmDelQuestion()
    {
        $id = $_POST['id'];
        $delQuestion = Questions::delete_questions($id);
        self::OpenCategory(); 
    }

    function ChangeQuest()
    {
        $changeId = $_POST['changeId'];
        $editQuestion = Questions::edit_question($changeId);
        $editCategory = Questions::edit_cat();
        $this->render('cases/editAllQuest', ['editQuestion' => $editQuestion,
        'editCategory' => $editCategory]);
    }

    function ConfirmChangeAuthor()
    {
        $id = $_POST['changeId'];
        $name = $_POST['changeAuthor'];
        $changeAuth = Questions::new_author($id, $name);
        self::ChangeQuest();
    }

    function ChangeDesc()
    {
        $this->render('cases/editQuest');
    }

    function ConfirmChangeDescription()
    {
        $id = $_POST['changeId'];
        $name = $_POST['description'];
        $changeDesc = Questions::new_description($id, $name);
        self::ChangeQuest();
    }

    function Publish()
    {
        $id = $_POST['changeId'];
        $publish = Questions::Publish($id);
        self::ChangeQuest();
    }

    function Hide()
    {
        $id = $_POST['changeId'];
        $Hide = Questions::Hide($id);
        self::ChangeQuest();
    }

    function ChangeCategory()
    {
        $id = $_POST['changeId'];
        $changeCat = $_POST['categoryEdit'];
        $ChangeCategory = Questions::ChangeCategory($id, $changeCat);
        self::ShowAllCategories();
        
    }

    function EditAnswer()
    {
        $name = $_POST['desc'];
        $this->render('cases/editAnswer');
    }

    function AllNotanswerQuest() 
    {
         $allNotanswerQuest = Questions::AllNotanswerQuest();
        $this->render('cases/allNotanswerQuest', ['allNotanswerQuest' => $allNotanswerQuest]);
    }

   

}