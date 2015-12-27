<?php
//エラーを確認
ini_set("display_errors", On);
error_reporting(E_ALL);
set_time_limit(0);

//Simple HTML Domのファイルを読み込む
require_once('simple_html_dom.php');

setlocale(LC_ALL, 'ja_JP.UTF-8');

$file = 'test.csv';
$data = file_get_contents($file);
$temp = tmpfile();
$csv  = array();

fwrite($temp, $data);
rewind($temp);

while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
    $csv[] = $data;
}
fclose($temp);
//var_dump($csv);

//foreach ($csv as $c) {

//}
$test = '<html>'.$csv[125][2].'</html>';
$html = str_get_html($test);
$str = $html->find('html', 0)->plaintext;
var_dump($str);

?>
