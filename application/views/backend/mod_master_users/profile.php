
<div class="col-md-4 col-xs-12">
    <div class="white-box">
        <?php if ($this->session->userdata('nik')==$row['nopeg']) { ?>
            <div class="user-bg"> <img alt="<?=$row['nama']?>" src="<?=base_url().'assets/uploads/users/'.$row['foto']?>" width="100%"> </div>
            <div class="user-btm-box">
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Nama</strong>
                        <p><?=$row['nama']?></p>
                    </div>
                    <div class="col-md-6"><strong>NIK</strong>
                        <p><?=$row['nopeg']?></p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Email</strong>
                        <p><?=$row['email']?></p>
                    </div>
                    <div class="col-md-6"><strong>No.HP</strong>
                        <p><?=$row['nohp']?></p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12"><strong>Alamat</strong>
                        <p><?=$row['alamat']?></p>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
            <div class="user-bg"> <img alt="<?=$row['nama']?>" src="<?=base_url().'assets/uploads/users/'.$row['foto']?>" width="100%"> </div>
            <div class="user-btm-box">
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12"><strong>Nama</strong>
                        <p><?=$row['nama']?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="col-md-8 col-xs-12">
    <div class="white-box">
        <?php if ($this->session->userdata('nik')==$row['nopeg']) { ?>
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('users/ubah_users',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                    <div class="col-9">
                        <input type="hidden" name="id" value="<?=$row['id_users']?>">
                        <input class="form-control" type="number" name="nopeg" value="<?=$row['nopeg']?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Nama users</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" value="<?=$row['nama']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Email</label>
                    <div class="col-9">
                        <input class="form-control" type="email" name="email" value="<?=$row['email']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Password</label>
                    <div class="col-9">
                        <input class="form-control" type="password" name="password" value="<?=$row['nopeg']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">No Hp</label>
                    <div class="col-9">
                        <input class="form-control" type="number" name="nohp" value="<?=$row['nohp']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama" value="<?=$row['alamat']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Foto Saat ini</label>
                    <div class="col-9">
                        <img src="<?=base_url().'assets/uploads/users/'.$row['foto']?>" class="img-thumbnail align-middle" width="100">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Foto</label>
                    <div class="col-9">
                        <input class="form-control" type="file" name="foto">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Level</label>
                    <div class="col-9">
                        <select class="form-control" name="Level">
                            <option value="<?=$row['level']?>"> <?=$row['level']?> </option>
                            <option value="user"> user </option>
                            <option value="admin"> admin </option>
                        </select>
                        <small class="text-muted">default user</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-3 col-form-label">Blokir</label>
                    <div class="col-9">
                        <select class="form-control" name="blokir">
                            <option value="<?=$row['blokir']?>"> <?=$row['blokir']?> </option>
                            <option value="N"> N </option>
                            <option value="Y"> Y </option>
                        </select>
                        <small class="text-muted"> Default No / N</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Update</button>
                <a href="<?=base_url()?>" class="btn btn-inverse waves-effect waves-light">Kembali</a>
            <?php echo form_close(); ?>
        <?php }else{ ?>
            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">NIK</label>
                <div class="col-9">
                    : <?=$row['nopeg']?>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Email</label>
                <div class="col-9">
                    : <?=$row['email']?>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">No Hp</label>
                <div class="col-9">
                    : <?=$row['nohp']?>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Alamat</label>
                <div class="col-9">
                    : <?=$row['alamat']?>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Foto Saat ini</label>
                <div class="col-9">
                    : <img src="<?=base_url().'assets/uploads/users/'.$row['foto']?>" class="img-thumbnail align-middle" width="100">
                </div>
            </div>
        <?php } ?>
    </div>
</div>
                