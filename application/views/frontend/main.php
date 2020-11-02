<div id="carousel-home" class="add_top_5">
	<div class="owl-carousel owl-theme">
		<?php $no =1; foreach ($slide as $sld) { ?>
			<div class="owl-slide cover" style="background-image: url('<?=base_url()?>assets/uploads/slide/<?=$sld['gambar_slide']?>');">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0 0 0 / 25%)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text text-center white">
									<h2 class="owl-slide-animated owl-slide-title"><?=$sld['sub_judul']?></h2>
									<p class="owl-slide-animated owl-slide-subtitle" id="ket<?=$no?>">
										<?=$sld['ket_slide']?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php $no++; } ?>
	</div>
	<div id="icon_drag_mobile"></div>
</div>

<ul id="banners_grid" class="clearfix">
	<?php foreach ($banner as $key => $value) { ?>
		<li>
			<a href="<?=$value['link_banner']?>" class="img_container">
				<img src="<?=base_url().'assets/uploads/banner/'.$value['gambar_banner']?>" data-src="<?=base_url().'assets/uploads/banner/'.$value['gambar_banner']?>" alt="" class="lazy">
				<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<h3><?=$value['nama_banner']?></h3>
					<div><span class="btn_1">Lihat</span></div>
				</div>
			</a>
		</li>
	<?php } ?>
</ul>
<!--  -->
<div class="container margin_60_35">
	<div class="main_title">
		<h2>Produk Kami</h2>
		<span>Produk</span>
		<p>Lihat semua list produk <a href="<?=base_url('produk')?>">disini</a></p>
	</div>
	<div class="row small-gutters">
		<?php 
			foreach ($produk as $key => $val_product) { 
			$foto = explode('|', $val_product['foto_product']);
		?>
			<div class="col-6 col-md-4 col-xl-3">
				<div class="grid_item">
					<figure>
						<!-- <span class="ribbon off">-30%</span> -->
						<a href="product-detail-1.html">
							<img class="img-fluid lazy loaded" src="<?=base_url().'assets/uploads/product/thumbnail/large/'.$foto[0]?>" data-src="<?=base_url().'assets/uploads/product/thumbnail/large/'.$foto[0]?>" alt="" data-was-processed="true">
							<img class="img-fluid lazy loaded" src="<?=base_url().'assets/uploads/product/thumbnail/large/'.$foto[0]?>" data-src="<?=base_url().'assets/uploads/product/thumbnail/large/'.$foto[0]?>" alt="" data-was-processed="true">
						</a>
						<!-- <div data-countdown="2020/03/15" class="countdown">00D 00:00:00</div> -->
					</figure>
					<!-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> -->
					<a href="<?=base_url('produk/detil/'.$val_product['seo_product'])?>">
						<h3><?=ucwords($val_product['nama_product']);?></h3>
					</a>
					<div class="price_box">
						<span class="new_price"><?=$this->mylibrary->format_rupiah($val_product['harga_product']);?></span>
						<!-- <span class="old_price">$60.00</span> -->
					</div>
					<ul>
						<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah ke favorit"><i class="ti-heart"></i><span>Tambah ke favorit</span></a></li>
						<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah ke keranjang"><i class="ti-shopping-cart"></i><span>Tambah ke keranjang</span></a></li>
					</ul>
				</div>
				<!-- /grid_item -->
			</div>
			<!-- /col -->
		<?php } ?>
	</div>
	<!-- /row -->
</div>



