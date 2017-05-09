<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Http\Requests;
use App\Kategori;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;

class BarangController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $q = $request->get('q');
        $barang = Barang::where('name', 'LIKE', '%'.$q.'%')
            ->orWhere('model', 'LIKE', '%'.$q.'%')
            ->orderBy('name')->paginate(10);
        return view('barang.index', compact('barang', 'q'));
    }

    public function autocomplate(Request $request)
    {
      
       $data = Barang::select("name as name")->where("name","LIKE","%{$request->input('query')}%")
           ->get();
        return response()->json($data);
    }

    public function create()
    {
          return view('barang.create');
    }

    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|unique:barangs',
            'model' => 'required',
            'photo' => 'mimes:jpeg,jpg,PNG,png|max:10240',
            'price' => 'required|numeric|min:1000',
            'weight' => 'required|integer|min:100'
        ]);
        $data = $request->only('name', 'model', 'price', 'weight');

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
        }

        $barang = Barang::create($data);
        $barang->categories()->sync($request->get('category_lists'));

        \Flash::success($barang->name . ' saved.');
        return redirect()->route('barang.index');
    }


public function addUser()
    {
        return view('barang.index2');
    }

     public function addUserBarang(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|unique:barangs',
            'model' => 'required',
            'photo' => 'mimes:jpeg,jpg,PNG,png|max:10240',
            'price' => 'required|numeric|min:1000',
            'weight' => 'required|integer|min:100'
        ]);
        $data = $request->only('name', 'model', 'price', 'weight');

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
        }

        $barang = Barang::create($data);
        $barang->categories()->sync($request->get('category_lists'));

        \Flash::success($barang->name . ' saved.');
        return redirect()->route('barang.user');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $barang =Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    
    public function update(Request $request, $id)
    {
         $barang = Barang::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|unique:barangs,name,'. $barang->id,
            'model' => 'required',
           'photo' => 'mimes:jpeg,png|max:10240',
            'price' => 'required|numeric|min:1000',
            'weight' => 'required|numeric|min:100'
        ]);
        $data = $request->only('name', 'model', 'price', 'weight');

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
            if ($barang->photo !== '') $this->deletePhoto($barang->photo);
        }

        $barang->update($data);
        if (count($request->get('category_lists')) > 0) {
            $barang->categories()->sync($request->get('category_lists'));
        } else {
            // no category set, detach all
            $barang->categories()->detach();
        }

        \Flash::success($barang->name . ' updated.');
        return redirect()->route('barang.index');
    }

    
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if ($barang->photo !== '') $this->deletePhoto($barang->photo);
        $barang->delete();
        \Flash::success('Barang deleted.');
        return redirect()->route('barang.index');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        
        $fileName = $photo->getClientOriginalName();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR.'images/barang';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'images/barang'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }

}
