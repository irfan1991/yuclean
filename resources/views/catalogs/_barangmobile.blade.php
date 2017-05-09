<ol class="breadcrumb" align="center">
<h3 style="color:blue">{{ $barang->name }}</h3>

<div class="thumbnail">
  <img src="{{ $barang->photo_path }}" class="img-rounded" style="width: 300px;height: 300px">
    <p>Karya: {{ $barang->model }}</p>
    <p>Harga: <strong>Rp{{ number_format($barang->price, 2) }}</strong></p>
    <p>Kategori:
      @foreach ($barang->categories as $category)
        <span class="label label-default">
        <i class="fa fa-btn fa-tags"></i>
        {{ $category->title }}</span>
      @endforeach
    </p>

    @include('layouts._customer-feature', ['partial_view'=>'catalogs._add-barang-form2', 'data' => compact('barang')])

</div>
