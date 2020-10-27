<style type="text/css">
    .ajax-file-upload{
        cursor:pointer;
        width: 100%;
        height: 30px;
        text-align: center;
        top: 2px;
        font-size: 10px;
        line-height: 23px;
    }

    .ajax-file-upload-green
    {
        background-color: #188601;
        display: inline-block;
        color: #fff;
        font-size: 12px;
        padding: 1px 12px;
        cursor: pointer;
        margin-right: 5px;
        float: right;
    }

    .ajax-upload-dragdrop > span
    {
        display: none;
    }

    .ajax-file-upload-statusbar{
        display: inline;
    }

    .ajax-upload-dragdrop{
        padding: 0px 4px 0px 4px;
        width: 100%
    }
    .ajax-upload-dragdrop span:first-of-type{
        float: right; margin-top: 5px;
    }
    .ajax-file-upload-preview{
        display: inline;
        float: left;
    }
    .form-sm .ajax-file-upload
    {
        width: 100%;
    }
</style>
<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('warta/ubah_warta',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <input type="hidden" name="id" value="<?=$row['id_warta']?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Judul warta</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="judul_warta" value="<?=$row['judul_warta']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-10">
                    <select class="form-control" name="id_kategori">
                        <option class="-">-- Pilih --</option>
                        <?php   
                            foreach ($kategori as $key) {
                                $pilih = 'selected';
                                if ($row['id_kategori']==$key['id_kategori']) {
                                    echo "<option value='$key[id_kategori]' $pilih>$key[nama_kategori]</option>";
                                }else{
                                    echo "<option value='$key[id_kategori]'>$key[nama_kategori]</option>";
                                }
                                
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Tanggal Warta</label>
                <div class="col-10">
                    <input type="date" class="form-control" name="tgl_warta" value="<?=$row['tgl_warta']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">File Warta</label>
                <div class="col-sm-10">
                    <div id='mulitplefileuploader'>Pilih files</div>
                    <div id='status'></div>
                    <small class="text-muted">Max (5 MB), Allowed File : pdf,xls,doc,ppt</small>
                </div>
                <span id="idkalibrasi"></span>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">aktif</label>
                <div class="col-10">
                    <select class="form-control" name="aktif">
                        <option value="<?=$row['aktif']?>"> <?=$row['aktif']?> </option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'warta'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $("#mulitplefileuploader").uploadFile({
            url: "<?=base_url()?>warta/upload_file/",
            dragDrop: true,
            maxFileCount:1,
            multiple: false,
            fileName: "upload_kalibrasi",
            maxFileSize:5500*1024,
            allowedTypes:"pdf,doc,docx,xls,xlsx,ppt,pptx",     
            returnType:"json",
            dragdropWidth:'auto',
            showDone:true,
            showDelete:true,
            onSuccess: function( files, data, xhr ) {
               console.log(data);
               $('#idkalibrasi').append('<input type="hidden" name="file_warta" value="'+data+'">');
            },
            deleteCallback: function(data,pd) 
            {
                for(var i=0;i<data.length;i++) {
                    var str = data[i];
                    console.log(str.replace(/[^a-z0-9]/gi, '_'));
                    $.post("<?=base_url()?>warta/delete/",{op:"delete",name:data[i]},
                    function(resp, textStatus, jqXHR) { 
                        console.log(data);
                    });
                    
                }  
                console.log(data[0]); 
                pd.statusbar.hide();
            }
        });

    });
</script>