<?php
//controller for startup index page
class MainController
{
    public function actionOpen()
    {
        require_once(ROOT.'/views/main.php');
        return true;
    }
}