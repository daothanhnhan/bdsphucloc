<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM mau_nha WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: /admin/index.php?page=mau-nha');
?>