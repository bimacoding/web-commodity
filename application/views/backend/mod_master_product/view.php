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
            <a href="<?=base_url('product/tambah_product')?>" class="badge badge-warning float-right">Tambah</a>
        </h3>
        <div class="table-responsive">
            <table id="myTable_data" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Asal Daerah</th>
                        <th style="width: 200px;text-align: center;">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    function isObject(obj)
    {
        return obj != null && obj.constructor.name === "Object"
    }
    $(function() {
    var url = '<?php echo base_url()?>ajax/getProduct';
        var t = $('#myTable_data').DataTable({
            "processing": true,
            "serverSide": true,
            "paging" : true,
            "searching" : true,
            "ajax": {
                "url": url,
                "type":"POST",
                "dataType" : "JSON"
            },
            "columns": [
                {
                    "data": "id_product",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "nama_product",width:'auto'},
                {"data": "kat_product",width:'auto'},
                {"data": "harga_product",width:'auto'},
                {"data": "asal_product",width:'auto'},
                { "data": null, 
                    "render": function(data)
                    {
                        console.log(data);
                        var html ='<center>';
                            html += '<a href="'+$(location).attr('href')+'/ubah_product/'+data.id_product+'" class="badge badge-success text-sm-center mr-1">Edit</a>';
                            // html += '<a href="'+$(location).attr('href')+'/edit/'+data._id+'" class="badge badge-info text-sm-center mr-1">Edit</a>';
                            html += '<a href="'+$(location).attr('href')+'/hapus_product/'+data.id_product+'" class="badge badge-danger text-sm-center" onclick="return confirm(\"Apa anda yakin untuk hapus Data ini?\")">Delete</a>';
                            html += '</center>';
                        return html;
                    }
                }
            ]
        }) 
    });
</script>