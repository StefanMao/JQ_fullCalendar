<?php

//update.php
//header("Content-Type:text/html;charset=BIG5");
require_once("DB_config.php");
$connect = new PDO('mysql:host=localhost;dbname=fullcalendar;charset=utf8mb4','root','5566');
//$connect->exec("SET CHARACTER SET utf8");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event WHERE id=:id ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );

 print_r($_POST);
}

?>