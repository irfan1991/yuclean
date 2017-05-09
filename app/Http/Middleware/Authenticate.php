<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Support\CartService;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     */


    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
      
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        
        if ($request->user()->hasRole(['banksampah','nasabah','pengepul'])  ) {
            // merge cart from cookie to db
            // send response while remove cart from cookie
            $cookie = $this->cart->merge();
            return $next($request)->withCookie($cookie);
        } 

        
        return $next($request);
    }
}
