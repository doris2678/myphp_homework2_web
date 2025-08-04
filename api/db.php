<?php
// session_start();
date_default_timezone_set('Asia/Taipei');

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function q($sql){
  //$dsn="mysql:host=localhost;dbname=tieat;charset=utf8";
  //$pdo=new PDO($dsn,'root','');
  $dsn="mysql:host=localhost;dbname=s1140213;charset=utf8";
  $pdo=new PDO($dsn,'s1140213','s1140213');
  return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);  
}

function to($url){
   header("location:".$url);
}


//DB***begin***
class DB{
//  private $dsn="mysql:host=localhost;dbname=tieat;charset=utf8";
  private $dsn="mysql:host=localhost;dbname=s1140213;charset=utf8";
  private $pdo;
  private $table;

  function __construct($table)
  {
    $this->table=$table;
    //$this->pdo=new PDO($this->dsn,'root','');
    $this->pdo=new PDO($this->dsn,'s1140213','s1140213');
  } 

  function arraytosql($array){
     //key=value
     $tmp=[];
     foreach ($array as $key => $value) {
       $tmp[]="`$key`='$value'";           
     }
     return $tmp;
  }

  function find($id){
   //select * from $this->table where acc=xxx and id=xxx
   $sql="select * from $this->table where ";
   if(is_array($id)){
      $tmp=$this->arraytosql($id);
      $sql.=join(" and ",$tmp);
   }else{
      $sql.=" `id`='$id'";
   }
   return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
   //echo $sql;
  }

  function del($id){
   //delete from $this->table where acc=xxx and id=xxx
   $sql="delete from $this->table where ";
   if(is_array($id)){
      $tmp=$this->arraytosql($id);
      $sql.=join(" and ",$tmp);
   }else{
      $sql.=" `id`='$id'";
   }
   //echo $sql;
   return $this->pdo->exec($sql);
  }

  function all(...$arg){
   //select * from $this->table where acc=xxx and id=xxx
   $sql="select * from $this->table ";
   if(isset($arg[0])){
     if(is_array($arg[0])){
        $tmp=$this->arraytosql($arg[0]);
        $sql.=" where ".join(" and ",$tmp);
     }else{
        $sql.=$arg[0];
     }      
     //echo $sql;
   }

   if(isset($arg[1])){
        $sql.=$arg[1];
   }
   return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  function count(...$arg){
   //select count(*) from $this->table where acc=xxx and id=xxx
   $sql="select count(*) from $this->table ";
   if(isset($arg[0])){
     if(is_array($arg[0])){
        $tmp=$this->arraytosql($arg[0]);
        $sql.=" where ".join(" and ",$tmp);
     }else{
        $sql.=$arg[0];
     }      
   }

   if(isset($arg[1])){
        $sql.=$arg[1];
   }

   return $this->pdo->query($sql)->fetchColumn();
  }


  function save($array){
    if(isset($array['id'])){
        //update $this->table set acc=xxx,pw=xxx where id=xxx
        $sql="update $this->table set ";
        $tmp=$this->arraytosql($array);
        $sql.=join(",",$tmp)." where id='{$array['id']}'";
    }else{
        //insert into $this->table(key,key...) values(values,values...)
        $cols=join("`,`",array_keys($array));
        $values=join("','",$array);
        $sql="insert into $this->table(`$cols`) values('$values')";
        
    }
   // echo $sql;
     return $this->pdo->exec($sql);
  }

}
//DB***end***

//dd(q("select * from admin"));
$Admin=new DB('web05_admin');
$Member=new DB('web05_member');
$Items=new DB('web05_items');
$Order1=new DB('web05_order1');
$Order2=new DB('web05_order2');
$Set_no=new DB('web05_set_no');
$First_img=new DB('web05_first_img');
$Second_img=new DB('web05_second_img');
$Title=new DB('web05_title');
$Bottom=new DB('web05_bottom');

// $Admin=new DB('admin');
// $Member=new DB('member');
// $Items=new DB('items');
// $Order1=new DB('order1');
// $Order2=new DB('order2');
// $Set_no=new DB('set_no');
// $First_img=new DB('first_img');
// $Second_img=new DB('second_img');
// $Title=new DB('title');
// $Bottom=new DB('bottom');


//dd($admin->find(1));
//$array=['acc'=>'admin'];
//dd($admin->find($array));
//dd($admin->del(2));
//dd($admin->all());
//$array=['acc'=>'admin'];
//dd($admin->all($array));
//$array=['acc'=>'kk','pw'=>'1234'];
//dd($admin->save($array));
//$array=['id'=>3,'acc'=>'ll','pw'=>'1234'];
//dd($admin->save($array));
//$array2=['item_no'=>'aa','item_name'=>'bb','price'=>1,'qty'=>2];
//dd($Order2->save($array2));
?>