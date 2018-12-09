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

    function FindCategory($name, $login)
    {
        $sameCategory = Questions::find_category($name);
        if ($sameCategory) {
            $error = 'Такая категория уже существует!';
            $this->render('cases/addNewCategory', ['error' => $error]);
            self::ShowAllCategories();
            return;
        } else {
            $addCategory = Questions::add_category($login, $name);
            BaseController::redirect('cases','allCategories');
        }
    }

    function DelCategory()
    {
        $this->render('cases/delCategory');
        self::ShowAllCategories();
    }

    function ConfirmDelCategory($category)
    {
        $confirmDelCat = Questions::delete_category($category);
        self::ShowAllCategories();
    }

    function OpenCategory($catId)
    {
        $showCatQuest = Questions::show_cat_questions($catId);
        $this->render('cases/allCategoryQuest', ['showCatQuest' => $showCatQuest]);
    }

    function DelQuestion()
    {
        $this->render('cases/delQuestion');
    }

    function ConfirmDelQuestion($id)
    {
        $delQuestion = Questions::delete_questions($id);
        BaseController::redirect('cases','allCategories');
    }

    function ChangeQuest($changeId)
    {
        $editQuestion = Questions::edit_question($changeId);
        $editCategory = Questions::edit_cat();
        $showAnswer = Questions::ShowAnswer($changeId);
        $this->render('cases/editAllQuest', ['editQuestion' => $editQuestion,
        'editCategory' => $editCategory, 'showAnswer' => $showAnswer]);
    }

    function ConfirmChangeAuthor($id, $name)
    {
        if (empty($name)) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        } else {
        $changeAuth = Questions::new_author($id, $name);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
    }

    function ChangeDesc()
    {
        $this->render('cases/editQuest');
    }

    function ConfirmChangeDescription($id, $name)
    {
        $changeDesc = Questions::new_description($id, $name);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
    }

    function Publish($id)
    {
        $publish = Questions::Publish($id);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
    }

    function Hide($id)
    {
        $Hide = Questions::Hide($id);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
    }

    function ChangeCategory($id, $changeCat)
    {
        if (empty($changeCat)) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
            var_dump ($id);
        } else {
        $ChangeCategory = Questions::ChangeCategory($id, $changeCat);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
    }

    function EditAnswer($id)
    {
        $sameAnswer = Questions::SameAnswer($id);
        if ($sameAnswer) {
            BaseController::redirect('cases', "changeQuest&changeId= $id");
        }
        $this->render('cases/editAnswer');
    }

    function AllNotanswerQuest() 
    {
         $allNotanswerQuest = Questions::AllNotanswerQuest();
        $this->render('cases/allNotanswerQuest', ['allNotanswerQuest' => $allNotanswerQuest]);
    }

    function NewAnswer($changeId, $answer) 
    {
        if(empty($answer)) {
            BaseController::redirect('cases', "changeQuest&changeId= $changeId");
        } else {
        $newAnswer = Questions::NewAnswer($changeId, $answer);
        $ChangeIsDone = Questions::ChangeIsDone($changeId);
        $this->render('cases/confirmAnswer');
        }
    }

    function EditOldAnswer()
    {
        $this->render('cases/changeAnswer');
    }

    function ConfirmChangeAnswer($id, $answer) 
    {
        $chahgeAnswer = Questions::ChangeAnswer($id, $answer);
        BaseController::redirect('cases', "changeQuest&changeId= $id");
    }

    function NewQuestion() 
    {
        $editCategory = Questions::edit_cat();
        $this->render('cases/newQuestion', ['editCategory' => $editCategory]);
    }

    function NewUserQuestion() 
    {
        $name = $_POST['userName'];
        $email = $_POST['userEmail'];
        $question = $_POST['question'];
        $category = $_POST['category'];
        if (empty($name) || empty($email) || empty($question) || empty($category)) {
            $error = 'Введите все данные для создания нового вопроса';
            $editCategory = Questions::edit_cat();
            $this->render('cases/newQuestion', ['error' => $error, 'editCategory' => $editCategory]);
            return;
        } else { 
            $chahgeAnswer = Questions::NewUserQuestion($name, $email, $question, $category);
            $editCategory = Questions::edit_cat();
            $allUserQuestions = Questions::AllUserQuestions();
            BaseController::redirect('users','user');
        }
    }
}