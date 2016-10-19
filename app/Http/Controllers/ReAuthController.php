<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Validator;
use Input;
use App\User;
use App\Provinsi;
use App\Kabupaten;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
class ReAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectTo = '/home';
    protected $username = 'username';

 public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }


protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
           'password' => 'required|min:6',
             'email' => 'unique:users',

        ]);
    }

    public function index()
    {
        //
        $coba = Provinsi::all();
        $kabu = Kabupaten::all();
        return view('auth.renas',compact('coba','kabu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
            'kelurahan' => $data['kelurahan'],
            'rw' => $data['rw'],
            'rt' => $data['rt'],
            'banksampah' => $data['banksampah'],
            'image' =>  $fileName,
            'password' => bcrypt($data['password']),
        ]);
$role = Input::get('role');
$memberRole = Role::where('name', $role)->first();
$user->attachRole($memberRole);
return $user;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id   
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Respons e
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
