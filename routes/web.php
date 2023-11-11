<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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
// Web Routes
Route::get('/',[WebController::class,'home'])->name("home.web");
Route::get('/about',[WebController::class,'about'])->name("about.web");
Route::get('/service',[WebController::class,'service'])->name("service.web");
Route::get('/team',[WebController::class,'team'])->name("team.web");
Route::get('/shop',[WebController::class,'shop'])->name("shop.web");
Route::match(['get','post'],'/product/{slug}',[WebController::class,'product'])->name("product.web");
Route::post('/add-review',[WebController::class,'addReview'])->name("add-review.web");
Route::get('/all-review',[WebController::class,'allReviews'])->name("all-review.web");
Route::get('/account',[WebController::class,'account'])->name("account.web")->middleware("auth.check");

// Web Authentication Routes
Route::match(['get','post'],'/register',[WebController::class,'register'])->name("register.web");
Route::match(['get','post'],'/login',[WebController::class,'login'])->name("login.web");
Route::match(['get','post'],'/logout',[WebController::class,'logout'])->name("logout.web");


//Cart Routes

Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart.web');
Route::get('/cart',[CartController::class,'showCart'])->name('cart.web');
Route::get('/all-cart-products',[CartController::class,'allCartProducts'])->name('all-cart-product.web');
Route::post('/cart-remove',[CartController::class,'removeFromCart'])->name('cart.remove.web');
Route::get('/cart-count',[CartController::class,'cartCount'])->name('cart.count');

// Admin routes
Route::middleware(['auth','role.check:Admin'])->group(function(){
    Route::prefix('admin')->group( function(){
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::get('chat',[AdminController::class,'chat'])->name('admin.chat');

        //Product Routes
        Route::get('products',[ProductController::class,'product'])->name('admin.product');
        Route::get('your-products',[ProductController::class,'YourProduct'])->name('admin.your-product');
        Route::get('total-products',[ProductController::class,'products'])->name('admin.total-product');
        Route::get('all-products',[ProductController::class,'allProduct'])->name('admin.all-product');
        Route::match(['get','post'],'store-product',[ProductController::class,'addProduct'])->name('admin.add-product');
        Route::get('view-product',[ProductController::class,'viewProduct'])->name('admin.view-product');
        Route::match(['get','post'],'delete-product',[ProductController::class,'deleteProduct'])->name('admin.delete-product');
        Route::match(['get','post'],'update-status',[ProductController::class,'updateStatus'])->name('admin.update-status');
        Route::match(['get','post'],'product-status',[ProductController::class,'updateApprove'])->name('admin.update-approve');
        Route::match(['get', 'post', 'delete'], 'admin-product-gallery', [ProductController::class, 'deleteGallery'])->name('admin.delete-gallery');
        
        
        //Category Routes
        Route::get('categories',[CategoryController::class,'category'])->name('admin.category');
        Route::get('all-categories',[CategoryController::class,'allCategories'])->name('admin.all-categories');
        Route::match(['get','post'],'update-category-status',[CategoryController::class,'updateStatus'])->name('admin.update-category-status');
        Route::match(['get','post'],'store-category',[CategoryController::class,'addCategory'])->name('admin.add-category');
        Route::match(['get','post'],'delete-category',[CategoryController::class,'deleteCategory'])->name('admin.delete-category');


        //Tag Routes
        Route::get('tags',[TagController::class,'tag'])->name('admin.tag');
        Route::get('all-tags',[TagController::class,'allTags'])->name('admin.all-tags');
        Route::match(['get','post'],'update-tag-status',[TagController::class,'updateStatus'])->name('admin.update-tag-status');
        Route::match(['get','post'],'store-tag',[TagController::class,'addTag'])->name('admin.add-tag');
        Route::match(['get','post'],'delete-tag',[TagController::class,'deleteTag'])->name('admin.delete-tag');
        

        //CMS Routes
        Route::prefix('cms')->group(function(){
            //About Route
            Route::match(['get','post'],'about',[CmsController::class,'about'])->name('admin.cms.about');
            //Service Routes
            Route::match(['get','post'],'service',[CmsController::class,'services'])->name('admin.cms.service');
            Route::match(['get','post'],'services',[CmsController::class,'allServices'])->name('admin.cms.services');
            Route::match(['get','post'],'delete-service',[CmsController::class,'deleteService'])->name('admin.cms.delete-service');
            Route::match(['get','post'],'view-service',[CmsController::class,'viewService'])->name('admin.cms.view-service');
            
            //Slider Routes
            Route::match(['get','post'],'slider',[CmsController::class,'slider'])->name('admin.cms.slider');
            Route::match(['get','post'],'sliders',[CmsController::class,'allSliders'])->name('admin.cms.sliders');
            Route::match(['get','post'],'delete-slider',[CmsController::class,'deleteSlider'])->name('admin.cms.delete-slider');
            Route::match(['get','post'],'view-slider',[CmsController::class,'viewSlider'])->name('admin.cms.view-slider');
        });
    });
});


// Auth routes
Route::prefix('auth')->group( function(){
    Route::match(['get','post'],'login',[AuthController::class,'login'])->name('auth.login');
    Route::match(['get','post'],'register',[AuthController::class,'register'])->name('auth.register');
    Route::match(['get','post'],'logout',[AuthController::class,'logout'])->name('auth.logout');
    Route::match(['get','post'],'profile-edit',[ProfileController::class,'profile'])->name('auth.profile-edit');
    Route::match(['get','post'],'profile',[ProfileController::class,'viewProfile'])->name('auth.profile');
    Route::match(['get','post'],'profile-user/{id}',[ProfileController::class,'getUserProfile'])->name('auth.user.profile');
});


//Vendor Routes
Route::middleware(['auth','role.check:Vendor'])->group(function(){
    Route::prefix('vendor')->group(function(){
        Route::get('dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');


        //Vendor Product Routes
        Route::get('products',[ProductController::class,'product'])->name('vendor.product');
        Route::get('all-products',[ProductController::class,'vendorProduct'])->name('vendor.all-product');
        Route::match(['get','post'],'store-product',[ProductController::class,'addProduct'])->name('vendor.add-product');
        Route::get('view-product',[ProductController::class,'viewProduct'])->name('vendor.view-product');
        Route::match(['get','post'],'update-status',[ProductController::class,'updateStatus'])->name('vendor.update-status');
        Route::match(['get','post'],'delete-product',[ProductController::class,'deleteProduct'])->name('vendor.delete-product');
        Route::match(['get', 'post', 'delete'], 'vendor-product-gallery', [ProductController::class, 'deleteGallery'])->name('vendor.delete-gallery');
    });
});


//Message Route
Route::middleware(['auth'])->group(function(){
    Route::prefix('message')->group(function(){
        Route::post('send',[ChatController::class,'sendMessage'])->name('message.send');
        Route::get('inbox-message/{id}',[ChatController::class,'fetchMessages'])->name('message.inbox.message');
    });
    Route::prefix('contact')->group(function(){
        Route::post('add',[ChatController::class,'addContact'])->name('contact.add');
    });
});