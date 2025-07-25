<?php 
    $sidebar_news = $action_news->getNewsCat_byNewsCatIdParent(0, 'desc');
?>
<div class="gb-danhmuc-sidebar-ruouvang widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-ruouvang">Danh mục tin tức</h3>
        <div class="widget-content">
            <ul>
                <?php 
                foreach ($sidebar_news as $item) {
                    $rowLang = $action_news->getNewsCatLangDetail_byId($item['newscat_id'],$lang); 
                    $sidebar_news_1 = $action_news->getNewsCat_byNewsCatIdParent($item['newscat_id'], 'desc');
                ?>
                <li><a href="/<?= $rowLang['friendly_url'] ?>"><i class="glyphicon glyphicon-triangle-right" aria-hidden="true"></i> <?= $rowLang['lang_newscat_name'] ?></a>
                    <ul>
                        <?php 
                        foreach ($sidebar_news_1 as $item_1) {
                            $rowLang_1 = $action_news->getNewsCatLangDetail_byId($item_1['newscat_id'],$lang); 
                        ?>
                        <li><a href="/<?= $rowLang_1['friendly_url'] ?>"><i class="fa fa-angle-right" style="padding-left: 15px;"></i> <?= $rowLang_1['lang_newscat_name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                    
                <?php } ?>
            </ul>
        </div>
    </aside>
</div>