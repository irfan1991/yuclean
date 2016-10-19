<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sampah;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use Session;
use Carbon\Carbon;
use App\User;
use App\Tabungan;
use App\Role;
use App\Provinsi;
use App\Kabupaten;
use App\Http\Controllers\DB;
use Input;

class NasabahSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:banksampah');
    }

    public function index(Request $request)
    {
    $user = Auth::user()->banksampah;
    $q = $request->get('q');
        $sampah = User::where('name', 'LIKE', '%'.$q.'%')
        ->where('banksampah','=',$user)
        ->where('pengepul','=',NULL)
        ->paginate(10);

        $use = User::where('banksampah','=',$user)
           ->where('pengepul','=',NULL)
           ->paginate(5);          
        return view('nasabah.index',compact('use','q'));

    }

     public function autocomplate(Request $request)
    {
        $user = Auth::user()->banksampah;
       $data = User::select("name as name")->where("name","LIKE","%{$request->input('query')}%")
       ->where('banksampah','=',$user)
       ->where('pengepul','=',NULL)
       ->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    $coba = $request->jenis_sampah;
    $sampah = Sampah::all();
    $harga = \DB::table('sampahs')->where('harga','=',$coba)->get();
    
    $nasabah = User::findOrFail($id);
        $nabung= Tabungan::all();
        $satuan = \DB::table('sampahs')
        ->join('nabungs','nabungs.sampah_id','=','sampahs.id')
                   ->select('nabungs.jenis_transaksi','nabungs.created_at','nabungs.saldo','nabungs.jumlah','nabungs.operator','sampahs.nama',
                            'sampahs.harga','sampahs.satuan')
        ->where('nabungs.nasabah_id','=',$id)->get();
        
        return view('nasabah.view',compact('nasabah','user','satuan','sampah','harga'));
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
         $user = User::findOrFail($id);
        return view('nasabah.edit', compact('user'));
    }


   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
             $user = User::findOrFail($id);
        $this->validate($request, [
        'username' => 'required',
       
        ]);
       $data = $request->only('name', 'email','username','alamat');

      if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
            if ($user->image !== '') $this->deletePhoto($user->image);
        }
$user->update($data);
       
        \Flash::success($user->name . ' updated.');
         return redirect()->route('timbang.index');
            }
    
protected function savePhoto(UploadedFile $photo)
    {
        $fileName = uniqid().'.'.$photo->getClientOriginalExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images/user';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

    /**
     * Delete given photo
     * @param  string $filename
     * @return bool
     */
    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR .'images/user'. DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
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
         $user = User::find($id);
        if ($user->image !== '') $this->deletePhoto($user->image);
        $user->delete();
        \Flash::success('Nasabah deleted.');
        return redirect()->route('timbang.index');
    }

    public function tabungan(Request $request, Tabungan $tabungan)
    {
        $jenis = $request->jenis_transaksi;
        $harga = $request->jenis_sampah- 2*$request->potongan;
        $jumlah = $request->jumlah;   
        $nasabah = User::find($request->nasabah_id);
          $saldo   = $nasabah->saldo_terakhir;
        $jumlahseluruh = $harga * $jumlah;
        if($jenis=='debet')
        {
            // tambah saldo
            $newSaldo = ( $saldo+ $jumlahseluruh);
            $nasabah->saldo_terakhir = $newSaldo;
            $nasabah->save();
                
             
            $pesan = 'Berhasil Debet';
             
              $tabungan->create([
            'saldo'      => $jumlahseluruh,
             'jenis_transaksi'   => $jenis,
             'jumlah'      => $jumlah,
            'nasabah_id' => $request->nasabah_id,
            'operator' => $request->user_id,
            'sampah_id'=> $request->sampah
                                    ]);
              
    
        }else{
            // chek dulu saldonya cukup atau tidak
            if($saldo<$jumlahseluruh)
            {
                // redireck dengan pesan bahwa saldo kurang
                $pesan = 'Maaf saldo tidak mencukupi';
            }else{
                // lakukan penurangan saldo
                $newSaldo = ( $saldo-$jumlahseluruh);
                //$nasabah->saldo =$jumlahseluruh ;
                $nasabah->saldo_terakhir = $newSaldo;
                //$nasaba->saldo = 
                $nasabah->save();
                 
                $pesan = 'Berhasil Kredit';
                    
              $tabungan->create([
            'saldo'      => $jumlahseluruh,
             'jenis_transaksi'   => $jenis,
             'jumlah'      => $jumlah,
            'nasabah_id' => $request->nasabah_id,
            'operator' => $request->user_id,
             'sampah_id'=> $request->sampah
                                    ]);
                     

            }

        }
         Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>$pesan
        ]);
        return redirect('timbang/'.$request->nasabah_id);
    }

      



    function contoh()                {
        $transaksi = Tabungan::find(6);
       return  $transaksi->nasabah()->get();
    }

}
