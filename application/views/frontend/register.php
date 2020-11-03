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
<div class="container margin_30 bg-light">
	<div class="row">

		<div class="col-md-9">
			<div class="alert alert-success" role="alert">
			  <?=$title?>
			</div>
			<hr>
			<center>
				<div class="ui-group-buttons">
	                <a href="<?=base_url('daftar/penjual')?>" class="btn btn-warning btn-sm text-uppercase">Daftar menjadi penjual</a>
	                <div class="or or-sm"></div>
	                <a href="<?=base_url('daftar/pembeli')?>" class="btn btn-success btn-sm text-uppercase">Daftar menjadi pembeli</a>
	            </div>
			</center>
			<br>
			<?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('pembeli/tambah_pembeli',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">NIK</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="nik">
                    <small class="text-muted">Masukan NIK sesuai KTP anda.</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nama">
                    <small class="text-muted">Masukan Nama jelas anda.</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="email" name="email">
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
                <label for="example-text-input" class="col-2 col-form-label">No Hp</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="nohp">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Alamat</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="alamat">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Foto</label>
                <div class="col-10">
                    <input class="form-control" type="file" name="foto">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Level</label>
                <div class="col-10">
                    <select class="form-control" name="level">
                        <option value="user">-- Pilih --</option>
                        <option value="penjual"> penjual </option>
                        <option value="pembeli"> pembeli </option>
                        <option value="admin"> admin </option>
                    </select>
                    <small class="text-muted">default user</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Blokir</label>
                <div class="col-10">
                    <select class="form-control" name="blokir">
                        <option value="N">-- Pilih --</option>
                        <option value="N"> N </option>
                        <option value="Y"> Y </option>
                    </select>
                    <small class="text-muted"> Default No / N</small>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'pembeli'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
		</div>

		<div class="col-md-3">
			
		</div>

	</div>
</div>