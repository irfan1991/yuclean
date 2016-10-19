<style>
	#map-canvas{
		width: 100%;
		height: 60%;
	}
</style>
   <!-- Styles -->
@extends('layouts.apa')

@section('content')

<div class="container">
	<div class="col-sm-12">
		<h1>Tambah Lokasi Bank Sampah</h1>
		{{Form::open(['route' => 'lokasi.tambah','class'=>'formp', 'files' => true])}}
			<div class="form-group">
				<label for="">Nama Bank Sampah</label>
				<input type="text" class="form-control input-sm" name="nama" id="nama">
			</div>
			<div class="form-group">
				<label for="">Deskripsi </label>
				<input type="text" class="form-control input-sm" name="deskripsi" id="deskripsi">
			</div>

			<div class="form-group">
				<label for="" >Kota</label>
				<select class="form-control input-sm" name="city" id="city">
       			@foreach($coba as $kota)
        		<option value="{{$kota->id}}">{{$kota->nama}}</option>
        		@endforeach
				</select>
                </div>
                <div class="form-group">
				<label for="" >Propinsi</label>
				<select class="form-control input-sm" name="district" id="district">
       			
        		<option value=" "> </option>
        		
				</select>
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
	//console.log(position);
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

	});

}

 $('.formp').validate({
                errorElement: 'label', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
                    nama: {
                        required: true
                    },
                                      
                    alamat: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    district: {
                        required: true
                    },
                     propinsi: {
                        required: true
                    },
                     kabupaten: {
                        required: true
                    },
                     kecamatan: {
                        required: true
                    },

                    username: {
                        required: true,
                        number : true,
                        min : 11
                    },

                    password: {
                        
                        maxlength:16,
                        minlength:6,
                        required: true,
                                                   
                    },
                    password_confirmation: {
                        equalTo: "#password"
                    },
                image: {
                        image: true,
                        required: true,
                    },
                    tnc: {
                        required: true
                    }
                },

                     });

	</script>
@endsection