@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        @include('catalogs._search-panel', [
          'q' => isset($q) ? $q : null,
          'cat' => isset($cat) ? $cat : ''
        ])

        @include('catalogs._category-panel')

        @if (isset($category) && $category->hasChild())
          @include('catalogs._sub-category-panel', ['current_category' => $category])
        @endif

        @if (isset($category) && $category->hasParent())
          @include('catalogs._sub-category-panel', [
            'current_category' => $category->parent
          ])
        @endif

      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">

            @include('catalogs._breadcrumb', [
              'current_category' => isset($category) ? $category : null
            ])

            @if ($errors->has('quantity'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ $errors->first('quantity') }}
              </div>
            @endif

          </div>
          @forelse ($barangs as $barang)
            <div class="col-md-6">
              @include('catalogs._barang-thumbnail', ['barang' => $barang])
            </div>
          @empty
            <div class="col-md-12 text-center">
              @if (isset($q))
                <h1>:(</h1>
                <p>Barang dengan kata kunci tidak ditemukan.</p>
                @if (isset($category))
                  <p><a href="{{ url('/catalogs?q=' . $q) }}">Cari di semua kategori <span class="glyphicon glyphicon-chevron-right"></span></a></p>
                @endif
              @else
                <h1>:|</h1>
                <p>Belum ada barang untuk kategori ini.</p>
              @endif
              <p><a href="{{ url('/catalogs') }}">Lihat semua barang <span class="glyphicon glyphicon-chevron-right"></span></a></p>
            </div>
          @endforelse

          <div class="pull-right">
            {!! $barangs->appends(compact('cat', 'q', 'sort', 'order'))->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
