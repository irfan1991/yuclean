<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use Validator;
use Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $username = 'username';
   
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
         'email' => 'unique:users',
           'password' => 'required|confirmed|min:6',
            'username' => 'required|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
         


        $fileName = 'null';
        $destinationPath = public_path('images/user/');
        $extension = Input::file('image')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
         $upload = Input::file('image')->move($destinationPath, $fileName);

       
          $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'alamat' => $data['alamat'],
            'propinsi' => $data['propinsi'],
            'kabupaten' => $data['kabupaten'],
            'kecamatan' => $data['kecamatan'],
            'pengepul' => $data['pengepul'],
            'image' =>  $fileName,

            'password' => bcrypt($data['password']),
            'api_token' => bcrypt($data['username'])
        ]);
$role = Input::get('role');
$memberRole = Role::where('name', $role)->first();
$user->attachRole($memberRole);

return $user;

    }


    
}
