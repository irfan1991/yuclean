<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Http\Requests;

class CategoriesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:admin');
    }
public function autocomplate(Request $request)
    {
      
       $data = Kategori::select("title as name")->where("title","LIKE","%{$request->input('query')}%")
           ->get();
        return response()->json($data);
    }

    public function index(Request $request)
    {
        $q = $request->get('q');
        $categories = Kategori::where('title', 'LIKE', '%'.$q.'%')->paginate(10);
        return view('categories.index', compact('categories', 'q'));
    }


    public function create()
    {
       return view('categories.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:categories',
            'parent_id' => 'exists:categories,id'
        ]);

        Kategori::create($request->all());
       \Flash::success($request->get('title') . ' category saved.');
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

       public function edit($id)
    {
         $category = Kategori::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    
    public function update(Request $request, $id)
    {
         $category = Kategori::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:categories,title,' . $category->id,
            'parent_id' => 'exists:categories,id'
        ]);

        $category->update($request->all());
        \Flash::success($request->get('title') . ' category updated.');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
         Kategori::find($id)->delete();
        \Flash::success('Category deleted.');
        return redirect()->route('categories.index');
    }
}
