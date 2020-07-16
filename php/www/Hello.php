<?php
header('Content-Type:application/json; charset=utf-8');

$arr = array('data'=>'hello world!!!','success'=>true);

exit(json_encode($arr));
?>