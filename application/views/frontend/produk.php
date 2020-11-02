<div class="top_banner">
	<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)" style="background-color: rgba(0, 0, 0, 0.3);">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="<?=base_url();?>">Branda</a></li>
					<li><a href="#">Semua Produk</a></li>
				</ul>
			</div>
			<h1><?=$title;?></h1>
		</div>
	</div>
	<img src="<?=base_url().'assets/images/commodity-bg.jpg'?>" class="img-fluid" alt="">
</div>
<!-- /top_banner -->

	<div id="stick_here" style="height: 0px;"></div>		
	
	<!-- <div class="toolbox elemento_stick">
		<div class="container">
		<ul class="clearfix">
			<li>
				<div class="sort_select">
					<select name="sort" id="sort">
                            <option value="popularity" selected="selected">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to 
					</option></select>
				</div>
			</li>
			<li>
				<a href="#0"><i class="ti-view-grid"></i></a>
				<a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
			</li>
			<li>
				<a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters" class="collapsed">
					<i class="ti-filter"></i><span>Filters</span>
				</a>
			</li>
		</ul>
		<div class="collapse" id="filters" style=""><div class="row small-gutters filters_listing_1">
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="dropdown">
				<a href="#" data-toggle="dropdown" class="drop">Categories</a>
				<div class="dropdown-menu">
					<div class="filter_type">
							<ul>
								<li>
									<label class="container_check">Men <small>12</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Women <small>24</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Running <small>23</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Training <small>11</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<a href="#0" class="apply_filter">Apply</a>
						</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="dropdown">
				<a href="#" data-toggle="dropdown" class="drop">Color</a>
				<div class="dropdown-menu">
					<div class="filter_type">
							<ul>
								<li>
									<label class="container_check">Blue <small>06</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Red <small>12</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Orange <small>17</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Black <small>43</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<a href="#0" class="apply_filter">Apply</a>
						</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="dropdown">
				<a href="#" data-toggle="dropdown" class="drop">Brand</a>
				<div class="dropdown-menu">
					<div class="filter_type">
							<ul>
								<li>
									<label class="container_check">Adidas <small>11</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Nike <small>08</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Vans <small>05</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Puma <small>18</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<a href="#0" class="apply_filter">Apply</a>
						</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="dropdown">
				<a href="#" data-toggle="dropdown" class="drop">Price</a>
				<div class="dropdown-menu">
					<div class="filter_type">
							<ul>
								<li>
									<label class="container_check">$0 — $50<small>11</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">$50 — $100<small>08</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">$100 — $150<small>05</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">$150 — $200<small>18</small>
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<a href="#0" class="apply_filter">Apply</a>
						</div>
				</div>
			</div>
	
		</div></div></div>
		</div>
	</div> -->

	<!-- /toolbox -->

	<div class="container margin_30">
	<div class="row small-gutters">

		<?php 
			foreach ($produk->result_array() as $key => $val_product) { 
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
					<a href="<?=base_url().'produk/detil/'.$val_product['seo_product']?>">
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
		<!-- /col -->				
	</div>
	<!-- /row -->
		
	<div class="pagination__wrapper">
		<?php echo $this->pagination->create_links(); ?>
	</div>
		
</div>
<!-- /container -->