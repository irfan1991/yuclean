@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Barang <small><a href="{{ route('barang.create') }}" class=" btn-warning btn-sm">New Barang</a></small></h3>

        
        {!! Form::open(['url' => 'barang', 'method'=>'get',  'class'=>'form-inline pull-right']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'typeahead form-control','id'=>'coba2', 'placeholder' => 'Nama Barang...']) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>
        {!! Form::submit('Search', ['class'=>' btn-primary']) !!}
        {!! Form::close() !!}
        <script type="text/javascript">
        var path = "{{ route('autocomplete4') }}";
        $('#coba2').typeahead({
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
             <td>Foto</td>
              <td>Name</td>
              <td>Karya</td>
              <td>Kategori kerajinan  Sampah</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($barang as $barangs)
            <tr>
            <td class="thumbnail" width="90px"><img src="{{ URL::to('/') }}/images/barang/{{ $barangs->photo }}" alt="foto tidak ada"></td>
              <td>{{ $barangs->name }}</td>
              <td>{{ $barangs->model}}</td>
              <td>
                @foreach ($barangs->categories as $category)
                  <span class="label label-primary glyphicon glyphicon-paperclip">
                 </span>
                  {{ $category->title }}</span>
                @endforeach
              </td>
              <td>
                {!! Form::model($barangs, ['route' => ['barang.destroy', $barangs], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                 <a href="{{ route('barang.edit', $barangs->id)}}">Edit</a> |
                  {!! Form::submit('Hapus', ['class'=>' btn-xs btn-danger js-submit-confirm']) !!}
                {!! Form::close()!!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $barang->appends(compact('q'))->links() !!}
      </div>
    </div>
  </div>
@endsection
