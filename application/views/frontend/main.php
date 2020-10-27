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
	<li>
		<a href="#0" class="img_container">
			<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_1.jpg" alt="" class="lazy">
			<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<h3>Men's Collection</h3>
				<div><span class="btn_1">Shop Now</span></div>
			</div>
		</a>
	</li>
	<li>
		<a href="#0" class="img_container">
			<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_2.jpg" alt="" class="lazy">
			<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<h3>Womens's Collection</h3>
				<div><span class="btn_1">Shop Now</span></div>
			</div>
		</a>
	</li>
	<li>
		<a href="#0" class="img_container">
			<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_3.jpg" alt="" class="lazy">
			<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<h3>Kids's Collection</h3>
				<div><span class="btn_1">Shop Now</span></div>
			</div>
		</a>
	</li>
</ul>
<!--  -->
<div class="container-fluid">
	<div class="row my-5">
		
	</div>
	<!-- <hr class="new5 mb-0"> -->
	<div class="row my-5">
		
	</div>
	<div class="row mb-3">
		
	</div>
</div>
<script type="text/javascript">
	$('#carouselExampleIndicators .carousel').carousel({
	  interval: 50000,
	  pause: true
	})
</script>

