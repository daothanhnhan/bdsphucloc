<div class="gb-khoduan_phucloc">
    <div class="container">
        <div class="col-sm-3">
            <div class="gb-khoduan_phucloc-left">
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0009.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0003.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0004.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_PHUCLOC_0005.php";?>
            </div>
        </div>
<?php 
    $action_service = new action_service();     
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];                    
        $rowCatLang = $action_service->getServiceCatLangDetail_byUrl($slug,$lang);//var_dump($rowCatLang);die();
        $rowCat = $action_service->getServiceCatDetail_byId($rowCatLang['servicecat_id'],$lang);//var_dump($rowCat['servicecat_id']);die();

        $rows = $action_service->getServiceList_byMultiLevel_orderServiceId($rowCat['servicecat_id'],'desc',$trang,12,$_GET['page']);
    }
    else $rows = $action->getList('service','','','service_id','desc',$trang,12,$_GET['page']); 
?>
        <div class="col-md-9">
            <div class="gb-khoduan_phucloc-right">
                <div class="row">
                    <?php 
                    $d = 0; 
                    foreach ($rows['data'] as $item) {
                        $d++;
                        $rowLang = $action_service->getServiceLangDetail_byId($item['service_id'],$lang);
                    ?>
                    <div class="col-md-4">
                        <div class="gb-khoduan_phucloc-item">
                            <div class="gb-khoduan_phucloc-item-image">
                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['service_img'] ?>" class="img-responsive" alt="<?= $rowLang['lang_service_name'] ?>" ></a>
                                <div class="gb-khoduan_phucloc-item-layer">
                                    <div class="gb-khoduan_phucloc-item-gia">
                                        <p>Khoảng giá</p>
                                        <p class="gb-khoduan_phucloc-item-price"><?= $item['service_author'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="gb-khoduan_phucloc-item-info">
                                <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_service_name'] ?></a></h3>

                                <p>
                                    <?= $rowLang['lang_service_des'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if ($d%3==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                    } ?>
                </div>
                <div style="text-align: center;"><?= $rows['paging'] ?></div>
            </div>
        </div>
    </div>
</div>