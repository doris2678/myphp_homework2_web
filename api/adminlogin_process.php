<?php
include_once "db.php";
//判斷是否登入成功
$admin=$Admin->count(['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);

if($admin){
   //登入成功
   session_start();
   $_SESSION['admin']=$_GET['acc'];   
   echo 1;   
}else{
    //登入失敗
   echo 0;
}

?>