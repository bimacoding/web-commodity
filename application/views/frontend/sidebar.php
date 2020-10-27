<div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
	<div class="form-group">
		<input type="text" name="search" id="search_blog" class="form-control" placeholder="Search..">
		<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
	</div>
</div>
<!-- /widget -->
<div class="widget">
	<div class="widget-title">
		<h4>Latest Post</h4>
	</div>
	<ul class="comments-list">
		<?php $post_side = $this->model_utama->view_join_one_not('t_post','t_kategori','id_kategori','t_kategori.nama_kategori',array('hightlight','Remaja','Anak Anak','Orang Tua'),'id_post','DESC',0,5);
			foreach ($post_side->result_array() as $psd) {
		?>
		<li>
			<div class="alignleft">
				<a href="<?=base_url().'post/detil/'.$psd['seo_post']?>"><img src="<?=base_url().'assets/thumbnail/small/'.$psd['thumbnail_post']?>" alt=""></a>
			</div>
			<small><span class="btn btn-success btn-sm"><?=$psd['nama_kategori']?></span> - <?=$this->mylibrary->tgl_indo($psd['created_on'])?></small>
			<h3><a href="<?=base_url().'post/detil/'.$psd['seo_post']?>" title=""><?=htmlspecialchars_decode(html_entity_decode(cetak_meta($psd['isi_post'],0,100))) .'....'?></a></h3>
		</li>
		<?php } ?>
	</ul>
</div>
<!-- /widget -->
<div class="widget">
	<div class="widget-title">
		<h4>Categories</h4>
	</div>
	<ul class="cats">
		<?php 
			$sql = "SELECT a.seo_kategori,a.nama_kategori,COUNT(b.id_kategori) AS jml 
					FROM t_kategori a LEFT JOIN t_post b ON a.id_kategori=b.id_kategori
					WHERE a.aktif = 'Y' AND b.publish = 'Y' AND a.jenis = 'artikel' AND a.seo_kategori != 'hightlight ' GROUP BY a.seo_kategori 
					ORDER BY b.id_kategori DESC";
			$kt = $this->db->query($sql); 
			foreach ($kt->result_array() as $k) {
				echo "<li><a href='".base_url()."kategori/list/$k[seo_kategori]'>$k[nama_kategori]<span>($k[jml])</span></a></li>";
			}
		?>
	</ul>
</div>
<!-- /widget -->
<!-- <div class="widget">
	<div class="widget-title">
		<h4>Popular Tags</h4>
	</div>
	<div class="tags">
		<a href="#">Food</a>
		<a href="#">Bars</a>
		<a href="#">Cooktails</a>
		<a href="#">Shops</a>
		<a href="#">Best Offers</a>
		<a href="#">Transports</a>
		<a href="#">Restaurants</a>
	</div>
</div> -->
<!-- /widget -->