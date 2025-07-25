<?php 
	include_once dirname(__FILE__) . "/../database.php";
	$id = $_GET['id'];//echo $id;die;
	if ($id == '') {
		echo '';
	} else {
		$sql = "SELECT * FROM mau_nha WHERE id IN ($id)";//echo $sql;
		$result = mysqli_query($conn_vn, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<div class="col-sm-3">
	            <div class="gb-dnagky-buoc1-item">
	                <img src="/images/'.$row['image'].'" alt="" class="img-responsive">
	                <h2>'.$row['name'].'</h2>
	            </div>
	        </div>';
		}
	}
	
	
	// $row = mysqli_fetch_assoc($result);
	
?>