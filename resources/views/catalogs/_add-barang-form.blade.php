      <br>
    {!! Form::open(['url' => 'cart', 'method'=>'post', 'class'=>'form-inline']) !!}
      {!! Form::hidden('barang_id', $barang->id) !!}

      <div class="form-group">
        {!! Form::number('quantity', null, ['class'=>'form-control', 'min' => 1, 'placeholder' => 'Jumlah order']) !!}
      </div>

    {!! Form::submit('Tambah ke Keranjang', ['class'=>' btn-primary']) !!}
  {!! Form::close() !!}
</p>
