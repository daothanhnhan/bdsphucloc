<?php 
    $tintuc_hoatdong_cat = $action_news->getNewsCatLangDetail_byId(73, $lang);
    $tintuc_hoatdong = $action_news->getNewsList_byMultiLevel_orderNewsId(73,'desc',1,6,'')['data'];

    $tintuc_vanhoa_cat = $action_news->getNewsCatLangDetail_byId(72, $lang);
    $tintuc_vanhoa = $action_news->getNewsList_byMultiLevel_orderNewsId(72,'desc',1,6,'')['data'];

    $tintuc_tuthien_cat = $action_news->getNewsCatLangDetail_byId(71, $lang);
    $tintuc_tuthien = $action_news->getNewsList_byMultiLevel_orderNewsId(71,'desc',1,6,'')['data'];

    $tintuc_list_cat = $action_news->getNewsCat_byNewsCatIdParent_tintuc(75, 'desc');
?>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_PHUCLOC_0001.php";?>
<div class="gb-page-blog_ruouvang">
    <div class="gb-page-blog_ruouvang-banner">
        <img src="/images/banner-tin-tuc-su-kien.png" alt="" class="img-responsive">
    </div>
    <div class="gb-page-blog_ruouvang-title">
        <div class="container">
            <div class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <?php 
                        $d = 0;
                        foreach ($tintuc_list_cat as $item) { 
                            $d++;
                        ?>
                        <li class="<?= ($d==1) ? 'active' : '' ?>">
                            <a href="#tab_default_<?= $d ?>" data-toggle="tab"><?= $item['newscat_name'] ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tab-content">
            <?php 
            $d1 = 0;
            foreach ($tintuc_list_cat as $item_cat) { 
                $d1++;
                $tintuc_sub = $action_news->getNewsList_byMultiLevel_orderNewsId($item_cat['newscat_id'],'desc',1,6,'')['data'];
            ?>
            <div class="tab-pane <?= ($d1==1) ? 'active' : '' ?>" id="tab_default_<?= $d1 ?>">
                <div class="row">
                    <?php 
                    $d = 0;
                    foreach ($tintuc_sub as $item) {
                        $d++;
                        $rowLang = $action_news->getNewsLangDetail_byId($item['news_id'],$lang); 
                    ?>
                    <div class="col-sm-4">
                        <div class="gb-news-blog_ruouvang-item">
                            <div class="gb-news-blog_ruouvang-item-img">
                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['news_img'] ?>" alt="<?= $rowLang['lang_news_name'] ?>" class="img-responsive"></a>
                                <div class="caption caption-large">
                                    <time class="the-date"><?= substr($item['news_created_date'], 0, 10) ?></time>
                                </div>
                            </div>
                            <div class="gb-news-blog_ruouvang-item-text">
                                <div class="gb-news-blog_ruouvang-item-title">
                                    <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_news_name'] ?></a></h3>
                                </div>
                                <div class="gb-news-blog_ruouvang-item-text-des">
                                    <p><?= $rowLang['lang_news_des'] ?></p>
                                </div>
                            </div>
                            <div class="gb-news-blog_ruouvang-item-button">
                                <a href="/<?= $rowLang['friendly_url'] ?>">
                                    <button type="button" class="btn gb-btn-readmore">ĐỌC TIẾP</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if ($d%3==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                    } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>