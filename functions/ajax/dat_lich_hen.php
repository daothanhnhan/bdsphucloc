<?php 
	include_once dirname(__FILE__) . "/../database.php";
	// echo $_GET['name'].$_GET['email'].$_GET['phone'].$_GET['note'].$_GET['date'].$_GET['time'].$_GET['shape'];
	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$note = $_GET['note'];
	$date = $_GET['date'];
	$time = $_GET['time'];
	$shape = $_GET['shape'];

	$sql = "INSERT INTO dat_lich_hen (name, email, phone, note, `date`, `time`, shape) VALUES ('$name', '$email', '$phone', '$note', '$date', '$time', '$shape')";
	$result = mysqli_query($conn_vn, $sql) or die ('error');
	echo 'Đặt lịch hẹn thành công.';
?>