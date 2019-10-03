<?php 


	require_once("DB_config.php");
    require_once("DB_Class.php");


    $db = new DB(); 
    
    //$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
   try
{
    //注意，使用PDO方式連結，需要指定一個資料庫，否則將拋出異常
    $conn = new PDO('mysql:host=localhost;dbname=fullcalendar','root','5566');
    $conn->exec("SET CHARACTER SET utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully"."<br />";
}
catch(PDOException $e)
{
    echo "Connection failed: ".$e->getMessage()."<br />";
}

//$sql = "SELECT * FROM events WHERE id=1";

$sql = "SELECT * FROM events ORDER BY id";
$sth = $conn->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_NUM);

foreach($rows as $row)
{
    foreach($row as $key => $value)
    {
        echo $key." : ".$value."<br />";
    }
}

?>

 

