@role('banksampah')
  @include($partial_view, isset($data) ? $data : [])
@endrole
@role('pengepul')
  @include($partial_view, isset($data) ? $data : [])
@endrole
@role('nasabah')
  @include($partial_view, isset($data) ? $data : [])
@endrole
  @if (auth()->guest())
    @include($partial_view, isset($data) ? $data : [])
  @endif
