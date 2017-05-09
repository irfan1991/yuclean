@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Data Nasabah <small><a href="{{ route('tambang.create') }}" class=" btn-warning btn-sm">Tambah Data</a></small></h3>
        {!! Form::open(['url' => 'tambang', 'method'=>'get', 'class'=>'form-inline pull-right']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Nama Nasabah..']) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>

          {!! Form::submit('Search', ['class'=>' btn-primary']) !!}
        {!! Form::close() !!}
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
       <td class="thumbnail" width="90px"><img src="{{ URL::to('/') }}/images/user/{{ $nasabah->image }}" alt="foto tidak ada"></td$nasabah>
              <td>{{$nasabah->nama}}</td>
              <td>{{$nasabah->alamat}}}</td>
              <td>{{$nasabah->saldo}}}</td>
              <td>
          {!! Form::model($nasabah, ['route' => ['timbangan.destroy', $nasabah], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                 <a href="{{ route('timbangan.edit', $nasabah->id)}}">Edit</a> |
                  {!! Form::submit('delete', ['class'=>'btn-danger js-submit-confirm']) !!}
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
