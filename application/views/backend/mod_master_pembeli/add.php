<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('pembeli/tambah_pembeli',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">NIK</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="nik">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama pembeli</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nama">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="email" name="email">
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
</div>