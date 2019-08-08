<?php 
session_start();
include 'BaseController.php';
//include $_SERVER['DOCUMENT_ROOT'].'/models/Questions.php'; ------ ДЛя ftp
include $_SERVER['DOCUMENT_ROOT'].'/dip2/models/Questions.php';

class CasesController extends BaseController 
{
    function index() 
    {
        $this->render('cases/index');
    }

    function showAllCategories() 
    {
        $showAllategories = Questions::showAllCategories();
        $this->render('cases/AllCategories',['showAllategories' => $showAllategories]);
    }

    function addNewCategory() 
    {
        $admLogin = $_SESSION['login'];
        $this->render('cases/AddNewCategory', ['admLogin' => $admLogin]);
        self::ShowAllCategories();
    }

    function findCategory($name, $login)
    {
        $sameCategory = Questions::findCategory($name);
        if ($sameCategory) {
            $error = 'Такая категория уже существует!';
            $this->render('cases/AddNewCategory', ['error' => $error]);
            self::showAllCategories();
            return;
        } elseif (empty($name)) {
            BaseController::redirect('cases','allCategories');
        } else {
            $addCategory = Questions::addCategory($login, $name);
            BaseController::redirect('cases','allCategories');
        }
    }

    function delCategory()
    {
        $this->render('cases/DelCategory');
        self::showAllCategories();
    }

    function confirmDelCategory($category)
    {
        $confirmDelCat = Questions::deleteCategory($category);
        self::showAllCategories();
    }

    function openCategory($catId)
    {
        $showCatQuest = Questions::showCatQuestions($catId);
        $this->render('cases/AllCategoryQuest', ['showCatQuest' => $showCatQuest]);
    }

    function delQuestion()
    {
        $this->render('cases/DelQuestion');
    }

    function confirmDelQuestion($id)
    {
        $delQuestion = Questions::deleteQuestions($id);
        BaseController::redirect('cases','allCategories');
    }

    function changeQuest($changeId)
    {
        $editQuestion = Questions::editQuestion($changeId);
        $editCategory = Questions::editCat();
        $showAnswer = Questions::showAnswer($changeId);
        $this->render('cases/EditAllQuest', ['editQuestion' => $editQuestion,
        'editCategory' => $editCategory, 'showAnswer' => $showAnswer]);
    }

    function confirmChangeAuthor($id, $name)
    {
        if (empty($name)) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        } else {
            $changeAuth = Questions::newAuthor($id, $name);
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
    }

    function changeDesc()
    {
        $this->render('cases/EditQuest');
    }

    function confirmChangeDescription($id, $name)
    {
        if (empty($name)) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        } else { 
            $changeDesc = Questions::newDescription($id, $name);
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
    }

    function publish($id)
    {
        $publish = Questions::publish($id);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
    }

    function hide($id)
    {
        $Hide = Questions::hide($id);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
    }

    function changeCategory($id, $changeCat)
    {
        if (empty($changeCat)) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
            var_dump ($id);
        } else {
            $ChangeCategory = Questions::changeCategory($id, $changeCat);
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
    }

    function editAnswer($id)
    {
        $sameAnswer = Questions::sameAnswer($id);
        if ($sameAnswer) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
        $this->render('cases/EditAnswer');
    }

    function allNotanswerQuest() 
    {
        $allNotanswerQuest = Questions::allNotanswerQuest();
        $this->render('cases/AllNotanswerQuest', ['allNotanswerQuest' => $allNotanswerQuest]);
    }

    function newAnswer($changeId, $answer) 
    {
        if(empty($answer)) {
            BaseController::redirect('cases', "changeQuest&changeId= $changeId");
        } else {
            $newAnswer = Questions::newAnswer($changeId, $answer);
            $ChangeIsDone = Questions::changeIsDone($changeId);
            $this->render('cases/ConfirmAnswer');
        }
    }

    function editOldAnswer()
    {
        $this->render('cases/ChangeAnswer');
    }

    function confirmChangeAnswer($id, $answer)  
    {
        if (empty($answer)) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        } else {
            $chahgeAnswer = Questions::changeAnswer($id, $answer);
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
    }

    function newQuestion() 
    {
        $editCategory = Questions::editCat();
        $this->render('cases/NewQuestion', ['editCategory' => $editCategory]);
    }

    function newUserQuestion() 
    {
        $name = $_POST['userName'];
        $email = $_POST['userEmail'];
        $question = $_POST['question'];
        $category = $_POST['category'];
        if (empty($name) || empty($email) || empty($question) || empty($category)) {
            $error = 'Введите все данные для создания нового вопроса';
            $editCategory = Questions::editCat();
            $this->render('cases/NewQuestion', ['error' => $error, 'editCategory' => $editCategory]);
            return;
        } else { 
            $chahgeAnswer = Questions::newUserQuestion($name, $email, $question, $category);
            $editCategory = Questions::editCat();
            $allUserQuestions = Questions::allUserQuestions();
            BaseController::redirect('users','user');
        }
    }
}