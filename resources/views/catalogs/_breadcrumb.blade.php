<ol class="breadcrumb">
  @if(!is_null($current_category))
    <li>Kategori: <a href="{{ url('/catalogs?cat=' . $current_category->id) }}">{{ $current_category->title }}</a></li>
  @else
    <li>Kategori: Semua Barang</a></li>
  @endif
  <span class="pull-right">Urutkan Harga:
  <button class="btn-primary">
  <a href="{{ appendQueryString(['sort'=>'price', 'order'=>'asc']) }}"
    class="  btn-primary
    {{ isQueryStringEqual(['sort'=>'price', 'order'=>'asc']) ? 'active' : ''}}"
    >Termurah</a></button> |<button class="btn-primary">
  <a href="{{ appendQueryString(['sort'=>'price', 'order'=>'desc']) }}"
    class=" btn-primary
    {{ isQueryStringEqual(['sort'=>'price', 'order'=>'desc']) ? 'active' : ''}}"
    >Termahal</a></button>
</ol>
