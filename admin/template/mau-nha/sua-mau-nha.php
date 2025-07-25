<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function mau_nha ($id) {
		global $conn_vn;
		if (isset($_POST['edit_maunha'])) {
			$src= "../images/";
			// $src = "uploads/";
			$image = '';

			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$name = $_POST['name'];
			$note = $_POST['note'];

			if ($image == '') {
				$sql = "UPDATE mau_nha SET name = '$name', note = '$note' WHERE id = $id";
			} else {
				$sql = "UPDATE mau_nha SET name = '$name', note = '$note', image = '$image' WHERE id = $id";
			}

			$result = mysqli_query($conn_vn, $sql);
			echo '<script type="text/javascript">alert(\'Bạn đã sửa mẫu nhà thành công.\')</script>';
		}
	}

	mau_nha($_GET['id']);

	function getMauNha ($id) {
		global $conn_vn;
		$sql = "SELECT * FROM mau_nha WHERE id = $id";
		$result = mysqli_query($conn_vn, $sql) or die('loi');
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	$get_maunha = getMauNha($_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin mẫu nhà<br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên mẫu nhà</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $get_maunha['name'] ?>" required/>
            <p class="titleRightNCP">Ảnh</p>
            <input type="file" class="txtNCP1" name="image"/>
            <img src="/images/<?= $get_maunha['image'] ?>" width="100">
            <p class="titleRightNCP">Mô tả</p>
            <textarea class="txtNCP1" name="note"><?= $get_maunha['note'] ?></textarea>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="edit_maunha">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>