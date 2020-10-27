<style type="text/css">
  .btn-info{
    background-color: #d7bc88;
    border-color: #d7bc88;
  }
  .btn-outline-info{
    border-color: #d7bc88;
    color: #d7bc88;
  }
  .btn-outline-info:hover{
    border-color: #d7bc88;
    color: #fff;
  }
</style>
<div class="container-fluid">

  <div class="col-12 my-3">
    <div class="btn-group" style="width:95px">
      <?php $key_ortu = $ortu->row_array() ?>
      <button class="btn btn-info btn-sm cc" type="button" value="<?=$key_ortu['id_videos']?>" id="<?=$key_ortu['id_videos']?>" onclick="get_umum(this.id)">
        UMUM
      </button>
    </div>

    <div class="btn-group" style="width:95px">
      <button data-display="static" class="btn btn-outline-info btn-sm dropdown-toggle dd" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="id_teruna">
        TERUNA
      </button>
      <ul class="dropdown-menu">
        <?php foreach ($remaja->result_array() as $key_teruna) { ?>
          <li class="dropdown-item" id="<?=$key_teruna['id_videos']?>" value="<?=$key_teruna['id_videos']?>" onclick="get_teruna(this.id)"><?=$key_teruna['judul_videos']?></li>
        <?php } ?>
      </ul>
    </div>

    <div class="btn-group" style="width:95px">
      <button data-display="static" class="btn btn-outline-info btn-sm dropdown-toggle ee" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="id_anak">
        ANAK
      </button>
      <ul class="dropdown-menu dropdown-menu-right">
        <?php foreach ($anak->result_array() as $key_anak) { ?>
          <li class="dropdown-item" id="<?=$key_anak['id_videos']?>" value="<?=$key_anak['id_videos']?>" onclick="get_anak(this.id)"><?=$key_anak['judul_videos']?></li>
        <?php } ?>
      </ul>
    </div>
  </div>

  <!-- src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" -->
  <div class="row">
    <div class="embed-responsive embed-responsive-16by9 mx-1">
      <iframe class="embed-responsive-item" allowfullscreen></iframe>
    </div>
  </div>
  <div class="mb-2">
    <div class="col-md-12 my-2">
      <h3 id="mx_judul" style="display: none;"></h3>
      <div id="mx_isi"></div>
    </div>
  </div>

</div>
<script type="text/javascript">
  $(function() {
    var ortus = $('.cc').val();
    console.log(ortus);
    $.ajax({
      url: '<?=base_url()?>ajax/get_videos_kat_ortu',
      type: 'GET',
      dataType: 'json',
      data: {ortu: ortus},
    })
    .done(function(json) {
      console.log("success");
      $("button").removeClass('btn-info');
      $("button").addClass('btn-outline-info');

      $("button.cc").addClass('btn-info');
      $("button.cc").removeClass('btn-outline-info');

      var ps_ortu = htmldecode(json.isi_videos);
      var jd_ortu = htmldecode(json.judul_videos);
      $('iframe').attr('src','https://www.youtube.com/embed/'+json.link_videos+'?rel=0');
      $('#mx_isi').html(ps_ortu);
      $('#mx_judul').html(jd_ortu);
    })
    .fail(function() {
      console.log("error");
    });

  });

  function htmldecode (str){
    var txt = document.createElement('textarea');
    txt.innerHTML = str;
    return txt.value;
  }

  function get_teruna(id){
    var remajas =id;
    $.ajax({
      url: '<?=base_url()?>ajax/get_videos_kat_remaja',
      type: 'GET',
      dataType: 'json',
      data: {remaja: remajas},
    })
    .done(function(json) {
      console.log("success");
      // $("#li_remaja li.active").removeClass('active');
      // $("#"+id).addClass('active');
      $("button").removeClass('btn-info');
      $("button").addClass('btn-outline-info');

      $("button.dd").addClass('btn-info');
      $("button.dd").removeClass('btn-outline-info');

      $("button.dd").text('');
      $("button.dd").text(json.judul_videos);

      var ps_teruna = htmldecode(json.isi_videos);
      var jd_teruna = htmldecode(json.judul_videos);
      $('iframe').attr('src','https://www.youtube.com/embed/'+json.link_videos+'?rel=0');
      $('#mx_isi').html(ps_teruna);
      $('#mx_judul').html(jd_teruna);
      
    })
    .fail(function() {
      console.log("error");
    });
  }

  function get_anak(id){
    var anaks =id;
    // alert(id);
    $.ajax({
      url: '<?=base_url()?>ajax/get_videos_kat_anak',
      type: 'GET',
      dataType: 'json',
      data: {anak: anaks},
    })
    .done(function(json) {
      console.log("success");
      $("button").removeClass('btn-info');
      $("button").addClass('btn-outline-info');

      $("button.ee").addClass('btn-info');
      $("button.ee").removeClass('btn-outline-info');

      $("button.ee").text('');
      $("button.ee").text(json.judul_videos);

      var ps_anak = htmldecode(json.isi_videos);
      var jd_anak = htmldecode(json.judul_videos);
      $('iframe').attr('src','https://www.youtube.com/embed/'+json.link_videos+'?rel=0');
      $('#mx_isi').html(ps_anak);
      $('#mx_judul').html(jd_anak);
    })
    .fail(function() {
      console.log("error");
    });
  }

  function get_umum(id){
    var ortus=id;
    $.ajax({
      url: '<?=base_url()?>ajax/get_videos_kat_ortu',
      type: 'GET',
      dataType: 'json',
      data: {ortu: ortus},
    })
    .done(function(json) {
      console.log("success");
      $("button").removeClass('btn-info');
      $("button").addClass('btn-outline-info');

      $("button.cc").addClass('btn-info');
      $("button.cc").removeClass('btn-outline-info');

      $("button.dd").text('');
      $("button.dd").text('TERUNA');

      $("button.ee").text('');
      $("button.ee").text('ANAK');

      var ps_umum = htmldecode(json.isi_videos);
      var jd_umum = htmldecode(json.judul_videos);
      $('iframe').attr('src','https://www.youtube.com/embed/'+json.link_videos+'?rel=0');
      $('#mx_isi').html(ps_umum);
      $('#mx_judul').html(jd_umum);
    })
    .fail(function() {
      console.log("error");
    });
  }
</script>