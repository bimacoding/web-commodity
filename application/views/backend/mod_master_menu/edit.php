<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('menu/ubah_menu',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Induk Menu</label>
                <div class="col-10">
                    <input type="hidden" name="id" value="<?=$row['id_menu']?>">
                    <select class="form-control" name="id_parent">
                        <option class="0">-- Pilih --</option>
                        <?php   
                            foreach ($menus->result_array() as $key) {
                                $pilih = 'selected';
                                if ($row['id_parent']==$key['id_menu']) {
                                    echo "<option value='$key[id_menu]' $pilih>$key[nama_menu]</option>";
                                }else{
                                    echo "<option value='$key[id_menu]'>$key[nama_menu]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama Menu</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nama_menu" value="<?=$row['nama_menu']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Link Menu</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="link" value="<?=$row['link']?>">
                    <small class="text-muted">hanya masukan link nya saja tanpa www.situs.com/</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Icon Menu</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="icon" value="<?=$row['icon']?>">
                    <small class="text-muted">Untuk icon liat di <a href="<?=base_url().'siteman/icon'?>" target="_blank" class="text-primary">dokumentasi</a></small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Posisi</label>
                <div class="col-10">
                    <select class="form-control" name="position">
                        <option value="<?=$row['position']?>"> <?=$row['position']?> </option>
                        <option value="Bottom"> Bottom </option>
                        <option value="Side"> Side </option>
                        <option value="Top"> Top </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Aktif</label>
                <div class="col-10">
                    <select class="form-control" name="aktif">
                        <option value="<?=$row['aktif']?>"> <?=$row['aktif']?> </option>
                        <option value="Ya"> Ya </option>
                        <option value="Tidak"> Tidak </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Level Akses</label>
                <div class="col-10">
                    <select class="form-control" name="level_akses">
                        <?php 
                            $level = $this->db->query("SELECT * FROM t_user_level WHERE option ='backend'")->result_array(); 
                            foreach ($level as $k) {
                                $pilih = 'selected';
                                if ($row['level']==$k['nama_level']) {
                                    echo "<option value='$k[nama_level]' $pilih> $k[nama_level] </option>";
                                }else{
                                    echo "<option value='$k[nama_level]'> $k[nama_level] </option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Urutan Menu</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="urutan" value="<?=$row['urutan']?>">
                </div>
            </div>


            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'menu'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>