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
            <a href="<?=base_url().'videos/tambah_videos'?>" class="badge badge-primary float-right">Tambah</a>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th style="width: 100px">Kategori</th>
                        <th style="width: 200px">Judul</th>
                        <th>Isi</th>
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
                            <td><?=$row['id_kategori']?></td>
                            <td><a href="<?=base_url().'videos/detil/'.$row['seo_videos']?>" target="_blank"><?=$row['judul_videos']?></a></td>
                            <td><?=cetak_meta($row['isi_videos'],0,200).'....'?></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'videos/ubah_videos/'.$row['id_videos'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" class="badge badge-danger" links="<?=base_url().'videos/hapus_videos/'.$row['id_videos'];?>" id="confirm<?=$no?>" onclick="confirms(this.id)">
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