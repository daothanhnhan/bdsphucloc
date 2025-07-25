<?php 
    $home_duan = $action_service->getServiceList_byMultiLevel_orderServiceId_1(0,'desc',1,6,'')['data'];//var_dump($home_duan);
?>
<div class="gb-duan_phucloc">
    <div class="container">
        <div class="gb-duan_phucloc-title">
            <h2>Dự án bất động sản</h2>
            <!-- <p>
                Không ngừng phát triển, mở rộng quy mô trở thành hệ thống phân phối bất
                động sản chuyên nghiệp, lớn mạnh bậc nhất quốc gia
            </p> -->
        </div>
        <div class="gb-duan_phucloc-body">
            <div class="row">
                <?php 
                foreach ($home_duan as $item) { 
                    $rowLang = $action_service->getServiceLangDetail_byId($item['service_id'],$lang);
                ?>
                <div class="col-md-4">
                    <div class="gb-duan_phucloc-item">
                        <a href="/<?= $rowLang['friendly_url'] ?>">
                            <img src="/images/<?= $item['service_img'] ?>" alt="<?= $rowLang['lang_service_name'] ?>" class="img-responsive">
                            <div class="caption-thumb-duan">
                                <!-- <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_service_name'] ?></a></h3> -->
                                <h3><?= $rowLang['lang_service_name'] ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>