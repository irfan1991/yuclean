<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transpedia Sistem Manajemen Bank Sampah</title>
    <meta charset="utf-8">
    <meta name="dicoding:email" content="asisten91@gmail.com">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
     <link href="{{ asset('app/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
     <link href="{{ asset('app/bootstrap.css') }} " rel="stylesheet" type="text/css"/>
     <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/camera.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-1.2.1.js')}}"></script>
    <script src="{{asset('js/jquery.equalheights.js')}}"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="{{asset('js/jquery.mobile.customized.min.js')}}"></script>
    <!--<![endif]-->
<script src="{{asset('js/bootstrap-hover-dropdown.js')}}"></script>

    <script src="{{asset('js/camera.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <!--[if lt IE 9]>
       <![endif]-->
</head>
<body >
<div class="page">
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            <a href="{{ url('/') }}">
                                <img src="{{asset('images/logon.png')}}" alt="Logo" style="height: 60px" />
                            </a>
                        </h1>
                    </div>
                    <nav class="nav put-right ">
                        <ul class="sf-menu">
                            <li><a href="{{ url('/') }}">Home</a></li>
                        @role('banksampah')
                               <li> <a href="{{ url('/timbang') }}"> Data Nasabah</a></li>
                        @endrole
                         @role('pengepul')
                        <li><a href="{{ url('/sampahuser') }}">Input Harga Sampah</a></li>  
                         @endrole


                            
                        @role('admin')
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Kelola <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ route('barang.index') }}"><i class="glyphicon glyphicon-gift"></i> Barang Kerajinan</a></li>
                                    <li><a href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-paperclip"></i> Kategori Kerajinan</a></li>
                                    <li><a href="{{ route('event.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Kegiatan</a></li>
                                     <li><a href="{{ route('sampah.index') }}"><i class="glyphicon glyphicon-leaf"></i> Harga Sampah</a></li>                              
                                     <li><a href="{{ route('orders.index') }}"><span class="glyphicon glyphicon-briefcase"></span> Daftar Pesanan</a></li>
                                </ul>
                            </li>
                             @endrole
                               <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Fitur <span class="caret"></span>
                                </a>
                                   <ul class="dropdown-menu" role="menu">
                                   
                         
                                     <li><a href="{{url('catalogs')}}"><i class="glyphicon glyphicon-briefcase"></i> Jual Beli</a></li>
                                    <li><a href="{{url('/event/list')}}"> <i class="glyphicon glyphicon-bullhorn"></i> Kegiatan</a></li>
                             @role('banksampah')
                                      <li><a href="{{ url('listsampahbank') }}"><i class="glyphicon glyphicon-leaf"></i> Harga Sampah</a></li>           
                                    @endrole
                            
                                    @role('nasabah')
                                      <li><a href="{{ url('listsampah') }}"><i class="glyphicon glyphicon-leaf"></i> Harga Sampah</a></li> 
                                      <li class="dropdown-submenu">
                                <a href="#"><i class="glyphicon glyphicon-credit-card"></i> Tarik Dana</a>
                                <ul class="dropdown-menu">
                                 <li><a href="{{url('/tarikdana')}}"> Transfer</a></li>
                                
                                   <li><a href="{{url('/pulsa')}}"> Tukar Pulsa</a></li>
                                    </ul>
                                    </li>

                                 @endrole
                                </ul> 
                                                       
                                        </li>
                             @if (Auth::guest())
                                        
                           
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Daftar <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/renas')}}"><span class="glyphicon glyphicon-user"></span> Sebagai Nasabah</a></li>
                                    <li><a href="{{url('/rebang')}}"><span class="glyphicon glyphicon-user"></span> Sebagai Bank Sampah</a></li>
                                    <li><a href="{{url('/register')}}"><span class="glyphicon glyphicon-user"></span> Sebagai Pengepul</a></li>
                             </ul>  
                              
                            </li>
                                
                            <li><a href="{{ url('/login') }}" >Masuk</a></li>
                            @else
                                            <li class="dropdown">
<a href="#" class="  dropdown-toggle user-profile" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="{{ URL::to('/') }}/images/user/{{ Auth::user()->image }}" alt=""> Halo, 
                  {{ Auth::user()->name }} !<span class="caret"></span>
                </a>
 
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                  <li><a href="{{ url('/settings/password') }}"><span class="glyphicon glyphicon-cog"></span> Ubah Password</a></li>
                  <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
                </ul>
                @endif
                 @include('layouts._customer-feature', ['partial_view'=>'layouts._cart-menu-bar'])
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Lokasi <span class="caret"></span>
                                </a>
                                   <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/lokasi')}}"><span class="glyphicon glyphicon-map-marker"></span> Lihat Lokasi Bank Sampah</a></li>
                                    @role('banksampah')
                                    <li><a href="{{url('/lokasi/add')}}"><span class="glyphicon glyphicon-map-marker"></span>  Tambah Lokasi Bank Sampah</a></li>
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
<div class="camera-wrapper" >
    <div id="camera" class="camera-wrap" >
   
        <div data-src="images/bank sampah.jpg">
            <div class="fadeIn camera_caption">
                <h2 class="text_1 color_1">Menyulap Sampah Menjadi Rupiah</h2>
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
                    Apa Itu Program Bank Sampah??
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="grid_12">
                <div class="box_1">
                    <p class="text_3 color_5">
                         Bank sampah adalah suatu tempat yang digunakan untuk mengumpulkan sampah yang sudah dipilah-pilah hasilnya dan disetorkan kepada pengepul kemudian dijual dalam partai besar ke pabrik untuk diolah kembali. Hasil penjualan sampah dikembalikan pada masyarakat sesuai besaran sampah yang dikumpulkan dan dapat diambil dalam kurun waktu tertentu.
                                              <br/>
                        Dasar hukum bank sampah merupakan realisasi dari UU no 8 Th 2008 yakni tentang pengolahan sampah. 
                       
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg_1 wrap_2 wrap_4">
    <div class="container">
        <div class="row">
            <div class="preffix_2 grid_8">
                <h2 class="header_1 wrap_3 color_3">
                    Lalu Apa Itu Transpedia??
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="grid_12">
                <div class="box_1">
                    <p class="text_3 color_5">
                        Transpedia adalah aplikasi berbasis web dan mobile untuk membantu manajemen bank sampah
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
                 Kelebihan Trashpedia
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
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>