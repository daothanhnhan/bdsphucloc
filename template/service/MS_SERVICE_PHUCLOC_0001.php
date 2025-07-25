<?php 
    $home_linhvuc_cat = $action_news->getNewsCatLangDetail_byId(75, $lang);//var_dump($home_linhvuc_cat);
    $home_linhvuc = $action_news->getNewsList_byMultiLevel_orderNewsId(75,'desc',1,4,'')['data'];
?>
<div class="gb-linhvuckinhdoanh_phucloc">
    <div class="container">
        <div class="gb-linhvuckinhdoanh_phucloc-title">
            <!-- $home_linhvuc_cat['lang_newscat_name'] -->
            <h2 style="text-transform: uppercase;">TIN TỨC - SỰ KIỆN</h2>
            <img src="/images/line.png" alt="" class="img-responsive">
        </div>
        <div class="row">
            <?php 
            $d = 0;
            foreach ($home_linhvuc as $item) {
                $d++;
                $rowLang = $action_news->getNewsLangDetail_byId($item['news_id'],$lang); 
            ?>
            <div class="col-sm-3">
                <div class="gb-linhvuckinhdoanh_phucloc-item">
                    <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['news_img'] ?>" alt="<?= $rowLang['lang_news_name'] ?>" class="img-responsive"></a>
                    <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_news_name'] ?></a></h3>
                    <p>
                        <?= $rowLang['lang_news_des'] ?>
                    </p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>