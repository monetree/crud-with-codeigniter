<?php
function rev_str($pstr){
    $len = strlen($pstr);
    $rstr = "";
    for($i=$len-1;$i>=0;$i--){
      $rstr = $rstr.$pstr[$i];
    }
    return $rstr;
}
 ?>
