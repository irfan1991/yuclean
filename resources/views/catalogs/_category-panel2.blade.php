<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lihat per kategori</h3>
  </div>
  <div class="list-group">
    <a href="{{url('/cata')}}" class="list-group-item">Semua Barang <span class="badge">{{ App\Barang::count() }}</span></a>
    @foreach(App\Kategori::noParent()->get() as $category)
      <a href="{{ url('/cata?cat=' . $category->id)}}" class="list-group-item">{{ $category->title }}
      {!! $category->total_barangs > 0 ? '<span class="badge">' . $category->total_barangs . '</span>' : '' !!}</a>
    @endforeach
  </div>
</div>
