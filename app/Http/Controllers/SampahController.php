<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sampah;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use Session;
use Auth;
use DB;
class SampahController extends Controller
{
    /**
        *
     * @return \Illuminate\Http\Response

     */

    public function index(Request $request){
   $q = $request->get('q');
        $sampah = Sampah::where('nama', 'LIKE', '%'.$q.'%')->paginate(10);
        return view('sampah.index', compact('sampah', 'q'));
    
}

    public function lihat(Request $request)
    {
        //
      $a=  Auth::user()->banksampah;

$result = DB::table('users')->select('pengepul')->where('banksampah', $a)->first();
 $user = DB::table('sampahs')
            ->join('users', 'sampahs.user_id', '=', 'users.id')
             ->where('users.id','=', (array) $result)
            ->select('sampahs.*')
            ->get();


        return view('sampah.list',compact('user','a'));
    }


    public function lihatbank(Request $request)
    {
        
      $a=  Auth::user()->banksampah;
    $b = Auth::user()->pengepul;
 $user = DB::table('sampahs')
            ->join('users', 'sampahs.user_id', '=', 'users.id')
             ->where('users.id','=',  $b)
            ->select('sampahs.*') 
            ->get();


        return view('sampah.listbank',compact('user','a'));
    }


    public function anyData()
        {
      $sampah = Sampah::select(['id', 'nama', 'satuan', 'harga'])->get();
return Datatables::of($sampah)->make();
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sampah = Sampah::all();
        return view('sampah.create', compact('sampah'));
    }

    public function autocomplate(Request $request)
    {
       $data = Sampah::select("nama as name")->where("nama","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
 public function autocomplate2(Request $request)
    {
       $data = Sampah::select("nama as name")->where("nama","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required']);
        $sampah = Sampah::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $sampah->nama"
        ]);
        return redirect()->route('sampah.index');
    }

    public function createHarga()
    {
        //
        $sampah = Sampah::all();
        return view('sampah.usersampah', compact('sampah'));
    }

public function addUserSampah(Request $request)
    {
        $this->validate($request, ['nama' => 'required']);
        $sampah = Sampah::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $sampah->nama"
        ]);
        return redirect('/sampahuser');

       
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
        $sampah = Sampah::find($id);
        return view('sampah.edit',compact('sampah'));
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
        $sampah = Sampah::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required'
        ]);

        if($sampah->update($request->all()))  {
             \Flash::success( 'Data '.$request->get('nama') . ' updated.');
        return redirect()->route('sampah.index');
        }else{
             \Flash::success( 'Data Tidak Terupdate');
        return redirect()->route('sampah.index');
        }
       
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
        Sampah::find($id)->delete();
        \Flash::success( 'Data '.$request->get('nama') . ' deleted.');
        return redirect()->route('sampah.index');
    }
}
