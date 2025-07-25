    <!--MENU MOBILE-->
<?php include_once DIR_MENU."MS_MENU_PHUCLOC_0002.php"; ?>
<!--MENU DESTOP-->
<header class="sticky-menu-moblie">
<nav class="visible-sm visible-xs mobile-menu-container mobile-nav">
    <div class="menu-mobile-nav">
        <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </div>
</nav>
<!-- End menu mobile-->
    <div class="gb-header-ruouvang sticky-menu">
        <div class="gb-header-between_ruouvang">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="gb-header-between_ruouvang-left">
                            <h1>
                                <a href="/"><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="logo" class="img-responsive"></a>
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <?php include DIR_MENU."MS_MENU_PHUCLOC_0001.php";?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        $(".sticky-menu").sticky({topSpacing:0});
        $(".sticky-menu-moblie").sticky({topSpacing:0});
    });
</script>