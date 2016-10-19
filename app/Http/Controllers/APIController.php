<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Transformers\UserTransformer;
use Input;
use Auth;
class APIController extends Controller
{
    /*
function __construct(){
	date_default_timezone_set('Asia/Jakarta');
	$this->data = new data;
}

function insert_data(Request $request)
		{

		$insert['name'] = Input::get('name');
		$insert['username'] = Input::get('username');
		$INSERT['password'] = Input::get('password');

		if ($this->data->ins_data($insert)) {
			# code...
			return response()->json(array('alert'=>'sukses'));
		}else{
			return response()->json(array('alert'=>'gagal'));
		}

		}

*/
    public function getUser(User $user){

    	$users = $user->all();

    	return fractal()
    	->collection($users)
    	->transformWith(new UserTransformer)
    	->toArray();

    }

    public function profile(User $user)
    {
    	$user = $user->find(Auth::user()->id);
    	return fractal()
    	->item($user)
    	->transformWith(new UserTransformer)
    	->toArray();
    }

}
