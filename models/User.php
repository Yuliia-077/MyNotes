<?php

class User
{
    //check inf login
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * from users WHERE email=:email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user)
        {
            if(password_verify($password,$user['password']))
            {
                return $user['id'];
            }
            else{
                return false;
            }
        }
        return false;
    }

    //startup session
    public static function auth($userId)
    {
        session_start();
        $_SESSION['user'] = $userId;

    }

    //check user in session
    public static function checkLogged()
    {
        session_start();
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }
        header("Location: login");
    }

    //remove session
    public static function deleteSession()
    {
        session_start();
        if(isset($_SESSION['user']))
        {
            session_destroy();
        }
        header("Location: main");
    }
    
    //check user name
    public static function checkUserName($user_name)
    {
        if(strlen($user_name)>=2)
        {
            return true;
        }
        return false;
    }

    //check email
    public static function checkEmail($email)
    {
        if($email=='')
        {
            return false;
        }
        return true;
    }

    //check email is in db
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) from users WHERE email=:email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
        {
            return true;
        }
        return false;
    }
    
    //check password
    public static function checkPassword($password)
    {
        if($password=='')
        {
            return false;
        }
        return true;
    }
    
    //check repeat password
    public static function checkRepPassword($rep_password, $password)
    {
        if($rep_password=='')
        {
            return false;
        }
        else
        {
            if($rep_password!=$password)
            {
                return false;
            }
        }
        return true;
    }
    
    //add user in db
    public static function addUser($user_name, $first_name, $last_name, $date_of_birth, $email, $password)
    {
        $db = Db::getConnection();
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (user_name,first_name,last_name,date_of_birth,email,password)'
            .'VALUES(:user_name, :first_name, :last_name, :date_of_birth, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':user_name',$user_name,PDO::PARAM_STR);
        $result->bindParam(':first_name',$first_name,PDO::PARAM_STR);
        $result->bindParam(':last_name',$last_name,PDO::PARAM_STR);
        $result->bindParam(':date_of_birth',$date_of_birth,PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $result->execute();
        $result = $db->query("");
    }
}