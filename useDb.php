<?php
//エラーを表示する
ini_set("display_errors", On);
error_reporting(E_ALL);

//データベースの情報を定義する

define('DB_DATABASE', 'db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', '');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname='.DB_DATABASE.';charset=utf8');
//DSNにcharsetがないと文字化けする

//DB操作はエラーがでる可能性があるので、try~catch構文を使う。
try{
  //PDOクラスを作る
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  //PDOに属性を追加して、エラーの時に例外を投げる
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //SQLを実行
  $db->exec("update users set score = score - 10 where name ='xyz'");

  //変数を含むSQLを実行する
  //PARAM_STRは文字列を表す
  $sql = "select * from test where actor like :val";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':val', $value, PDO::PARAM_STR);
  $stmt->execute();
  //上のSQL文で選んだデータの行数をカウント
  $count = $stmt->rowCount();
  //上のSQL文で選んだデータを連想配列に格納
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
