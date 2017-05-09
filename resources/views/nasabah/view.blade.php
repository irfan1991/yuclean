@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-warning" >
                <div class="panel-heading"  >Timbangan Nasabah Nasabah </div>
                <div class="panel-body">

     <form class="form-horizontal formp" role="form" enctype='multipart/form-data' file="true" style="color:none" >
                    
<h2 style="color:red"  align="center"><b>Data Nasabah </b></h2>
<br>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label" style="color:black">Nama</label>

                            <div class="col-md-6">
<p class="form-control-static">{{$nasabah->name}}</p>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label" style="color:black">No Telepon/Hp</label>
            <div class="col-md-6">
<p class="form-control-static">{{$nasabah->username}}</p>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label" style="color:black">Alamat E-Mail </label>
                            <div class="col-md-6">
<p class="form-control-static">{{$nasabah->email}}</p>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>
                                 
   <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
      <label for="alamat" class="col-md-4 control-label" style="color:black" >Alamat</label>

                            <div class="col-md-6">
<p class="form-control-static">{{$nasabah->alamat}}</p>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('image ') ? ' has-error' : '' }}">
        <label for="image" class="col-md-4 control-label" style="color:black">Foto</label>

                            <div class="col-md-6">
     <img src="{{ asset('images/user/'.$nasabah->image) }}" width="100">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('saldo') ? ' has-error' : '' }}">
      <label for="saldo" class="col-md-4 control-label" style="color:black" >Saldo</label>

                            <div class="col-md-6">
<p class="form-control-static">{{'Rp '.number_format($nasabah->saldo_terakhir,2)}}</p>

                                @if ($errors->has('saldo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('saldo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




</form>

<br>
<hr  align="center">
<h2 style="color:red"  align="center"><b>Masukkan Data Timbangan</b></h2>
<br>

 <form class="form-horizontal formp" role="form" method="POST" action="{{ url('/nasabah/transaksi') }}" enctype='multipart/form-data' file="true" style="color:none" >
                        {{ csrf_field() }}

<div class="form-group{{ $errors->has('sampah') ? ' has-error' : '' }}">
<label for="sampah" class="col-md-4 control-label" style="color:black" >Jenis Sampah</label>

                            <div class="col-md-6">
<select class="form-control input-sm" name="sampah" id="sampah">
       @foreach($sampah as $sam)
        <option value="{{$sam->id}}">{{$sam->nama}}</option>

        @endforeach
</select>
                                @if ($errors->has('sampah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sampah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
<label for="jumlah" class="col-md-4 control-label" style="color:black" >Berat/Jumlah</label>

                            <div class="col-md-6">
<input id="jumlah" type="number" class="form-control " name="jumlah" >
                      @if ($errors->has('berat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenis_sampah') ? ' has-error' : '' }}">
<label for="jenis_sampah" class="col-md-4 control-label" style="color:black" >Satuan</label>
                         <div class="col-md-6">
<select class="form-control input-sm"  name="jenis_sampah" id="jenis_sampah">
               <option value=" "></option>
       </select>
                                @if ($errors->has('jenis_sampah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_sampah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('potongan') ? ' has-error' : '' }}">
<label for="potongan" class="col-md-4 control-label" style="color:black" >Potongan</label>
                         <div class="col-md-6">
<select type="hidden" class="form-control input-sm"  name="potongan" id="potongan">
               <option value=" "></option>
       </select>
                                @if ($errors->has('potongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('potongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
              
                   <input type="hidden" name="user_id" value="{{Auth::user()->name}}"  />
 <input type="hidden" name="jenis_transaksi" value="debet"  />
    <input type="hidden" name="nasabah_id" value="{{$nasabah->id}}"  />
    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn-lg btn-primary">
                                    <i class="glyphicon glyphicon-user"></i> Simpan
                                </button>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<br></br>
            <div class="col-sm-12">

<table class="table table-bordered " >

  <tr><th>Tanggal</th><th>Jenis Transaksi</th><th>Jenis Sampah</th><th>Satuan</th><th>Jumlah</th><th>Harga Satuan</th><th>Saldo</th><th>Operator</th></tr>
  @foreach($satuan as $t)
  <tr><td>{{ tgl_indo($t->created_at)}}</td><td>{{ $t->jenis_transaksi }}</td><td>{{ $t->nama }}</td><td>{{ $t->satuan }}</td><td>{{ $t->jumlah }}</td><td>{{ 'Rp '.number_format($t->harga,2) }}</td><td>{{'Rp '.number_format($t->saldo,2)}}</td><td>{{$t->operator}}</td>
  </tr>
  @endforeach

    </table>

</div>
<a href="{{url('laporan/pdfnabung/'.$nasabah->id)}}" class=" btn-danger btn-lg pull-right"><i class="glyphicon glyphicon-print"></i> PRINT</a>
        </div>
    </div>
</div>
<script type="text/javascript">
  $('#sampah').on('change',function(e){
    console.log(e);
     
     var cat_id8 = e.target.value;


    $.get('{{ url('harga') }}/ajax8-subcat?cat_id8=' + cat_id8 , function(data){
      
$('#jenis_sampah').empty();
    $.each(data, function(index, subcatObj){

$('#jenis_sampah').append('<option value=" '+ subcatObj.harga+'">'+subcatObj.satuan+'</option>');

    });
    });
    });

$('#sampah').on('change',function(e){
    console.log(e);
     
     var cat_id9 = e.target.value;


    $.get('{{ url('harga') }}/ajax9-subcat?cat_id9=' + cat_id9 , function(data){
      
$('#potongan').empty();
    $.each(data, function(index, subcatObj){

$('#potongan').append('<option value=" '+ subcatObj.potongan+'">'+2*subcatObj.potongan+'</option>');

    });
    });
    });


</script>
@endsection