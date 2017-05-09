<?php
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use App\User;
use App\Role;
use App\Sampah;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Auth;


//buat registrasi
Route::get( 'pildaf',function (){
return view('pildaf');
} );
Route::get( 'cremobjul',function (){
return view('barang.create2');
} );
Route::get( 'cremoblok',function (){
return view('lokasi.addd');
} );
Route::get('/renas', 'ReAuthController@index');
Route::post('/renas', 'ReAuthController@postRegister');
Route::get('/daftar', 'MobileRegisterController@index');
Route::post('/daftar', 'MobileRegisterController@create');
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
Route::get('/listsampah','SampahController@lihat');
Route::get('/listsampahbank','SampahController@lihatbank');
Route::get('/sampahuser','SampahController@createHarga');
Route::post('/sampahsimpan','SampahController@addUserSampah');


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
Route::get('user', 'APIController@getUser');
Route::get('event', 'APIController@getEvent');
Route::get('sampah', 'APIController@getSampah');
Route::post('user/profile', 'AuthApiController@profile');
Route::get('/getbarang', 'APIController@getBarang');
Route::get('/getprovin', 'APIController@getProvince');
Route::get('/getregency', 'APIController@getRegency');
Route::get('/getaddres', 'APIController@getAddres');
Route::get('/getorderdetail', 'APIController@getOrderDetail');
Route::get('/getorder', 'APIController@getOrder');
Route::get('/getfee', 'APIController@getFee');
Route::get('/getlokasi', 'APIController@getLokasi');
Route::post('lokasi/search','LokasiController@search');
Route::post('searchcity','LokasiController@searchCity');
Route::post('histori','APIController@histori');
Route::post('tarikdana','APIController@tarikdana');

Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

//Tarik Dana 
Route::resource('tarikdana', 'TarikDanaController');
Route::get( 'pulsa',function (){
return view('tarikdana.pulsa');
} );
Route::get( 'sembako',function (){
return view('tarikdana.sembako');
} );

//lokasi
Route::post('/lokasi/add',array('as' => 'lokasi.tambah' ,'uses'=>'LokasiController@add'));
Route::get('/lokasi/add',array('as' => 'lokasi.hasil' ,'uses'=>'LokasiController@tambah'));
Route::get('/lokasi/atur',array('as' => 'lokasi.index' ,'uses'=>'LokasiController@atur' ));
Route::get('/lokasi','LokasiController@lihat' );
Route::post('/lokasi/{id}',array('as' => 'lokasi.update' ,'uses'=>'LokasiController@update'));
Route::get('/lokasi/{id}/edit',array('as' => 'lokasi.edit' ,'uses'=>'LokasiController@edit'));
Route::get('/lokasi/{id}',array('as' => 'lokasi.hapus' ,'uses'=>'LokasiController@destroy') );
Route::post('api/getlokasi','LokasiController@locationCoords');

//laporan
Route::get('laporan/pdfnabung/{id}','LaporanController@pdfLaporanNabung');

//Kategori
Route::group(['middleware' => 'web'], function () {Route::resource('categories', 'CategoriesController');});
Route::get('/autocomplete3', array('as' => 'autocomplete3','uses'=>'CategoriesController@autocomplate' ));

//Barang 
Route::resource('barang','BarangController');
Route::get('baranguser',array('as' => 'barang.user' ,'uses'=>'BarangController@addUser'));
Route::post('baranguser','BarangController@addUserBarang');

Route::get('/autocomplete4', array('as' => 'autocomplete4','uses'=>'BarangController@autocomplate' ));

//Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'CataloController@index');
    Route::get('/catalogs', 'CataloController@index');
    Route::get('/cata', 'CataloController@mobile');
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/home/orders', 'HomeController@viewOrders');
    Route::resource('categories', 'CategoriesController');
     Route::resource('orders', 'OrdersController', ['only' => [
        'index', 'edit', 'update'
    ]]);

    Route::post('cart', 'CartController@addBarang');
      Route::post('carti', 'CartController@add');
    Route::get('cart', 'CartController@show');
    Route::get('carti', 'CartController@lihat');
    Route::delete('cart/{product_id}', 'CartController@removeBarang');
    Route::put('cart/{product_id}', 'CartController@changeQuantity');

       
    Route::get('checkout/login', 'CheckoutController@login');
    Route::post('checkout/login', 'CheckoutController@postLogin');
    Route::get('checkout/address', 'CheckoutController@address');
    Route::post('checkout/address', 'CheckoutController@postAddress');
    Route::get('checkout/payment', 'CheckoutController@payment');
    Route::post('checkout/payment', 'CheckoutController@postPayment');
    Route::get('checkout/success', 'CheckoutController@success');

    Route::get('checkout/logini', 'CheckoutController@logini');
    Route::post('checkout/logini', 'CheckoutController@postLogini');
    Route::get('checkout/addressi', 'CheckoutController@addressi');
    Route::post('checkout/addressi', 'CheckoutController@postAddressi');
    Route::get('checkout/paymenti', 'CheckoutController@paymenti');
    Route::post('checkout/paymenti', 'CheckoutController@postPaymenti');
    Route::get('checkout/successi', 'CheckoutController@successi');






Route::group(['middleware' => 'api'], function () {
    Route::get('address/regencies', 'AddressController@regencies');
});

Route::auth();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/editprofile', function () {
     return view('edit');
 });

Route::get('/home', 'HomeController@index');

