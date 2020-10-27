<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('videos/tambah_videos',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Judul video</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="judul_videos">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Isi video</label>
                <div class="col-10">
                    <textarea id="mymce" name="isi_videos"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-10">
                    <select class="form-control" name="id_kategori">
                        <option class="-">-- Pilih --</option>
                        <?php   
                            foreach ($kategori as $key) {
                                echo "<option value='$key[id_kategori]'>$key[nama_kategori]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Link</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="link_videos">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Publish</label>
                <div class="col-10">
                    <select class="form-control" name="publish">
                        <option value="Y">-- Pilih --</option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'videos'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>