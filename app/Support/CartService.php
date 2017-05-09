<?php

namespace App\Support;

use App\Barang;
use Illuminate\Http\Request;
use Auth;
use App\Cart;
use Cookie;
use App\Addres;

class CartService {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function lists()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::user()->id)
                ->lists('quantity', 'barang_id');
        } else {
            return $this->request->cookie('cart');
        }
    }

    public function totalBarang()
    {
        return count($this->lists());
    }

    public function isEmpty()
    {
        return $this->totalBarang() < 1;
    }

    public function totalQuantity()
    {
        $total = 0;
        if ($this->totalBarang() > 0) {
            foreach ($this->lists() as $id => $quantity) {
                $barang = Barang::find($id);
                $total += $quantity;
            }
        }
        return $total;
    }

    public function details()
    {
        $result = [];
        if ($this->totalBarang() > 0) {
            foreach ($this->lists() as $id => $quantity) {
                $barang = Barang::find($id);
                array_push($result, [
                    'id' => $id,
                    'detail' => $barang->toArray(),
                    'quantity' => $quantity,
                    'subtotal' => $barang->price * $quantity
                ]);
            }
        }

        return $result;
    }

    public function totalPrice()
    {
        $result = 0;
        foreach ($this->details() as $order) {
            $result += $order['subtotal'];
        }
        return $result;
    }

    public function find($barang_id)
    {
        foreach ($this->details() as $order) {
            if ($order['id'] == $barang_id) return $order;
        }
        return null;
    }

    public function merge()
    {
        $cart_cookie = $this->request->cookie('cart', []);
        foreach ($cart_cookie as $barang_id => $quantity) {
            $cart = Cart::firstOrCreate([
                'user_id' => $this->request->user()->id,
                'barang_id' => $barang_id]);
            $cart->quantity = $cart->quantity > 0 ? $cart->quantity : $quantity;
            $cart->save();
        }

        return Cookie::forget('cart');
    }

    protected function getDestinationId()
    {
        if (Auth::check() && session()->has('checkout.address.address_id')) {
            $address = Addres::find(session('checkout.address.address_id'));
            return $address->regency_id;
        }
        return session('checkout.address.regency_id');
    }

    public function shippingFee()
    {
        $totalFee = 0;
        foreach ($this->lists() as $id => $quantity) {
            $fee = Barang::find($id)->getCostTo($this->getDestinationId()) * $quantity;
            $totalFee += $fee;
        }
        return $totalFee;
    }

    public function clearCartCookie()
    {
        return Cookie::forget('cart');
    }
    
    public function clearCartRecord()
    {
        return Cart::where('user_id', Auth::user()->id)->delete();
    }
}
