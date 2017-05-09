<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fee;
use App\User;
use App\Event;
use App\Barang;
use App\Lokasi;
use App\Province;
use App\Regency;
use App\Addres;
use App\OrderDetail;
use App\Tabungan;
use App\TarikDana;

use App\Transformers\AddresstTransformer;
use App\Transformers\OrderDetailTransformer;
use App\Transformers\OrderTransformer;
use App\Transformers\UserTransformer;
use App\Transformers\LokasiTransformer;
use App\Transformers\EventTransformer;
use App\Transformers\SampahTransformer;
use App\Transformers\BarangTransformer;
use App\Transformers\RegencyTransformer;
use App\Transformers\FeesTransformer;
use App\Transformers\ProvinceTransformer;
use App\Transformers\HistoriTransformer;
use App\Transformers\TarikDanaTransformer;

use App\Sampah;
use Input;
use Auth;
use Response;

class APIController extends Controller
{


 public function getAddres(Addres $addres){

        $addres = $addres->all();

        return fractal()
        ->collection($addres)
        ->transformWith(new AddresstTransformer)
        ->toArray();

    }

 public function getOrderDetail(OrderDetail $ortail){

        $ortail = $ortail->all();

        return fractal()
        ->collection($ortail)
        ->transformWith(new OrderDetailTransformer)
        ->toArray();

    }
public function getOrder(Order $order){

        $order = $order->all();

        return fractal()
        ->collection($order)
        ->transformWith(new OrderTransformer)
        ->toArray();

    }


 public function getRegency(Regency $regency){

        $regency = $regency->all();

        return fractal()
        ->collection($regency)
        ->transformWith(new RegencyTransformer)
        ->toArray();

    }

 public function getProvince(Province $province){

        $province = $province->all();

        return fractal()
        ->collection($province)
        ->transformWith(new ProvinceTransformer)
        ->toArray();

    }

   public function getLokasi(Lokasi $lokasi){

        $lokasi = $lokasi->all();

        return fractal()
        ->collection($lokasi)
        ->transformWith(new LokasiTransformer)
        ->toArray();

    }

public function getFee(Fee $fee){

        $fee = $fee->all();

        return fractal()
        ->collection($fee)
        ->transformWith(new FeesTransformer)
        ->toArray();

    }

 public function getBarang(Barang $barang){

        $barang = $barang->all();

        return fractal()
        ->collection($barang)
        ->transformWith(new BarangTransformer)
        ->toArray();

    }

 public function getSampah(Sampah $sampah){

        $sampah = $sampah->all();

        return fractal()
        ->collection($sampah)
        ->transformWith(new SampahTransformer)
        ->toArray();

    }

    public function getEvent(Event $event){

        $events = $event->all();

        return fractal()
        ->collection($events)
        ->transformWith(new EventTransformer)
        ->toArray();

    }

    public function getUser(User $user){

    	$users = $user->all();

    	return fractal()
    	->collection($users)
    	->transformWith(new UserTransformer)
    	->toArray();

    }



public function histori(Request $request, Tabungan $tabungan)
    {
        

        $this->validate($request, [
            'nasabah_id' => 'required',
            
        ]);
//    $tabungan = \DB::table('nabungs')->where('nasabah_id','=',$request->nasabah_id)->get();

    $tabungan = Tabungan::where('nasabah_id',$request->nasabah_id)->get();
      

      return fractal()
        ->collection($tabungan)
        ->transformWith(new HistoriTransformer)
        ->toArray(); 
 return response()->json($response, 201)   ;
        
    }    


    public function tarikdana(Request $request, TarikDana $tarikdana)  {

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
          
            $this->validate($request, [
            'bank' => 'required',
            'jumlah' => 'required',
        ]);

        $jenis = $request->jenis_transaksi;
        $nasabah = User::find($request->user_id);
        $jumlah = $request->jumlah;
        $saldo   = $nasabah->saldo_terakhir;
      
         }else{
            // chek dulu saldonya cukup atau tidak
            if($saldo<$jumlah)
            {
                return Response::json([
                    'error' => [
                        'message' => 'Maaf Saldo tidak cukup'
                    ]
                ], 404);
            }else{
                // lakukan penurangan saldo
                $newSaldo = ( $saldo-$jumlah);
                //$nasabah->saldo =$jumlahseluruh ;
                $nasabah->saldo_terakhir = $newSaldo;
                //$nasaba->saldo = 
                $nasabah->save();
                 
                $pesan = 'Berhasil Kredit';
                    
              $tarikdana->create([
            'user_id' => $request->user_id,
            'bank' => $request->bank,
            'jumlah' => $request->jumlah,
    
                                    ]);

        $response = fractal()
        ->item($tarikdana)
        ->transformWith(new TarikDanaTransformer)
        ->toArray();
        return response()->json($response, 201)   ;

            }

        }


    }

}
