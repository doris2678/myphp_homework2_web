<?php include_once "db.php";

$id=$_POST['id'];
$table=$_POST['table'];
$db=${ucfirst($table)};

$row=$db->find($id);

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);    
    $row['img']=$_FILES['img']['name'];    
}

if(!empty($row['created_time'])){
    unset($row['created_time']);       
    unset($row['updated_time']);           
}

switch($table){
    case "admin":
        $row['acc']=$_POST['acc'];                
        $row['pw']=$_POST['pw']; 
        $url="../backend/admin.php";        
    break;
    case "member":
        $row['name']=$_POST['name'];        
        $row['email']=$_POST['email'];
        $row['acc']=$_POST['acc'];        
        $row['pw']=$_POST['pw'];                
        $row['birthday']=$_POST['birthday'];                
        $url=("../backend/member.php");
    break;
    case "items":
        $row['item_no']=$_POST['item_no'];        
        $row['item_name']=$_POST['item_name'];
        $row['price']=$_POST['price'];        
        $row['cost']=$_POST['cost'];                
        $row['sh']=($_POST['sh']==$_POST['id'])?1:0;
        $url=("../backend/items.php");
    break;
    case "first_img":            
        $row['pd1']=$_POST['pd1'];        
        $row['pd2']=$_POST['pd2'];
        $row['sh']=($_POST['sh']==$_POST['id'])?1:0;
        $url=("../backend/first_img.php");
    break;
    case "second_img": 
        $row['pd1']=$_POST['pd1'];        
        $row['pd2']=$_POST['pd2'];
        $row['sh']=($_POST['sh']==$_POST['id'])?1:0;         
        $url=("../backend/second_img.php");
    break;   


    default:        
        $url=("../index.php");

}

$db->save($row);

to($url);