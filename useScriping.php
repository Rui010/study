<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
</head>
<body>
<?php
//エラーを確認
ini_set("display_errors", On);
error_reporting(E_ALL);
//タイムアウト制限をしない
set_time_limit(0);

//Simple HTML Domのファイルを読み込む
require_once ('simple_html_dom.php');

//データベースの設定
define('DB_DATABASE', '');
define('DB_USERNAME', 'user');
define('DB_PASSWORD', '');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname='.DB_DATABASE.';charset=utf8');

//スクレイピング対象URL
$url = '';
//urlが連番の場合 forで繰り返す
for ($i = ; $i < ; $i++){
  //file_get_html関数で中身を取り出し
  $html = file_get_html($url.$i.'/');
  //htmlの2文字目を取得　→取得できなかった場合はfalseが返る
  $status = file_get_contents($url.$i.'/', NULL, NULL, 1, 1);
  //falseの場合for文抜ける
  if($status==false){
    continue;
  }
  //titleを取得 plaintextはタグを除去する
  $str = $html->find('title')[0];
  $title = trim($str->plaintext);

  //DBに格納
  try{
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Transaction-commitでエラーがあったら飛ばす
    $db->beginTransaction();
    $sql = "insert into test title values :title";
    $stmt = $db->prepare($sql);
    //SQL文の:titleの部分に取得した$titleを代入
    $stmt->bindValue(':title', $title,PDO::PARAM_STR);
    $stmt->execute();
    $db->commit();
    echo "成功!";

  } catch (PDOException $e) {
    $db->rollback();
    echo $e->getMessage();
    //スクリプトを中止する、続ける場合はexitしない
    exit;
  }
  //遅延時間　連続で実行しない
  sleep(1);
}
?>
</body>
</html>
