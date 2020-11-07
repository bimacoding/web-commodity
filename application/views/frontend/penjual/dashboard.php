<div class="container margin_30">
    <div class="row">

        <div class="col-md-3">
            <div class="card user-card">
                <!-- <div class="card-header">
                    <h5>Profile</h5>
                </div> -->
                <div class="card-block">
                    <div class="user-image" style="text-align:center;">
                        <img src="<?=base_url().'assets/uploads/penjual/'.$this->session->userdata('foto');?>" alt="User-Profile-Image" class="rounded-circle img-thumbnail" width="150">
                    </div>
                    <h6 class="my-2 text-center"><?=$this->session->userdata('nama');?></h6>
                    <p class="text-success text-center"><span class="badge badge-success"><i class="fas fa-check"></i></span> Verified</p>
                    <p class="text-muted text-center"><?=$this->mylibrary->greeting();?></p>
                    <hr>
                    <div class="col-md-12">
                        <a href="<?=base_url('penjual/editaccount/'.$this->session->userdata('kode'))?>" class="btn btn-primary btn-sm btn-block"><i class="fas fa-edit"></i> Edit profile</a>
                        <a href="<?=base_url('penjual/product/'.$this->session->userdata('kode'))?>" class="btn btn-primary btn-sm btn-block"><i class="far fa-shopping-cart"></i> Produk anda</a>
                        <a href="" class="btn btn-default btn-sm btn-block text-muted text-left px-0" style="border-bottom:  dotted 1px #333;border-radius: 0"></a>
                        <a href="" class="btn btn-default btn-sm btn-block text-muted text-left px-0" style="border-bottom:  dotted 1px #333;border-radius: 0">Login terakhir</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            
        </div>
    </div>
</div>