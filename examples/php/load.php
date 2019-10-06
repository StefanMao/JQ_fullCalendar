<?php

// load.php
  //header("Content-Type:text/html;charset=utf8");
  require_once("DB_config.php");
  //require_once("DB_Class.php");

  try
{
    //注意，使用PDO方式連結，需要指定一個資料庫，否則將拋出異常
    $conn = new PDO('mysql:host=localhost;dbname=fullcalendar;charset=utf8mb4','root','5566');
    $conn->exec("SET CHARACTER SET utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected Successfully"."<br />";
}
catch(PDOException $e)
{
    //echo "Connection failed: ".$e->getMessage()."<br />";
}

//$sql = "SELECT * FROM events WHERE id=1";

$sql = "SELECT * FROM events ORDER BY id";
$sth = $conn->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$result=$rows;

$data=array();

foreach($result as $row)
{
   $data[]=array(
   'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]


   );
}

//echo json_encode($data);
echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>