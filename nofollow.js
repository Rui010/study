//JQueryを使ってnofollow、別タブをaタグに追加する
<div class="nofollow">
</div>
<div class="blank">
</div>
//スクリプトとして追加する
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$('.nofollow a').attr({'rel':'nofollow'}); //特定要素をnofollow
$('.blank a').attr({'target':'_blank'}); //特定要素を別タブ
});
</script>
