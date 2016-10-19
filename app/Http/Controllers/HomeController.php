<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use Carbon\Carbon;
use App\User;
use Auth;
use App\Role;
use App\Provinsi;
use App\Kabupaten;
use App\Http\Controllers\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

    /**    $v = \DB::table('users')
            ->join('wilayah_provinsis', 'users.propinsi', '=', 'wilayah_provinsis.id')
            ->join('wilayah_kabupatens', 'users.kabupaten', '=', 'wilayah_kabupatens.id')
            ->join('wilayah_kecamatans', 'users.kecamatan', '=', 'wilayah_kecamatans.id')
            ->join('wilayah_kelurahans', 'users.kelurahan', '=', 'wilayah_kelurahans.id')
            ->select('users.*', 'wilayah_kabupatens.nama as kabupaten', 'wilayah_provinsis.nama as propinsi','wilayah_kecamatans.nama as kecamatan', 
                'wilayah_kelurahans.nama as kelurahan')()
            ->get();**/
$user = Auth::user();
$role =   $user->roles->first()->display_name ;// or display_name

$p =$user->kabupaten;
$q =$user->propinsi;      
$r =$user->kecamatan;
$s =$user->kelurahan;
$h = $user->pengepul;
$b = $user->banksampah;
$banksampah = \DB::table('users')->where('banksampah','=',$b);
$v = \DB::table('wilayah_kabupatens')->where('id','=',$p )->get();
$pr = \DB::table('wilayah_provinsis')->where('id','=',$q )->get();
$kc = \DB::table('wilayah_kecamatans')->where('id','=',$r )->get();
$k = \DB::table('wilayah_kelurahans')->where('kecamatan_id','=',$s )->get();
$pengepul = \DB::table('users')->where('id','=',$h )->get();
        $carbon = Carbon::now();
        return view('home', compact('carbon','role','v','kc','k','pr','pengepul','banksampah','user'));
    }


    public function wilayah(Request $request)
    {
        $keyword = $request['kabupaten'];
        $kabupaten         = Kabupaten::where('id','=',$keyword);
                return view('home',compact('kabupaten'));
    }


    public function edit(){
        $user = Auth::user();
        $propinsi = Provinsi::lists('nama', 'id');
        return view('user.edit-profile', compact('user','propinsi '));
    }


 public function update(Request $request,$id)
    {
        //
        
             $user = User::findOrFail($id);
        $this->validate($request, [
        'username' => 'required',
       /// 'photo' => 'mimes:jpeg,png|max:10240',
    //    'email' => 'required|unique:users,email,' . $user->id
        ]);
       $data = $request->only('name', 'email','username','alamat');

      if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
            if ($user->image !== '') $this->deletePhoto($user->image);
        }
$user->update($data);
       /** $user->update($data);**/
        

        \Flash::success($user->name . ' updated.');
        return redirect('/home');
            }
    
protected function savePhoto(UploadedFile $photo)
    {
        $fileName = uniqid().'.'.$photo->getClientOriginalExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images/user';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

    /**
     * Delete given photo
     * @param  string $filename
     * @return bool
     */
    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR .'images/user'. DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }

    public function editHak(){
$coba = Provinsi::all();
$kabu = Kabupaten::all();
        return view('user.edit-akses', compact('coba','kabu'));
    }

    public function updateHak(Request $request){
         $user = Auth::user();
if ($request->get('propinsi') > 0) {
             $user->propinsi  = $request->get('propinsi');
             $user->save();
             }
 if ($request->get('kabupaten') > 0) {
             $user->kabupaten  = $request->get('kabupaten');
             $user->save();
             }
 if ($request->get('kecamatan') > 0) {
             $user->kecamatan = $request->get('kecamatan');
             $user->save();
             }
 if ($request->get('kelurahan') != NULL) {
             $user->kelurahan = $request->get('kelurahan');
             $user->save();
             }
if ($request->get('rt') != NULL) {
             $user->rt = $request->get('rt');
             $user->save();
             }
if ($request->get('rw') != NULL) {
             $user->rw = $request->get('rw');
             $user->save();
             }
if ($request->get('banksampah') != NULL) {
             $user->rt = $request->get('banksampah');
             $user->save();
             }
if ($request->get('pengepul') != NULL) {
             $user->pengepul = $request->get('pengepul');
             $user->save();
             }

        \Flash::success($user->name . ' updated.');
        return redirect('home');

} 



}