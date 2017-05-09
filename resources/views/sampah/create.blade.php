@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="flash alert-danger">
                         @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif 
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Tambah Data</h3>
          
        {!! Form::open(['route' => 'sampah.store'])!!}
          @include('sampah._form')
         
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
