@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Harga Sampah </h3>
       
<p>Bank Sampah : {{$a}}</p>
        <table class="table table-hover">
          <thead>
            <tr>
              <td>Jenis Sampah</td>
              <td>Satuan</td>
              <td>Harga Nasabah</td>
                               </tr>
          </thead>
        
          <tbody>
              <tr>
              @foreach($user as $users)
              <td>{{$users->nama }}</td>
              <td>{{$users->satuan}}</td>
                  <td><strong>Rp{{ number_format($users->harga - 2*$users->potongan, 2) }}</strong></td>
            </tr>
           @endforeach
          </tbody>
        </table>
       
      </div>
    </div>
  </div>

@endsection
