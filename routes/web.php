<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// for contact section
Route::post('/send-message', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => [
            'required',
            'regex:/^(97|98)[0-9]{8}$/',
        ],
        'message' => 'required|string',
    ]);

    $details = [
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'], // Pass phone number
        'message' => $validated['message'],
    ];

    Mail::to('inspireevents62@gmail.com')->send(new ContactMessage($details));

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
});

Route::get('/', [PagesController::class,'home'])->name('home');
Route::get('/home', [PagesController::class,'home'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');

Route::get('/viewpackage/{id}',[PagesController::class,'viewpackage'])->name('viewpackage');

Route::get('/search',[PagesController::class,'search'])->name('search');

Route::middleware(['auth'])->group(function () {
    Route::get('/bookpackage/{id}',[PagesController::class,'bookpackage'])->name('bookpackage');

    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/addtocart',[CartController::class,'store'])->name('addtocart');
    Route::get('/deletecart/{id}',[CartController::class,'delete'])->name('deletecart');
    Route::get('/checkout/{cartid}',[CartController::class,'checkout'])->name('checkout');
    // view user order
    Route::get('/myorders',[PagesController::class,'myorders'])->name('myorders');

    Route::get('/order/{cartid}/{totalprice}',[OrderController::class,'store'])->name('order.store');
});

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'isadmin'])->name('dashboard');

Route::middleware(['auth','isadmin'])->group(function () {

    
    //Item
    Route::get('/items',[ItemController::class,'index'])->name('items.index');
    Route::get('/items/create',[ItemController::class,'create'])->name('items.create');
    Route::post('/items/store',[ItemController::class,'store'])->name('items.store');
    Route::get('/items/{id}/edit',[ItemController::class,'edit'])->name('items.edit');
    Route::post('/items/{id}/update',[ItemController::class,'update'])->name('items.update');
    Route::get('/items/{id}/destroy',[ItemController::class,'destroy'])->name('items.destroy');

    //Package
    Route::get('/packages',[PackageController::class,'index'])->name('packages.index');
    Route::get('/packages/create',[PackageController::class,'create'])->name('packages.create');
    Route::post('/packages/store',[PackageController::class,'store'])->name('packages.store');
    Route::get('/packages/{id}/edit',[PackageController::class,'edit'])->name('packages.edit');
    Route::post('/packages/{id}/update',[PackageController::class,'update'])->name('packages.update');
    Route::get('/packages/{id}/destroy',[PackageController::class,'destroy'])->name('packages.destroy');

   
    //Orders
    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
    Route::get('/orders/{id}/{status}',[OrderController::class,'status'])->name('orders.status');

    // users
    Route::get('/users',[PagesController::class,'users'])->name('users.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
