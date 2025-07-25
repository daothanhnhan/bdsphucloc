<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function dieu_hanh () {
		global $conn_vn;
		if (isset($_POST['add_hoidong'])) {
			$src= "../images/";
			// $src = "uploads/";

			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);

			}

			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$position = $_POST['position'];
			$image = $_FILES['image']['name'];

			$sql = "INSERT INTO dieu_hanh (name, sex, position, image) VALUES ('$name', '$sex', '$position', '$image')";
			$result = mysqli_query($conn_vn, $sql);
			echo '<script type="text/javascript">alert(\'Bạn đã thêm Điều hành thành công.\');window.location.href="index.php?page=dieu-hanh"</script>';
		}
	}

	dieu_hanh();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin Chức vụ<br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" required/>
            <p class="titleRightNCP">Giới tính</p>
            <select class="txtNCP1" name="sex">
            	<option value="Ông">Ông</option>
            	<option value="Bà">Bà</option>
            </select>
            <p class="titleRightNCP">Chức vụ</p>
            <input type="text" class="txtNCP1" name="position" required/>
            <p class="titleRightNCP">Ảnh</p>
            <input type="file" class="txtNCP1" name="image" required/>
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_hoidong">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>