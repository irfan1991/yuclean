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

        <h3>Perbaharui Data</h3>
  {!! Form::model($barang, ['route' => ['barang.update', $barang], 'method' =>'patch','files' => true])!!}
          @include('barang._form', ['model' => $barang])
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection