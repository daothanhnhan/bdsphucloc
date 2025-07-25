<div class="gb-khoduan_phucloc">
    <div class="container">
<?php 
    $limit = 9;

    function listMauNha ($trang, $limit) {
        global $conn_vn;
        $start = ($trang-1) * $limit;
        $sql = "SELECT * FROM mau_nha";
        $result = mysqli_query($conn_vn, $sql);
        $count = mysqli_num_rows($result);

        $sql = "SELECT * FROM mau_nha LIMIT $start,$limit";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        
        $return = array(
                'data' => $rows,
                'count' => $count
            );
        return $return;
    }
    // $list_maunha = listMauNha($trang, $limit);//var_dump($list_maunha);
    $list_maunha = $action_product->getProductList_byMultiLevel_orderProductId('','desc',$trang,9,'mau-nha');
?>
        <div class="col-md-9">
            <div class="gb-khoduan_phucloc-right">
                <div class="row">
                    <?php 
                    $d = 0; 
                    foreach ($list_maunha['data'] as $item) {
                        $d++;
                        // $rowLang = $action_service->getServiceLangDetail_byId($item['service_id'],$lang);
                        $row = $item;
                        $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
                    ?>
                    <div class="col-md-4">
                        <div class="gb-khoduan_phucloc-item">
                            <div class="gb-khoduan_phucloc-item-image">
                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['product_img'] ?>" class="img-responsive" alt="<?= $rowLang['lang_service_name'] ?>" ></a>
                                <div class="gb-khoduan_phucloc-item-layer">
                                    <div class="gb-khoduan_phucloc-item-gia">
                                        <p>Khoảng giá</p>
                                    </div>
                                </div>
                            </div>
                            <div class="gb-khoduan_phucloc-item-info">
                                <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $item['product_name'] ?></a></h3>
                                <!-- THÔNG TIN THÊM -->
                                <div class="gb-khoduan_phucloc-item-info-price">
                                    <p class="diachi">Địa chỉ: <?= $item['product_code'] ?></p>
                                    <p class="price"><span>Giá: </span> <?= $item['product_shape'] ?> Triệu / m2</p>
                                </div>
                                <div class="gb-khoduan_phucloc-item-info-button">
                                    <a href="/tien-ich">Báo giá</a>
                                    <a href="/du-toan-tai-chinh/<?= $item['product_price'] ?>/<?= $item['product_id'] ?>" class="dutoanchiphi">Dự toán chi phí</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if ($d%3==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                    } ?>
                </div>
                <div><?php 
                    echo $list_maunha['paging'];
                ?></div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="gb-khoduan_phucloc-left">
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0009.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0003.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0004.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0005.php";?>
            </div>
        </div>
    </div>
</div>