@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
     
<p class=" text-info">Waktu Server : {{$carbon}} </p>
   
        <div class="col-xs-12 col-sm-12 " >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{Auth::user()->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3  " align="center"> 
  <img alt="User Pic" src="{{$user->photo_path}}" class="img-circle img-responsive" style="width: 150px;height: 150px"> 
                </div>
                  <div class=" col-md-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Peran:</td>
                        <td>{{$role}}</td>
                      </tr>
                      <tr>
                       <tr>
                        <td>Nama:</td>
                        <td>{{Auth::user()->name}}</td>
                      </tr>
                      
                      <tr>
                        <td>Alamat:</td>
                        <td>{{Auth::user()->alamat}}</td>
                      </tr>
                      <tr>
                        <td>No.Telp:</td>
                        <td>{{Auth::user()->username}}</td>
                      </tr>
                                                 <tr>
                       @foreach($pr as $p)
                        <td>Propinsi : </td>
                        <td>{{$p->nama}}</td>
                       @endforeach
                      </tr>
                        <tr>
                       @foreach($v as $p)
                        <td>Kabupaten : </td>
                        <td>{{$p->nama}}</td>
                       @endforeach
                      </tr>
                      <tr>
                       @foreach($kc as $p)
                        <td>Kecamatan : </td>
                        <td>{{$p->nama}}</td>
                       @endforeach
                      </tr>

                          @role('nasabah')
                             <tr>
                        <td>Saldo:</td>
                        <td>{{Auth::user()->saldo_terakhir}}</td>
                      </tr>
                      
                        <tr>
                        <td>Bank Sampah:</td>
                        <td>{{Auth::user()->banksampah}}</td>
                      </tr>
                        <tr>
                        <td>Lokasi di </td>
                        </tr>
                          <tr>
                      
                        <td>Kelurahan : </td>
                        <td>{{Auth::user()->kelurahan}}</td>
                       
                      </tr>
                      <tr>
                        <td>RW : </td>
                        <td>{{Auth::user()->rw}}</td>
                         </tr>
                      <tr>
                        <td>Rt : </td>
                        <td>{{Auth::user()->rt}}</td>
                        </tr>
                      @endrole

                      @role('banksampah')
                        <tr>
                        <td>Bank Sampah:</td>
                        <td>{{Auth::user()->banksampah}}</td>
                                                </tr>
                        <tr>
                        <td>Penggepul:</td>
                        @foreach($pengepul as $p)
                        <td>{{$p->name}}</td>
                        @endforeach
                      </tr>
                        <tr>
                        <td>Lokasi di </td>
                        </tr>
                        <tr>
                       @foreach($pr as $p)
                        <td>Propinsi : </td>
                        <td>{{$p->nama}}</td>
                       @endforeach
                      </tr>
                        <tr>
                       @foreach($v as $p)
                        <td>Kabupaten : </td>
                        <td>{{$p->nama}}</td>
                       @endforeach
                      </tr>
                      <tr>
                       @foreach($kc as $p)
                        <td>Kecamatan : </td>
                        <td>{{$p->nama}}</td>
                       @endforeach
                      </tr>
                      <tr>
                         <td>Kelurahan : </td>
                        <td>{{Auth::user()->kelurahan}}</td>
                                       </tr>
                      <tr>
                        <td>RW : </td>
                        <td>{{Auth::user()->rw}}</td>
                         </tr>
                      <tr>
                        <td>Rt : </td>
                        <td>{{Auth::user()->rt}}</td>
                        </tr>
                      @endrole
                      <tr>
                        <td>Email:</td>
                        <td>{{Auth::user()->email}}</td>
                       
                      </tr>
                                              
                      </tr>
                       
                    </tbody>
                  </table>
                  @role('nasabah')
                      @forelse(Auth::user()->getReferrals() as $referral)
    <h4>
        {{ $referral->program->name }}
    </h4>
    <code>
        {{ $referral->link }}
    </code>
    <p>
        Jumlah Point referral System: {{ $referral->relationships()->count() }}
    </p>
@empty
    No referrals

@endforelse 
@endrole
                     
                  <br>
                  <a href="{{url('/profile/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit</a>
                  @role('banksampah')
                    <a href="{{url('/akses/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit Alamat</a>
                  @endrole
                   @role('pengepul')
                    <a href="{{url('/akses/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit Alamat</a>
                  @endrole
                   @role('nasabah')
                    <a href="{{url('/akses/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit Alamat</a>
                  @endrole
                  <a href="{{url('/logout')}}" class="btn-lg btn-primary">Keluar</a>

                </div>
                <br>
              </div>
            </div>
                
          
          </div>
        </div>
      </div>
    </div>
@endsection
