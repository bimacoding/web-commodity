<style type="text/css">
	.ui-group-buttons .or{position:relative;float:left;width:.3em;height:1.3em;z-index:3;font-size:12px}
	.ui-group-buttons .or:before{position:absolute;top:50%;left:50%;content:'or';background-color:#5a5a5a;margin-top:-.1em;margin-left:-.9em;width:1.8em;height:1.8em;line-height:1.55;color:#fff;font-style:normal;font-weight:400;text-align:center;border-radius:500px;-webkit-box-shadow:0 0 0 1px rgba(0,0,0,0.1);box-shadow:0 0 0 1px rgba(0,0,0,0.1);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
	.ui-group-buttons .or:after{position:absolute;top:0;left:0;content:' ';width:.3em;height:2.84em;background-color:rgba(0,0,0,0);border-top:.6em solid #5a5a5a;border-bottom:.6em solid #5a5a5a}
	.ui-group-buttons .or.or-lg{height:1.3em;font-size:16px}
	.ui-group-buttons .or.or-lg:after{height:2.85em}
	.ui-group-buttons .or.or-sm{height:1em}
	.ui-group-buttons .or.or-sm:after{height:2.5em}
	.ui-group-buttons .or.or-xs{height:.25em}
	.ui-group-buttons .or.or-xs:after{height:1.84em;z-index:-1000}
	.ui-group-buttons{display:inline-block;vertical-align:middle}
	.ui-group-buttons:after{content:".";display:block;height:0;clear:both;visibility:hidden}
	.ui-group-buttons .btn{float:left;border-radius:0}
	.ui-group-buttons .btn:first-child{margin-left:0;border-top-left-radius:.25em;border-bottom-left-radius:.25em;padding-right:15px}
	.ui-group-buttons .btn:last-child{border-top-right-radius:.25em;border-bottom-right-radius:.25em;padding-left:15px}
</style>
<div class="container margin_30">
	<div class="row">

		<div class="col-md-6 mb-5 border-right">
			<?php if($this->session->flashdata('successAuth')){ ?>
		        <div class="alert alert-success" role="alert">
		            <?php echo $this->session->flashdata('success'); ?>
		        </div>
		    <?php }else if($this->session->flashdata('errorAuth')){  ?>
		        <div class="alert alert-danger" role="alert">
		            <?php echo $this->session->flashdata('error'); ?>
		        </div>
		    <?php } ?>
			<div class="alert alert-dark text-dark" role="alert">
			  Silahkan Login jika sudah memiliki akun.
			</div>
			<hr>
			<p> <span class="text-dark" style="font-weight: 600">Penting!!</span> Sebelum login pastikan email yang anda daftarkan sudah dikonfirmasi.</p>
			<?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open('auth',$attributes); ?>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="email" name="email" placeholder="emailanda@gmail.com" value="<?=$this->session->userdata('level');?>">
                    <small class="text-muted">Masukan email valid anda</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                    <input class="form-control" type="password" name="password">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Sebagai</label>
                <div class="col-10">
                    <div class="form-check pl-4">
                      <input class="form-check-input" type="radio" name="akses" id="akses" value="penjual" />
                      <label class="mr-5" for="akses">
                        Penjual
                      </label>
                      <input class="form-check-input" type="radio" name="akses" id="akses" value="pembeli" />
                      <label class="mr-5" for="akses">
                        Pembeli
                      </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label"></label>
                <div class="col-10">
                    <input type='number' value='<?=rand(1,20);?>' name='angka1' autocomplete=off readonly style="width: 50px;"> + 
					<input type='number' value='<?=rand(1,20);?>' name='angka2' autocomplete=off  readonly style="width: 50px;"> = 
					<input type='number' name='c' placeholder='Jawaban' autocomplete=off required style="width: 100px;">
					<br>
					<small class="text-muted">Masukan jawaban dengan benar dari hasil penjumlahan diatas.</small>
                </div>
            </div>

            

             <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Masuk</button>

            <?php 	echo form_close(); ?>

		</div>

		<div class="col-md-6">
			<div class="alert alert-success" role="alert">
			  Form pendaftaran <strong><?= $this->input->get('page'); ?></strong>
			</div>
			<?php if($this->session->flashdata('success')){ ?>
		        <div class="alert alert-success" role="alert">
		            <?php echo $this->session->flashdata('success'); ?>
		        </div>
		    <?php }else if($this->session->flashdata('error')){  ?>
		        <div class="alert alert-danger" role="alert">
		            <?php echo $this->session->flashdata('error'); ?>
		        </div>
		    <?php } ?>
			<hr>
			<center>
				<div class="ui-group-buttons">
	                <a href="<?=base_url('auth?page=penjual')?>" class="btn btn-warning btn-sm text-uppercase">Penjual</a>
	                <div class="or or-sm"></div>
	                <a href="<?=base_url('auth?page=pembeli')?>" class="btn btn-success btn-sm text-uppercase">Pembeli</a>
	            </div>
			</center>
			<br>
			<?php $links = 'auth/'.$this->input->get('page'); $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart($links,$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">NIK <sup class="text-danger">*</sup></label>
                <div class="col-9">
                    <input class="form-control" type="text" name="nik" required minlength="16" maxlength="23">
                    <small class="text-muted">Masukan NIK sesuai KTP anda.</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Nama <sup class="text-danger">*</sup></label>
                <div class="col-9">
                    <input class="form-control" type="text" name="nama" required>
                    <small class="text-muted">Wajib Masukan Nama jelas anda sesuai KTP atau KTA anda.</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Email <sup class="text-danger">*</sup></label>
                <div class="col-9">
                    <input class="form-control" type="email" name="email" required>
                    <small class="text-muted">Masukan email valid anda</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Password <sup class="text-danger">*</sup></label>
                <div class="col-9">
                    <input class="form-control" type="password" name="password" required>
                </div>
            </div>

            <?php if ($this->input->get('page')=='penjual') { ?>
                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Foto KTA <sup class="text-danger">*</sup></label>
                    <div class="col-9">
                        <input class="form-control" type="file" name="kta" required>
                        <small class="text-danger"><strong>Penting!!</strong> Upload foto bukti anda adalah pekerja, pemilik, atau pengurus suatu anggota, asosiasi dan perusahaan.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Foto Organisasi <sup class="text-danger">*</sup></label>
                    <div class="col-9">
                        <input class="form-control" type="file" name="organisasi" required>
                        <small class="text-danger"><strong>Penting!!</strong> Upload foto bukti anda bersal dari perusahaan, asosiasi atau dari suatu perusahaan.</small>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Foto KTA <sup class="text-danger">*</sup></label>
                    <div class="col-9">
                        <input class="form-control" type="file" name="kta" required>
                        <small class="text-danger"><strong>Penting!!</strong> Upload foto bukti anda adalah pekerja, pemilik, atau pengurus suatu anggota, asosiasi dan perusahaan.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Foto NIB <sup class="text-danger">*</sup></label>
                    <div class="col-9">
                        <input class="form-control" type="file" name="nib" required>
                        <small class="text-danger"><strong>Penting!!</strong> Upload foto bukti Nomor Induk Berusaha segabagai bukti anda adalah pelaku usaha dalam rangka pelaksanaan kegiatan berusaha sesuai dengan bidang usahanya.</small>
                    </div>
                </div>

                <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Warganegara</label>
                <div class="col-9">
                    <div class="form-check pl-4">
                      <input class="form-check-input" type="radio" name="warganegara" id="warganegara" value="WNI" required />
                      <label class="mr-5" for="warganegara">
                        WNI
                      </label>
                      <input class="form-check-input" type="radio" name="warganegara" id="warganegara" value="WNA" required />
                      <label class="mr-5" for="warganegara">
                        WNA
                      </label>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">No Hp <sup class="text-danger">*</sup></label>
                <div class="col-9">
                    <input class="form-control" type="number" name="nohp" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Foto <sup class="text-danger">*</sup></label>
                <div class="col-9">
                    <input class="form-control" type="file" name="foto" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Alamat <sup class="text-danger">*</sup></label>
                <div class="col-9">
                    <textarea class="form-control" name="alamat" required placeholder="alamat perusahaan, organisasi, atau asosiasi anda"></textarea>
                </div>
            </div>

            <div class="alert alert-danger" role="alert">
	          Dengan mengeklik tombol Mendaftar, Berarti Anda telah menyetujui <a href="<?=base_url('hal/syarat-dan-ketentuan')?>" target="_blank" >syarat dan Ketentuan</a> kami dan bahwa Anda telah membaca <a href="<?=base_url('hal/kebijakan-privasi')?>" target="_blank" >Kebijakan</a> Data kami, termasuk Penggunaan Kuki... 
	        </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Daftar</button>
        <?php echo form_close(); ?>
	        
		</div>

		

	</div>
</div>