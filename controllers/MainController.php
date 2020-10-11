<?php

class MainController
{
    public function actionOpen()
    {
        require_once(ROOT.'/views/main.php');
        require_once(ROOT.'/layout/footer.php');
        return true;
    }
}