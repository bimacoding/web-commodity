<div class="container margin_30">
    <div class="row">
        <div class="col-md-6">
            <div class="all">
                <div class="slider">
                    <div class="owl-carousel owl-theme main">
                    	<?php foreach (explode('|',$row['foto_product']) as $keys1 => $values1) { ?>
                        	<div style="background-image: url(<?=base_url().'/assets/uploads/product/thumbnail/large/'.$values1?>);" class="item-box"></div>
                        <?php } ?>
                    </div>
                    <div class="left nonl"><i class="ti-angle-left"></i></div>
                    <div class="right"><i class="ti-angle-right"></i></div>
                </div>
                <div class="slider-two">
                    <div class="owl-carousel owl-theme thumbs">
                    	<?php 
                    		foreach (explode('|',$row['foto_product']) as $keys => $values) { 
                    		if ($keys==0){
                    	?>
                        	<div style="background-image: url(<?=base_url().'/assets/uploads/product/thumbnail/large/'.$values?>);" class="item active"></div>
                        <?php }else{ ?>
                        	<div style="background-image: url(<?=base_url().'/assets/uploads/product/thumbnail/large/'.$values?>);" class="item active"></div>
                        <?php } } ?>
                    </div>
                    <div class="left-t nonl-t"></div>
                    <div class="right-t"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="<?=base_url('produk/kat/'.$row['seo_kategori'])?>">Category</a></li>
                    <li><?=ucwords($row['nama_product'])?></li>
                </ul>
            </div>
            <!-- /page_header -->
            <div class="prod_info">
                <h1><?=ucwords($row['nama_product'])?></h1>
                <!-- <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span> -->
                <p><small>SKU: MTKRY-001</small><br>Sed ex labitur adolescens scriptorem. Te saepe verear tibique sed. Et wisi ridens vix, lorem iudico blandit mel cu. Ex vel sint zril oportere, amet wisi aperiri te cum.</p>
                <div class="prod_options">
                    
                    
                    <div class="row">
                        <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="numbers-row">
                                <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                            <div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="price_main"><span class="new_price"><?=$this->mylibrary->format_rupiah($row['harga_product'])?></span></div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="btn_add_to_cart"><a href="#0" class="btn_1">Beli</a></div>
                    </div>
                </div>
            </div>
            <!-- /prod_info -->
            <div class="product_actions">
                <ul>
                    <li>
                        <a href="#"><i class="ti-heart"></i><span>Masukan ke favorit</span></a>
                    </li>
                </ul>
            </div>
            <!-- /product_actions -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="tabs_product">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Keterangan</a>
            </li>
        </ul>
    </div>
</div>
<!-- /tabs_product -->
<div class="tab_content_wrapper">
    <div class="container">
        <div class="tab-content" role="tablist">
            <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                <div class="card-header" role="tab" id="heading-A">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                            Ketereangan
                        </a>
                    </h5>
                </div>
                <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <h3>Detil</h3>
                                <?=html_entity_decode(htmlspecialchars_decode($row['ket_product']))?>
                            </div>
                            <div class="col-lg-5">
                                <h3></h3>
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>Daerah Asal</strong></td>
                                                <td><?=ucwords($row['asal_product'])?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Harga</strong></td>
                                                <td><?=$this->mylibrary->format_rupiah($row['harga_product'])?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Berat</strong></td>
                                                <td><?=$row['berat_product']?> Kg</td>
                                            </tr>
                               
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /TAB A -->
        </div>
        <!-- /tab-content -->
    </div>
    <!-- /container -->
</div>
<!-- /tab_content_wrapper -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Produk Terkait</h2>
        <span>Produk</span>
        <p>Produk yang mungkin anda minati.</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel owl-loaded owl-drag">

	    <div class="owl-stage-outer">
	    	<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1500px;">
	    		<?php 
	    			foreach ($terkait->result_array() as $k => $rows) {
	    			$foto = explode('|', $rows['foto_product']); 
	    		?>
		    	<div class="owl-item active" style="width: 290px; margin-right: 10px;">
		    		<div class="item">
			            <div class="grid_item">
			                <span class="ribbon new"><?=htmlspecialchars_decode(html_entity_decode($rows['nama_kategori']))?></span>
			                <figure>
			                    <a href="<?=base_url('produk/detil/'.$rows['seo_product'])?>">
			                        <img class="owl-lazy" src="<?=base_url().'assets/uploads/product/thumbnail/large/'.$foto[0]?>" data-src="<?=base_url().'assets/uploads/product/thumbnail/large/'.$foto[0]?>" alt="" style="opacity: 1;">
			                    </a>
			                </figure>
			                <a href="<?=base_url('produk/detil/'.$rows['seo_product'])?>">
			                    <h3><?=htmlspecialchars_decode(html_entity_decode($rows['nama_product']))?></h3>
			                </a>
			                <div class="price_box">
			                    <span class="new_price"><?=$this->mylibrary->format_rupiah($rows['harga_product'])?></span>
			                </div>
			                <ul>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah ke favorit"><i class="ti-heart"></i><span>Tambah ke favorit</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah ke keranjang"><i class="ti-shopping-cart"></i><span>Tambah ke keranjang</span></a></li>
							</ul>
			            </div>
			            <!-- /grid_item -->
			        </div>
			    </div>
			    <?php } ?>

		    </div>
		</div>
		<div class="owl-nav">
			<button type="button" role="presentation" class="owl-prev disabled"><i class="ti-angle-left"></i></button>
			<button type="button" role="presentation" class="owl-next"><i class="ti-angle-right"></i></button>
		</div>
		<div class="owl-dots disabled"></div>
	</div>
    <!-- /products_carousel -->
</div>
<!-- /container -->
