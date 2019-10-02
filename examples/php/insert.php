<script>
	
	console.log("load")
</script>
<? php
//insert.php

$connect = new PDO('mysql:host=localhost;dbname=fullcalendar','root','');

if(isset($_POST["title"])
{
	$query="INSERT INTO events(title,start_event,end_event) VALUES (:title,:start_event,:end_event");

	$statemnet=$connect->prepaer($query);
	$statemnet->excute(

		array(
			':title' =>$_POST['title'],
			':start_event'=>$_POST['start'],
			':end_event'=>$_POST['end']
		)
	);

}
?>