<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Covid PIMS">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title><?php echo $page_title ?? COMPANY_NAME?></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

<!-- core:css -->
<link rel="stylesheet" href="<?php echo _path_tmp('main-tmp/assets/vendors/core/core.css')?>">
<!-- endinject -->

<!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo _path_tmp('main-tmp/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
    <!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="<?php echo _path_tmp('main-tmp/assets/fonts/feather-font/css/iconfont.css')?>">
<link rel="stylesheet" href="<?php echo _path_tmp('main-tmp/assets/vendors/flag-icon-css/css/flag-icon.min.css')?>">
<!-- endinject -->

<!-- Layout styles -->  
<link rel="stylesheet" href="<?php echo _path_tmp('main-tmp/assets/css/demo3/style.css')?>">
<!-- End layout styles -->

<link rel="shortcut icon" href="<?php echo _path_tmp('main-tmp/assets/images/favicon.png')?>" />

  <?php produce('styles')?>
  
</head>
<body>
    <?php $auth = auth()?>
    <div class="main-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar">
                <div class="container">
                    <div class="navbar-content">
                        <a href="#" class="navbar-brand">
                            <?php echo COMPANY_NAME?>
                        </a>
                        <?php if($auth) :?>
                            <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?php echo _route('user:show' , $auth->id)?>" 
                                  id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" 
                                    aria-expanded="false">
                                    <?php echo $auth->firstname?>
                                </a>
                                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                  <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="text-center">
                                      <p class="tx-16 fw-bolder"><?php echo $auth->firstname . ' '.$auth->lastname?></p>
                                      <p class="tx-12 text-muted"><?php echo $auth->user_type ?></p>
                                    </div>
                                  </div>
                                  <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                      <a href="<?php echo _route('user:edit' , $auth->id)?>" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                      </a>
                                    </li>

                                    <li class="dropdown-item py-2">
                                      <a href="#" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Games Played</span>
                                      </a>
                                    </li>

                                    <li class="dropdown-item py-2">
                                      <a href="<?php echo _route('auth:logout')?>" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                                <i data-feather="menu"></i>                 
                            </button>
                        <?php endif?>
                    </div>
                </div>
            </nav>
        </div>
        <!-- partial -->
    
        <div class="page-wrapper">

            <div class="page-content">
              <button class="btn btn-primary" onclick="location.href='/GameController/catalog'">Play Games!</button>
                <?php echo produce('content')?>
            </div>

            <!-- partial:../../partials/_footer.html -->
            <footer class="footer border-top">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3 small">
          <p class="text-muted mb-1 mb-md-0">Copyright © 2021 <?php echo COMPANY_NAME?>.</p>
        </div>
            </footer>
            <!-- partial -->
    
        </div>
    </div>

    <!-- core:js -->
    <script src="<?php echo _path_tmp('main-tmp/assets/vendors/core/core.js')?>"></script>
    <script src="<?php echo _path_public('js/jquery.js')?>"></script>
    <script src="<?php echo _path_public('js/core.js')?>"></script>
    <script src="<?php echo _path_public('js/global.js')?>"></script>
    <script src="<?php echo _path_public('js/game.js')?>"></script>
    <?php produce('scripts')?>
</body>
</html>