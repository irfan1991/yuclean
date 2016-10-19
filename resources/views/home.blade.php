@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           
       <br>
<p class=" text-info">Waktu Server : {{$carbon}} </p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{Auth::user()->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
  <img alt="User Pic" src="{{$user->photo_path}}" class="img-circle img-responsive"> 
                </div>
                  <div class=" col-md-9 col-lg-9 "> 
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
                        <td> Rp 500,000</td>
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
                        <td><a href="{{url('Auth::user()->email')}}">{{Auth::user()->email}}</a></td>
                      </tr>
                                              
                      </tr>
                     
                    </tbody>
                  </table>
                  <br>
                  <a href="{{url('/profile/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit</a>
                  @role('banksampah')
                    <a href="{{url('/akses/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit Data Bank Sampah</a>
                  @endrole
                   @role('pengepul')
                    <a href="{{url('/akses/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit Data Pengepul</a>
                  @endrole
                   @role('nasabah')
                    <a href="{{url('/akses/edit',Auth::user()->id)}}" class=" btn-lg btn-primary">Edit Data Nasabah</a>
                  @endrole
                  <a href="{{url('/logout')}}" class="btn-lg btn-primary">Logout</a>

                </div>
                <br>
              </div>
            </div>
                 <div class="panel-footer">
                       
                    </div>
            
          </div>
        </div>
      </div>
    </div>
@endsection
