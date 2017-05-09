<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use Validator;
use Input;
use App\User;
use App\Provinsi;
use App\Kabupaten;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Events\UserReferred;
use Cookie;
use Auth;
class MobileRegisterController extends Controller
{
    
       use AuthenticatesAndRegistersUsers, ThrottlesLogins;


   // protected $redirectTo = '/home';
    protected $username = 'username';



    public function index()
    {
        $coba = Provinsi::all();
        $kabu = Kabupaten::all();
        return view('auth.daftar',compact('coba','kabu'));
    }

    public function create(Request $request)
    {

         $post = $request->all();

    $rules = [
         'name' => 'required|max:255',
            'username' => 'required|unique:users',
           'password' => 'required|min:6',
             'email' => 'unique:users',
    ];
    $v = \Validator::make($post, $rules);

   // if($v->fails())
      //  return "fail!";

        $fileName = 'null';
        $destinationPath = public_path('images/user/');
        $extension = Input::file('image')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
         $upload = Input::file('image')->move($destinationPath, $fileName);

       
          $data=[


            'name' => $post['name'],
            'email' => $post['email'],
            'username' => $post['username'],
            'alamat' => $post['alamat'],
            'kelurahan' => $post['kelurahan'],
            'rw' => $post['rw'],
            'rt' => $post['rt'],
            'banksampah' => $post['banksampah'],
            'image' =>  $fileName,
             'affiliate_id' => str_random(10),
            'password' => bcrypt($post['password']),
            'api_token' => bcrypt($post['username'])
        ];

           $user = User::create($data);
            $role = Input::get('role');
            $memberRole = Role::where('name', $role)->first();
            $user->attachRole($memberRole);
           Auth::logout(); //logout please!
            return "account created!";
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
     * @return \Illuminate\Http\Response
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
