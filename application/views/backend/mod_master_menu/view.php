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
            <a href="<?=base_url().'menu/tambah_menu'?>" class="badge badge-primary float-right">Tambah</a>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Induk Menu</th>
                        <th>Nama Menu</th>
                        <th>Link Menu</th>
                        <th>Icon Menu</th>
                        <th>Akses</th>
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
                            <td><?=get_name($row['id_parent'])?></td>
                            <td><?=$row['nama_menu']?></td>
                            <td><?=$row['link']?></td>
                            <td><?="<i class='linea-icon linea-basic fa-fw' data-icon='".$row['icon']."'></i>";?></td>
                            <td><?=$row['level_akses']?></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'menu/ubah_menu/'.$row['id_menu'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" class="badge badge-danger" links="<?=base_url().'menu/hapus_menu/'.$row['id_menu'];?>" id="confirm<?=$no?>" onclick="confirms(this.id)">
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