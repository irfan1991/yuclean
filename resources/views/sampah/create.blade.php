@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Tambah Data</h3>
          @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
        {!! Form::open(['route' => 'sampah.store'])!!}
          @include('sampah._form')
         
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
