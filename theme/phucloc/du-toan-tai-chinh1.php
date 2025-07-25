<?php 
	$tien = 0;
	$thang = 12;
	$phantram = 0;
	$duno = 0;
	$nam = 0;
	if (isset($_POST['tinh'])) {
		$tien = $_POST['tien'];
		$nam = $_POST['nam']*2;
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

		global $thang;
		global $phantram;
		global $goc;

		if ($month > 0) {
			$tmp1 = $tien*$phantram/$thang;
			$lai[] = $tmp1;
			$tmp2 = $tmp1 + $goc;
			$tra[] = $tmp2;
			$tmp3 = $tien - $tmp2;
			$conlai[] = $tmp3;
			laisuat($tmp3, $month-1);
		}
	}

	laisuat($duno, $thang);
	echo '<pre>';
	var_dump($lai);
	// var_dump($tra);
	// var_dump($conlai);
	$tong = 0;
	$d = 0;
	foreach ($lai as $item) {
		$d++;
		$tong += (float)$item;
	}
	$lai_suat_tb = $tong/(12*$nam);

?>
<style type="text/css">
	.tinh1 {
		margin: 15px 0;
	}
</style>
<div class="container">
	<form action="" method="post">
		<div class="row">
		    <div class="col-sm-2"><input type="number" name="tien" placeholder="nhập tiền.."></div>
		    <div class="col-sm-2">
		    	<label>Thời hạn vay</label>
		    	<select name="nam">
					<?php for ($i=1;$i<=7;$i++) { ?>
					<option value="<?= $i ?>"><?= $i ?> năm</option>
					<?php } ?>
				</select>
		    </div>
		    <div class="col-sm-2">
		    	<label>Trả trước</label>
		    	<select name="tra_truoc">
					<?php for ($i=3;$i<=9;$i++) { ?>
					<option value="<?= $i ?>"><?= $i ?>0%</option>
					<?php } ?>
				</select>
		    </div>
		    <div class="col-sm-2">
		    	<label>Lãi xuất</label>
		    	<select name="lai_suat">
					<?php for ($i=5;$i<=20;$i++) { ?>
					<option value="<?= $i ?>"><?= $i ?>%</option>
					<?php } ?>
				</select>
		    </div>
		    <div class="col-sm-2">
		    	<button type="submit" name="tinh">Tính chi phí</button>
		    </div>
		</div>
	</form>
	<div class="tinh1">
		<label>Dư nợ đầu kỳ: <?= number_format($duno); ?></label>
	</div>
	<div class="tinh1">
		<label>Tiền Gốc tháng: <?= number_format($goc) ?></label>
	</div>
	<div class="tinh1">
		<label>Lãi suất trung bình: <?= number_format($lai_suat_tb) ?></label>
	</div>
	<div class="tinh1">
		<label>Tổng tiền trả trung bình: <?= number_format($goc + $lai_suat_tb) ?></label>
	</div>
	<div class="tinh1">
		<label style="color: red;">Tổng cộng: <?= number_format(($lai_suat_tb+$goc)*12*$nam) ?></label>
	</div>
</div>
