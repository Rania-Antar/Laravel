<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/hello', function () {
    return redirect('home')->with('message', 'welcome to Laravel course');
});

Route::get('/esprit', function () {
    return 'Bonjour esprit';
});

Route::redirect('/', '/esprit');

Route::view('/R1', 'welcome',['nom'=>'Rania', 'age'=>28]);
/*
Route::get('user/{nom}/{prenom}/{id}/{ville?}',function($nom,$prenom,$id, $ville='Nabeul'){
    return 'Bonjour '.$nom. ' ' .$prenom. ' id : ' .$id.  ' votre ville est : ' .$ville ;
})->where(['nom'=>'[a-Za-z]+', 'prenom'=>'[a-Za-z]+', 'id'=>'[0-9]+']);
*/
Route::resource('photos', PhotoController::class);

Route::resource('test', TestController::class);

Route::get('ind/{nom}', [PhotoController::class , 'index1']);

Route::get('/R4' , function(){
    return response('Créer un cookie',200)
    ->header('Content-Type' , 'text/plain')
->cookie('Esprit', 'Classe 5Twin2', 120);
});

Route::get('/R5' , function() {
    return response()->json([
        'name'=>'Rania',
        'state'=>'Nabeul',
    ]);
});





Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/formations', function () {
    return view('pages.formations');
})->name('formations');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
