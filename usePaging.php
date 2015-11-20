<?php
//エラーを表示
error_reporting(E_ALL & ~E_NOTICE);

//１ページに表示する件数を定義
define('COMMENTS_PER_PAGE',5);

//GET送信で受け取ったページ数を正規表現でチェック
if (preg_match('/^[1-9][0-9]*$/', $_GET['page'])){
  $page = (int)$_GET['page'];
} else {
  $page = 1;
}

// select * from comments limit OFFSET, COUNT

//各ページのスタート位置
$offset = COMMENTS_PER_PAGE * ($page - 1);

$comments = array();
//$commentsに取得した変数$dbを配列に詰め込む
foreach ($db as $row) {
  array_push($comments, $row);
}

//合計件数
$total = ;
//ページ数
$totalPages = ceil($total / COMMENTS_PER_PAGE);

//各ページの最初の番号
$from = $offset+1;
//各ページの最後の番号：三項演算子
$to = ($offset+COMMENTS_PER_PAGE) < $total ? ($offset+COMMENTS_PER_PAGE) : $total;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>コメント一覧</title>
</head>
<body>
  <h1>コメント一覧</h1>
  <p>全<?php echo $total; ?>件中、<?php echo $from;?>件〜<?php echo $to;?>件を表示しています。</p>
  <ul>
  <?php foreach ($comments as $comment) : ?>
  <li><?php echo htmlspecialchars($comment['comment'],ENT_QUOTES,'UTF-8'); ?></li>
  <?php endforeach; ?>
  </ul>
  <?php if($page > 1): ?>
  <a href="?page=<?php echo $page-1; ?>">前へ</a>
  <?php endif; ?>
  <?php for( $i = 1 ; $i <= $totalPages ; $i++) : ?>
    <?php if ($page == $i) : ?>
      <strong><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></strong>
    <?php else: ?>
      <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endif; ?>
  <?php endfor; ?>
  <?php if($page < $totalPages): ?>
  <a href="?page=<?php echo $page+1; ?>">次へ</a>
  <?php endif; ?>
</body>
</html>
