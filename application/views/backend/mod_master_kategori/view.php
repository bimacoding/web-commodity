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
            <a href="<?=base_url().'kategori/tambah_kategori'?>" class="badge badge-primary float-right">Tambah</a>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Nama kategori</th>
                        <th>Jenis kategori</th>
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
                            <td><a href="<?=base_url().'kategori/view/'.$row['seo_kategori']?>" target="_blank"><?=$row['nama_kategori']?></a></td>
                            <td><?=$row['jenis']?></td>
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
                                            <a href="<?=base_url().'kategori/nonaktif_kategori/'.$row['id_kategori'];?>" class="badge badge-warning" title="non-aktifkan kategori" onclick='return confirm("anda akan menonaktifkan sumua post yang menggunakan kategori ini. anda yakin?")'>
                                                <i class="fa fa-times"></i>
                                            </a>
                                    <?php }else{ ?>
                                            <a href="<?=base_url().'kategori/aktif_kategori/'.$row['id_kategori'];?>" class="badge badge-primary" title="aktifkan kategori" onclick='return confirm("anda akan menaktifkan sumua post yang menggunakan kategori ini. anda yakin?")'>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                    <?php } ?>
                                    
                                    <a href="<?=base_url().'kategori/ubah_kategori/'.$row['id_kategori'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" class="badge badge-danger" links="<?=base_url().'kategori/hapus_kategori/'.$row['id_kategori'];?>" id="confirm<?=$no?>" onclick="confirms(this.id)">
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