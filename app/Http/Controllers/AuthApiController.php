<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Input;
use App\Transformers\UserTransformer;
use Auth;

class AuthApiController extends Controller
{
    //

    public function register(Request $request,User $user)
	    {
	    	   $this->validate($request, [
	            'name' => 'required|max:255',
	            'password' => 'required|min:6',
	            'username' => 'required|unique:users',
	        ]);

	    	  $user = $user->create([
            'name'      => $request->name,
            'username'     => $request->username,
            'password'  => bcrypt($request->password),
        	 'api_token' => bcrypt($request->username)
      		  ]);
      		  
    $response = fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->addMeta([
                'token' => $user->api_token,
            ])
            ->toArray();
        return response()->json($response, 201);
      
	    }

	public function login( Request $request, User $user)
			{
				if (!Auth::attempt(['username' => $request->username , 'password'=>$request->password])) {
					# code...
					return response()->json(array('error'=>'Your Credential is wrong', 401));
				}

				$user = $user->find(Auth::user()->id);

				return fractal()
	            ->item($user)
	            ->transformWith(new UserTransformer)
	             ->addMeta([
                'token' => $user->api_token,
            ])
	   	        ->toArray();
	        	 //response()->json($response, 201);
	      

			}




}
