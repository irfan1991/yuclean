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
        <h3>Data Baru</h3>
              {!! Form::open(['route' => 'categories.store'])!!}
          @include('categories._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
