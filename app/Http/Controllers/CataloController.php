<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Http\Requests;
use App\Kategori;

class CataloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if ($request->has('cat')) {
            $cat = $request->get('cat');
            $category = Kategori::findOrFail($cat);
            // we use this to get barang from current category and its child
            $barangs = Barang::whereIn('id', $category->related_barangs_id)
                ->where('name', 'LIKE', '%'.$q.'%');
        } else {
            $barangs = Barang::where('name', 'LIKE', '%'.$q.'%');
        }

        if ($request->has('sort')) {
            $sort = $request->get('sort');
            $order = $request->has('order') ? $request->get('order') : 'asc';
            $field = in_array($sort, ['price', 'name']) ? $request->get('sort') : 'price';
            $barangs = $barangs->orderBy($field, $order);
        }

        $barangs = $barangs->paginate(10);

        return view('catalogs.index', compact('barangs', 'q', 'cat',
            'category', 'sort', 'order'));
    }
    
        public function mobile(Request $request)
    {
        $q = $request->get('q');
        if ($request->has('cat')) {
            $cat = $request->get('cat');
            $category = Kategori::findOrFail($cat);
            // we use this to get barang from current category and its child
            $barangs = Barang::whereIn('id', $category->related_barangs_id)
                ->where('name', 'LIKE', '%'.$q.'%');
        } else {
            $barangs = Barang::where('name', 'LIKE', '%'.$q.'%');
        }

        if ($request->has('sort')) {
            $sort = $request->get('sort');
            $order = $request->has('order') ? $request->get('order') : 'asc';
            $field = in_array($sort, ['price', 'name']) ? $request->get('sort') : 'price';
            $barangs = $barangs->orderBy($field, $order);
        }

        $barangs = $barangs->paginate(10);

        return view('catalogs.catalogmobile', compact('barangs', 'q', 'cat',
            'category', 'sort', 'order'));
    }



}
