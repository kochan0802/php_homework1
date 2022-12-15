<?php

require_once '../dbconnect.php';

class UserLogic
{
    /**
     * ユーザーを登録する
     * @param array $userData 
     * @return bool $result
     *  
     * boolとはtrueとfalseを表す
     */ 
    public static function createUser($userData)   
    {
        $result = false;

        $sql = 'INSERT INTO users (name, email, 
        password) VALUES (?, ?, ?)';

        //ユーザーデータを配列に入れる
        $arr = [];  
        $arr[] = $userData['username'];
        $arr[] = $userData['email']; 
        $arr[] = password_hash($userData['password'], 
        PASSWORD_DEFAULT); //パスワードのハッシュ化、引数が必要  
   
        //例外処理を入れる 
        try { 
          $stmt = connect()->prepare($sql);    
          $result = $stmt->execute($arr);
          return $result;            
        } catch(\Exception $e) {      //$eはExceptionを受け取る任意の変数
          return $result;
        }
    }
}