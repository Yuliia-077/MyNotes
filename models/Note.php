<?php


class Note
{
    public static function notesList($userId)
    {
        $db = Db::getConnection();
        $sql = 'SELECT id, heading, text from notes WHERE user_id=:userId';
        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_STR);
        $result->execute();
        $notes = array();
        $i=0;
        while($row = $result->fetch())
        {
            $notes[$i]['id'] = $row['id'];
            $notes[$i]['heading'] = $row['heading'];
            $notes[$i]['text'] = $row['text'];
            $i++;
        }
        return $notes;
    }

    public static function checkNote($note)
    {
        if($note=='')
        {
            return false;
        }
        return true;
    }

    public static function noteAdd($heading, $note)
    {
        $db = Db::getConnection();
        $userId = User::checkLogged();
        $sql = 'INSERT INTO notes (heading,text,user_id)'
            .'VALUES(:heading, :note, :userId)';
        $result = $db->prepare($sql);
        $result->bindParam(':heading',$heading,PDO::PARAM_STR);
        $result->bindParam(':note',$note,PDO::PARAM_STR);
        $result->bindParam(':userId',$userId,PDO::PARAM_STR);
        $result->execute();
        $result = $db->query("");
    }

    public static function noteDelete($id)
    {
        $db = Db::getConnection();
        $userId = User::checkLogged();
        $sql = 'DELETE from notes WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_STR);
        $result->execute();
        $result = $db->query("");

    }

}