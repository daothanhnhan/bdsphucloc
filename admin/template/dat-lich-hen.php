<?php 
function getMauNha ($id) {
    global $conn_vn;
    $sql = "SELECT * FROM mau_nha WHERE id = $id";
    $result = mysqli_query($conn_vn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['name'];
    } else {
        return '';
    }
}
$rows_hen = $action->getList('dat_lich_hen','','','id','desc',$trang,20,'dat-lich-hen');//var_dump($rows_lien_he);die();
?>
<div class="container">
  <h2>Bảng Đặt lịch hẹn.</h2>            
  <table class="table">
    <thead>
      <tr>
      	<th>Name</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Ghi chú</th>
        <th>Ngày</th>
        <th>Giờ</th>
        <th>Mẫu nhà</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows_hen['data'] as $item) { ?>
      <tr>
        <td><?php echo $item['name'];?></td>
        <td><?php echo $item['email'];?></td>
        <td><?php echo $item['phone'];?></td>
        <td><?php echo $item['note'];?></td>
        <td><?php echo $item['date'];?></td>
        <td><?php echo $item['time'];?></td>
        <td><?php
        $arr_hen = explode(",", $item['shape']);
        foreach ($arr_hen as $item_1) {
            echo '<a href="/admin/index.php?page=sua-mau-nha&id='.$item_1.'">'.getMauNha($item_1).',</a>';
        }
         ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <div><?php
    echo $rows_hen['paging'];
?></div>
</div>
