<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shopper</title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/fonts/nunito/stylesheet.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/swiper.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>

    <!-- top bar -->
    <div id="top-bar" class="mb-4">
        <div class="d-flex px-3 h-100">
            <div class="nav mr-auto my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="#">About</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">Contact us</a>
                    </li>
                </ul>
            </div>
            <div class="nav ml-auto h-100">
                <div class="dropdown my-auto">
                    <button class="btn btn-link dropdown-toggle" type="button" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        English
                    </button>
                    <div class="dropdown-menu" aria-labelledby="anguage-dropdown">
                        <a class="dropdown-item" href="#">English</a>
                        <a class="dropdown-item" href="#">العربية</a>
                    </div>
                </div>
                <div class="h-75 my-auto border-left border-secondary ml-4"></div>
                <ul class="list-inline mb-0 my-auto ml-5">
                    <li class="list-inline-item">
                        <a href="http://facebook.com" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="http://twitter.com" target="_blank">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram-square"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" target="_blank">
                            <i class="fab fa-youtube-square"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- site content -->
    <div class="container-fluid px-lg-5">
        <!-- logo , main menu login-->
        <div class="row mb-4">
            <div class="col-12 col-lg-2 mx-auto">
                <a href="<?= base_url(); ?>">
                    <img id="logo" src="<?= base_url('assets/images/logo2.png'); ?>">
                </a>
            </div>
            <div class="col">
                <nav id="main-menu" class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu-collapse" aria-controls="main-menu-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main-menu-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url('Home/'); ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="store-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </a>
                                <div class="dropdown-menu" aria-labelledby="store-dropdown">
                                <?php foreach ($controller_data['categories'] as $categorie) : ?>
                                    <a class="dropdown-item" href="<?php echo base_url('Home/filter/'.$categorie["id"]); ?>"><?php echo $categorie["name"] ?></a>
                                <?php endforeach; ?>
                                
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('Home/allProducts/'); ?>">All Products</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Search, minicart-->
        <form action="<?php echo base_url('Home/search') ?>" method="POST">
        <div class="row mb-4">
            <div class="col-12 col-lg-8">
                <div class="input-group mb-3">
                
                
                    <input type="text" class="form-control" name="name"placeholder="search product" aria-label="search product">
                    <div class="input-group-append">
                        <button class="btn btn-pink" type="submit"  id="button-search"><i class="fas fa-search"></i></button>
                    </div>
                
                </div>
            </div>
            <div class="col-12 col-lg-4 text-right">
                <ul class="inline-list">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fas fa-shopping-bag fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
       
        </form>
        <!------ PAGE CONTENT LINE 129 site/layout-----> 
        <?= view($view_file,$controller_data); ?>
    </div>
   
    <!-- footer -->
    <footer class="w-100 bg-dark mt-5 d-flex">
        <div class="col-6 mx-auto text-center py-5">
            <p class="text-white my-auto">Copyrights 2021</p>
        </div>
    </footer>
    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/swiper.min.js'); ?>"></script>
    <script>
        $(document).ready(function() {

            var swiper_full_width = new Swiper('.swiper-full-width', {
                spaceBetween: 30,
                hashNavigation: {
                    watchState: true,
                },
                pagination: {
                    el: '.swiper-full-width .swiper-pagination',
                    clickable: true,
                },
            });

            var swiper_cards = new Swiper('.swiper-cards', {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-cards .swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    576: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 50,
                    },
                    1600: {
                        slidesPerView: 5,
                        spaceBetween: 50,
                    },
                }
            });

        });
    </script>
</body>

</html>