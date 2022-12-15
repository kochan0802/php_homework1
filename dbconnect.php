<?php   
require_once 'env.php';
ini_set('display_errors' , true);
//①ユーザー登録フォームの作成
//②登録完了画面の作成
//③バリデーションの作成
//④ユーザー登録ロジックの作成
//⑤ユーザー登録機能実装

function connect()
{
    $host = DB_HOST; 
    $db   = DB_NAME; 
    $user = DB_USER;
    $pass = DB_PASS;

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try{
        $pdo = new PDO($dsn, $user, $pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
        return $pdo;
    }catch(PDOException $e) {
        echo '接続失敗です!'. $e->getMessage();
        exit();
    }

   
}

