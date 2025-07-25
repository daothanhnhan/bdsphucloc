<?php 
	if (isset($_GET['trang'])) {
		$tien = $_GET['trang'];
	} else {
		$tien = 0;
	}
	
	$thang = 12;
	$phantram = 0.05;
	$duno = $tien - (3*0.1)*$tien;;
	$nam = 1;
	if (isset($_POST['tinh'])) {
		// $tien = $_POST['tien'];
		$nam = $_POST['nam'];
		$thang = $thang*$nam;
		$tra_truoc = $_POST['tra_truoc'];
		$lai_suat = $_POST['lai_suat'];
		$phantram = $lai_suat*0.01;
		$duno = $tien - ($tra_truoc*0.1)*$tien;
	}


	$lai = array();
	$tra = array();
	$conlai = array();
	$goc = $duno/($nam*12);

	function laisuat ($tien, $month) {
		global $lai;
		global $tra;
		global $conlai;

		// global $thang;
		global $phantram;
		global $goc;

		if ($month > 0) {
			$tmp1 = $tien*$phantram/12;
			$lai[] = $tmp1;
			$tmp2 = $tmp1 + $goc;
			$tra[] = $tmp2;
			$tmp3 = $tien - $tmp2;
			$conlai[] = $tmp3;
			laisuat($tmp3, $month-1);
		}
	}

	if (isset($_GET['search'])) {
		$action_product = new action_product();
		$img_maunha = $action_product->getProductDetail_byId($_GET['search'])['product_img'];
	} else {
		$img_maunha = 'duan1.jpg';
	}
	

?>
<style type="text/css">
	.tinh1 {
		margin: 15px 0;
	}
</style>
<div class="container gb-chiphidutoan">
	<form action="" method="post" style="margin-bottom: 20px;">
		<div class="row">
		    <div class="col-sm-4">
		    	<div class="form-group">
		    		<img src="/images/<?= $img_maunha ?>" alt="" class="img-responsive">
		    		<input type="hidden" name="tien" value="<?= (isset($_POST['tien'])) ? $_POST['tien'] : '' ?>" placeholder="nhập tiền.."  class="form-control">
		    	<label>GIÁ: <?= number_format($_GET['trang']) ?> VNĐ</label>
		    	</div>
		    </div>
		    <div class="col-sm-8">
		    	<div class="row">
		    		<div class="col-sm-3">
				    	<div class="form-group">
				    		<label>Thời hạn vay</label>
					    	<select name="nam"  class="form-control">
								<?php for ($i=1;$i<=7;$i++) { ?>
								<option value="<?= $i ?>" <?= (isset($_POST['nam'])) ? (($_POST['nam']==$i) ? 'selected' : '' )  : '' ?> ><?= $i ?> năm</option>
								<?php } ?>
							</select>
				    	</div>
				    </div>
				    <div class="col-sm-3">
				    	<div class="form-group">
				    		<label>Trả trước</label>
					    	<select name="tra_truoc" class="form-control">
								<?php for ($i=3;$i<=9;$i++) { ?>
								<option value="<?= $i ?>" <?= (isset($_POST['tra_truoc'])) ? (($_POST['tra_truoc']==$i) ? 'selected' : '' )  : '' ?> ><?= $i ?>0%</option>
								<?php } ?>
							</select>
				    	</div>
				    	
				    </div>
				    <div class="col-sm-3">
				    	<div class="form-group">
				    		<label>Lãi suất</label>
					    	<select name="lai_suat"  class="form-control">
								<?php for ($i=5;$i<=20;$i++) { ?>
								<option value="<?= $i ?>" <?= (isset($_POST['lai_suat'])) ? (($_POST['lai_suat']==$i) ? 'selected' : '' )  : '' ?>><?= $i ?>%</option>
								<?php } ?>
							</select>
				    	</div>
				    	
				    </div>
				    <div class="col-sm-3">
				    	<div class="form-group">
				    		<button type="submit" name="tinh">Tính chi phí</button>
				    	</div>
				    	
				    </div>
		    	</div>

		    	<div class="row">
		<div class="col-sm-12">	
			<?php for ($i=0;$i<$nam;$i++) { 
		$lai = array();
		$tra = array();
		$conlai = array();
		if ($i == 0) {
			laisuat($duno, 12);
			$tong = 0;
			foreach ($lai as $item) {
				$tong += (float)$item;
			}
			$lai_suat_tb = $tong/(12);//echo $lai_suat_tb.'<br>';
			$duno1 = $duno;
			$duno = $duno - ($lai_suat_tb+$goc)*12;
		} else {
			laisuat($duno, 12);
			$tong = 0;
			foreach ($lai as $item) {
				$tong += (float)$item;
			}
			$lai_suat_tb = $tong/(12);//echo $lai_suat_tb.'<br>';
			$duno1 = $duno;
			$duno = $duno - ($lai_suat_tb+$goc)*12;
		}
	?>
	<label>
		<div class="tinhtoan0">
			<label>Năm <?= $i+1 ?></label>			
		</div>
	<div class="bordertinhtoan">
		<div class="tinh1 tinhtoan1">
		<label>Dư nợ đầu kỳ: <?= number_format($duno1); ?></label>
	</div>
		<div class="tinh1 tinhtoan2">
		<label>Tiền Gốc tháng: <?= number_format($goc) ?></label>
	</div>
	<div class="tinh1 tinhtoan3">
		<label>Lãi suất trung bình: <?= number_format($lai_suat_tb) ?></label>
	</div>
	<div class="tinh1 tinhtoan4">
		<label>Tổng tiền trả trung bình: <?= number_format($goc + $lai_suat_tb) ?></label>
	</div>
	<div class="tinh1 tinhtoan5">
		<label style="color: red;">Tổng cộng: <?= number_format(($lai_suat_tb+$goc)*12) ?></label>
	</div>
	</div>
	<hr>
	<?php } ?>
		</div>
	</div>

		    </div>
		</div>
	</form>
</div>
