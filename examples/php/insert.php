<?php
//insert.php
require_once("DB_config.php");

  try
{
    //注意，使用PDO方式連結，需要指定一個資料庫，否則將拋出異常
    $conn = new PDO('mysql:host=localhost;dbname=fullcalendar','root','5566');
    $conn->exec("SET CHARACTER SET utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "insert.php Connected Successfully"."<br />";
}
catch(PDOException $e)
{
    echo "insert.php Connection failed: ".$e->getMessage()."<br />";
}
if(isset($_POST["title"]))
{
 	
 print_r($_POST);
 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}

?>
