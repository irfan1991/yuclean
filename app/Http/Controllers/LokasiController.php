<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;


class LokasiController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
public function search(Request $request)
	{
	$lat = $request->lat;
	$lng = $request->lng;
	$lokasi = Lokasi::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
	return $lokasi;	
	}

      public function locationCoords(Request $request)
    {
        $cityval=$request->cityval;
        $distval=$request->distval;
        $col=Lokasi::where('district',$distval)->where('city',$cityval)->first();

        $lat=$col->lat;
        $lng=$col->lng;


        return [$lat,$lng];
    }

public function lihat()
    {
         $districts=Lokasi::pluck('district','district');
        $lokasi = Lokasi::orderBy('id','desc')->paginate(5);
        return view('lokasi.front', compact('lokasi','districts'));
    }

public function tambah(Request $request)
    {
        $q = $request->get('q');
        $lokasi = Lokasi::where('nama', 'LIKE', '%'.$q.'%')
            ->orderBy('nama')->paginate(5);
      

        return view('lokasi.add', compact('lokasi', 'q'));
    } 

    public function atur(Request $request)
    {
        $q = $request->get('q');
        $lokasi = Lokasi::where('nama', 'LIKE', '%'.$q.'%')
            ->orderBy('nama')->paginate(5);
        return view('lokasi.index', compact('lokasi', 'q'));
    } 
    
     public function searchCity(Request $request)
    {
        $distval=$request->distval;
        $matchedCities=Lokasi::where('district',$distval)->pluck('city','city');

        return view('lokasi.ajaxresult',compact('matchedCities'));
    }

	public function add(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'district' => 'required',
           
                 ]);
        $data = $request->only('nama', 'deskripsi','alamat','district','city','lat', 'lng');

        if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
        }

        $lokasi = Lokasi::create($data);
       
        \Flash::success('Lokasi Bank Sampah  '.$lokasi->nama . ' saved.');
        return redirect()->route('lokasi.hasil');
    }

     public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('lokasi.edit', compact('lokasi'));
    }

   
    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::findOrFail($id);
         $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'district' => 'district',
            'city' => 'city',
              'lat' => 'lat',
            'lng' => 'lng',
                 ]);
        $data = $request->only('nama', 'deskripsi','district','alamat','city','lat', 'lng');

        if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
            if ($lokasi->image !== '') $this->deletePhoto($lokasi->image);
        }

        $lokasi->update($data);
        
        \Flash::success('Lokasi Bank Sampah'.$lokasi->nama . ' updated.');
        return redirect()->route('lokasi.index');
    }
   
    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);
        if ($lokasi->image !== '') $this->deletePhoto($lokasi->image);
        $lokasi->delete();
        \Flash::success('Lokasi deleted.');
        return redirect()->route('lokasi.index');
    }

    
    protected function savePhoto(UploadedFile $photo)
    {
       $fileName = uniqid().'.'.$photo->getClientOriginalExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images/lokasi';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
   
    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'images/lokasi'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }

}
