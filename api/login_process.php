<?php
include_once "db.php";

//判斷是否登入成功
$mem=$Member->count($_POST);

if($mem){
   //登入成功
   session_start();
   $_SESSION['mem']=$_POST['acc'];  
   to("../main.php");
}else{
    //登入失敗
   to("../login.php?err=1");
}
?>