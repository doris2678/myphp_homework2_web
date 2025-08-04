<?php
    session_start();
    include "db.php";

    $data = json_decode(file_get_contents("php://input"), true);

    //取or_no
    q("select or_no into @last_orno from web05_set_no;
         set @last_date = substring(@last_orno, 1, 8);
         set @last_no = CAST(SUBSTRING(@last_orno, 9, 4) AS UNSIGNED);
         set @date_now = DATE_FORMAT(CURRENT_DATE, '%Y%m%d');
         set @num = IF(@last_date = @date_now, @last_no+ 1, 1);
         set @or_no= CONCAT(@date_now, LPAD(@num, 4, '0'));
         select  @last_date as last_date, @date_now as date_now, @or_no as or_no;
         update web05_set_no set or_no=@or_no;");
    $row=$Set_no->find(1);
    $or_no=$row['or_no'];

    //order1      
    $date1 = $data['date1'];
    $acc = $data['acc'];
    $name = $data['name'];    
    $amt = $data['amt'];    
    $tel = $data['tel'];    
    $array=['or_no'=>$or_no,'date1'=>$date1,'acc'=>$acc,'name'=>$name,'amt'=>$amt,'tel'=>$tel];        
    $Order1->save($array);

    //order2
    $mydata = $data['mydata'];
    foreach ($mydata as $item) {
        $item['or_no']=$or_no;
        $Order2->save($item);
    }

    header("Content-Type: application/json;");
    echo json_encode(["status" => "success", "message" => "存檔成功!"]);    
?>
