<?php

use App\Http\Controllers\LoginAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PesanController;

use App\Models\Pesan;
use App\Models\Fasilitaskamar;
use Illuminate\Http\Response;

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

// loop
Route::get('/','TamuController@room')->name('Home');
Route::get('room','TamuController@room')->name('room'); 
Route::get('kamar',[KamarController::class,'kamar'])->name('kamar');
Route::get('fasilitas',[FasilitasController::class,'fasilitas'])->name('fasilitas');
Route::get('fasilitaskamar',[FasilitasKamarController::class,'fasilitaskamar'])->name('fasilitas_kamar');

Route::resource('pesan','PesanController');

// lupa password
// Route::get('admin/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');
// Route::post('admin/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );
//     return $status === Password::RESET_LINK_SENT
//                 ? back()->with(['status' => __($status)])
//                 : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');
// Route::get('/reset-password/{token}', function ($token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');
// Route::post('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);
 
//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function ($user, $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));
 
//             $user->save();
 
//             event(new PasswordReset($user));
//         }
//     );
 
//     return $status === Password::PASSWORD_RESET
//                 ? redirect()->route('login')->with('status', __($status))
//                 : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.update');


Route::get('cetak/{id}', function ($id) {
    $data = Pesan::where('id',$id)->first();
    return view('cetak', ["data" => $data]);
})->name('cetak');

Route::group([
    'prefix'=>config('admin.path'),

], function(){
    Route::get('login','LoginAdminController@formLogin')->name('login');
    Route::post('login','LoginAdminController@login')->middleware('throttle:login');
        Route::get('register','RegisterController@index')->name('register');
        Route::post('register','RegisterController@store')->name('register.store');
        
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::group(['middleware'=>['auth:admin']], function(){
            Route::get('/akun','AdminController@akun')->name('admin.akun');
            Route::put('/akun','AdminController@updateAkun');

            Route::group(['middleware'=>['can:role, "resepsionis","admin"']], function(){
                Route::view('/','dashboard')->name('dashboard');
            });

            Route::group(['middleware'=>['can:role,"resepsionis"']], function(){
                Route::get('reservasi', [PesanController::class,'reservasi'])->name('reservasi');
                Route::get('reservasi-confirm', [PesanController::class,'reservasi_confirm'])->name('reservasi-confirm');
                Route::get('reservasi-reject', [PesanController::class,'reservasi_reject'])->name('reservasi-reject');
                Route::put('reservasi/{id}/out', [PesanController::class,'reject'])->name('reservasi.reject');
                Route::put('reservasi/{id}', [PesanController::class,'confirm'])->name('reservasi.confirm');
                Route::delete('reservasi/{pesan}', [PesanController::class,'destroy'])->name('reservasi.destroy');
            }); 

            Route::group(['middleware'=>['can:role, "admin"']], function(){
                Route::resource('admin','AdminController');
                Route::resource('kamar','KamarController');
                Route::resource('fasilitas','FasilitasController');
                Route::resource('fasilitaskamar','FasilitasKamarController');
            });
                
        }); 
        
});


