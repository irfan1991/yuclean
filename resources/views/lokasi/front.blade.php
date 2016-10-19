<style>
	#map{
		width: 100%;
		height: 60%;
	}
</style>
@extends('layouts.apa')

@section('content')

<div class="container">
	<div class="col-sm-12">
		<h1>Add Vendor, Location</h1>
		{{Form::open(array('url'=>'/vendor/add', 'files'=>true))}}
			<div class="form-group">
				<label for="">Title</label>
				<input type="text" class="form-control input-sm" name="title">
			</div>

			<div class="form-group">
				<label for="">Map</label>
				<input type="text" class="form-control input-sm" id="searchmap">
				<br>
				<div id="map">
					
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


@endsection