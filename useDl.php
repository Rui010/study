<?php
//エラー表示
ini_set("display_errors", On);
error_reporting(E_ALL);
//ダウンロード
$url = '';
//ファイル名がJpgがチェック
$p = preg_match('/.jpg$/', $url);
if($p){
  $data = file_get_contents($url);
  //dirname(__FILE__)は、自分の位置
  $chk = file_put_contents(dirname(__FILE__).'/dl/'.time().'dl.jpg',$data);
  //成功か失敗か出力
  if($chk){
    echo "成功";
  } else {
    echo "失敗";
  }
}else{
  echo "jpgではありません";
}
?>
