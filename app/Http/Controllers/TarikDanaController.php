<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transfer;
use App\Http\Requests;
use App\Tabungan;
use Session;

class TarikDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tarikdana.index');
    }

   
    public function create()
    {
        //
    }

 
    public function store(Request $request, Tabungan $tabungan)
    {
    
         $this->validate($request, [
            'bank' => 'required',
            'jumlah' => 'required',
        ]);

        $jenis = $request->jenis_transaksi;
        $nasabah = User::find($request->user_id);
        $jumlah = $request->jumlah;
        $saldo   = $nasabah->saldo_terakhir;
      
        if($jenis=='debet')
        {
          
              
    
        }else{
            // chek dulu saldonya cukup atau tidak
            if($saldo<$jumlah)
            {
                // redireck dengan pesan bahwa saldo kurang
                $pesan = 'Maaf saldo tidak mencukupi';
            }else{
                // lakukan penurangan saldo
                $newSaldo = ( $saldo-$jumlah);
                //$nasabah->saldo =$jumlahseluruh ;
                $nasabah->saldo_terakhir = $newSaldo;
                //$nasaba->saldo = 
                $nasabah->save();
                 
                $pesan = 'Berhasil Kredit';
                    
              $tabungan->create([
            'saldo'      => $jumlah,
             'jenis_transaksi'   => $jenis,
           //  'jumlah'      => $jumlah,
            'nasabah_id' => $request->user_id,
            'operator' => $request->user_id,
           //  'sampah_id'=> $request->sampah
                                    ]);
                     

            }

        }
         Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>$pesan
        ]);
        return redirect('tarikdana');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
