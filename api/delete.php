<?php
include_once "db.php";

$table=$_GET['table'];
$db=${ucfirst($table)};

switch($table){
    case "admin":
        $url="../backend/admin.php";        
    break;
    case "member":
        $url=("../backend/member.php");
    break;
    case "items":
        $url=("../backend/items.php");
    break;
    case "first_img":            
        $url=("../backend/first_img.php");
    break;
    case "second_img":                
        $url=("../backend/second_img.php");
    break;   

    default:        
        $url=("../backend.php");

}

$db->del($_GET['id']);

to($url);
?>