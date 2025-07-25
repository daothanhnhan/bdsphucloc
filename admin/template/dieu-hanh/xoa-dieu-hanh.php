<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM dieu_hanh WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=hoi-dong');
?>