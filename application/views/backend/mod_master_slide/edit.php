<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('dashboard/ubah_slide',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama Slide</label>
                <div class="col-10">
                    <input class="form-control" type="hidden" name="id" value="<?=$row['id_slide']?>">
                    <input class="form-control" type="text" name="nama_slide" value="<?=$row['nama_slide']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Judul</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="ket_slide" value="<?=$row['ket_slide']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Sub Judul</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="sub_judul" value="<?=$row['sub_judul']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Link</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="link" value="<?=$row['link']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Aktif</label>
                <div class="col-10">
                    <select class="form-control" name="aktif_slide">
                        <option value="<?=$row['aktif_slide']?>"> <?=$row['aktif_slide']?> </option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                    <small class="text-muted">Format file yang didukung hanya jpg, png, gif. Max size 2Mb</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar saat ini.</label>
                <div class="col-10">
                    <img src="<?=base_url().'assets/uploads/slide/'.$row['gambar_slide']?>" class="img-thumbnail" style="width: 50%">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar Slide</label>
                <div class="col-10">
                    <input class="form-control" type="file" name="gambar_slide">
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'dashboard/slide'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>