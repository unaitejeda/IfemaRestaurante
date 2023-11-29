<?php
class DataBase{
    public static function connect($host='localhost', $user='root', $pwd='', $db='ifema_restaurante'){
        
        $con = new mysqli($host,$user,$pwd,$db);
        if ($con == false) {   
            die('Error');
        }else{
            return $con;
        }
    }
}
?>