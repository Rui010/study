<?php
//jsonファイルを読みこんで、連想配列に格納
$url = 'url';
$json = file_get_contents($url);
$array = json_decode( $json , true ) ;

//連想配列のValueを普通の配列に格納
$list = array_values($array);


$i = rand(0, count($img_list));
echo '<img src="'.$img_list[$i].'">';

?>
