<?php

//delete.php
require_once("DB_config.php");
if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', '5566');
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>