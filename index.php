<?php
  session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>WOUF Store</title>
      <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
      <link href="assets/css/flexslider.css" rel="stylesheet" />
      <link href="assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
      <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="logo-custom" src="assets/img/logoz.png" alt="" /></a>
          </div>
          <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#home">HOME</a></li>
              <li><a href="#testimonials-sec">TESTIMONIALS</a></li>
              <li><a href="#course-sec">CONTACT US</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="home-sec" id="home">
        <div class="overlay">
          <div class="container">
            <div class="row text-center ">
              <div class="col-lg-12  col-md-12 col-sm-12">
                <div class="flexslider set-flexi" id="main-section">
                  <ul class="slides move-me">
                    <li>
                      <h3>Produk Perlengkapan Hewan Peliharaan dengan Kualitas Terbaik</h3>
                      <h1>APA YANG KAMU TUNGGU?</h1>
                      <a href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#ln">
                        SIGN IN
                      </a>
                      <a href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#su">
                        SIGN UP
                      </a>
                      <a href="#features-sec" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#an">
                        ADMIN
                      </a>
                    </li>
                    <li>
                      <h3>Produk Perlengkapan Hewan Peliharaan dengan Kualitas Terbaik</h3>
                      <h1>AYO BELANJA DI WEBSITE KAMI SEKARANG JUGA!</h1>
                      <a href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#ln">
                        SIGN IN
                      </a>
                      <a href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#su">
                        SIGN UP
                      </a>
                      <a href="#features-sec" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#an">
                        ADMIN
                      </a>
                    </li>
                    <li>
                      <h3>Produk Perlengkapan Hewan Peliharaan dengan Kualitas Terbaik</h3>
                      <h1>KUALITAS TERTINGGI DAN ORIGINAL!</h1>
                      <a href="#features-sec" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#ln">
                        SIGN IN
                      </a>
                      <a href="#features-sec" class="btn btn-success btn-lg" data-toggle="modal" data-target="#su">
                        SIGN UP
                      </a>
                      <a href="#features-sec" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#an">
                        ADMIN
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tag-line">
        <div class="container">
          <div class="row  text-center">
            <div class="col-lg-12  col-md-12 col-sm-12">
              <h2 data-scroll-reveal="enter from the bottom after 0.1s"><i class="fa fa-circle-o-notch"></i> Selamat Datang di Website Wouf Store <i class="fa fa-circle-o-notch"></i> </h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonials-sec" class="container set-pad">
        <div class="row text-center">
          <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
            <h1 data-scroll-reveal="enter from the bottom after 0.2s" class="header-line">TESTIMONIALS </h1>
            <p data-scroll-reveal="enter from the bottom after 0.3s">
              Testimonial dari beberapa pelanggan.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
            <div class="about-div">
              <center> <img class="img img-circle" src="assets/img/person-1.jpeg" style="width:100px;height:100px;" />
                <h3>Alan Novianto</h3>
                <hr />
                <hr />
                <p>
                  Websitenya mantap, saya belanja banyak sampek dompet saya kering.
                </p>
              </center>
            </div>
          </div>
          <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
            <div class="about-div">
              <center> <img class="img img-circle" src="assets/img/person-2.jpeg" style="width:100px;height:100px;" />
                <h3>Mario <br />Forever</h3>
                <hr />
                <hr />
                <p>
                  Maunya beli obat di klinik tongfang, tapi tidak sengaja nemu wesitenya ini
                  jadi pada akhirnya sala belanja makanan kucing buat kucing saya.
                </p>
              </center>
            </div>
          </div>

          <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
            <div class="about-div">
              <center> <img class="img img-circle" src="assets/img/person-3.jpeg" style="width:100px;height:100px;" />
                <h3>Ilham <br /> Santosa</h3>
                <hr />
                <hr />
                <p>
                  Beli perlengkapan hewan enaknya disni, selain harganya terjangkau
                  kualitasnya sangat ASHIAPPP.
                </p>
              </center>
            </div>
          </div>

          <div class="col-lg-3  col-md-3 col-sm-3" data-scroll-reveal="enter from the bottom after 0.4s">
            <div class="about-div">
              <center> <img class="img img-circle" src="assets/img/person-4.jpeg" style="width:100px;height:100px;" />
                <h3>Zaid <br />Abdilah</h3>
                <hr />
                <hr />
                <p>Pengirimannya sangat cepat, melebihi kecepatan saya jatuh cinta pada pandangan pertama.</p>

              </center>
            </div>
          </div>
        </div>
      </div>
      <br />
      <div id="course-sec" class="container set-pad">
        <div class="row text-center">
          <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
            <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">Contact Us</h1>
            <p data-scroll-reveal="enter from the bottom after 0.3s">
              Jika kamu ada pertanyaan, Silahkan hubungi kami.
              <br />Untuk Lebih Detailnya, Lihat Informasi Kontak dibawah ini.
            </p>
          </div>
        </div>
        <br />
        <div class="container">
          <div class="row set-row-pad">
            <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 " data-scroll-reveal="enter from the bottom after 0.4s">
              <h2><strong>Lokasi Kami </strong></h2>
              <hr />
              <div ">
                <h4>Jl. Gubeng Kertajaya X/6,Kota Surabaya</h4>
                <h4>Jawa Timur,Indonesia</h4>
                <h4>8200</h4>
              </div>
            </div>
            <div class=" col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" data-scroll-reveal="enter from the bottom after 0.4s">
                <h2><strong>Feedbacks </strong></h2>
                <hr />
                <div>
                  <h4><strong>Call:</strong> +62 82 144 948 550 </h4>
                  <h4><strong>Email: </strong>mdrahano12@gmail.com</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="su" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
          <div style="color:white;background-color:#008CBA" class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Registration Form</h4>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="register.php">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="Firstname" name="ruser_firstname" type="text" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Lastname" name="ruser_lastname" type="text" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Address" name="ruser_address" type="text" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Email" name="ruser_email" type="email" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Password" name="ruser_password" type="password" required>
                  </div>
                </fieldset>
            </div>
            <div class="modal-footer">
              <button class="btn btn-md btn-warning btn-block" name="register">Sign Up</button>
              <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="ln" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
          <div style="color:white;background-color:#008CBA" class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 style="color:white" class="modal-title" id="myModalLabel">Customer Login</h4>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="userlogin.php">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="Email" name="user_email" type="email" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Password" name="user_password" type="password" required>
                  </div>
                </fieldset>
            </div>
            <div class="modal-footer">
              <button class="btn btn-md btn-warning btn-block" name="user_login">Sign In</button>
              <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="an" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
          <div style="color:white;background-color:#008CBA" class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 style="color:white" class="modal-title" id="myModalLabel">Administrator Credentials</h4>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="adminlogin.php">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="Username" name="admin_username" type="text" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Password" name="admin_password" type="password" required>
                  </div>
                </fieldset>
            </div>
            <div class="modal-footer">
              <button class="btn btn-md btn-warning btn-block" name="admin_login">Login</button>
              <button type="button" class="btn btn-md btn-success btn-block" data-dismiss="modal">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br />
      <br />
      <br />
      <div id="footer">
        &copy 2020 WOUF Store| <a style="color: #fff" target="_blank">Design by : Made Rahano</a>
      </div>
      <script src="assets/js/jquery-1.10.2.js"></script>
      <script src="assets/js/bootstrap.js"></script>
      <script src="assets/js/jquery.flexslider.js"></script>
      <script src="assets/js/scrollReveal.js"></script>
      <script src="assets/js/jquery.easing.min.js"></script>
      <script src="assets/js/custom.js"></script>
    </body>

</html>