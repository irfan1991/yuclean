<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Barang;
use Session;
use App\Support\CartService;
use Flash;
use Auth;
use App\Cart;

class CartController extends Controller
{
    protected $cart;


    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function show()
    {
        return view('cart.index');
    }


    public function lihat()
    {
        return view('cart.lihat');
    }
    public function add(Request $request)
    {

        
        $this->validate($request, [
            'barang_id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $barang = Barang::find($request->get('barang_id'));
        $quantity = $request->get('quantity');
        Session::flash('flash_barang_name', $barang->name);

     if (Auth::check()) {
            $cart = Cart::firstOrCreate([
                'barang_id' => $barang->id,
                'user_id' => $request->user()->id
            ]);
            $cart->quantity += $quantity;
            $cart->save();
            return redirect('cata');
       } else {
            $cart = $request->cookie('cart', []);
            if (array_key_exists($barang->id, $cart)) {
                $quantity += $cart[$barang->id];
            }
            $cart[$barang->id] = $quantity;
            return redirect('cata')
                ->withCookie(cookie()->forever('cart', $cart));
        }
    }






    public function addBarang(Request $request)
    {

    	
        $this->validate($request, [
            'barang_id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $barang = Barang::find($request->get('barang_id'));
        $quantity = $request->get('quantity');
        Session::flash('flash_barang_name', $barang->name);

     if (Auth::check()) {
            $cart = Cart::firstOrCreate([
                'barang_id' => $barang->id,
                'user_id' => $request->user()->id
            ]);
            $cart->quantity += $quantity;
            $cart->save();
            return redirect('catalogs');
       } else {
            $cart = $request->cookie('cart', []);
            if (array_key_exists($barang->id, $cart)) {
                $quantity += $cart[$barang->id];
            }
            $cart[$barang->id] = $quantity;
            return redirect('catalogs')
                ->withCookie(cookie()->forever('cart', $cart));
        }
    }

    public function removeBarang(Request $request, $barang_id)
    {
        $cart = $this->cart->find($barang_id);
        if (!$cart) return redirect('cart');

        Flash::success($cart['detail']['name'] . ' berhasil dihapus dari cart.');

        if (Auth::check()) {
            $cart = Cart::firstOrCreate([
                'barang_id' => $barang_id,
                'user_id' => $request->user()->id
            ]);
            $cart->delete();
            return redirect('cart');
        } else {
            $cart = $request->cookie('cart', []);
            unset($cart[$barang_id]);
            return redirect('cart')
                ->withCookie(cookie()->forever('cart', $cart));
        }

    }

    public function changeQuantity(Request $request, $barang_id)
    {
        $this->validate($request, ['quantity' => 'required|integer|min:1']);
        $quantity = $request->get('quantity');
        $cart = $this->cart->find($barang_id);
        if (!$cart) return redirect('cart');

        \Flash::success('Jumlah order untuk ' . $cart['detail']['name'] . ' berhasil dirubah.');

        if (Auth::check()) {
            $cart = Cart::firstOrCreate(['user_id'=>$request->user()->id, 'barang_id'=>$barang_id]);
            $cart->quantity = $quantity;
            $cart->save();
            return redirect('cart');
        } else {
            $cart = $request->cookie('cart', []);
            $cart[$barang_id] = $quantity;
            return redirect('cart')
                ->withCookie(cookie()->forever('cart', $cart));
        }
    }

}
