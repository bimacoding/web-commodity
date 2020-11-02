<div class="container">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="row row-in">
                <div class="col-lg-4 col-sm-6 row-in-br">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                            <h5 class="text-muted vb">CUSTOMER</h5> </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-danger"><?=$customer->num_rows()?></h3> </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$customer->num_rows()?>" aria-valuemin="0" aria-valuemax="100000" style="width: <?=$customer->num_rows()?>%"> <span class="sr-only"><?=$customer->num_rows()?> Pembeli</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 row-in-br  b-r-none">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                            <h5 class="text-muted vb">PENJUAL</h5> </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-megna"><?=$penjual->num_rows()?></h3> </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="<?=$penjual->num_rows()?>" aria-valuemin="0" aria-valuemax="100000" style="width: <?=$penjual->num_rows()?>%"> <span class="sr-only"><?=$penjual->num_rows()?> Penjual aktif</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 b-0">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                            <h5 class="text-muted vb">PRODUCT</h5> </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-primary"><?=$product->num_rows()?></h3> </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$product->num_rows()?>" aria-valuemin="0" aria-valuemax="100000" style="width: <?=$product->num_rows()?>%"> <span class="sr-only"><?=$product->num_rows()?> product publish</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Last Activity</h3>
            <div class="table-responsive">
                <table id="myTabless" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>
                            <th>Users</th>
                            <th>Kegiatan</th>
                            <th>Data</th>
                            <th>IP</th>
                            <th>Browser</th>
                        </tr>
                    </thead>
                </table>
                <script type="text/javascript">
                  $(function() {
                    $('#myTabless').DataTable( {
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                          "url":"<?=base_url().'ajax/gethistory'?>",
                          "type": "POST",
                          "data": {csrf_test_name: $.cookie('csrf_cookie_name')},
                          "dataType": 'json'
                        }
                    } );
                  }); // End Document Ready Function
                </script>
            </div>
        </div>
    </div>
</div>





    