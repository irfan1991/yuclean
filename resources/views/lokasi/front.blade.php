 <style>
  #map{
    width: 100%;
    height: 60%;
  }
</style>
@extends('layouts.apa')

@section('content')
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<h1>Cari Lokasi Bank Sampah</h1>
    @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
 
		<div id="map">
        </div>
        <br>

        {!! Form::open(['url'=>'/api/getlokasi','id'=>'searchLokasi']) !!}
        <div class="form-group {!! $errors->has('parent_id') ? 'has-error' : '' !!}">
        {!! Form::label('district','District',['class'=>' col-sm-1']) !!}
        {!!Form::select('district', $districts,null,['id'=>'district'],['class'=>'form-control']) !!}
        </div>
        <div id="city">
        </div>
        <div class="col-md-6 {!! $errors->has('parent_id') ? 'has-error' : '' !!}">
        {!! Form::submit('Find',['class'=>' btn-success ']) !!}
        </div>
        {!! Form::close() !!}

        <br>
        <h4>Nama Bank Sampah</h4>
        <hr>
        <table class="table table-bordered " id="lokasiResult">
        
          </table>
    </div>
	</div>
</div>


@endsection