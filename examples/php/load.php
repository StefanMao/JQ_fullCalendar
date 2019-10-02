<? php

// load.php


$connect = new PDO('mysql:host=localhost;dbname=fullcalendar','root','5166');

if($connect)
{
  echo "成功";
}
else
{
  echo"失敗";
}

$data= array();
$query="SELECT * FROM events ORDER BY id";
$statemnet = $connect->prepare($query);

$statemnet->execute();
$result=$statemnet->fetchAll();

foreach ($result as $row) {
	# code...
	$data[]=array(

		'id' =>$row["id"],
		'title' =>$row["title"],
		'start'=>$row["start_event"],
		'end'=>$row["end_event"]

	);
}

echo json_encode($data);


?>