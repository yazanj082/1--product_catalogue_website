<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>E-Shopper Admin Dashboard</title>
    <link href="<?php echo base_url('assets/css/admin.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/fontawesome.min.css'); ?>" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" />
    <script src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>" crossorigin="anonymous"></script>
    <?php if ($css) : ?>
        <?php foreach ( $css as $file ) : ?>
            <link rel="stylesheet" href="<?php echo base_url($file); ?>">
        <?php endforeach; ?>
    <?php endif; ?>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand h-100 text-center" href="<?php echo base_url('admin/dashboard'); ?>">
            <img src="<?php echo base_url('assets/images/logo-inverse.png'); ?>" class="h-100">
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url('/Admin/Auth?logout=1'); ?>">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main</div>
                        <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Products</div>
                        <a class="nav-link" href="<?php echo base_url('admin/categories'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-sitemap"></i></div>
                            Categories
                        </a>
                        <a class="nav-link" href="<?php echo base_url('admin/products'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Products
                        </a>
                        <div class="sb-sidenav-menu-heading">System</div>
                        <a class="nav-link" href="<?php echo base_url('admin/admins'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Admins
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: <?php echo session()->get('username'); ?></div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="my-4"><?php echo $page_title; ?></h1>
                        </div>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle"></i>
                                    <?php echo session()->getFlashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty(array_filter($errors))) : ?>
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php foreach ($errors as $error) : ?>
                                        <i class="fas fa-times-circle"></i>
                                        <?php echo $error; ?><br>
                                    <?php endforeach; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php echo view($view_file, $controller_data); ?>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/admin.js'); ?>"></script>
    <?php if ($js) : ?>
        <?php foreach ( $js as $file ) : ?>
            <script src="<?php echo base_url($js); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>