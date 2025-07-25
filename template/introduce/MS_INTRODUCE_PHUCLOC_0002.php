<?php 
     $action_page = new action_page(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);
    $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'pageDetail';
?>
<div class="gb-page-introduce_phucloc">
    <div class="container">
        <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_PHUCLOC_0001.php";?>
    </div>
    <div class="container">
        <?= $rowLang['lang_page_content'] ?>
    </div>
</div>