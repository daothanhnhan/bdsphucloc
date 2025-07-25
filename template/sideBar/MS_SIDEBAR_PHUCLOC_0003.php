<?php 
    $sidebar_news_hot = $action_news->getListNewsHot_hasLimit(5);//var_dump($sidebar_news_hot);
    $sidebar_news_one = $action_news->getNewsLangDetail_byId($sidebar_news_hot[0]['news_id'],$lang);
?>
<div class="gb-recenpost-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Tin nổi bật</h3>
        <div class="widget-content">
            <div class="gb-blog-left-recent-posts_ruouvang">
                <div class="gb-blog-left-recent-posts_ruouvang-big">
                    <div class="gb-item-recent-posts_ruouvang-img">
                        <a href="/<?= $sidebar_news_one['friendly_url'] ?>"><img src="/images/<?= $sidebar_news_hot[0]['news_img'] ?>" alt="<?= $sidebar_news_one['lang_news_name'] ?>" class="img-responsive"></a>
                    </div>
                    <div class="gb-item-recent-posts_ruouvang-text">
                        <h2><a href="/<?= $sidebar_news_new[0]['friendly_url'] ?>"><?= $sidebar_news_one['lang_news_name'] ?></a></h2>
                        <div class="gb-item-recent-post-time_ruouvang">
                            <p>
                                <?= $sidebar_news_one['lang_news_des'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <ul>
                    <?php 
                    unset($sidebar_news_hot[0]);
                    foreach ($sidebar_news_hot as $item) {
                        $rowLang = $action_news->getNewsLangDetail_byId($item['news_id'],$lang);
                    ?>
                    <li>
                        <div class="gb-item-recent-posts_ruouvang">
                            <div class="gb-item-recent-posts_ruouvang-img">
                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['news_img'] ?>" alt="hot"></a>
                            </div>
                            <div class="gb-item-recent-posts_ruouvang-text">
                                <h2><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_news_name'] ?></a></h2>
                                <div class="gb-item-recent-post-time_ruouvang">
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i> <?= substr($item['news_created_date'], 0, 10) ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </aside>
</div>