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
            <a href="<?=base_url().'wiget/tambah_wiget'?>" class="badge badge-primary float-right">Tambah</a>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Nama wiget</th>
                        <th>Aktif</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row) {
                    ?>
                        <tr>
                            <td><center><?=$no?></center></td>
                            <td><?=$row['nama_wiget']?></td>
                            <td>
                                <?php
                                    if ($row['aktif']=='Y') {
                                        echo "<span class='badge badge-info'>Aktif</span>";
                                    }else{
                                        echo "<span class='badge badge-danger'>Non-Aktif</span>";
                                    }
                                ?>
                            </td>
                            <td>
                                <center>
                                    <?php
                                        if ($row['aktif']=='Y') { ?>
                                            <a href="<?=base_url().'wiget/nonaktif_wiget/'.$row['id_wiget'];?>" class="badge badge-warning" title="non-aktifkan wiget" onclick='return confirm("anda akan menonaktifkan sumua post yang menggunakan wiget ini. anda yakin?")'>
                                                <i class="fa fa-times"></i>
                                            </a>
                                    <?php }else{ ?>
                                            <a href="<?=base_url().'wiget/aktif_wiget/'.$row['id_wiget'];?>" class="badge badge-primary" title="aktifkan wiget" onclick='return confirm("anda akan menaktifkan sumua post yang menggunakan wiget ini. anda yakin?")'>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                    <?php } ?>
                                    
                                    <a href="<?=base_url().'wiget/ubah_wiget/'.$row['id_wiget'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" class="badge badge-danger" links="<?=base_url().'wiget/hapus_wiget/'.$row['id_wiget'];?>" id="confirm<?=$no?>" onclick="confirms(this.id)">
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