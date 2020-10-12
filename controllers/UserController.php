<?php

require_once(ROOT.'/models/User.php');
//controller for users
class UserController
{
    //check login
    public function actionLogin()
    {
        $email = '';

        $errors = false;

        if(isset($_POST['login']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(!User::checkEmail($email))
            {
                $errors[] = "Введіть електронну пошту!";
            }
            if(!User::checkPassword($password))
            {
                $errors[] = "Пароль обов’язково має містити не менше 7 літер!";
                $password = '';
            }

            $userId = User::checkUserData($email, $password);

            if($userId == false)
            {
                $errors[] = "Неправильні дані для входу!";

            }
            else{
                User::auth($userId);
                header('Location: /dashboard');
            }
        }


        require_once(ROOT.'/views/login.php');
        return true;
    }
    
    //check registration
    public function actionRegistration()
    {
        $user_name = '';
        $first_name = '';
        $last_name = '';
        $date_of_birth = '';
        $email = '';
        $password = '';
        $rep_password = '';

        $result = false;
        if (isset($_POST['signup']))
        {
            $user_name = $_POST['user_name'];
            $first_name = ucfirst($_POST['first_name']);
            $last_name = ucfirst($_POST['last_name']);
            $date_of_birth = $_POST['date_of_birth'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rep_password = $_POST['rep_password'];

            $errors = false;
            if(!User::checkUserName($user_name))
            {
                $errors[] = "Ім'я користувача не може бути менше 2-х символів!";
            }
            if(!User::checkEmail($email))
            {
                $errors[] = "Введіть електронну пошту!";
            }
            else
            {
                if(User::checkEmailExists($email))
                {
                    $errors[] = "Така електронна пошта вже існує!";
                }
            }
            if(!User::checkPassword($password))
            {
                $errors[] = "Пароль обов’язково має містити не менше 7 літер, великі та малі літери, а також цифри!";
                $password = '';
            }
            if(!User::checkRepPassword($rep_password,$password))
            {
                $errors[] = "Паролі не збігаються!";
                $rep_password = '';
            }
            if (empty($errors))
            {
                $result = User::addUser($user_name, $first_name, $last_name, $date_of_birth, $email, $password);
                header("Location: /login");
            }
        }
        require_once(ROOT.'/views/registration.php');
        
        return true;
    }

    //finish session
    public function actionExit()
    {
        User::deleteSession();
        return true;
    }
}