<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('page/ubah_page',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <input type="hidden" name="id" value="<?=$row['id_page']?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Judul Post</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="judul_page" value="<?=$row['judul_page']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Isi Post</label>
                <div class="col-10">
                    <textarea class="summernote" name="isi_page"><?=$row['isi_page']?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar Saat ini</label>
                <div class="col-10">
                    <img src="<?=base_url().'assets/uploads/images/'.$row['thumbnail_page']?>" width="100">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar</label>
                <div class="col-10">
                    <input type="file" class="form-control" name="thumbnail_page">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Publish</label>
                <div class="col-10">
                    <select class="form-control" name="aktif">
                        <option value="<?=$row['aktif']?>"> <?=$row['aktif']?> </option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'page'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>