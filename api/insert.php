<?php 
include_once "db.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);    
    $_POST['img']=$_FILES['img']['name'];    
}

$table=$_POST['table'];
$db=${ucfirst($table)};

switch($table){
    case "admin":        
        $url="../backend/admin.php";                
    break;
    case "member":        
        $url=("../index.php");
    break;
    case "items":        
        $_POST['sh']=1;
        $url=("../backend/items.php");
    break;
    case "first_img":        
        $_POST['sh']=1;
        $url=("../backend/first_img.php");
    break;
    case "second_img":        
        $_POST['sh']=1;
        $url=("../backend/second_img.php");
    break;    
    default:        
        $url=("../index.php");

}

unset($_POST['table']);

$db->save($_POST);

to($url);