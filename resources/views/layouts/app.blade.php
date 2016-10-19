<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yuclean Apikasi Management Bank Sampah</title>

    <!-- Fonts -->
     <link href="{{ asset('app/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
     <link href="{{ asset('app/css.css') }} " rel="stylesheet" type="text/css"/>
 

    <!-- Styles -->
     <link href="{{ asset('app/bootstrap.css') }} " rel="stylesheet" type="text/css"/>
     
     <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/grid.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/camera.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}"/>
   <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     
    <link href="{{ asset('css/home.css') }} " rel="stylesheet" type="text/css"/>
       <link href="{{ asset('css/map.css') }} " rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
   <!-- JavaScripts -->
    <script  src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
<script>
  $(function() {
  $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',
                  changeMonth: true,
                      changeYear: true});
                  });
</script>

 
    <script   src="{{ asset('js/bootstrap3-typeahead.min.js')}}" ></script>
          

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/camera.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.js')}}"></script>
    <script src="{{ asset('js/home.js')}}"></script>
    <script src="{{ asset('app/bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validate.js')}}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.js ')}}"></script>
    <script src="{{ asset('js/jquery.equalheights.js')}}"></script>


    <!--[if (gt IE 9)|                                                      !(IE)]><!-->
    <script src="{{ asset('js/jquery.mobile.customized.min.js ')}}"></script>
   

    <script src="{{ asset('js/jquery.unveil.js') }}"></script>
    <script src="{{ asset('js/jquery.mobilemenu.js') }}"></script>
    <script src="{{ asset('js/jquery.simplr.smoothscroll.min.js') }}"></script>
    <script src="{{ asset('js/superfish.js') }}"></script>
    
    <script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ URL::asset('js/tmstickup.js') }}"></script>
    <script src="{{ asset('js/device.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
 

    
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
   




</body>

</html>
