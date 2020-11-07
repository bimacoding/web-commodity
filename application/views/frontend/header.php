<div class="layer"></div><!-- Mobile menu overlay mask -->
<div class="main_header Sticky">
    <div class="container">
        <div class="row small-gutters">
            <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                <div id="logo">
                    <a href="<?=base_url()?>"><img src="<?=logo()?>" alt="" width="150" height="37"></a>
                </div>
            </div>
            <nav class="col-xl-6 col-lg-7">
                <a class="open_close" href="javascript:void(0);">
                    <div class="hamburger hamburger--spin">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!-- Mobile menu button -->
                <div class="main-menu">
                    <div id="header_menu">
                        <a href="<?=base_url()?>"><img src="<?=logo();?>" alt=""></a>
                        <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                    </div>
                    <ul>
                        <?php
                        $cek = menu_user();
                        $menus = json_decode($cek);
                        $html = '';
                        foreach ($menus as $key) {
                            if ($key->submenu==null) {
                                $html .="<li> 
                                            <a href='".base_url().$key->link."'>" .$key->menu. "</a>
                                        </li>";
                            }else{
                                $html .="<li class='submenu'> 
                                                <a href='javascript:void(0);' class='show-submenu'>" .$key->menu. "</a>
                                                <ul>";
                                            foreach ($key->submenu as $key2) {
                                               $html .=" <li> <a href='".base_url().$key2->sublink."'>" .$key2->submenu. "</a> </li>";
                                            }
                                       $html .="</ul>
                                         </li>";
                            }
                        }
                        echo $html;
                        ?>
                        
                    </ul>
                </div>
                <!--/main-menu -->
            </nav>
            <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
                <ul class="top_tools">
                    <li>
                        <div class="dropdown dropdown-cart">
                            <a href="cart.html" class="cart_bt"><strong>2</strong></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li>
                                        <a href="product-detail-1.html">
                                            <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                            <strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                        </a>
                                        <a href="#0" class="action"><i class="ti-trash"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-detail-1.html">
                                            <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                            <strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                        </a>
                                        <a href="0" class="action"><i class="ti-trash"></i></a>
                                    </li>
                                </ul>
                                <div class="total_drop">
                                    <div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
                                    <a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- /dropdown-cart-->
                    </li>
                    <li>
                        <a href="#0" class="wishlist"><span>Wishlist</span></a>
                    </li>
                    <li>
                        <div class="dropdown dropdown-access">
                            <a href="account.html" class="access_link"><span>Account</span></a>
                            <div class="dropdown-menu">
                                <?php if ($this->session->userdata('level')!=='') { ?>
                                  <a href="<?=base_url('auth?page=penjual')?>" class="btn_1">Masuk / Daftar</a>  
                                <?php } ?>
                                <ul>
                                    <?php if ($this->session->userdata('level')=='penjual') { ?>
                                        <li>
                                            <a href="<?=base_url()?>"><i class="ti-truck"></i>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>"><i class="ti-package"></i>Produk Saya</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>"><i class="ti-user"></i>Profile</a>
                                        </li>
                                    <?php }else if ($this->session->userdata('level')=='pembeli') { ?>
                                        <li>
                                            <a href="<?=base_url()?>"><i class="ti-truck"></i>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>"><i class="ti-package"></i>Pesanan Saya</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>"><i class="ti-user"></i>Profile</a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?=base_url('hal/syarat-dan-ketentuan')?>"><i class="ti-help-alt"></i>Syarat & Ketentuan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /dropdown-access-->
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="search_panel"><span>Search</span></a>
                    </li>
                
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
</div>


