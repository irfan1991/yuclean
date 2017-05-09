@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Harga Sampah </h3>
  
 
        {!! Form::open(['url' => 'sampah', 'method'=>'get', 'class'=>'form-inline pull-right',]) !!}
            <div class="form-group ">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'typeahead form-control', 'placeholder' => 'Jenis Sampah..','style'=>'width:300px;','autocomplete'=>'off']) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>

          {!! Form::submit('Cari', ['class'=>' btn-primary']) !!}
        {!! Form::close() !!}
        <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
    </script>
        <table class="table table-hover">
          <thead>
            <tr>
              <td>Jenis Sampah</td>
              <td>Satuan</td>
              <td>Harga Asli</td>
              <td>Harga Nasabah</td>
              <td>Insentif Bank Sampah</td>
              <td>Pengepul</td>
              <td>Aksi</td>
                 </tr>
          </thead>
          @foreach($sampah as $sampahs)
          <tbody>
              <tr>
              <td>{{$sampahs->nama }}</td>
              <td>{{$sampahs->satuan}}</td>
              <td><strong>Rp{{ number_format($sampahs->harga , 2) }}</strong></td>
              <td><strong>Rp{{ number_format($sampahs->harga - 2*$sampahs->potongan, 2) }}</strong></td>
              <td><strong>Rp{{ number_format($sampahs->potongan , 2) }}</strong></td>
            
              <td>
                {!! Form::model($sampahs, ['route' => ['sampah.destroy', $sampahs], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                 <a href="{{ route('sampah.edit', $sampahs->id)}}">Edit</a> |
                  {!! Form::submit('delete', ['class'=>'btn-danger js-submit-confirm']) !!}
                {!! Form::close()!!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <small><a href="{{ route('sampah.create') }}" class=" btn-warning btn-sm">Tambah Data</a></small>
        <p>{!! $sampah->render() !!}</p>
      </div>
    </div>
  </div>

@endsection
