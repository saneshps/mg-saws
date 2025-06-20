<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DatasheetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\MetaController;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
//File::link(storage_path('app/public'), public_path('storage'));

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

/***************** ADMIN *********************************************** */
// admin section

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// product Section



Route::resource('products', ProductController::class);

//Show product with slug
Route::get('/product/{slug}', [ProductController::class, 'viewProductUsingSlug'])->name('viewProductUsingSlug');

// image section

Route::resource('images', ImageController::class);

Route::get('images/create/{id}', [ImageController::class, 'create']);

Route::post('images/store/{id}', [ImageController::class, 'store']);

//Remove Image
Route::get('/removeImage/{id}', [ImageController::class, 'removeImage'])->name('removeImage');

// graph section

Route::resource('graphs', GraphController::class);

Route::get('graphs/create/{id}', [GraphController::class, 'create']);

Route::post('graphs/store/{id}', [GraphController::class, 'store']);

//Remove Graph
Route::get('/removeGraph/{id}', [GraphController::class, 'removeGraph'])->name('removeGraph');


// video section

Route::resource('pdf', VideoController::class);

Route::get('pdf/create/{id}', [VideoController::class, 'create']);

Route::post('pdf/store/{id}', [VideoController::class, 'store']);
Route::post('pdf/destroy/{id}', [VideoController::class, 'destroy']);

// category section

Route::resource('category', CategoryController::class);

//Datasheet Section
Route::resource('datasheet', DatasheetController::class);

//Delete Datasheet
Route::get('/removeDatasheet/{id}', [DatasheetController::class, 'removeDatasheet'])->name('removeDatasheet');
Route::any('category/create', [CategoryController::class, 'create'])->name('create');
Auth::routes();

// events

Route::resource('events', EventController::class);
Route::resource('meta', MetaController::class);


/**************************** FRONTEND *********************************/
//contact

Route::get('/contact-us',  [SendEmailController::class, 'index'])->name('contact-us.index');
Route::post('/contact-us', [SendEmailController::class, 'send'])->name('contact-us.send');
Route::post('/sendinterest', [SendEmailController::class, 'sendExpressInterest'])->name('interest.send');
Route::post('/sendcallback', [SendEmailController::class, 'sendCallBack'])->name('callBack.send');
// Route::get('/news-details', function () {
//     return view('frontend.news-details');
// });

// Route::get('/p', function () {
//     return view('frontend.products');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/contact-us', function () {
//     return view('frontend.contact');
// });


// Route::get('/', function () {
//     return view('auth.login');
// });

// view - frontend

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/about-us', function () {
    return view('frontend.about');
});
Route::get('all-products', [ViewController::class, 'index'])->name('all-products');
Route::get('all-products/sub/{slug}', [ViewController::class, 'sub'])->name('sub');
Route::get('all-products/cat-sub/{slug}', [ViewController::class, 'sub'])->name('cat-sub');
Route::get('show-product/{slug}', [ViewController::class, 'show'])->name('show-product');
Route::get('search/{slug}', [ViewController::class, 'search'])->name('search');


Route::get('blogs', [ViewController::class, 'events']);
Route::get('news-details/{slug}', [ViewController::class, 'eventshow'])->name('blogs');

Route::get('/gallery', [ViewController::class, 'gallery']);

Route::get('welcome', [ViewController::class, 'list']);
Route::get('/', [ViewController::class, 'home']);

Route::get('/faq', function () {
    return view('frontend.faq');
});
Route::get('/privacy-policy', function () {
    return view('frontend.privacy-policy');
});
Route::get('/terms-and-conditions', function () {
    return view('frontend.terms-and-conditions');
});
Route::get('/thank-you',  [ViewController::class, 'thanks'])->name('thankyou');

Route::post('load', [ViewController::class, 'searchajaxload'])->name('load');

/******************************** Redirect ************************************/

Route::get('products/sub/50', function () {
    return redirect()->route('sub', 'assembly-tables');
});
Route::get('products/sub/37', function () {
    return redirect()->route('sub', 'punching-machine');
});
Route::get('products/sub/30', function () {
    return redirect()->route('sub', 'single-blade-saw');
});
Route::get('products/sub/39', function () {
    return redirect()->route('sub', 'positioning-rollers');
});
Route::get('products/sub/51', function () {
    return redirect()->route('sub', 'profile-trolleys');
});
Route::get('products/sub/36', function () {
    return redirect()->route('all-products');
});
Route::get('show-product/mini-rafre-sa-aluminiumpvc-corner-milling-machine', function () {
    return redirect()->route('sub','corner-milling');
});
Route::get('show-product/rafre-cr-m-aluminium-pvc-manual-corner-milling-machine', function () {
    return redirect()->route('sub','corner-milling');
});

Route::get('/historia', function () {
    return view('frontend.about');
});

Route::get('https://www.mgsaws.com/mb700h', function () {
    return Redirect::to('/');
});

Route::get('blogs/{slug}', function ($slug) {
    return redirect()->route('blogs', $slug);
});
/******************************** GENERAL ************************************/
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return "All Cache is cleared";
    // return view('cache');
})->name('cache.clear');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return "Link created";
});
