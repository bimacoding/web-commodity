<div class="container margin_30">
	<!-- <div class="page_header">
		<div class="breadcrumbs">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Category</a></li>
				<li>Page active</li>
			</ul>
		</div>
		<h1>Allaia Blog &amp; News</h1>
	</div> -->
	<!-- /page_header -->
	<div class="row">
		<div class="col-lg-9">
			<div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
				<div class="form-group">
					<input type="text" name="search" id="search" class="form-control" placeholder="Search..">
					<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
				</div>
			</div>
			<!-- /widget -->
			<div class="row">

				<?php foreach ($post->result_array() as $pst) { ?>
					
					<div class="col-md-6">
						<article class="blog">
							<figure>
								<a href="<?=base_url().'artikel/detil/'.$pst['seo_post']?>"><img src="<?=base_url().'assets/thumbnail/medium/'.$pst['thumbnail_post']?>" alt="">
									<div class="preview"><span>Selengkapnya</span></div>
								</a>
							</figure>
							<div class="post_info">
								<small><?=$pst['nama_kategori']?> - <?=$this->mylibrary->tgl_indo($pst['created_on'])?></small>
								<h2><a href="<?=base_url().'artikel/detil/'.$pst['seo_post']?>"><?=html_entity_decode(htmlspecialchars_decode(str_replace(['&lpar;','&rpar;','&comma;'], ['[',']',','], $pst['judul_post'])))?></a></h2>
								<?=cetak_meta($pst['isi_post'],0,200).'....'?>
								<!-- <ul>
									<li>
										<div class="thumb"><img src="img/avatar.jpg" alt=""></div> <?=$pst['created_by']?>
									</li>
									<li><i class="ti-comment"></i>20</li>
								</ul> -->
							</div>
						</article>
						<!-- /article -->
					</div>
					<!-- /col -->

				<?php } ?>

			</div>
			<!-- /row -->

			<div class="pagination__wrapper no_border add_bottom_30">
				<!-- <ul class="pagination">
					<li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
					<li>
						<a href="#0" class="active">1</a>
					</li>
					<li>
						<a href="#0">2</a>
					</li>
					<li>
						<a href="#0">3</a>
					</li>
					<li>
						<a href="#0">4</a>
					</li>
					<li><a href="#0" class="next" title="next page">&#10095;</a></li>
				</ul> -->
				<?php echo $this->pagination->create_links(); ?>
			</div>
			<!-- /pagination -->

		</div>
		<!-- /col -->

		<aside class="col-lg-3">
			<?php include 'sidebar.php'; ?>
		</aside>
		<!-- /aside -->
	</div>
	<!-- /row -->
</div>