<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeleteController;


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

// Auth::routes(["verify"=>true]);
Route::get('/',[HomeController::class,"index"]);
// Route::get('/', function () {
//     return view('welcome');
// });

if(session()->has("index"))
{
session(['index'=>null]);
}
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[HomeController::class,"redirect"])->middleware(["auth","verified"]);
Route::Post('/delete_data',[DeleteController::class,"delete_data"])->name('delete_data');

Route::Group(["prefix"=>"category"],function(){
Route::get('/view_category',[AdminController::class,"view_category"])->name('view_category');
Route::Post('/add_catagory',[AdminController::class,"add_catagory"])->name('add_catagory');
// Use for delete from any table in database with one Route
});

Route::Group(["prefix"=>"product"],function(){
    Route::get('/view_product',[AdminController::class,"view_product"])->name('view_product');
    Route::post('/add_product',[AdminController::class,"add_product"])->name('add_product');
    Route::get('/show_product',[AdminController::class,"show_product"])->name('show_product');
    Route::post('/update_product',[AdminController::class,"update_product"])->name('update_product');
    Route::get('/product_details/{id}',[HomeController::class,"product_details"])->name('product_details');
});


Route::prefix('cart')->group(function () {
    Route::post('/add_cart',[HomeController::class,"add_cart"])->name('add_cart');
    Route::get('/show_cart',[HomeController::class,"show_cart"])->name('show_cart');
    Route::get('/order_cash',[HomeController::class,"order_cash"])->name('order_cash');

    Route::get('/stripe/{totalprice}',[HomeController::class,"stripe"])->name('stripe_show');
    Route::post('/stripe',[HomeController::class,"stripePost"])->name('stripe.post');

});
Route::get('/order',[AdminController::class,"order"])->name('order_show');
Route::post('/delivered',[AdminController::class,"delivered"])->name('delivered');
Route::get('/print_pdf/{id}',[AdminController::class,"print_pdf"])->name('print_pdf');
Route::get('/send_email/{id}',[AdminController::class,"send_email"])->name('send_email');
Route::post('/send_user_email',[AdminController::class,"send_user_email"])->name('send_user_email');
Route::post('/search_order',[AdminController::class,"search_order"])->name('search_order');
Route::get('/show_body',[AdminController::class,"show_body"])->name('show_body');
Route::get('/show_user_order',[HomeController::class,"show_user_order"])->name('show_user_order');
Route::post('/cancel_order',[HomeController::class,"cancel_order"])->name('cancel_order');
Route::post('/rollback_cancel',[HomeController::class,"rollback_cancel"])->name('rollback_cancel');

Route::post('/add_comment',[HomeController::class,"add_comment"])->name('add_comment');
Route::post('/reply_comment',[HomeController::class,"reply_comment"])->name('reply_comment');

Route::get('/show_comment',[AdminController::class,"show_comment"])->name('show_comment');
Route::get('/shwo_reply_on_comment',[AdminController::class,"shwo_reply_on_comment"])->name('shwo_reply_on_comment');
Route::Post('/delete_comment',[AdminController::class,"delete_comment"])->name('delete_comment');
Route::Post('/update_comment',[AdminController::class,"update_comment"])->name('update_comment');
Route::Post('/update_reply',[AdminController::class,"update_reply"])->name('update_reply');
Route::Post('/delete_reply',[AdminController::class,"delete_reply"])->name('delete_reply');












// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');

