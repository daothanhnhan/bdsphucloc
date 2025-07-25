<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function dieu_hanh ($id) {
		global $conn_vn;
		if (isset($_POST['edit_hoidong'])) {
			$src= "../images/";
			// $src = "uploads/";
			$image = "";

			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$position = $_POST['position'];

			if ($image == "") {
				$sql = "UPDATE dieu_hanh SET name = '$name', sex = '$sex', position = '$position' WHERE id = $id";
			} else {
				$sql = "UPDATE dieu_hanh SET name = '$name', sex = '$sex', position = '$position', image = '$image' WHERE id = $id";
			}
			
			$result = mysqli_query($conn_vn, $sql);
			echo '<script type="text/javascript">alert(\'Bạn đã sửa Điều hành thành công.\');</script>';
		}
	}

	dieu_hanh($_GET['id']);

	function getHoiDong ($id) {
		global $conn_vn;
		$sql = "SELECT * FROM dieu_hanh WHERE id = $id";
		$result = mysqli_query($conn_vn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	$hoidong = getHoiDong($_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin Chức vụ<br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $hoidong['name'] ?>" required/>
            <p class="titleRightNCP">Giới tính</p>
            <select class="txtNCP1" name="sex">
            	<option value="Ông" <?= ($hoidong['sex']=="Ông") ? 'selected' : '' ?> >Ông</option>
            	<option value="Bà" <?= ($hoidong['sex']=="Bà") ? 'selected' : '' ?> >Bà</option>
            </select>
            <p class="titleRightNCP">Chức vụ</p>
            <input type="text" class="txtNCP1" name="position" value="<?= $hoidong['position'] ?>" required/>
            <p class="titleRightNCP">Ảnh</p>
            <input type="file" class="txtNCP1" name="image"/>
            <img src="/images/<?= $hoidong['image'] ?>" width="200">
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="edit_hoidong">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>