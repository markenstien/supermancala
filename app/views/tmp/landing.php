<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pinoy Games</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?php echo _path_tmp('landing-tmp/css/bootstrap.min.css')?>">
      <!-- style css -->
      <link rel="stylesheet" href="<?php echo _path_tmp('landing-tmp/css/style.css')?>">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo _path_tmp('landing-tmp/css/responsive.css')?>">
      <!-- fevicon -->
      <link rel="icon" href="<?php echo _path_tmp('landing-tmp/images/fevicon.png')?>" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo _path_tmp('landing-tmp/css/jquery.mCustomScrollbar.min.css')?>">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <?php produce('style')?>
   </head>
   <!-- body -->
   <body class="main-layout" id="body">
      <!-- loader  -->
      <div class="loader_bg" style="display: none;">
         <div class="loader"><img src="<?php echo _path_tmp('landing-tmp/images/loading.gif')?>" alt="#" /></div>
      </div>
      <!-- end loader -->

      <!-- header -->
    <header>
            <!-- header inner -->
        <div class="header-top">
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="#">PINOY</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                    <li> <a href="<?php echo _route('game:catalog')?>">Games</a> </li>
                                    <?php if(!whoIs()): ?>
                                       <li> <a href="<?php echo _route('auth:login')?>">Login</a> </li>
                                       <li> <a href="<?php echo _route('auth:register')?>">Register</a> </li>
                                       <?php else :?>
                                          <li> <a href="<?php echo _route('user:profile')?>">Profile</a> </li>
                                    <?php endif?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header style="display: none;">
        <div class="header-top">
            <section class="slider_section">
                <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        
                        <div class="container">
                            <div class="carousel-caption">
                                <div class="row d_flex">
                                    <div class="col-md-4">
                                    <div class="text-bg">
                                        <h1>Online casino </h1>
                                        <a href="#">Play now</a>
                                    </div>
                                    </div>
                                    <div class="col-md-8">
                                    <div class="text-img">
                                        <figure><img src="images/img.png" /></figure>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="carousel-item">
                        
                        <div class="container">
                            <div class="carousel-caption">
                                <div class="row d_flex">
                                    <div class="col-md-4">
                                    <div class="text-bg">
                                        <h1>Online casino </h1>
                                        <a href="#">Play now</a>
                                    </div>
                                    </div>
                                    <div class="col-md-8">
                                    <div class="text-img">
                                        <figure><img src="images/img.png" /></figure>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="carousel-item">
                        
                        <div class="container">
                            <div class="carousel-caption">
                                <div class="row d_flex">
                                    <div class="col-md-4">
                                    <div class="text-bg">
                                        <h1>Online casino </h1>
                                        <a href="#">Play now</a>
                                    </div>
                                    </div>
                                    <div class="col-md-8">
                                    <div class="text-img">
                                        <figure><img src="images/img.png" /></figure>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </div>
    </header>
	<!-- about  -->
	


      <?php produce('content')?>
     
      <div id="about" class="about" style="display: none;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>About <strong class="white black"> Us</strong></h2>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                  <div class="about-box">
                     <figure><img src="images/about1.jpg" alt="#" /></figure>
                     <h3> Basic and Tips</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it</p>
                  </div>
                  <a class="read_more" href="#">Read More</a>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                  <div class="about-box">
                     <figure><img src="images/about2.jpg" alt="#" /></figure>
                     <h3> Casinos and Chips</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it</p>
                  </div>
                  <a class="read_more" href="#">Read More</a>
               </div>
            </div>
         </div>
      </div>
      <!-- end abouts -->
      <!-- Features -->
      <div id="games" class="Features" style="display: none;">
         <div class="container">
            <div class="row d_flex">
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 ">
                  <div class="titlepage">
                     <h2>Features<br><strong class="white"> Games</strong></h2>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
                     <a href="#">View All</a>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 ">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pa_bottom">
                        <div class="games-box">
                           <figure><img src="images/game1.png" alt="#" /></figure>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pa_bottom">
                        <div class="games-box">
                           <figure><img src="images/game2.png" alt="#" /></figure>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                        <div class="games-box">
                           <figure><img src="images/game3.png" alt="#" /></figure>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                        <div class="games-box">
                           <figure><img src="images/game4.png" alt="#" /></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
 
      <!-- end Features -->
      <!-- We are -->
      <div id="Our_Our" class="Our" style="display: none;">
         <div class="container">
            <div class="row">
               <div class="col-md-2">
                  <div class="titlepage">
                     <h2>Our <br><strong class="white black"> news</strong></h2>
                  </div>
               </div>
               <div class="col-md-10">
                  <div class="titlepage">
                     <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="main_slider" class="carousel slide banner-main2" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img class="first-slide" src="images/banner.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                           <img class="second-slide" src="images/banner.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                           <img class="third-slide" src="images/banner.png" alt="Third slide">
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev"> <i class='fa fa-angle-left'></i></a>
                     <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next"> <i class='fa fa-angle-right'></i></a>
                  </div>
                  <p class="new_s">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
               </div>
            </div>
         </div>
      </div>
      <!-- end We are -->
      <!-- contact -->
      <div id="booknow" class="contact" style="display: none;">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 padding-right1">
                  <div class="rable-box">
                     <figure>
                     <img src="images/cac.png" alt="#"/>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 padding-left1">
                  <div class="contact">
                     <div class="titlepage">
                        <h2>Book <br><strong class="white "> Now</strong></h2>
                     </div>
                     <form class="book_now">
                        <div class="row">
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Name" type="text" name="Name">
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Phone Number" type="text" name="Phone Number">
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Email" type="text" name="Email">
                           </div>
                           <div class="col-sm-12">
                              <select name="cars">
                                 <option value="volvo" selected> Select Game</option>
                                 <option value="saab">1</option>
                                 <option value="fiat" >2</option>
                                 <option value="audi">3</option>
                              </select>
                           </div>
                           <div class="col-sm-12">
                              <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                           </div>
                           <div class="col-sm-12">
                              <button class="send">Send</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="copyright">
                        <p>© 2019 All Rights Reserved. PINOY GAMES - <?php echo date('Y')?></a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <?php echo produce('scripts') ?>
      <script src="<?php echo _path_tmp('landing-tmp/js/jquery.min.js')?>"></script>
      <script src="<?php echo _path_tmp('landing-tmp/js/popper.min.js')?>"></script>
      <script src="<?php echo _path_tmp('landing-tmp/js/bootstrap.bundle.min.js')?>"></script>
      <script src="<?php echo _path_tmp('landing-tmp/js/jquery-3.0.0.min.js')?>"></script>
      <script src="<?php echo _path_tmp('landing-tmp/js/plugin.js')?>"></script>
      <!-- sidebar -->
      <script src="<?php echo _path_tmp('landing-tmp/js/jquery.mCustomScrollbar.concat.min.js')?>"></script>
      <script src="<?php echo _path_tmp('landing-tmp/js/custom.js')?>"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>