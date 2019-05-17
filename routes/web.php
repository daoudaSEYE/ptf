<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    // return view('home');
// });

Route::get('/a-propos', function () {
    return view('about');
});

Route::get('/nous-contacter', function () {
    return view('contact');
});

Route::get('/vente', function () {
    return view('vente');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
//SERVICE ROUTES
Route::get('/service', 'ServiceController@index');
//A-PROPOS ROUTES
Route::get('/a-propos', 'AboutController@index');
//NOUS-CONTACTER ROUTES
Route::get('/nous-contacter', 'ContactController@index');
//LOCATION ROUTES
Route::get('/location', 'locationController@index');
Route::get('/location/fetch_data', 'locationController@fetch_data');

//VENTE ROUTES
Route::get('/vente', 'venteController@index');
Route::get('/vente/fetch_data', 'venteController@fetch_data');

//ADMIN ROUTES
// Route::resource('admin', 'adminController');
Route::get('admin', 'adminController@create');
Route::get('admin', 'adminController@index');

Route::get('admin/edit/{id}', 'adminController@edit');
Route::get('admin/delete/{id}', 'adminController@destroy');


//ACCEUIL ROUTES
// Route::get('/', 'homeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::resource('/', 'HomeController');
Route::get('/listing', 'listingController@index');
Route::resource('listing', 'listingController');

//OFFRE ROUTES
$URI=$_SERVER["REQUEST_URI"];
$explodeURI1=explode("/", $URI);
$params=$explodeURI1[1];
$explodeURI2=explode("-", $params);
if($explodeURI2[0] === "Ref"){
	// var_dump($explodeURI2[0]);
	Route::get('/{id?}', 'offresController@offre');	
}else{
	Route::get('/{id?}', 'offresController@searchByPlace');
}


//SEARCH ROUTES
// Route::resource('/search', 'searchController');
Route::post('/search', 'searchController@search');
Route::post('admin/store', 'adminController@store');
Route::post('admin/storeCategorie', 'adminController@storeCategorie');
Route::post('admin/storeAddresse', 'adminController@storeAddresse');
Route::get('/upload', function () {
    return view('upload');
});
// Route::get('/upload', 'PictureController');
Route::resource('pictures', 'PictureController', ['only' => ['index', 'store', 'destroy']]);

//OFFRE ROUTES
Route::get('/logout', 'LogoutController@logout');
Auth::routes();