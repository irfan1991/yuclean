var map;
var myLatLng;
var marker;
$(document).ready(function() {
    geoLocationInit();

    function geoLocationInit() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
    }

    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        myLatLng = new google.maps.LatLng(latval, lngval);
        createMap(myLatLng);
        // nearbySearch(myLatLng, "school");
        searchLokasi(latval,lngval);
    }

    function fail() {
        alert("it fails");
    }
    //Create Map
    function createMap(myLatLng) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
    }

function createMarker(latlng, icn, name){
	 marker = new google.maps.Marker({
    position: latlng,
    map: map,
    icon:icn,
    title: name
  });
}


/*function nearSearch(Latlong, type){

		var request = {
		    location: Latlong,
		    radius: '2500',
		    types: [type]
		  };

		service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request, callback);

		function callback(results, status) {
		  if (status == google.maps.places.PlacesServiceStatus.OK) {
		    for (var i = 0; i < results.length; i++) {
		      var place = results[i];
		      latlng = place.geometry.location;
		      icn = 'http://yuclean.andara-tech.com/images/favicon.ico' ;
		      name = place.name;
		      	//console.log([latlng,icn]);
		      createMarker(latlng,icn,name);
		    }
		  }
		}

}*/

function searchLokasi(lat,lng)
{
	$.post('http://localhost/yuclean/public/api/lokasi/search',{lat:lat,lng:lng},function(match){
		//console.log(match);
		$.each(match, function(i, val){
		console.log(val.nama);
		var glatval = val.lat;
		var glngval = val.lng;
		var gname = val.nama;
		var GLatlong =  new google.maps.LatLng(glatval,glngval);
		var gicn =  icn = 'http://localhost/yuclean/public/images/icon.png' ;
		createMarker(GLatlong,gicn,gname);
		
		});

	});

}



});

