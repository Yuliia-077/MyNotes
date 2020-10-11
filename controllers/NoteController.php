<?php

require_once(ROOT.'/models/User.php');
require_once(ROOT.'/models/Note.php');

class NoteController
{
    public function actionOpen()
    {
        $userId = User::checkLogged();
        $notes = array();
        $notes = Note::notesList($userId);
        require_once(ROOT.'/views/dashboard.php');
        return true;
    }

    public function actionAdd()
    {
        $error = false;
        if(isset($_POST['add']))
        {
            $heading = $_POST['heading'];
            $note = $_POST['note'];
            if(!Note::checkNote($note))
            {
                $error = "Введіть текст замітки!";
            }
            if(empty($error))
            {
                Note::noteAdd($heading, $note);
                header("Location: /dashboard");
            }

        }
        require_once(ROOT.'/views/noteAdd.php');
        return true;

    }

    public function actionDelete($id)
    {
        Note::noteDelete($id);
        header('Location: /index');
        return true;

    }

}