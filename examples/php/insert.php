<?php
//insert.php
//header("Content-Type:text/html;charset=BIG5");
require_once("DB_config.php");

    //注意，使用PDO方式連結，需要指定一個資料庫，否則將拋出異常
$connect = new PDO('mysql:host=localhost;dbname=fullcalendar;charset=utf8mb4','root','5566');
$connect->exec("SET CHARACTER SET utf8");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST["title"]))
{
 $query = "INSERT INTO events (title, start_event, end_event) VALUES (:title, :start_event, :end_event) ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );

 print_r($_POST);
}


?>
