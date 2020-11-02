<div class="container margin_30">
	<div class="page_header">
		<div class="breadcrumbs">
			<ul>
				<li><a href="<?=base_url()?>">Home</a></li>
				<li><a href="<?=base_url().'artikel/index'?>">Post</a></li>
				<li>
					<?php 
						$tl = $this->uri->segment(3);
						if ($tl=='') {
							echo ucwords(title_post($this->uri->segment(4)));
						}else{
							echo html_entity_decode(htmlspecialchars_decode(ucwords(title_post($tl)))) ;
						}
					?>
				</li>
			</ul>
		</div>
	</div>
	<!-- /page_header -->
	<div class="row">
		<div class="col-lg-9">
			<div class="singlepost">
				<figure><img alt="" class="img-fluid" src="<?=base_url().'assets/thumbnail/medium/'.$row['thumbnail_post']?>" width="100%"></figure>
				<h1><?=html_entity_decode(htmlspecialchars_decode(ucwords($row['judul_post'])))?></h1>
				<div class="postmeta">
					<ul>
						<li><a href="#"><i class="ti-folder"></i> <?=ucwords($row['nama_kategori'])?></a></li>
						<li><i class="ti-calendar"></i> <?=$this->mylibrary->tgl_indo($row['created_on'])?></li>
						<li><a href="#"><i class="ti-user"></i> <?=$row['created_by']?></a></li>
						<!-- <li><a href="#"><i class="ti-comment"></i> (14) Comments</a></li> -->
					</ul>
				</div>
				<!-- /post meta -->
				<div class="post-content">
					<?=html_entity_decode($row['isi_post'])?>
				</div>
				<!-- /post -->
			</div>
			<!-- /single-post -->

			<!-- <div id="comments">
				<h5>Comments</h5>
				<ul>
					<li>
						<div class="avatar">
							<a href="#"><img src="img/avatar1.jpg" alt="">
							</a>
						</div>
						<div class="comment_right clearfix">
							<div class="comment_info">
								By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
							</div>
							<p>
								Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
							</p>
						</div>
						<ul class="replied-to">
							<li>
								<div class="avatar">
									<a href="#"><img src="img/avatar2.jpg" alt="">
									</a>
								</div>
								<div class="comment_right clearfix">
									<div class="comment_info">
										By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
									</div>
									<p>
										Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
									</p>
									<p>
										Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
									</p>
								</div>
								<ul class="replied-to">
									<li>
										<div class="avatar">
											<a href="#"><img src="img/avatar2.jpg" alt="">
											</a>
										</div>
										<div class="comment_right clearfix">
											<div class="comment_info">
												By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
											</div>
											<p>
												Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
											</p>
											<p>
												Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
											</p>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<div class="avatar">
							<a href="#"><img src="img/avatar3.jpg" alt="">
							</a>
						</div>

						<div class="comment_right clearfix">
							<div class="comment_info">
								By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
							</div>
							<p>
								Cursus tellus quis magna porta adipiscin
							</p>
						</div>
					</li>
				</ul>
			</div>
 -->
			<!-- <hr>

			<h5>Leave a comment</h5>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<input type="text" name="name" id="name2" class="form-control" placeholder="Name">
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<input type="text" name="email" id="email2" class="form-control" placeholder="Email">
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="form-group">
						<input type="text" name="email" id="website3" class="form-control" placeholder="Website">
					</div>
				</div>
			</div>
			<div class="form-group">
				<textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Comment"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
			</div> -->
			
		</div>
		<!-- /col -->

		<aside class="col-lg-3">
			<?php include 'sidebar.php'; ?>
		</aside>
		<!-- /aside -->
	</div>
	<!-- /row -->
</div>