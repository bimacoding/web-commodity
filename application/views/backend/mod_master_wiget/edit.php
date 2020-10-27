<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('wiget/ubah_wiget',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama wiget</label>
                <div class="col-10">
                    <input type="hidden" name="id" value="<?=$row['id_wiget']?>">
                    <input class="form-control" type="text" name="nama_wiget" value="<?=$row['nama_wiget']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Isi wiget</label>
                <div class="col-10">
                    <textarea class="form-control" name="isi_wiget"><?= html_entity_decode(html_entity_decode($row['isi_wiget'])) ?></textarea>
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

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'wiget'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>