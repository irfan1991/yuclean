@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h6>Kategori</h6>
        {!! Form::open(['url' => 'categories', 'method'=>'get', 'class'=>'form-inline pull-right']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'typeahead form-control','id'=>'coba1','autocomplete'=>'off', 'placeholder' => 'Tipe kategori..']) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>

          {!! Form::submit('Cari', ['class'=>' btn-primary']) !!}
        {!! Form::close() !!}
        <script type="text/javascript">
    var path = "{{ route('autocomplete3') }}";
    $('#coba1').typeahead({
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
              <td>Judul</td>
              <td>Kategori Utama</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{ $category->title }}</td>
              <td>{{ $category->parent ? $category->parent->title : '' }}</td>
              <td>
                {!! Form::model($category, ['route' => ['categories.destroy', $category], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                 <a href="{{ route('categories.edit', $category->id)}}">Edit</a> |
                  {!! Form::submit('Hapus', ['class'=>' btn-xs btn-danger js-submit-confirm']) !!}
                {!! Form::close()!!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
        <small><a href="{{ route('categories.create') }}" class="btn-warning btn-sm"> Data Baru</a></small>
        {{ $categories->appends(compact('q'))->links() }}
      </div>
    </div>
  </div>
@endsection
