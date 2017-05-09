@extends('layouts.app')

@section('content')

<link href='{{asset('css/style2.css')}}' rel='stylesheet' type='text/css'>


<div class="main_bg">
<div class="wrap">  
    <div class="main">
        <h2 class="style top">Tukar Sembako</h2>
        <!-- start grids_of_3 -->
        <div class="grids_of_3">
            <div class="grid1_of_3">
                <a href="details.html">
                    <img src="{{asset('images/sembako/paketA.png')}}" alt=""/>
                    <h3>Paket A</h3>
                    
                        
                    <span class="b_btm"></span>
                </a>
            </div>
          
                    
            <div class="grid1_of_3">
                <a href="details.html">
                    <img src="{{asset('images/sembako/paketB.png')}}" alt=""/>
                    <h3>Paket B</h3>
                    
                    <span class="b_btm"></span>
                </a>
            </div>
            <div class="grid1_of_3">
                <a href="details.html">
                    <img src="{{asset('images/sembako/paketC.png')}}" alt=""/>
                    <h3>Paket C</h3>
                   
                    <span class="b_btm"></span>
                </a>
            </div>
            <div class="clear"></div>
        </div>
        
            
            
            <div class="clear"></div>
        </div>  
        <!-- end grids_of_3 -->
    </div>

 

@endsection

          
            
            

