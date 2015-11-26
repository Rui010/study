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
$str = "Now I need a drink, alcoholic of course, after the heavy lectures involving quantum mechanics.";
$array = explode(' ', $str);
foreach ($array as $a) {
  $moji[] = trim($a, ',.');
  $num[] = strlen(trim($a, ',.'));
}
print_r($num);

//4.
$str = "Hi He Lied Because Boron Could Not Oxidize Fluorine. New Nations Might Also Sign Peace Security Clause. Arthur King Can.";
$array = explode(' ', $str);
$i=1;
foreach ($array as $a) {
  if($i == 1 or $i == 5 or $i == 6 or $i == 7 or $i == 8 or $i == 9 or $i == 15 or $i == 16 or $i == 19){
    $moji = substr($a, 0, 1);
  } else {
    $moji = substr($a, 0, 2);
  }
  $num = $i;
  $genso[$moji] = $num;
  $i++;
}
print_r($genso);
//5.??
function ngram($n, $str){
  $array = explode(' ', $str);
  for($i=0; $i<count($array)-$n+1; $i++){
    for($j=0; $j<$n; $j++){
      $list[$i][] = $array[$j];
    }
    $gram[] = $list[$i];
  }
}
print_r($gram);
//6.??

//7.
function mojiretsu($x, $y, $z){
  echo $x."時の".$y."は".$z;
}
mojiretsu(12, "気温", 22.4);

//8.??

//9.


?>
