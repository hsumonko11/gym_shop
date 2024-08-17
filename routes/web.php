<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admins\OrderController;
use App\Http\Controllers\Admins\ReviewController;
use App\Http\Controllers\Admins\PaymentController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\CustomerController;
use App\Http\Controllers\Admins\SupplierController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\SupplierProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'home'])->name('home');

Route::get('/shop',[HomeController::class,'shop'])->name('shop');

Route::get('/shop_category/{category_id}',[HomeController::class,'shopWithCategory'])->name('shop_category');

Route::get('/shop-detail/{id}',[HomeController::class,'shopDetailPage'])->name('shop_detail');


Route::post('/cart',[HomeController::class,'cart'])->name('cart');

Route::get('/cart_page',[HomeController::class,'cartPage'])->name('cart_page');

Route::delete('/remove_cart/{id}',[HomeController::class,'removeCart'])->name('remove_cart');

Route::post('/order',[HomeController::class,'order'])->name('order');

Route::get('/checkout/{id}',[HomeController::class,'checkout'])->name('checkout');

Route::post('/customer_information',[HomeController::class,'customerInformation'])->name('customer_information');

Route::get('/blog',[BlogController::class,'blog'])->name('blog');

Route::get('/about',[HomeController::class,'about'])->name('about');

Route::get('/contact',[ContactController::class,'contact'])->name('contact');

Route::post('/contact_store',[ContactController::class,'store'])->name('contact.store');

Route::get('/bmi',[HomeController::class,'bmiPage'])->name('bmi');

Route::get('/profile_page',[HomeController::class,'profilePage'])->name('profile_page');

Route::put('/insert_payment_screenshot/{id}',[HomeController::class,'insertPaymentScreenshot'])->name('insert_payment_screenshot');


Route::put('/change_user_profile/{id}',[ProfileController::class,'changeUserProfile'])->name('change_user_profile');

Route::get('/categories',[HomeController::class,'category'])->name('category');


Route::middleware('admin_auth')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/contact',[DashboardController::class,'contactUs'])->name('contact');

    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::get('/profile',[DashboardController::class,'profile'])->name('profile');

    Route::resource('/admin_profile',DashboardController::class);

    Route::resource('/categories',CategoryController::class);

    Route::resource('/products',ProductController::class);

    Route::get('pdfview',[ProductController::class,'pdfview'])->name('pdfview');  

    Route::resource('/suppliers',SupplierController::class);

    Route::resource('/supplier_products',SupplierProductController::class);

    Route::resource('/customers',CustomerController::class);

    Route::resource('/orders',OrderController::class);

    Route::resource('/reviews',ReviewController::class);

    Route::resource('/payments',PaymentController::class);

    Route::delete('/contact_delete/{id}',[DashboardController::class,'deleteContact'])->name('contact_delete');


 Route::put('/update_profile/{id}',[DashboardController::class,'updateProfile'])->name('update_profile');

});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


