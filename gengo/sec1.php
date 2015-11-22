<?php
//0.
$str = 'stressed';
$ret = '';
for($i=0; $i<strlen($str); $i++){
  $ret .= substr($str, strlen($str)-$i-1 ,1);
}
echo $ret;

//1.
$str = 'パタトクカシーー';
$ret = '';
for($i=0; $i<strlen($str); $i=$i+2){
  $ret .= mb_substr($str, $i ,1, "UTF-8");
}
echo $ret;

//2.
$str1 = 'パトカー';
$str2 = 'タクシー';
$ret = '';
for($i=0; $i<strlen($str1); $i++){
  $ret = $ret.mb_substr($str1, $i ,1, "UTF-8").mb_substr($str2, $i ,1, "UTF-8");
}
echo $ret;

//3.

?>
