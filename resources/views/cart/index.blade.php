@extends('layouts.app')

@section('content')
<div class="container">
  @if ($cart->isEmpty())
    <div class="text-center">
      <h1>:|</h1>
      <p>Keranjang kamu masih kosong.</p>
      <p><a href="{{ url('/catalogs') }}">Lihat Semua Barang <span class=" glyphicon glyphicon-triangle-right"></span></a></p>
    </div>
  @else
    <table class="cart table table-hover table-condensed">
      <thead>
        <tr>
          <th style="width:20%">Barang</th>
          <th style="width:10%">Harga</th>
          <th style="width:3%">Jumlah</th>
          <th style="width:12%" class="text-center">Subtotal</th>
          <th style="width:8%"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart->details() as $order)
        <tr>
          <td data-th="Barang">
            <div class="row">
              <div class="col-sm-4"><img src="{{ $order['detail']['photo_path'] }}" alt="gambar tidak ada" class="img-responsive" style=" width: 50px;height: 50px" /></div>
              <div class="col-sm-10">
                <h4 class="nomargin">{{ $order['detail']['name'] }}</h4>
              </div>
            </div>
          </td>
          <td data-th="Harga">Rp{{ number_format($order['detail']['price']) }}</td>
          <td data-th="Jumlah">
            {!! Form::open(['url' => ['cart', $order['id']], 'method'=>'put', 'class' => 'form-inline' ]) !!}
            {!! Form::number('quantity', $order['quantity'], ['class'=>'form-control text-center']) !!}
          </td>
          <td data-th="Subtotal" class="text-center">Rp{{ number_format($order['subtotal'] ) }}</td>
          <td class="actions" data-th="">
            {!! Form::button('<span class="glyphicon glyphicon-refresh"></span>', array('type' => 'submit', 'class' => 'btn-info ')) !!}
            {!! Form::close() !!}
            
            {!! Form::open(['url' => ['cart', $order['id']], 'method'=>'delete', 'class' => 'form-inline']) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'class' => 'btn-danger btn-sm js-submit-confirm', 'data-confirm-message' => 'Kamu akan menghapus ' . $order['detail']['name'] . ' dari cart.')) !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr class="visible-xs">
          <td class="text-center"><strong>Total Rp{{ number_format($cart->totalPrice()) }}</strong></td>
        </tr>
        <tr>
          <td><a href="{{ url('/catalogs') }}" class=" btn-warning"><span class="glyphicon glyphicon-triangle-left"></span> Belanja lagi</a></td>
          <td colspan="2" class="hidden-xs"></td>
          <td class="hidden-xs text-center"><strong>Total Rp{{ number_format($cart->totalPrice()) }}</strong></td>
          <td><a href="{{ url('/checkout/login') }}" class=" btn-success ">Pembayaran <span class="glyphicon glyphicon-triangle-right"></span></a></td>
        </tr>
      </tfoot>
    </table>
  @endif

</div>
@endsection
