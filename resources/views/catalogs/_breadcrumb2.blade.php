<ol class="breadcrumb" align="center">
  @if(!is_null($current_category))
    <li>Kategori: <a href="{{ url('/catalogs?cat=' . $current_category->id) }}">{{ $current_category->title }}</a></li>
  @else
    <li>Kategori: Semua Barang</a></li>
    </ol>
  @endif
 
  <div  align="center">Urutkan Harga :</div>
  <div align="center">
 
  <a href="{{ appendQueryString(['sort'=>'price', 'order'=>'asc']) }}"
    class="  btn-primary
    {{ isQueryStringEqual(['sort'=>'price', 'order'=>'asc']) ? 'active' : ''}}"
    >Termurah</a> |
  <a href="{{ appendQueryString(['sort'=>'price', 'order'=>'desc']) }}"
    class=" btn-primary
    {{ isQueryStringEqual(['sort'=>'price', 'order'=>'desc']) ? 'active' : ''}}"
    >Termahal</a></div>
