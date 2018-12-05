<?php

class Questions 
{
    static function showAllCategories() 
    {
        $sth = Di::get()->db()->prepare("SELECT categories.id as catId, categories.name AS categories, 
        COUNT(questions.category_id) AS total,
        COUNT(IF(questions.is_done='0',1,NULL)) AS done, COUNT(IF(questions.hide='1',1,NULL)) AS hide 
        FROM categories LEFT JOIN questions 
        ON questions.category_id = categories.id GROUP BY categories.name");
        $sth->execute();
        return $sth->fetchAll();
    }

    static function find_category($name) 
    {
        $sth = Di::get()->db()->prepare("SELECT id FROM categories WHERE name = :name");
        $sth->bindValue(':name', $name);
        $sth->execute();
        return $sth->fetch();
    }

    static function add_category($login, $name) 
    {
        $sth = Di::get()->db()->prepare("INSERT INTO categories (name, author) 
        VALUES (:name, :login)");
        $sth->bindValue(':name', $name);
        $sth->bindValue(':login', $login);
        $sth->execute();
        return $sth->fetch();
    }

    static function delete_category($category)
    {
        $sth = Di::get()->db()->prepare("DELETE FROM categories WHERE name = :category");
        $sth->bindValue(':category', $category);
        return $sth->execute();
    }

    static function show_cat_questions($catId)
    {
        $sth = Di::get()->db()->prepare("SELECT id, category_id, 
        description, is_done, hide, date_added 
        FROM questions WHERE category_id = :catId");
        $sth->bindValue(':catId', $catId);
        $sth->execute();
        return $sth->fetchAll();
    }

    static function delete_questions($id)
    {
        $sth = Di::get()->db()->prepare("DELETE FROM questions WHERE id = :id");
        $sth->bindValue(':id', $id);
        return $sth->execute();
    }

    static function edit_question($changeId)
    {
        $sth = Di::get()->db()->prepare("SELECT id, author, description, is_done, hide, date_added 
        FROM questions WHERE id = :id" );
        $sth->bindValue(':id', $changeId);
        $sth->execute();
        return $sth->fetchAll();
    }

    static function edit_cat() 
    {
        $sth = Di::get()->db()->prepare("SELECT id, name FROM categories" );
        $sth->execute();
        return $sth->fetchAll();
    }

    static function ShowAnswer($changeId)
    {
        $sth = Di::get()->db()->prepare("SELECT description FROM answers WHERE question_id = :id");
        $sth->bindValue(':id', $changeId);
        $sth->execute();
        return $sth->fetchAll();
    }

    static function new_author($id, $name) 
    {
        $sth = Di::get()->db()->prepare("UPDATE questions SET author= :name WHERE id = :id");
        $sth->bindValue(':name', $_POST['new_name']);
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetch();
    }

    static function new_description($id, $description) 
    {
        $sth = Di::get()->db()->prepare("UPDATE questions SET description = :description WHERE id = :id");
        $sth->bindValue(':description', $_POST['description']);
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetch();
    }

    static function Publish($id)
    {
        $sth = Di::get()->db()->prepare("UPDATE questions SET hide = 1 WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetch();
    }

    static function Hide($id)
    {
        $sth = Di::get()->db()->prepare("UPDATE questions SET hide = 0 WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetch();
    }

    static function ChangeCategory($id, $changeCat)
    {
        $sth = Di::get()->db()->prepare("UPDATE questions SET category_id = :catId WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->bindValue(':catId', $changeCat);
        $sth->execute();
        return $sth->fetch();
    }

    static function AllNotanswerQuest()
    {
        $sth = Di::get()->db()->prepare("SELECT questions.id, questions.author, 
        questions.description, questions.date_added, categories.name 
        FROM questions 
        JOIN categories ON questions.category_id = categories.id 
        WHERE is_done = 0 GROUP BY questions.date_added");
        $sth->execute();
        return $sth->fetchAll();
    }

    static function NewAnswer($id, $answer)
    {
        $sth = Di::get()->db()->prepare("INSERT INTO answers (description, question_id) 
        VALUES (:description, :question_id)");
        $sth->bindValue(':question_id', $id);
        $sth->bindValue(':description', $answer);
        $sth->execute();
        return $sth->fetchAll();
    }

    static function ChangeIsDone($id)
    {
        $sth = Di::get()->db()->prepare("UPDATE questions SET is_done = 1 WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        return $sth->fetch();
    }

    static function ChangeAnswer($id, $answer)
    {
        $sth = Di::get()->db()->prepare("UPDATE answers SET description = :description 
        WHERE question_id = :question_id");
        $sth->bindValue(':question_id', $id);
        $sth->bindValue(':description', $answer);
        $sth->execute();
        return $sth->fetchAll();
    }

    static function NewUserQuestion($name, $email, $question, $category)
    {
        $sth = Di::get()->db()->prepare("INSERT INTO questions (category_id, author, email, description)
        VALUES (:category, :name, :email, :question)");
        $sth->bindValue(':category', $category);
        $sth->bindValue(':name', $name);
        $sth->bindValue(':email', $email);
        $sth->bindValue(':question', $question);
        $sth->execute();
        return $sth->fetchAll();
    }

    static function AllUserQuestions()
    {
        $sth = Di::get()->db()->prepare("SELECT categories.id as id, categories.name as categories, 
        questions.description as questions, answers.description as answers 
        FROM answers 
        JOIN questions ON answers.question_id = questions.id 
        JOIN categories ON categories.id = questions.category_id 
        WHERE questions.hide = 1");
        $sth->execute();
        return $sth->fetchAll();
    }

    
    
}