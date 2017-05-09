<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="dicoding:email" content="asisten91@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no"/>
    <title>Trashpedia Apikasi Management Bank Sampah</title>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
     <link href="{{ asset('app/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
     <link href="{{ asset('app/css.css') }} " rel="stylesheet" type="text/css"/>
 

    <!-- Styles -->
     <link href="{{ asset('app/bootstrap.css') }} " rel="stylesheet" type="text/css"/>
     
     <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/grid.css')}}">
   
    <link rel="stylesheet" href="{{ asset('css/camera.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}"/>
   <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    
      <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }} " rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
   

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
                               <li> <a href="{{ url('/timbang') }}">Data Nasabah</a></li>
                        @endrole
                         @role('pengepul')
                        <li><a href="{{ url('/sampahuser') }}">Input Harga Sampah</a></li>  
                         @endrole
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Fitur <span class="caret"></span>
                                </a>
                                   <ul class="dropdown-menu" role="menu">
                                    @role('banksampah')
                                   <li><a href="{{url('listsampah')}}"><i class="glyphicon glyphicon-usd"></i>
                                    Harga Sampah</a></li>
                                    @endrole
                                     @role('nasabah')
                                   <li><a href="{{url('listsampah')}}"><i class="glyphicon glyphicon-usd"></i>
                                    Harga Sampah</a></li>
                                    @endrole
                                     <li><a href="{{url('catalogs')}}"><i class="glyphicon glyphicon-briefcase"></i> Jual Beli</a></li>
                                    @role('banksampah')
                                      <li><a href="{{url('baranguser')}}"><i class="glyphicon glyphicon-camera"></i> Jual Barang</a></li>
                                      @endrole
                                   <!-- <li><a href="#">Undang Teman</a></li> -->
                                    <li><a href="{{url('/event/list')}}"> <i class="glyphicon glyphicon-bullhorn"></i> Kegiatan</a></li>
                                     @role('banksampah')
                                     <!--   <li><a href="{{ url('listsampahbank') }}"><i class="glyphicon glyphicon-leaf"></i> Harga Sampah</a></li>  -->          
                                    @endrole
                            
                                    @role('nasabah')
                                                
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
                             @if (Auth::guest())
                                         
                           
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
</div>
</br>
@include('layouts._flash')
    @yield('content')

  <footer id="footer" class="color_9">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <p class="info text_4 color_4">
                    © <span id="copyright-year"></span> | <a href="#">Privacy Policy</a> <br/>
                    Designed by Andara-Tech <a href="{{ asset('andara-tech.com')}}"></a>
                </p>
            </div>
        </div>
    </div>
</footer>
     
  <!-- JavaScripts -->
  <script  src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/map.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1Oj-mPl4IwsvLAT2tQakhoI6Es7N5L9c&libraries=places"></script>
   
  
 <script type="text/javascript">
      $(document).ready(function(){

    $("#district").click(function () {
        var distval=$("#district").val();
        $.post('http://localhost/trashpedia/public/api/searchcity',{distval:distval},function(match){
            $("#city").html(match);
        });
    });

});  
     
 </script>

 <script src="{{ asset('app/bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validate.js')}}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.js ')}}"></script>
    <script src="{{ asset('js/jquery.equalheights.js')}}"></script>
<script src="{{asset('js/jquery.cookie.js')}}"></script>
<script src="{{asset('js/jquery.unveil.js')}}"></script>
<script src="{{asset('js/jquery.mobilemenu.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>
<script src="{{asset('js/jquery.simplr.smoothscroll.min.js')}}"></script>
<script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
<script src="{{asset('js/jquery.ui.totop.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.unveil.js')}}"></script>
<script src="{{asset('js/tmstickup.js')}}"></script>
<script src="{{asset('js/jquery.simplr.smoothscroll.min.js')}}"></script>
<script src="{{asset('js/device.min.js')}}"></script>

    <script src="{{ asset('js/camera.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.js')}}"></script>
</body>

</html>
