<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('post/ubah_post',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <input type="hidden" name="id" value="<?=$row['id_post']?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Judul Post</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="judul_post" value="<?=$row['judul_post']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Isi Post</label>
                <div class="col-10">
                    <textarea class="summernote" name="isi_post"><?=$row['isi_post']?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-10">
                    <select class="form-control" name="id_kategori">
                        <option class="-">-- Pilih --</option>
                        <?php   
                            foreach ($kategori as $key) {
                                $pilih = 'selected';
                                if ($row['id_kategori']==$key['id_kategori']) {
                                    echo "<option value='$key[id_kategori]' $pilih>$key[nama_kategori]</option>";
                                }else{
                                    echo "<option value='$key[id_kategori]'>$key[nama_kategori]</option>";
                                }
                                
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar Saat ini</label>
                <div class="col-10">
                    <img src="<?=base_url().'assets/uploads/images/'.$row['thumbnail_post']?>" width="100">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Gambar</label>
                <div class="col-10">
                    <input type="file" class="form-control" name="thumbnail_post">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Publish</label>
                <div class="col-10">
                    <select class="form-control" name="publish">
                        <option value="<?=$row['publish']?>"> <?=$row['publish']?> </option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'post'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>