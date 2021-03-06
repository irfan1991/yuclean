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
<style>
	#map-canvas{
		width: 100%;
		height: 60%;
	}
</style>
   <!-- Styles -->


	<div class="col-sm-12">
		<h1>Tambah Lokasi Bank Sampah</h1>
		 @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
		{{Form::open(['route' => 'lokasi.tambah','class'=>'formp', 'enctype'=>'multipart/form-data','files' => 'true'])}}
			<div class="form-group">
				<label for="">Nama Bank Sampah</label>
				<input type="text" class="form-control input-sm" name="nama" id="nama">
			</div>
			<div class="form-group">
				<label for="">Deskripsi </label>
	<textarea class = "form-control" rows = "3" name="deskripsi" id="deskripsi"></textarea>
			</div>
			<div class="form-group">
				<label for="">Alamat Lengkap </label>
			<textarea class = "form-control" rows = "3" name="alamat" id="alamat"></textarea>
			</div>
			<div class="form-group">
				<label for="" >Propinsi</label>
				<input type="text" class="form-control input-sm" name="district" id="district">
            </div>
                <div class="form-group">
				<label for="" >Kota</label>
				<input type="text" class="form-control input-sm" name="city" id="city">
            </div>
			<div class="form-group">
				<label for="">Foto Lokasi </label>
		        <input id="image" name="image" class="input-file" type="file">
       			</div>
			<div class="form-group">
				<label for="">Map</label>
				<input type="text" class="form-control input-sm" id="searchmap">
				<br>
				<div id="map-canvas">
					
				</div>
			</div>

			<div class="form-group">
				<label for="">Lat</label>
				<input type="text" class="form-control input-sm" name="lat" id="lat">
			</div>

			<div class="form-group">
				<label for="">Lng</label>
				<input type="text" class="form-control input-sm" name="lng" id="lng">
			</div>
		

			<button class=" btn-sm btn-danger">Save</button>
		{{Form::close()}}
	</div>


<script>
var marker;
geoLocationInit();
function geoLocationInit(){
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(succes,fail);
	} else {
			alert('Browser not supported');
	}
}

function fail(position)
{
	alert('gagal');
}


function succes(position)
{
	var latval = position.coords.latitude;
	var lngval = position.coords.longitude;
	console.log([latval,lngval]);
	var Latlong =  new google.maps.LatLng(latval,lngval);
	createMap(Latlong);
	
}
    
 function createMap(Latlong)
 {


	 var map = new google.maps.Map(document.getElementById("map-canvas"),{
		center: Latlong,
		zoom:15
	});

 	var marker = new google.maps.Marker({
	position:Latlong,
    map: map,
      draggable: true 
		});


 	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

	google.maps.event.addListener(searchBox,'places_changed',function(){

		var places = searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;

		for(i=0; place=places[i];i++){
  			bounds.extend(place.geometry.location);
  			marker.setPosition(place.geometry.location); //set marker position new...
  		}

  		map.fitBounds(bounds);
  		map.setZoom(15);

	});

	google.maps.event.addListener(marker,'position_changed',function(){

		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();

		$('#lat').val(lat);
		$('#lng').val(lng);

	});}
</script>
 <!-- JavaScripts -->
  <script  src="{{ asset('js/jquery.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1Oj-mPl4IwsvLAT2tQakhoI6Es7N5L9c&libraries=places"></script>
  
 <script type="text/javascript">
      $(document).ready(function(){

    $("#district").click(function () {
        var distval=$("#district").val();
        $.post('http://localhost/yuclean/public/api/searchcity',{distval:distval},function(match){
            $("#city").html(match);
        });
    });

});  
     
 </script>
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
     
 <script src="{{ asset('app/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/camera.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.js')}}"></script>
</body>

</html>
