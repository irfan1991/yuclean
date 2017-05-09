@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">Transfer</div>
          <div class="panel-body">
          @if ($errors->any())
<div class="flash alert-danger">
                         @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif 
            @include('tarikdana._form')
          </div>
      </div>
    </div>
    <div class="col-md-12">
       </div>
  </div>
</div>
@endsection
