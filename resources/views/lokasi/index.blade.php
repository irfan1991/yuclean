@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Data Nasabah </h3>
        {!! Form::open(['url' => 'lokasi', 'method'=>'get', 'class'=>'form-inline pull-right']) !!}
            <div class="form-group ">
            {!! Form::text('q', isset($q) ? $q : null, ['class'=>' typeahead form-control','placeholder' => 'Nama N ..','style'=>'width:300px;', 'id'=>'coba','autocomplete'=>'off'] ) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>

          {!! Form::submit('Search', ['class'=>' btn-primary']) !!}
        {!! Form::close() !!}
 <script type="text/javascript">
    var path = "{{ route('autocomplete2') }}";
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
              <td>Nama</td>
              <td>Alamat</td>
              <td>Saldo</td>
              <td>Aksi</td>
                 </tr>
          </thead>
          @foreach($use as $nasabah)
          <tbody>
                        <tr>
                        <br>
       <td class="thumbnail" width="90px"><img src="{{ URL::to('/') }}/images/user/{{ $nasabah->image }}" alt="foto tidak ada"></td>
              <td>{{$nasabah->name}}</td>
              <td>{{$nasabah->alamat}}</td>
              <td>{{'Rp '.number_format($nasabah->saldo_terakhir,2)}}</td>
              <td>
          {!! Form::model($nasabah, ['route' => ['timbang.destroy', $nasabah], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
          
          <a href="{{ route('timbang.show', $nasabah->id)}}" class=" btn-md btn-primary form-control" >Input Timbangan</a>
               |
              <a href="{{ route('timbang.edit', $nasabah->id)}}" class="btn-mg btn-warning form-control">Edit</a>
                |
                  {!! Form::submit('delete', ['class'=>' btn-lg-xs btn-danger js-submit-confirm']) !!}
                {!! Form::close()!!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <p>{!! $use->render() !!}</p>
      </div>
    </div>
  </div>
@endsection
