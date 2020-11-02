<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('banner/ubah_banner',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama banner</label>
                <div class="col-10">
                    <input class="form-control" type="hidden" name="id" value="<?=$row['id_banner']?>">
                    <input class="form-control" type="text" name="nama_banner" value="<?=$row['nama_banner']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Link</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="link_banner" value="<?=$row['link_banner']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Aktif</label>
                <div class="col-10">
                    <select class="form-control" name="aktif">
                        <option value="<?=$row['aktif']?>"> <?=$row['aktif']?> </option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                    
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar saat ini.</label>
                <div class="col-10">
                    <img src="<?=base_url().'assets/uploads/banner/'.$row['gambar_banner']?>" class="img-thumbnail" style="width: 50%">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar banner</label>
                <div class="col-10">
                    <input class="form-control" type="file" name="gambar_banner">
                    <small class="text-muted">Format file yang didukung hanya jpg, png, gif. Max size 2Mb</small>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'banner'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>