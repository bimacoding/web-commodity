<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('website_manager/tambah_video',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Link</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="link_video">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar</label>
                <div class="col-10">
                    <input class="form-control" type="file" name="gambar_video">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Posisi</label>
                <div class="col-10">
                    <select class="form-control" name="posisi">
                        <option value="">-- Pilih --</option>
                        <option value="atas"> <?=ucwords('atas');?> </option>
                        <option value="kiri"> <?=ucwords('kiri');?> </option>
                        <option value="kanan"> <?=ucwords('kanan');?> </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Aktif</label>
                <div class="col-10">
                    <select class="form-control" name="aktif">
                        <option value="Y">-- Pilih --</option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'website_manager'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>