<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$description?>">
    <meta name="keywords" content="<?=$keywords?>">
    <meta name="author" content="arif iik | order by wa : 085289033229">
    <title><?=$title;?></title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?=favicon()?>" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?=base_url()?>template/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?=base_url()?>template/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?=base_url()?>template/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?=base_url()?>template/img/apple-touch-icon-144x144-precomposed.png">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- BASE CSS -->
    <link href="<?=base_url()?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/custom.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="<?=base_url()?>template/css/home_1.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/cheatsheet.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/blog.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/contact.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/listing.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/product_page.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/cart.css" rel="stylesheet">
    <link href="<?=base_url()?>template/css/style.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    
    <link href="<?=base_url()?>template/css/grt-youtube-popup.css" rel="stylesheet">


    <script src="<?=base_url()?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    

</head>

<body>

    <div id="page">

    <header class="version_2">
        <?php include 'header.php'; ?>
        <!-- /main_header -->
    </header>

    <!-- search paenl -->
    <div class="top_panel">
        <div class="container header_panel">
            <a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
            <small>Artikel apa yang anda cari?</small>
        </div>
        <!-- /header_panel -->
        <div class="container">
            <div class="search-input">
                <form action="<?=base_url().'post/indeks'?>" method="POST">
                    <input type="text" placeholder="Ketikan kata kunci disini.." name="kata">
                    <button type="submit"><i class="ti-search"></i></button>
                </form>
            </div>
        </div>
        <!-- /related -->
    </div>
    <!-- /end search_panel -->

    <!-- main -->
    <main class="bg_gray">
        <!-- this script here -->
        <?php echo $contents; ?>
    </main>
    <!-- end main -->

    <!-- footer -->
    <footer class="revealed" style="background-color: #3a4760">
        <?php include 'footer.php'; ?>
    </footer>
    <!--/footer-->
    </div>
    <!-- page -->
    
    <div id="toTop"></div><!-- Back to top button -->
    
    <!-- COMMON SCRIPTS -->
    <script src="<?=base_url()?>template/js/common_scripts.min.js"></script>
    <script src="<?=base_url()?>template/js/main.js"></script>
    
    
    <!-- SPECIFIC SCRIPTS -->
    <script src="<?=base_url()?>template/js/lazyload.min.js"></script>
    <script src="<?=base_url()?>template/js/carousel-home.js"></script>
    <script src="<?=base_url()?>template/js/carousel_with_thumbs.js"></script>

</body>
</html>