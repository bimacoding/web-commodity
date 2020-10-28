<style type="text/css">
        .ajax-file-upload-statusbar{
        border:none;
    }
    .ajax-file-upload-filename {
        width: 100%;
        height: auto;
        margin: 0 5px 5px 0px;
        border-bottom: 1px solid #ddd;
    }
    .ajax-file-upload{
      cursor:pointer;
    }
    .ajax-file-upload {
        width: 100%;
        box-shadow: inset 0px 1px 0px 0px #ffffff;
        background: linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
        background-color: rgba(0, 0, 0, 0);
        background-color: #ffffff;
        border-radius: 3px;
        border: 1px solid #dcdcdc;
        display: inline-block;
        cursor: pointer;
        color: #666666;
        font-family: Arial;
        font-size: 15px;
        font-size: 14px;
        padding: 3px 24px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #ffffff;
    }
    .ajax-file-upload-statusbar{
        display: inline;
    }
    .ajax-upload-dragdrop{
        padding: 3px 10px -1px 10px;
    }
    .ajax-upload-dragdrop span:first-of-type{
        float: right; margin-top: 5px;
    }
    .ajax-file-upload-preview{
        display: inline;
        float: left;
    }
    .addon-link{
    background: #f9f9f9;
    border: 1px solid #d7d7d7;
    font-size: 15px;
    color: blue;
    text-decoration: underline;
    }
  @media (max-width: 767px) {
    .ajax-upload-dragdrop{
      width:225px !important;
      border:none !important;
    }
    .ajax-upload-dragdrop span:first-of-type{
      float: right; margin-top: 5px;
      display: none;
    }
  }
</style>
<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('product/tambah_product',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-10">
                    <select class="form-control" name="a">
                        <option class="-">-- Pilih --</option>
                        <?php   
                            foreach ($kat as $key) {
                                echo "<option value='$key[id_kategori]'>$key[nama_kategori]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama product</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="b">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Keterangan product</label>
                <div class="col-10">
                    <textarea class="summernote" name="c"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Harga</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="d">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Berat (Kg)</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="e">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Asal Daerah</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="f">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Foto</label>
                <div class="col-10">
                    <div id='mulitplefileuploader'>Choose files</div>
                    <textarea style="display: none;" name="foto" id="status"></textarea>
                    <!-- <div id="status"></div> -->
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Publish</label>
                <div class="col-10">
                    <select class="form-control" name="g">
                        <option value="Y">-- Pilih --</option>
                        <option value="Y"> Y </option>
                        <option value="N"> N </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'product'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $("#mulitplefileuploader").uploadFile({
        url: "<?=base_url('admin/product/upload_foto_product')?>",
        formData: {
            id: "32965"
        },
        method: "POST", // Upload Form method type POST or GET.
        enctype: "multipart/form-data",
        dragDrop: true,
        maxFileCount: 20,
        multiple: true,
        fileName: "uploadFile",
        maxFileSize: 3000 * 1024,
        allowedTypes: "gif,png,jpg,jpeg",
        returnType: "json",
        showDone: false,
        showDelete: true,
        onSuccess: function (files, response, xhr,pd) {
            console.log(response);
            $('#status').append(response[0]+'|');
        },
        onError: function (files, status, message,pd) {},
        deleteCallback: function(data, pd) {
            for (var i = 0; i < data.length; i++) {
                $.post("<?=base_url('admin/product/delete_foto_product')?>", {op: "delete",name: data[i]},
                function(resp, textStatus, jqXHR) {
                    // $("#status").append("<div>File Deleted</div>");  
                });

            }
            console.log(data);
            pd.statusbar.hide();
        },
        dragDropStr: "<span><b>Drag &amp; Drop Files</b></span>",
        abortStr: "Abort",
        multiDragErrorStr: "Multiple File Drag &amp; Drop is not allowed.",
        extErrorStr: "extensi file tidak diizinkan, extensi diizinkan: ",
        sizeErrorStr: "ukuran file tidak diizinkan, ukuran diizinkan: ",
        uploadErrorStr: "Upload is not allowed",
        maxFileCountErrorStr: "Maximum gambar diupload: ",
        dragdropWidth:'auto'
    });
});
</script>