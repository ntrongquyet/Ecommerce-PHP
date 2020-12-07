<html>

<head>
    <title>All Laravel - @yield('title')</title>
</head>

<body>
    <div class="header-menu mobile-menu-trans">
        <div class="container">
            <div class="header-menu-top clearfix">
                <div class="col-sm-2  col-md-2  hidden-xs pd-0  mobile-logo"><a href="https://gaubongcaocap.com" class="logo"><img src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_v2/img/logo.png" alt="Gấu Bông Cao Cấp"></a>
                </div>

                <div class="col-xs-3 hidden-sm hidden-md hidden-lg pd-0 mobile-logo">
                    <a href="https://gaubongcaocap.com" class="logo">
                        <img src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_v2/img/logo_white.png" alt="Gấu Bông Cao Cấp">
                    </a>
                </div>

                <div class="col-sm-10 col-md-10 col-xs-7 pd-0">
                    <form action="https://gaubongcaocap.com" class="search-bar col-sm-10 col-md-10">
                        <div class="search col-sm-11 col-md-11 col-xs-12">
                            <input class="hidden-xs" type="search" placeholder="Nhập sản phẩm cần tìm" value="" name="s" autocomplete="off">

                            <div class="mobile-search-box visible-xs" data-search="">
                                Nhập sản phẩm cần tìm </div>

                            <button type="submit" class="search-icon visible-xs">
                                <i class="fas fa-search"></i>
                            </button>

                            <!--<ul class="search-result"></ul>-->
                        </div>
                        <button type="submit" class="btn search-btn col-sm-1 col-md-1 hidden-xs">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    <div class="header-cart clearfix col-sm-2 col-md-2 dropdown hidden-xs">
                        <a href="https://gaubongcaocap.com/cart" class="header-cart-button gn_shopping_cart" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Xem Giỏ Hàng">
                            <i class="fas fa-gifts"></i>
                            <span class="badge gn_cart_number_badge"></span>
                        </a>
                    </div>
                </div>


                <div class="col-xs-2 visible-xs collapsed-bars" data-toggle="modal" data-target="#menuModal"><img src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_v2/img/collapsed-bars.png" type="button">
                    <p style="letter-spacing: 1px">Menu</p>
                </div>
            </div>


            <ul class="main-menu clearfix hidden-xs" itemscope="" itemtype="http://schema.org/siteNavigationElement">
                <li class="have-submenu">
                    <h3 class="text" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-teddy" title="Gấu Teddy" itemprop="url">Gấu Teddy</a></h3>
                    <div class="sub-menu dropdown-menu" style="display: none;">
                        <div id="menu-gau-teddy-menu" class="container">
                            <div class="row">
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-teddy" itemprop="url">Gấu Bông Teddy</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-size-lon" itemprop="url">Gấu Bông Size Lớn</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-size-nho" itemprop="url">Gấu Bông Size Nhỏ</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-tot-nghiep" itemprop="url">Gấu Bông Tốt Nghiệp</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/gau-bong-dep" itemprop="url">Gấu Bông Đẹp</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-to" itemprop="url">Gấu Bông To</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-ao-len" itemprop="url">Gấu Bông Áo Len</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/gau-bong-gia-re" itemprop="url">Gấu Bông Giá Rẻ – Chất Lượng Cao | Gấu Bông Cao Cấp</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-gia-re/gau-bong-100k" itemprop="url">Gấu Bông 100k</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong?min_price=100000&amp;max_price=200000" itemprop="url">Gấu Bông 100k – 200k</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong?min_price=200000&amp;max_price=500000" itemprop="url">Gấu Bông 200k – 500k</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong?min_price=500000&amp;max_price=1000000" itemprop="url">Gấu Bông 500k – 1tr</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong?min_price=1000000&amp;max_price=2000000" itemprop="url">Gấu Bông 1tr – 2tr</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a title="Gấu Bông Teddy" href="https://gaubongcaocap.com/loai-gau-bong/gau-bong/gau-bong-teddy" itemprop="url"><img data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/banner/bn-gau-teddy.jpg" class="lazyload"></a></span>
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="have-submenu">
                    <h3 class="text" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong" title="Thú Bông" itemprop="url">Thú Bông</a></h3>
                    <div class="sub-menu dropdown-menu" style="display: none;">
                        <div id="menu-thu-bong-menu" class="container">
                            <div class="row">
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="#" itemprop="url">Thú Bông Dễ Thương</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/heo-bong" itemprop="url">Heo Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/cho-bong" itemprop="url">Chó Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/meo-bong" itemprop="url">Mèo Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/chuot-bong" itemprop="url">Chuột Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/khung-long" itemprop="url">Khủng Long Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/ga-bong" itemprop="url">Gà Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/ca-bong" itemprop="url">Cá Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/ngua-bong" itemprop="url">Ngựa Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/nhim-bong" itemprop="url">Nhím Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/khi-bong" itemprop="url">Khỉ Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/vit-bong" itemprop="url">Vịt Bông</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong" itemprop="url">Thú Bông dài ôm ngủ</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/ca-sau-bong" itemprop="url">Cá Sấu Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/sau-bong" itemprop="url">Sâu Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/cuu-bong" itemprop="url">Cừu Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/ha-ma-bong" itemprop="url">Hà Mã Bông</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="#" itemprop="url">Nhân Vật Thú Bông</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/chuot-bong-hamster" itemprop="url">Chuột Bông Hamster</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/voi-bong" itemprop="url">Voi Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/rua-bong" itemprop="url">Rùa Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/tho-bong" itemprop="url">Thỏ Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/gau-panda" itemprop="url">Gấu Panda</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/ech-bong" itemprop="url">Ếch Bông</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong" itemprop="url"><img data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/banner/bn-thu-bong.jpg" class="lazyload"></a></span>
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="have-submenu">
                    <h3 class="text" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh" title="Gấu Bông Hoạt Hình" itemprop="url">Gấu Bông Hoạt Hình</a></h3>
                    <div class="sub-menu dropdown-menu" style="display: none;">
                        <div id="menu-gau-bong-hoat-hinh" class="container">
                            <div class="row">
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh" itemprop="url">Gấu Bông Hoạt Hình</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-do-an/gau-bong-tra-sua" itemprop="url"><span style="color: red; font-weight: bold">Gấu Bông Trà Sữa </span><img style="width: 25px;  margin-left: 5px;" data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/newicon.gif" class="lazyload"></a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/heo-bong/heo-bong-tiktok" itemprop="url"><span style="color: red; font-weight: bold">Heo Bông TikTok </span><img style="width: 25px;  margin-left: 5px;" data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/newicon.gif" class="lazyload"></a></li>
                                        <li><a href="https://gaubongcaocap.com/gau-bong/vit-bong-lalafanfan" itemprop="url"><span style="color: red; font-weight: bold">Vịt Bông LaLafanfan </span><img style="width: 25px;  margin-left: 5px;" data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/newicon.gif" class="lazyload"></a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-woobee" itemprop="url"><span style="color: #ffa200; font-weight: bold">Gấu Bông Qoobee </span><img style="width: 25px;  margin-left: 5px;" data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/newicon.gif" class="lazyload"></a></li>
                                        <li><a href="https://gaubongcaocap.com/gau-bong/bo-cham-chi-phim-thu-ky-kim" itemprop="url">Bò Chăm Chỉ – Thư Ký Kim</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-totoro" itemprop="url">Gấu Bông Totoro</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-stitch" itemprop="url">Gấu Bông Stitch</a></li>
                                        <li><a href="https://gaubongcaocap.com/gau-bong/cu-bong-ciu-bong-de-thuong" itemprop="url">Cu Bông – Ciu Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-rilakkuma" itemprop="url">Gấu Bông Rilakkuma</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/chuot-mickey" itemprop="url">Chuột Mickey</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-doremon" itemprop="url">Gấu Bông Doremon</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-hello-kitty" itemprop="url">Gấu Bông Hello Kitty</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/meo-bong-dinga-cho-bong-puco" itemprop="url">Mèo Bông Dinga &amp; Chó Bông Puco</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/cho-husky" itemprop="url">Chó Husky</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="#" itemprop="url">Nhân Vật Phim Hoạt Hình</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/unicorn" itemprop="url">Gấu Bông Unicorn</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-shin" itemprop="url">Gấu Bông SHIN</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-avengers-gau-bong-sieu-anh-hung" itemprop="url">Gấu Bông Avengers – Gấu Bông Siêu Anh Hùng</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-angry-bird" itemprop="url">Gấu Bông Angry Bird</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/ngua-pony" itemprop="url">Ngựa Pony</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/pikachu" itemprop="url">Pikachu</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-tonton" itemprop="url">Gấu Bông TONTON</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/thu-bong/chuot-bong-hamster" itemprop="url">Chuột Bông Hamster</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-kakao-talk" itemprop="url">Gấu Bông Kakao Talk</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-pooh" itemprop="url">Gấu Pooh</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/khi-yoyo-cici" itemprop="url">Khỉ YoYo &amp; CiCi</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/shit-bong" itemprop="url">Shit Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/tho-bong-mashimaro" itemprop="url">Thỏ Bông Mashimaro</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/spiderman" itemprop="url">Người Nhện – Spiderman</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-sieu-anh-hung" itemprop="url">Gấu Bông Siêu anh hùng</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-bong-line" itemprop="url">Gấu Bông LINE</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/gau-brown" itemprop="url">Gấu Brown</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh/tho-bong-cony" itemprop="url">Thỏ bông Cony</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-hoat-hinh" itemprop="url"><img data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/banner/bn-gau-bong-hoat-hinh.jpg" class="lazyload"></a></span>
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="have-submenu">
                    <h3 class="text" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om/goi-men" title="Gối Mền 2in1" itemprop="url">Gối Mền 2in1</a></h3>
                    <div class="sub-menu dropdown-menu" style="display: none;">
                        <div id="menu-goi-om" class="container">
                            <div class="row">
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om" itemprop="url">Gối ôm</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om/goi-chu-u" itemprop="url">Gối Chữ U</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om/goi-men" itemprop="url">Gối Mền 2in1</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om/goi-om-dut-tay" itemprop="url">Gối ôm đút tay</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om/goi-pudding" itemprop="url">Gối ôm Pudding</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om/goi-tua-lung" itemprop="url">Gối tựa lưng</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/goi-om" itemprop="url"><img data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/banner/bn-goi-om.jpg" class="lazyload"></a></span>
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="have-submenu">
                    <h3 class="text" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/trai-cay-bong" title="Trái Cây Bông" itemprop="url">Trái Cây Bông</a></h3>
                    <div class="sub-menu dropdown-menu" style="display: none;">
                        <div id="menu-menu-4-trai-cay-bong" class="container">
                            <div class="row">
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-do-an/trai-cay-bong" itemprop="url">Trái Cây Bông</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-do-an/trai-cay-bong/gau-bong-trai-bo" itemprop="url">Gấu Bông Trái Bơ</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-do-an/trai-cay-bong/ca-rot-bong" itemprop="url">Cà Rốt Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-do-an/trai-cay-bong/chuoi-bong" itemprop="url">Chuối Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-do-an/trai-cay-bong/dua-hau-bong" itemprop="url">Dưa Hấu Bông</a></li>
                                        <li><a href="https://gaubongcaocap.com/loai-gau-bong/gau-bong-do-an/trai-cay-bong/gau-bong-trai-dau" itemprop="url">Gấu Bông Trái Dâu</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a target="_blank" rel="nofollow" href="https://giftnow.vn" title="PHỤ KIỆN &amp; QUÀ TẶNG GIFTNOW" class="saleoff">PHỤ KIỆN</a></li>

                <li class="have-submenu">
                    <h3 class="text" itemprop="name"><a href="https://gaubongcaocap.com/huong-dan-mua-gau-bong-online.html" title="Liên Hệ" itemprop="url">Liên Hệ</a></h3>
                    <div class="sub-menu dropdown-menu" style="display: none;">
                        <div id="menu-lien-he" class="container">
                            <div class="row">
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/lien-he" itemprop="url">Liên Hệ</a></span>
                                    <ul>

                                        <li><a href="https://m.me/gaubongcaocapcom" itemprop="url">Chat Facebook</a></li>
                                        <li><a href="https://gaubongcaocap.com/huong-dan-mua-gau-bong-online.html" itemprop="url">Hướng Dẫn Mua Gấu Bông Online</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/blog/goc-gau-bong" itemprop="url">Góc Gấu Bông</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/su-kien-khuyen-mai" itemprop="url">Sự Kiện – Khuyến Mãi</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/member" itemprop="url">Tích Điểm Mua Hàng</a></span>
                                    <ul>

                                        <li><a href="https://gaubongcaocap.com/member" itemprop="url">Đăng Ký Thành Viên</a></li>

                                    </ul>
                                </div>
                                <div class="menu-list menu-collection-large col-xs-3"><span class="title" itemprop="name"><a href="https://gaubongcaocap.com/huong-dan-mua-gau-bong-online.html" itemprop="url"><img data-src="https://gaubongcaocap.com/wp-content/themes/gaubongcaocap_2018/img/banner/bn-mien-phi-goi-qua.jpg" class="lazyload"></a></span>
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="https://gaubongcaocap.com/member" title="TÍCH ĐIỂM MUA HÀNG" class="saleoff">TÍCH ĐIỂM</a></li>
            </ul>
        </div>
    </div>
    @section('sidebar')
    Phần chính trong sidebar.
    @show

    <div class="container">
        @yield('content')
    </div>

</body>

</html>
