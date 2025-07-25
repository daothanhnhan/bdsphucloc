<?php 
    function listHoiDong () {
        global $conn_vn;
        $sql = "SELECT * FROM dieu_hanh";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
    $list_hoidong = listHoiDong();
?>
<div class="gb-doingulanhdao_phucloc">
    <div class="container">
        <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_PHUCLOC_0001.php";?>
    </div>
    <div class="gb-doingulanhdao_phucloc-banner">
        <img src="/images/banner-doi-ngu-lanh-dao.jpg" alt="" class="img-responsive">
    </div>
    <div class="gb-doingulanhdao_phucloc-body">
        <div class="container">
            <div class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_default_1" data-toggle="tab">BAN ĐIỀU HÀNH</a>
                        </li>
                        <!-- <li>
                            <a href="#tab_default_2" data-toggle="tab">BAN ĐIỀU HÀNH</a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                            <!-- <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="gb-doingulanhdao_phucloc-item">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="/images/team1.jpg" alt="" class="img-responsive">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="right-info">
                                                            <p class="gioitinhld">Ông</p>
                                                            <a class="hotenld" id="titleld1"> Nguyễn Trung Vũ</a>
                                                            <div class="chucdanhld"><span style="white-space:pre-line">Chủ tịch HĐQT </span></div>
                                                            <div class="desc_leader b"><div class="line"></div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <?php foreach ($list_hoidong as $item) { ?>
                                <div class="col-md-6">
                                    <div class="gb-doingulanhdao_phucloc-item">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="/images/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="img-responsive">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="right-info">
                                                    <p class="gioitinhld"><?= $item['sex'] ?></p>
                                                    <a class="hotenld" id="titleld1"> <?= $item['name'] ?></a>
                                                    <div class="chucdanhld"><span style="white-space:pre-line"><?= $item['position'] ?> </span></div>
                                                    <div class="desc_leader b"><div class="line"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_default_2">
                            <p>
                                Howdy, I'm in Tab 2.
                            </p>
                            <p>
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                            </p>
                            <p>
                                <a class="btn btn-warning" href="http://j.mp/metronictheme" target="_blank">
                                    Click for more features...
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>