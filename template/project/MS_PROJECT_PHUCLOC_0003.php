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
    $limit = 12;

    function search ($lang, $trang, $limit) {
        if (isset($_POST['q'])) {
            $q = $_POST['q'];
            $q = trim($q);
            $q = vi_en($q);         
        } else {
            $q = $_GET['search'];
            $q = str_replace('-', ' ', $q);
        }

        $start = $trang * $limit;
        global $conn_vn;
        $sql = "SELECT * FROM service_languages INNER JOIN service ON service_languages.service_id = service.service_id WHERE service_languages.friendly_url like '%$q%' And service_languages.languages_code = '$lang'";
        $result = mysqli_query($conn_vn, $sql);
        $count = mysqli_num_rows($result);

        $sql = "SELECT * FROM service_languages INNER JOIN service ON service_languages.service_id = service.service_id WHERE service_languages.friendly_url like '%$q%' And service_languages.languages_code = '$lang' LIMIT $start,$limit";//echo $sql;
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $return = array(
                'data' => $rows,
                'count' => $count,
                'q' => $q
            );
        return $return;
    }
    $rows = search($lang, $trang, $limit);
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
                <div><?php 
                    $config = array(
                        'current_page'  => $trang+1, // Trang hiện tại
                        'total_record'  => $rows['count'], // Tổng số record
                        'total_page'    => 1, // Tổng số trang
                        'limit'         => $limit,// limit
                        'start'         => 0, // start
                        'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
                        'link_first'    => '',// Link trang đầu tiên
                        'range'         => 9, // Số button trang bạn muốn hiển thị 
                        'min'           => 0, // Tham số min
                        'max'           => 0,  // tham số max, min và max là 2 tham số private
                        'search'        => str_replace(' ', '-', $rows['q'])

                    );

                    $pagination = new Pagination;
                    $pagination->init($config);
                    echo $pagination->htmlPaging3();
                ?></div>
            </div>
        </div>
    </div>
</div>