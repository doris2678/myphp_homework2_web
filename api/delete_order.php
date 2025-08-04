<?php
include_once "db.php";

$table=$_GET['table'];
$db=${ucfirst($table)};

$row=$db->find($_GET['id']);

$db->del($_GET['id']);
$Order2->del(['or_no'=>$row['or_no']]);

$url=("../backend/bd_query_order.php");
to($url);
?>


