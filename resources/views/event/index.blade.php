@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <br>
        <h3>Daftar Acara <small><a href="{{ route('event.create') }}" class=" btn-warning btn-sm">New Data</a></small></h3>
  
        {!! Form::open(['url' => 'event', 'method'=>'get', 'class'=>'form-inline pull-right']) !!}
            <div class="form-group ">
            {!! Form::text('q', isset($q) ? $q : null, ['class'=>' typeahead form-control','placeholder' => 'Nama Acara..','style'=>'width:300px;', 'id'=>'coba','autocomplete'=>'off'] ) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>
        {!! Form::submit('Search', ['class'=>' btn-primary']) !!}
        {!! Form::close() !!}

      <script type="text/javascript">
        var path = "{{ route('autocomplete-acara') }}";
        $('#coba').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
       </script> 
       <br></br>


        <table class="table table-hover">
          <thead>
            <tr>
              <td>Foto</td>
              <td>Nama Acara</td>
              <td>Konten</td>
              <td>Waktu</td>
              <td>Aksi</td>
                 </tr>
          </thead>
          @foreach($event as $acara)
          <tbody>
        <tr>
       <td class="thumbnail" width="90px"><img src="{{ URL::to('/') }}/images/event/{{ $acara->image }}" alt="foto tidak ada"></td>
              <td>{{$acara->judul}}</td>
              <td>{{$acara->konten}}</td>
              <td>{{$acara->tanggal}}</td>
              <td>
          {!! Form::model($acara, ['route' => ['event.destroy', $acara], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
              <a href="{{ route('event.show', $acara->id)}}" style="color:red;font-size:20px">View</a> |
               <a href="{{ route('event.edit', $acara->id)}}">Edit</a> |
          {!! Form::submit('delete', ['class'=>'btn-danger js-submit-confirm']) !!}
          {!! Form::close()!!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <p>{!! $event->render() !!}</p>
      </div>
    </div>
  </div>
@endsection
