<!DOCTYPE html>
<html lang="en">
<head>
    <title>YuClean Sistem Manajemen Bank Sampah</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
     <link href="{{ asset('app/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
  
     <link href="{{ asset('app/bootstrap.css') }} " rel="stylesheet" type="text/css"/>
     <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/camera.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->

    <script src="js/camera.js"></script>
    <script src="js/owl.carousel.js"></script>
    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
    <![endif]-->
</head>
<body>
<div class="page">
<!--========================================================
                          HEADER
=========================================================-->
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            <a href="{{ url('/') }}">
                                <img src="{{asset('images/logo.png')}}" alt="Logo" style="height: 60px" />
                            </a>
                        </h1>
                    </div>
                    <nav class="nav put-right">
                        <ul class="sf-menu">
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @role('banksampah')
                               <li> <a href="{{ url('/timbang') }}">Timbang</a></li>
                        @endrole
                        @role('banksampah' or 'pengepul')
                               <li> <a href="{{ url('/event') }}">Atur Acara</a></li>
                        @endrole
                        @role('pengepul')
                               <li> <a href="{{ url('/sampah') }}">Atur Harga</a></li>
                        @endrole
                            <li>
                                <a href="#">Fitur</a> 
                                <ul>
                                 @role('pengepul')
                                    <li><a href="{{url('sampah')}}">Harga Sampah</a></li>
                                 @endrole
                                    <li><a href="#">Jual Beli</a></li>
                                    <li><a href="#">Lihat Harga</a></li>
                                    <li><a href="#">Invite Teman</a></li>
                                    <li><a href="{{url('/event/list')}}">Event</a></li>
                                    <li><a href="#">Tarik Dana</a></li>
                                      <li><a href="#">Daftar Bonus</a></li>
                                </ul>
                                
                            </li>

                             @if (Auth::guest())
                                         
                            <li>

                      <a href="#">Daftar</a>
                              <ul>
                                    <li><a href="{{url('/renas')}}">Sebagai Nasabah</a></li>
                                    <li><a href="{{url('/rebang')}}">Sebagai Bank Sampah</a></li>
                                    <li><a href="{{url('/register')}}">Sebagai Pengepul</a></li>
                             </ul>  
                              
                            </li>
                                
                            <li><a href="{{ url('/login') }}" >Login</a></li>
                            @else
                                            <li class="dropdown">
<a href="#" class="  dropdown-toggle user-profile" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="{{ URL::to('/') }}/images/user/{{ Auth::user()->image }}" alt=""> Halo, 
                  {{ Auth::user()->name }} !<span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ url('/settings/password') }}"><i class="fa fa-btn fa-lock"></i> Ubah Password</a></li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>

                @endif
                           <li>

                      <a href="#">Lokasi</a>
                              <ul>
                                    <li><a href="{{url('/lokasi')}}">Lihat Lokasi Bank Sampah</a></li>
                                    @role('banksampah')
                                    <li><a href="{{url('/lokasi/add')}}">Tambah Data Lokasi Bank Sampah</a></li>
                                   @endrole
                             </ul>  
                              
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--========================================================
                          CONTENT
=========================================================-->
<section id="content">
<div class="camera-wrapper">
    <div id="camera" class="camera-wrap">
        <div data-src="images/bank sampah.jpg">
            <div class="fadeIn camera_caption">
                <h2 class="text_1 color_1">Menambah Penghasilan</h2>
                <a class="btn_1" href="{{ url('/pildaf') }}">Daftar</a>
            </div>
        </div>
        <div data-src="images/bank_sampah.jpg">
            <div class="fadeIn camera_caption">
                <h2 class="text_1 color_1">Mengurangi Pencemaran</h2>
                <a class="btn_1" href="{{ url('/login') }}">Login</a>
            </div>
        </div>
        <div data-src="images/banksampah.jpg">
            <div class="fadeIn camera_caption">
                <h2 class="text_1 color_1">Solusi Permasalahan Sampah</h2>
                <a class="btn_1" href="{{ url('/home') }}">Home</a>
            </div>
        </div>
    </div>
</div>

<div class="bg_1 wrap_2 wrap_4">
    <div class="container">
        <div class="row">
            <div class="preffix_2 grid_8">
                <h2 class="header_1 wrap_3 color_3">
                    Apa Itu YuClean??
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="grid_12">
                <div class="box_1">
                    <p class="text_3 color_5">
                        YuClean adalah aplikasi berbasis web dan mobile untuk membantu manajemen bank sampah
                                              <br/>
                        Memudahkan transaksi nasabah
                        Memudahkan mengetahui saldo tabungan dan penarikannya
                        Memudahkan untuk  menjadi bank sampah
                        <br/>
                        <br/>
                        Aplikasi ini adalah aplikasi management bank sampah yang dapat digunakan untuk memudahkan kita
                        menjalankan program bank sampah, mengetahui lokasi bank sampah, mempublikasi kegiatan,
                        dan memasarkan hasil kerajinan bank sampah

                </div>
            </div>
        </div>
    </div>
</div>
        <h2 class="header_1 wrap_3 color_3">
                 Kelebihan YuClean
        </h2>

<div class="container" >
    <div class="row wrap_1 wrap_5" align="center">
        <div class="grid_3">
            <div class="box_1">
                <div class="icon_1"></div>
                <h3 class="text_2 color_2 maxheight1"><a href="#">Meningkatkan Pendapatan</a></h3>
            </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <div class="icon_2"></div>
                <h3 class="text_2 color_2 maxheight1"><a href="#">Meningkatankan Cinta Lingkungan</a></h3>
            </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <div class="icon_3"></div>
                <h3 class="text_2 color_2 maxheight1"><a href="#">Meningkatkan Komunitas</a></h3 >
            </div>
        </div>
        <div class="grid_2">
            <div class="box_1">
                <div class="icon_4"></div>
                <h3 class="text_2 color_2 maxheight1"><a href="#">Kunci Hidup Sehat</a></h3>
            </div>
        </div>
    </div>
</div>
<div class="bg_1 wrap_7 wrap_5">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <h2 class="header_1 wrap_8 color_3">
                   Kegiatan Program Bank Sampah
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="grid_12">
                <div id="owl">
                   <img src="images/mockup.png" alt="mockup"/>
                    <div class="item">
                     <img src="images/mockup1.png" alt="mockup"/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row wrap_9 wrap_4 wrap_10">
        <div class="grid_12">
            <div class="header_1 wrap_3 color_3">
                contacts us
            </div>
            <div class="box_3">
                <ul class="list_1">
                    <li><a class="fa fa-twitter" href="http://twitter.com"></a></li>
                    <li><a class="fa fa-facebook" href="http://facebook.com"></a></li>
                    <li><a class="fa fa-google-plus" href="http://google.com"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<!--=======================================  =================
                          FOOTER
=========================================================-->
<footer id="footer" class="color_9">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <p class="info text_4 color_4">
                    © <span id="copyright-year"></span> | <a href="#">Privacy Policy</a> <br/>
                    Designed by Andara-Tech <a href="andara-Tech.com"></a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="js/script.js"></script>
</body>
</html>