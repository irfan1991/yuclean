<?php
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use App\User;
use App\Role;
use App\Sampah;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

/*
|--------------------------------------------------------------------------
| Application Routes
|-------------------------------------------- ------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//buaat registrasi
Route::get( 'pildaf',function (){
return view('pildaf');
} );
Route::get('/renas', 'ReAuthController@index');
Route::post('/renas', 'ReAuthController@postRegister');
Route::get('/rebang', 'RaAuthController@index');
Route::get('/autocompletebang', array('as' => 'autocompletebang' ,'uses'=>'RaAuthController@autocomplate' ));
Route::post('/rebang', 'RaAuthController@postRegister');
Route::get('/register/ajax4-subcat', function(){
$cat_id = Input::get('cat_id4');
$pengepul = User::where('kecamatan','=',$cat_id )
->where('pengepul','=','pengepul-admin')
->get();
return Response::json($pengepul);
});
Route::get('/register/ajax5-subcat', function(){
$cat_id = Input::get('cat_id5');
$rt = Input::get('x');
$rw = Input::get('y');
$pengepul = User::where('rw','=',$rw)
->where('rt','=',$rt)
->where('pengepul','!=','pengepul-admin')
->Where('pengepul','!=',' ')
->get();
return Response::json($pengepul);
});
Route::get('/register/ajax-subcat', function(){
$cat_id = Input::get('cat_id');
$kabupaten = Kabupaten::where('provinsi_id','=',$cat_id)->get();
return Response::json($kabupaten);
});
Route::get('/register/ajax2-subcat', function(){
$cat_id2 = Input::get('cat_id2');
$kecamatan = Kecamatan::where('kabupaten_id','=',$cat_id2)->get();
return Response::json($kecamatan);
});
Route::get('/register/ajax3-subcat', function(){
$cat_id3 = Input::get('cat_id3');
$Kelurahan = Kelurahan::where('kecamatan_id','=',$cat_id3)->get();
return Response::json($Kelurahan);
});

//buat timbangan
Route::resource('timbang', 'NasabahSaldoController');
Route::post('nasabah/transaksi','NasabahSaldoController@tabungan');
Route::get('/autocomplete2', array('as' => 'autocomplete2' ,'uses'=>'NasabahSaldoController@autocomplate' ));
Route::get('/harga/ajax8-subcat', function(){
$cat_id8 = Input::get('cat_id8');
$sampah = Sampah::where('id','=',$cat_id8)->get();
return Response::json($sampah);
});

//Harga Sampah
Route::resource('sampah','SampahController');
Route::get('/autocomplete', array('as' => 'autocomplete' ,'uses'=>'SampahController@autocomplate' ));
Route::get('/harga/ajax9-subcat', function(){
$cat_id9 = Input::get('cat_id9');
$potongan = Sampah::where('id','=',$cat_id9)->get();
return Response::json($potongan);
});

//Event
Route::get('/event/list', array('as' =>'event.list' ,'uses'=>'EventController@listku' ));
Route::get('/event/{event}/show', array('as' =>'event.showup' ,'uses'=>'EventController@showPost' ));
Route::post('event/{event}/comment',  array('as' => 'event.newcom' ,'uses'=>'EventController@newComment') );
View::composer('event.sidebar', function($view){
	$view->recentPosts = App\Event::orderBy('id','desc')->take(6)->get();
	$view->recentComments = App\Comment::orderBy('id','desc')->take(5)->get();
});
Route::resource('event','EventController');
Route::get('/autocomplete-acara', array('as' => 'autocomplete-acara' ,'uses'=>'EventController@autocomplate' ));

//seting password
Route::group(['middleware' => 'auth'], function () {
Route::get('settings/password', 'SettingController@editPassword');
Route::post('settings/password', 'SettingController@updatePassword');
});

//buat profile 
Route::get('/profile/edit/{id}', 'HomeController@edit');
Route::patch('/settings/profile/{id}','HomeController@update');
Route::get('/akses/edit/{id}','HomeController@editHak');
Route::post('/settings/akses/','HomeController@updateHak');

//webservice
Route::group(['prefix' => 'api'], function () {
Route::post('auth/register','AuthApiController@register');
Route::post('auth/login','AuthApiController@login');
Route::get('user', 'APIController@getData');
Route::get('user/profile', 'APIController@profile')->middleware('auth:api');
Route::post('lokasi/search','LokasiController@search');

});

//lokaksi
Route::post('/lokasi/add',array('as' => 'lokasi.tambah' ,'uses'=>'LokasiController@add'));
Route::get('/lokasi/add',array('as' => 'lokasi.hasil' ,'uses'=>'LokasiController@tambah'));
Route::get('/lokasi/atur',array('as' => 'lokasi.index' ,'uses'=>'LokasiController@atur' ));
Route::get('/lokasi','LokasiController@lihat' );
Route::post('/lokasi/{id}',array('as' => 'lokasi.update' ,'uses'=>'LokasiController@update') );
Route::get('/lokasi/{id}/edit',array('as' => 'lokasi.edit' ,'uses'=>'LokasiController@edit') );
Route::get('/lokasi/{id}',array('as' => 'lokasi.hapus' ,'uses'=>'LokasiController@destroy') );

//laporan
Route::get('laporan/pdfnabung/{id}','LaporanController@pdfLaporanNabung');


Route::get('/home', 'HomeController@index');
