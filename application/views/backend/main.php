
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





    