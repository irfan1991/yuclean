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
        <h3>Edit {{ $sampah->nama }}</h3>

        {!! Form::model($sampah, ['route' => ['sampah.update', $sampah], 'method' =>'put'])!!}
          @include('sampah._form', ['model' => $sampah])

        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
  
@endsection