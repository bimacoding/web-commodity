<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="@bima_coding">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=favicon()?>">
    <title><?=$title?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- summernotes CSS -->
    <link href="<?=base_url()?>assets/plugins/bower_components/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- Menu CSS -->
    <link href="<?=base_url()?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
    <!-- Calendar CSS -->
    <link href="<?=base_url()?>assets/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/bower_components/jqueryui/jquery-ui.css" rel="stylesheet" />
    <!-- toast CSS -->
    <link href="<?=base_url()?>assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/plugins/bower_components/nestable/nestable.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bower_components/jquery-file-upload/uploadfile.css">
    <!-- color CSS -->
    <link href="<?=base_url()?>assets/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/plugins/bower_components/jquery-file-upload/jquery.uploadfile.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .thumbnail {
            border: 0;
        }

        #webcodecam-canvas, #scanned-img {
            background-color: #2d2d2d;
        }

        #camera-select {
            display: inline-block;
            width: auto;
        }

        .btn {
            margin-bottom: 2px;
        }

        .form-control {
            height: 32px;
        }

        .h4, h4 {
            width: auto;
            float: left;
            font-size: 20px;
            line-height: 1.1;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .controls {
            float: right;
            display: inline-block;
        }

        .well {
            position: relative;
            display: inline-block;
        }

        .panel-heading {
            display: inline-block;
            width: 100%;
        }

        .container {
            width: 100%
        }

        pre {
            border: 0;
            border-radius: 0;
            background-color: #333;
            margin: 0;
            line-height: 125%;
            color: whitesmoke;
        }

        button {
            outline: none !important;
        }

        .table-bordered {
            color: #777;
            cursor: default;
        }

        .table-bordered a:hover {
            text-decoration: none;
        }

        .table-bordered th a {
            float: right;
            line-height: 3.49;
        }

        .table-bordered td a {
            float: left;
        }

        .table-bordered th img {
            float: left;
        }

        .table-bordered th, .table-bordered td {
            vertical-align: middle !important;
        }

        .scanner-laser {
            position: absolute;
            margin: 40px;
            height: 30px;
            width: 30px;
            opacity: 0.5;
        }

        .laser-leftTop {
            top: 0;
            left: 0;
            border-top: solid red 5px;
            border-left: solid red 5px;
        }

        .laser-leftBottom {
            bottom: 0;
            left: 0;
            border-bottom: solid red 5px;
            border-left: solid red 5px;
        }

        .laser-rightTop {
            top: 0;
            right: 0;
            border-top: solid red 5px;
            border-right: solid red 5px;
        }

        .laser-rightBottom {
            bottom: 0;
            right: 0;
            border-bottom: solid red 5px;
            border-right: solid red 5px;
        }

        #webcodecam-canvas {
            background-color: #272822;
        }
        #scanned-QR{
            word-break: break-word;
        }
    </style>
</head>

<body class="content-wrapper">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <?php if ($this->uri->segment(2)=='cek_bakti') {
            $hiden = 'style="display:none;"';
        }else{
             $hiden = '';
        } ?>
        <nav class="navbar navbar-default navbar-static-top m-b-0" <?=$hiden?>>
            <?php include 'header.php'; ?>
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation" <?=$hiden?>>
            <?php include 'sidenav.php'; ?>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php if(isset($page_title)){echo $page_title;}else{echo $title;}?></h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb" <?=$hiden?>>
                            <li><a href="<?=base_url()?>siteman">Dashboard</a></li>
                            <li class="active"><?= $this->uri->segment(2); ?></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <?= $contents; ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php include 'footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets/js/waves.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?=base_url()?>assets/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/js/custom.min.js"></script>
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="<?=base_url()?>assets/plugins/bower_components/summernote/dist/summernote.min.js"></script>
    <script>
    jQuery(document).ready(function() {
        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        $('.inline-editor').summernote({
            airMode: true
        });
    });
    window.edit = function() {
        $(".click2edit").summernote()
    }, window.save = function() {
        $(".click2edit").summernote('destroy');
    }
    </script>
    <script src="<?=base_url()?>assets/plugins/bower_components/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });
    </script>
    <!-- Calendar JavaScript -->
    <script src="<?=base_url()?>assets/plugins/bower_components/calendar/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/plugins/bower_components/jqueryui/jquery-ui.js"></script>
    <script src="<?=base_url()?>assets/plugins/bower_components/moment/moment.js"></script>
    <script src='<?=base_url()?>assets/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
    <script src="<?=base_url()?>assets/plugins/bower_components/calendar/dist/cal-init.js"></script>
    <!-- dashboard -->
    <!--Nestable js -->
    <script src="<?=base_url()?>assets/plugins/bower_components/nestable/jquery.nestable.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-autocomplete.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $('#example3').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "pageLength": 200,
      "language": {
        "emptyTable": " "
      }
    });

    $('#mastersiswa').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "pageLength": 200
    });

    $('#example5').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "info": false,
      "autoWidth": false,
      "pageLength": 200,
      "order": [[ 5, "desc" ]]
    });

    $('#example99').DataTable({
      "aLengthMenu":[[25,50,75,200],[25,50,75,200]],
      "pageLength": 25
    });

    /** add active class and stay opened when selected */
  
  });
</script>

    <!--Style Switcher -->
    <script src="<?=base_url()?>assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
