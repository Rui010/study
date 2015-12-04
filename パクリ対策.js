//コピーサイト対策
<script>
/*
 * Redirect from Pakuri Site v1.0.0
 * Date: 2015-07-26
 * Copyright (c) 2015 http://hapilaki.hateblo.jp/
 * Released under the MIT license:
 * http://opensource.org/licenses/mit-license.php
 */
;
var myDomain='';//ドメイン名をいれる
if(document.domain!=myDomain) {
  var pakuriUrl=document.URL;
  var checkUrl=pakuriUrl.indexOf(myDomain);
  if(checkUrl==-1) {
    location.replace('http://'+myDomain);
  }else{
    var splitUrl=pakuriUrl.split(myDomain);
    location.replace('http://'+myDomain+splitUrl[1]);
  }
}
</script>
