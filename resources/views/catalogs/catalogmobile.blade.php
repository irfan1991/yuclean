<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="dicoding:email" content="asisten91@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no"/>
    <title>Trashpedia Apikasi Management Bank Sampah</title>

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
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
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
<script src="{{asset('js/bootstrap-hover-dropdown.js')}}"></script>

   <script   src="{{ asset('js/bootstrap3-typeahead.min.js')}}" ></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>   
  <script src="{{ asset('js/selectize.min.js')}}"></script>   
   <script src="{{ asset('js/app.js')}}"></script>   
   @if (Session::has('flash_barang_name'))
        @include('catalogs._barang-added2', ['barang_name' => Session::get('flash_barang_name')])
    @endif
   
    <script src="{{ asset('app/bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validate.js')}}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.js ')}}"></script>
    <script src="{{ asset('js/jquery.equalheights.js')}}"></script>
 <script src="{{ asset('js/jquery.mobile.customized.min.js')}}"></script>
 <script src="{{ asset('js/camera.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.js')}}"></script>
    <!--[if (gt IE 9)|                                                  !(IE)]><!-->
      
</head>
<body >
 <style>
    /* use background coloring to contrast the html element from the body element */ 
    html { 
      height: 100%; /* forces page height to equal inner window height. */
      background:white; }
    body {
      background:white;
    }
    body1 { /* change body to body1 or vice versa for quick commenting-out. */
      min-height: 100%;
    }
    body { 
      position: absolute;
      top:0; bottom:0;
      left:0; right:0;
    }
</style>
 
      <div class="col-md-3">
        @include('catalogs._search-panel2', [
          'q' => isset($q) ? $q : null,
          'cat' => isset($cat) ? $cat : ''
        ])

        @include('catalogs._category-panel2')

        @if (isset($category) && $category->hasChild())
          @include('catalogs._sub-category-panel2', ['current_category' => $category])
        @endif

        @if (isset($category) && $category->hasParent())
          @include('catalogs._sub-category-panel2', [
            'current_category' => $category->parent
          ])
        @endif

      </div>
      <div class="col-md-9">
       
          <div class="col-md-12">

            @include('catalogs._breadcrumb2', [
              'current_category' => isset($category) ? $category : null
            ])

            @if ($errors->has('quantity'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ $errors->first('quantity') }}
              </div>
            @endif

          </div>
          <br>
          @forelse ($barangs as $barang)
            <div class="col-md-12">
              @include('catalogs._barangmobile', ['barang' => $barang])
            </div>
          @empty
            <div class="col-md-12 text-center">
              @if (isset($q))
                <h1>:(</h1>
                <p>Barang dengan kata kunci tidak ditemukan.</p>
                @if (isset($category))
                  <p><a href="{{ url('/cata?q=' . $q) }}">Cari di semua kategori <span class="glyphicon glyphicon-chevron-right"></span></a></p>
                @endif
              @else
                <h1>:|</h1>
                <p>Belum ada barang untuk kategori ini.</p>
              @endif
              <p><a href="{{ url('/cata') }}">Lihat semua barang <span class="glyphicon glyphicon-chevron-right"></span></a></p>
            </div>
          @endforelse

          <div class="pull-right">
            {!! $barangs->appends(compact('cat', 'q', 'sort', 'order'))->links() !!}
          </div>
       
      </div>
 


<script src="{{asset('js/jquery.cookie.js')}}"></script>
<script src="{{asset('js/device.min.js')}}"></script>

<script src="{{asset('js/tmstickup.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.ui.totop.js')}}"></script>

<script src="{{asset('js/jquery.unveil.js')}}"></script>
<script src="{{asset('js/jquery.simplr.smoothscroll.min.js')}}"></script>

<script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>

<script src="{{asset('js/jquery.unveil.js')}}"></script>
  <script src="{{ asset('js/home.js')}}"></script>
<script src="{{asset('js/jquery.mobilemenu.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>


</body>
</html>