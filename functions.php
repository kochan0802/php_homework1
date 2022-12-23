<?php

//①前回のセッションの修正
//②ログインページの修正・作成
//③ログインチェック関数の作成
//④関数を入れてログイン後画面の完成！


/**
 * XSS対策：エスケープ処理
 * 
 * @param  string $str 対象の文字列
 * @return string 処理された文字列
 * 
 */
function h($str){
 return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * CSRF対策
 * @param void
 * @return string $csrf_token
 */
function setToken(){
    //ワンタイムトークンを生成
    // フォームからそのトークンを送信
    // 送信後の画面でそのトークンを照会
    // トークンを削除

    // session_start();
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    return $csrf_token;
}