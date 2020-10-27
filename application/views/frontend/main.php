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
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="my-4 text-center">BERTUMBUH BERSAMA DALAM BERIBADAH</h3>
					<p class="text-center" style="font-size: 22px;">Manusia hidup bukan dari makanan jasmani saja, tetapi juga dari makanan rohani.</p>
				</div>
				<br>
				<div class="d-none d-lg-block d-xl-block col-lg-3 px-1 py-1" id="nb">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="60000">
					  <div class="carousel-inner">
					  	<?php 
					  		$kiri = $this->model_utama->view_where_ordering_limit('t_video',array('posisi'=>'kiri','aktif'=>'Y'),'id_video','DESC',0,3);
					  		$n_kiri = 1;
					  		foreach ($kiri->result_array() as $k_kiri) {
					  		if ($n_kiri==1) {
					  	?>
					  		<div class="carousel-item active">
						    	<iframe width="100%" height="330" src="http://www.youtube.com/embed/<?=$k_kiri['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1"></iframe>
						    </div>
					  	<?php }else{ ?>
					  		<div class="carousel-item">
						    	<iframe width="100%" height="330" src="http://www.youtube.com/embed/<?=$k_kiri['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1"></iframe>
						    </div>
					  	<?php } $n_kiri++; }?>
					  </div>
					  <?php if ($kiri->num_rows()>1) { ?>
					  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						</a>
					  <?php } ?>
					</div>
				</div>
				<div class="col-md-12 col-lg-6 px-1 py-1">
					<!-- <?php $vd //= $this->db->query("SELECT * FROM t_video WHERE aktif = 'Y' LIMIT 1")->row_array(); ?>
					<iframe width="100%" height="250" src="<//?=$vd['link_video']?>" style="border-radius: 0px;"></iframe> --> 
					<a href="<?=base_url().'show/video_list'?>">
						<figure class="figure_container">	
			                <img src="<?=base_url()?>assets/images/Capture.PNG" data-src="<?=base_url()?>assets/images/bg_gkigki.jpg" alt="Nature">
			            </figure>
			        </a>
			        <div class="my-1">
						<a href="http://www.youtube.com/gkikrangganofficial" class="btn btn-secondary btn-block">GALERI VIDEO</a>
					</div>
			        <!-- <//?php $atas = $this->model_utama->view_where_ordering_limit('t_video',array('posisi'=>'atas','aktif'=>'Y'),'id_video','DESC',0,1)->row_array()?>
					<iframe width="100%" height="250" src="<?=$atas['link_video']?>" style="border-radius: 6px;"></iframe> -->
				</div>
				<div class="d-none d-lg-block d-xl-block col-lg-3 px-1 py-1" id="nb">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="60000">
					  <div class="carousel-inner">
					  	<?php 
					  		$kanan = $this->model_utama->view_where_ordering_limit('t_video',array('posisi'=>'kanan','aktif'=>'Y'),'id_video','DESC',0,3);
					  		$n_kanan = 1;
					  		foreach ($kanan->result_array() as $k_kanan) {
					  		if ($n_kanan==1) {
					  	?>
					  		<div class="carousel-item active">
						    	<iframe width="100%" height="330" src="http://www.youtube.com/embed/<?=$k_kanan['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1"></iframe>
						    </div>
					  	<?php }else{  ?>
					  		<div class="carousel-item">
						    	<iframe width="100%" height="330" src="http://www.youtube.com/embed/<?=$k_kanan['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1"></iframe>
						  		
						    </div>
					  	<?php } $n_kanan++; }?>
					  </div>
					  <?php if ($kanan->num_rows()>1) { ?>
					  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						</a>
					  <?php } ?>
					</div>
				</div>
				<br>
				<div class="d-lg-none d-xl-none col-6 px-1 py-1" id="nb">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="60000">
					  <div class="carousel-inner">
					  	<?php 
					  		$kiri = $this->model_utama->view_where_ordering_limit('t_video',array('posisi'=>'kiri','aktif'=>'Y'),'id_video','DESC',0,3);
					  		$n_kiri = 1;
					  		foreach ($kiri->result_array() as $k_kiri) {
					  		if ($n_kiri==1) {
					  	?>
					  		<div class="carousel-item active">
						      		<iframe width="100%" height="250" src="http://www.youtube.com/embed/<?=$k_kiri['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1"></iframe>
						    </div>
					  	<?php }else{  ?>
					  		<div class="carousel-item">
					  			<iframe width="100%" height="250" src="http://www.youtube.com/embed/<?=$k_kiri['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1">
					  			</iframe>
						    </div>
					  	<?php } $n_kiri++; }?>
					  </div>
					  <?php if ($kiri->num_rows()>1) { ?>
					  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						</a>
					  <?php } ?>
					</div>
				</div>
				<div class="d-lg-none d-xl-none col-6 px-1 py-1" id="nb">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="60000">
					  <div class="carousel-inner">
					  	<?php 
					  		$kanan = $this->model_utama->view_where_ordering_limit('t_video',array('posisi'=>'kanan','aktif'=>'Y'),'id_video','DESC',0,3);
					  		$n_kanan = 1;
					  		foreach ($kanan->result_array() as $k_kanan) {
					  		if ($n_kanan==1) {
					  	?>
					  		<div class="carousel-item active ">
						    	<iframe width="100%" height="250" src="http://www.youtube.com/embed/<?=$k_kanan['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1" style="min-height: 250px"></iframe>
						    </div>
					  	<?php }else{  ?>
					  		<div class="carousel-item">
						    	<iframe width="100%" height="250" src="http://www.youtube.com/embed/<?=$k_kanan['link_video']?>?enablejsapi=1" frameborder="0" allowfullscreen="1" style="min-height: 250"></iframe>
						    </div>
					  	<?php } $n_kanan++; }?>
					  </div>
					  <?php if ($kanan->num_rows()>1) { ?>
					  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						</a>
					  <?php } ?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- <hr class="new5 mb-0"> -->
	<div class="row my-5" style="background-color: #d7bc88;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="my-4 text-center">BERGERAK BERSAMA DALAM MELAYANI</h3>
					<p class="text-center" style="font-size: 22px;">Gereja bukanlah gedungnya, melainkan orangnya. mari bersama kita menemukan sukacita dan damai sejahtera di dalam Tuhan dan Senantiasa menjadi berkat bagi sesama dengan mengambil bagian dalam pelayanan di Gereja kita.</p>
				</div>
				<br>
				<?php foreach ($hightlight->result_array() as $pst) { ?>
					<div class="col-md-4 col-sm-12">
						<article class="blog">
							<figure>
								<a href="<?=base_url().'post/detil/'.$pst['seo_post']?>"><img src="<?=base_url().'assets/thumbnail/medium/'.$pst['thumbnail_post']?>" alt="">
									<div class="preview"><span>Selengkapnya</span></div>
								</a>
							</figure>
							<div class="post_info" style="padding: 3px 3px 3px 5px">
								<h2><a href="<?=base_url().'post/detil/'.$pst['seo_post']?>"><?=$pst['judul_post']?></a></h2>
								<div class="row">
									<div class="col-10">
										<?=cetak_meta($pst['isi_post'],0,80).'....'?>
									</div>
									<div class="col-2">
										jj
									</div>
								</div>
								
							</div>
						</article>
						<!-- /article -->
					</div>
					<!-- /col -->
				<?php } ?>
			</div>
		</div>
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

