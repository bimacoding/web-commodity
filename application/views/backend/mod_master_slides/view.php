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
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Nama slide</th>
                        <th>Gambar</th>
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
                            <td><?=$row['nama_slide']?></td>
                            <td><button type="button" class="badge badge-success" data-toggle="modal" data-target="#exampleModalLong<?=$no?>">lihat</button></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'siteman/ubah_slide/'.$row['id_slide'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong<?=$no?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><?=$row['nama_slide']?>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </h5>
                                
                              </div>
                              <div class="modal-body">
                                <img src="<?=base_url().'assets/uploads/slide/'.$row['gambar_slide']?>" class="rounded mx-auto d-block img-thumbnail" alt="<?=$row['nama_slide']?>" style="width: 50%">
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php
                        $no++;    # code...
                        }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>