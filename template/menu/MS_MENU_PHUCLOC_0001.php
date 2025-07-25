<nav class="gb-main-menu_ldpvinhome" >
    <div class="main-navigation uni-menu-text_ldpvinhome">
        <div class="cssmenu">
            <!-- <ul>
                <li><a href="/index.php" class="slide-section">Trang chủ</a></li>
                <li class="has-sub"><a href="">Về chúng tôi</a>
                    <ul>
                        <li><a href="gioi-thieu">Giới thiệu chung</a></li>
                        <li><a href="doi-ngu-lanh-dao">Đội ngũ lãnh đạo</a></li>
                        <li><a href="giai-thuong">Giải thưởng</a></li>
                    </ul>
                </li>
                <li class="has-sub"><a href="du-an">Dự án</a>
                    <ul>
                        <li><a href="du-an">Tông quan về dự án</a></li>
                    </ul>
                </li>
                <li class="has-sub"><a href="tin-tuc">Tin tức - Sự kiện</a>
                    <ul>
                        <li><a href="tin-tuc">Tin bất động sản</a></li>
                        <li><a href="tin-tuc">Văn hóa doanh nghiệp</a></li>
                    </ul>
                </li>
                <li><a href=""> Tiện ích</a></li>
                <li><a href="tuyen-dung">Tuyển dụng</a></li>
                <li><a href="lien-he">Liên hệ</a></li>
            </ul> -->
            <?php 
                $list_menu = $menu->getListMainMenu_byOrderASC();
                $menu->showMenu_byMultiLevel_mainMenuTraiCam($list_menu,0,$lang,0);
            ?>
        </div>
    </div>
</nav>

<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        var headerHeight = $('.gb-main-menu_ldpvinhome').outerHeight();

        $('.slide-section').click(function () {
            var linkHref = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(linkHref).offset().top - headerHeight
            }, 1000);
            e.preventDefault();
        });

        $(".sticky-menu").sticky({topSpacing:0});
    });
</script>