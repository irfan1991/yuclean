<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutLoginRequest;
use App\Http\Requests\CheckoutAddressRequest;
use Auth;
use Illuminate\Support\MessageBag;
use App\User;
use App\Addres;
use App\Barang;
use App\Support\CartService;
use App\Order;
use App\OrderDetail;

class CheckoutController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;

      $this->middleware('checkout.have-cart', [
            'only' => ['login', 'postLogin',
                'address', 'postAddress',
                'payment', 'postPayment']
        ]);
        $this->middleware('checkout.login-step-done', [
            'only' => ['address', 'postPayment',
                'payment', 'postPayment']
        ]);
    $this->middleware('checkout.address-step-done', [
            'only' => ['payment', 'postPayment']
        ]);

        $this->middleware('checkout.payment-step-done', [
            'only' => ['success']
        ]);
    
    }



    public function login()
    {
        if (Auth::check()) {
            return redirect('/checkout/address');
        } else {
            return view('checkout.login');
        }
    }


      public function logini()
    {
        if (Auth::check()) {
            return redirect('/checkout/address');
        } else {
            return view('checkout.logini');
        }
    }



    public function postLogin(CheckoutLoginRequest $request)

    {
    	$username = $request->get('username');
       // $email = $request->get('email');
        $password = $request->get('checkout_password');
        $is_guest = $request->get('is_guest') > 0;

        if ($is_guest) {
        return $this->guestCheckout($username);
        }

        return $this->authenticatedCheckout($username, $password);
    }

    public function postLogini(CheckoutLoginRequest $request)

    {
        $username = $request->get('username');
       // $email = $request->get('email');
        $password = $request->get('checkout_password');
        $is_guest = $request->get('is_guest') > 0;

        if ($is_guest) {
        return $this->guestCheckouti($username);
        }

        return $this->authenticatedCheckouti($username, $password);
    }


    protected function guestCheckouti($username)
    {
        // check if user exist, if so, ask login
        if ($user = User::where('username', $username)->first()) {
            if ($user->hasPassword()) {
                $errors = new MessageBag();
                $errors->add('checkout_password', 'No telepon Anda "' . $username . '" sudah terdaftar, silahkan masukan password.');
                // redirect and change is_guest value
                return redirect('checkout/logini')->withErrors($errors)
                    ->withInput(compact('username') + ['is_guest' => 0]);
            }
            // show view to request new password
            session()->flash('username', $username);
            return view('checkout.reset-password');
        }
             // save user data to session
        session(['checkout.username' => $username]);
        return redirect('checkout/addressi');
       // }
       
    }
    protected function guestCheckout($username)
    {
        // check if user exist, if so, ask login
        if ($user = User::where('username', $username)->first()) {
            if ($user->hasPassword()) {
                $errors = new MessageBag();
                $errors->add('checkout_password', 'No telepon Anda "' . $username . '" sudah terdaftar, silahkan masukan password.');
                // redirect and change is_guest value
                return redirect('checkout/login')->withErrors($errors)
                    ->withInput(compact('username') + ['is_guest' => 0]);
            }
            // show view to request new password
            session()->flash('username', $username);
            return view('checkout.reset-password');
        }
             // save user data to session
        session(['checkout.username' => $username]);
        return redirect('checkout/address');
       // }
       
    }

  protected function authenticatedCheckout($username, $password)
    { // login
        if (!Auth::attempt(['username' => $username, 'password' => $password])) { 
            // Authentication failed..
            $errors = new MessageBag();
            $errors->add('username', 'Data user yang dimasukan salah');
            return redirect('checkout/login')
                ->withInput(compact('username', 'password') + ['is_guest' => 0])
                ->withErrors($errors);  
            }
        // logged in, merge cart (destroy cart cookie)
        $deleteCartCookie = $this->cart->merge();
        return redirect('checkout/address')->withCookie($deleteCartCookie);
    }
    protected function authenticatedCheckouti($username, $password)
    { // login
        if (!Auth::attempt(['username' => $username, 'password' => $password])) { 
            // Authentication failed..
            $errors = new MessageBag();
            $errors->add('username', 'Data user yang dimasukan salah');
            return redirect('checkout/logini')
                ->withInput(compact('username', 'password') + ['is_guest' => 0])
                ->withErrors($errors);  
            }
        // logged in, merge cart (destroy cart cookie)
        $deleteCartCookie = $this->cart->merge();
        return redirect('checkout/addressi')->withCookie($deleteCartCookie);
    }


    public function addressi()
    {
        return view('checkout.addressi');
    }
    public function address()
    {
        return view('checkout.address');
    }

    public function postAddress(CheckoutAddressRequest $request)
    {
        if (Auth::check()) return $this->authenticatedAddress($request);
        return $this->guestAddress($request);
    }
      public function postAddressi(CheckoutAddressRequest $request)
    {
        if (Auth::check()) return $this->authenticatedAddressi($request);
        return $this->guestAddressi($request);
    }


    protected function authenticatedAddress(CheckoutAddressRequest $request)
    {
        $address_id = $request->get('address_id');
        // clear old
        session()->forget('checkout.address');
        if ($address_id == 'new-address') {
            $this->saveAddressSession($request);
        } else {
            session(['checkout.address.address_id' => $address_id]);
        }
        return redirect('checkout/payment');
    }
    protected function authenticatedAddressi(CheckoutAddressRequest $request)
    {
        $address_id = $request->get('address_id');
        // clear old
        session()->forget('checkout.address');
        if ($address_id == 'new-address') {
            $this->saveAddressSessioni($request);
        } else {
            session(['checkout.address.address_id' => $address_id]);
        }
        return redirect('checkout/paymenti');
    }


    protected function guestAddress(CheckoutAddressRequest $request)
    {
        $this->saveAddressSession($request);
        return redirect('checkout/payment');
    }
    protected function guestAddressi(CheckoutAddressRequest $request)
    {
        $this->saveAddressSessioni($request);
        return redirect('checkout/paymenti');
    }


    protected function saveAddressSession(CheckoutAddressRequest $request)
    {
        session([
            'checkout.address.name' => $request->get('name'),
            'checkout.address.detail' => $request->get('detail'),
            'checkout.address.province_id' => $request->get('province_id'),
            'checkout.address.regency_id' => $request->get('regency_id'),
           // 'checkout.address.phone' => $request->get('phone')
        ]);
    }
     protected function saveAddressSessioni(CheckoutAddressRequest $request)
    {
        session([
            'checkout.address.name' => $request->get('name'),
            'checkout.address.detail' => $request->get('detail'),
            'checkout.address.province_id' => $request->get('province_id'),
            'checkout.address.regency_id' => $request->get('regency_id'),
           // 'checkout.address.phone' => $request->get('phone')
        ]);
    }


    public function payment()
    {
        return view('checkout.payment');
    }
    public function paymenti()
    {
        return view('checkout.paymenti');
    }


    public function postPayment(Request $request)
    {
        $this->validate($request, [
            'bank_name' => 'required|in:' . implode(',',array_keys(config('bank-accounts'))),
            'sender' => 'required'
        ]);

        session([
            'checkout.payment.bank' => $request->get('bank_name'),
            'checkout.payment.sender' => $request->get('sender')
        ]);

        if (Auth::check()) return $this->authenticatedPayment($request);
        return $this->guestPayment($request);
    }
    public function postPaymenti(Request $request)
    {
        $this->validate($request, [
            'bank_name' => 'required|in:' . implode(',',array_keys(config('bank-accounts'))),
            'sender' => 'required'
        ]);

        session([
            'checkout.payment.bank' => $request->get('bank_name'),
            'checkout.payment.sender' => $request->get('sender')
        ]);

        if (Auth::check()) return $this->authenticatedPaymenti($request);
        return $this->guestPaymenti($request);
    }


    protected function authenticatedPayment(Request $request)
    {
        $user = Auth::user();
        $bank = session('checkout.payment.bank');
        $sender = session('checkout.payment.sender');
        $address = $this->setupAddress($user, session('checkout.address'));
        $order = $this->makeOrder($user->id, $bank, $sender, $address, $this->cart->details());
        // delete session data
        session()->forget('checkout');
        $this->cart->clearCartRecord();
        return redirect('checkout/success')->with(compact('order'));
    }
    protected function authenticatedPaymenti(Request $request)
    {
        $user = Auth::user();
        $bank = session('checkout.payment.bank');
        $sender = session('checkout.payment.sender');
        $address = $this->setupAddress($user, session('checkout.address'));
        $order = $this->makeOrder($user->id, $bank, $sender, $address, $this->cart->details());
        // delete session data
        session()->forget('checkout');
        $this->cart->clearCartRecord();
        return redirect('checkout/successi')->with(compact('order'));
    }

    protected function guestPayment(Request $request)
    {
        // create user account
        $user = $this->setupCustomer(session('checkout.username'), session('checkout.address.name'));

        // create address
        $bank = session('checkout.payment.bank');
        $sender = session('checkout.payment.sender');
        $address = $this->setupAddress($user, session('checkout.address'));

        // create record
        $order = $this->makeOrder($user->id, $bank, $sender, $address, $this->cart->details());

        // delete session dat
        session()->forget('checkout');
        $deleteCartCookie = $this->cart->clearCartCookie();
        return redirect('checkout/success')->with(compact('order'))
            ->withCookie($deleteCartCookie);
    }
    protected function guestPaymenti(Request $request)
    {
        // create user account
        $user = $this->setupCustomeri(session('checkout.username'), session('checkout.address.name'));

        // create address
        $bank = session('checkout.payment.bank');
        $sender = session('checkout.payment.sender');
        $address = $this->setupAddressi($user, session('checkout.address'));

        // create record
        $order = $this->makeOrder($user->id, $bank, $sender, $address, $this->cart->details());

        // delete session dat
        session()->forget('checkout');
        $deleteCartCookie = $this->cart->clearCartCookie();
        return redirect('checkout/successi')->with(compact('order'))
            ->withCookie($deleteCartCookie);
    }



    protected function setupCustomer($username, $name)
    {
        $user = User::create(compact('username', 'name'));
        
        return $user;
    }
     protected function setupCustomeri($username, $name)
    {
        $user = User::create(compact('username', 'name'));
        
        return $user;
    }


    protected function setupAddress(User $customer, $addressSession)
    {
        if (Auth::check() && isset($addressSession['address_id'])) {
            return Addres::find($addressSession['address_id']);
        }

        return Addres::create([
            'user_id' => $customer->id,
            'name' => $addressSession['name'],
            'detail' => $addressSession['detail'],
            'regency_id' => $addressSession['regency_id'],
           
        ]);
    }
    protected function setupAddressi(User $customer, $addressSession)
    {
        if (Auth::check() && isset($addressSession['address_id'])) {
            return Addres::find($addressSession['address_id']);
        }

        return Addres::create([
            'user_id' => $customer->id,
            'name' => $addressSession['name'],
            'detail' => $addressSession['detail'],
            'regency_id' => $addressSession['regency_id'],
           
        ]);
    }


    protected function makeOrder($user_id, $bank, $sender, Addres $address, $cart)
    {
        $status = 'waiting-payment';
        $address_id = $address->id;
        $order = Order::create(compact('user_id', 'address_id', 'bank', 'sender', 'status'));
        foreach ($cart as $barang) {
            OrderDetail::create([
                'order_id' => $order->id,
                'address_id' => $address->id,
                'barang_id' => $barang['id'],
                'quantity' => $barang['quantity'],
                'price' => $barang['detail']['price'],
                'fee' => Barang::find($barang['id'])->getCostTo($address->regency_id)
            ]);
        }

        return Order::find($order->id);
    }
    protected function makeOrderi($user_id, $bank, $sender, Addres $address, $cart)
    {
        $status = 'waiting-payment';
        $address_id = $address->id;
        $order = Order::create(compact('user_id', 'address_id', 'bank', 'sender', 'status'));
        foreach ($cart as $barang) {
            OrderDetail::create([
                'order_id' => $order->id,
                'address_id' => $address->id,
                'barang_id' => $barang['id'],
                'quantity' => $barang['quantity'],
                'price' => $barang['detail']['price'],
                'fee' => Barang::find($barang['id'])->getCostTo($address->regency_id)
            ]);
        }

        return Order::find($order->id);
    }

    public function success()
    {
        return view('checkout.success');
    } 
    public function successi()
    {
        return view('checkout.successi');
    } 
}
