<div class="col-sm-12">
    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }else if($this->session->flashdata('error')){  ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?>
            <a href="<?=base_url().'users/tambah_users'?>" class="badge badge-primary float-right">Tambah</a>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Foto</th>
                        <th>No. Induk</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Level</th>
                        <th style="width: 50px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row) {
                    ?>
                        <tr>
                            <td><center><?=$no?></center></td>
                            <td><img src="<?=base_url().'assets/uploads/users/'.$row['foto']?>" class="img-circle img-responsive" width="50"></td>
                            <td><?=$row['nopeg']?></td>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['nohp']?></td>
                            <td><?=$row['level']?></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'users/ubah_users/'.$row['id_users'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" class="badge badge-danger" links="<?=base_url().'users/hapus_users/'.$row['id_users'];?>" id="confirm<?=$no?>" onclick="confirms(this.id)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php
                        $no++;    # code...
                        }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>