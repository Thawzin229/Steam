<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\SteamNewsController;
use App\Http\Controllers\UserSteamNewController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\libraryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameItemController;
use App\Http\Controllers\JoinGroupController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\UserItemsController;
use App\Http\Controllers\ViewCountController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserCollectionController;

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

Route::get('/component',function(){
    return Inertia::render('com');
});
Route::redirect('/','auth/loginpage');
Route::post("/auth/logout",[AuthController::class,"Logout"]);
Route::get('/redirect',[AuthController::class,"redirect"]);


// auth
Route::group(['prefix' => "auth" , 'middleware'=>"guest"],function(){

    Route::get('/register',[AuthController::class,'RegisterPage']);
    Route::post('/register',[AuthController::class,'Register']);
    Route::get('/loginpage',[AuthController::class,'LoginPage'])->name("login");
    Route::post('/login',[AuthController::class,'Login']);

    
    Route::get('google',[GoogleController::class,"redirect"]);
    Route::get('google/call-back',[GoogleController::class,"login"]);

    Route::get('github',[GitHubController::class,"redirect"]);
    Route::get('github/call-back',[GitHubController::class,"login"]);

    #forget password routes 
    Route::get('forget-password', [AuthController::class, 'forgetpassword']);
    Route::post('forget-password', [AuthController::class, 'Fp']);
    Route::get('forget-password/token/{id}', [AuthController::class, 'token']);
    Route::post('forget-password/token', [AuthController::class, 'check_token']);

    Route::get('forget-password/change-password/{id}', [AuthController::class, 'changepage']);
    Route::post('forget-password/change-password', [AuthController::class, 'changePass']);

});

// user
Route::group(['prefix' => 'user','middleware' => ['user']],function(){
Route::get('/home',[UserController::class,"home"]);

// categories  searching
Route::get('/categories/search/{id}',[UserController::class,"searchByCategories"]);

//store 
Route::get('/store',[storeController::class,"page"]);
Route::get('/store/collection/search/{id}',[storeController::class,"searchCollection"]);
Route::get('/store/categories/search/{id}',[storeController::class,"searchCategoriesStore"]);

// single 
Route::get("/watch/game/{id}",[GameController::class,"singlegame"]);

// cart 
Route::post('/cart',[CartController::class,"addToCart"]);
Route::get("/cart",[CartController::class,"page"]);
Route::delete("/cart/delete/{id}",[CartController::class,"delete"]);

// order
Route::post("/orderlist",[OrderListController::class,"orderlist"]);

// account information 
Route::get('/account',[UserController::class,"userInformation"]);
Route::post('/account/update',[UserController::class,"accountUpdate"]);
Route::get('/account/items',[UserController::class,"accountItems"]);
Route::get('/account/{id}',[UserController::class,"eachUser"]);
Route::delete('/account/items/delete/{id}',[UserController::class,"deleteItem"]);

// library 
Route::get('/library',[libraryController::class,"page"]);


// wallet 
Route::post("/wallet",[WalletController::class,"addWallet"]);

// community 
Route::group(['prefix' => 'community'],function(){
    Route::get('/blogs',[BlogController::class,'page']);
    Route::post('/blogs/create',[BlogController::class,'create']);
    Route::get('/blogs/{id}',[BlogController::class,"blog"]);

    // commnet 
    Route::post('/blogs/comment',[CommentController::class,"comment"]);

    // viewcount 
    Route::post('/blogs/viewcount',[ViewCountController::class,"viewcount"]);

    //friend 
    Route::controller(FriendController::class)->group(function(){
        Route::get('/friend',"page");
        Route::post('/friend',"add");
        Route::post('/friend/accept',"accept");
        Route::post('/friend/decline',"decline");
        Route::post('/friend/unfriend',"unfriend");
    });

    // article
    Route::get('/groups',[ArticleController::class,"userPage"]);
    Route::get('/groups/articles/{id}',[ArticleController::class,"userArticlePage"]);
    Route::post('/groups/join/',[JoinGroupController::class,"joinGp"]);
    Route::get('/groups/articles/single/{id}',[ArticleController::class,"singleArticle"]);

});

Route::group(['prefix' => 'market'],function(){
    Route::get('/items/{id}',[UserItemsController::class,"page"]);
    Route::post('/items/purchase',[UserItemsController::class,"purchase"]);

    Route::get("/allitems",[MarketController::class,'market']);
    Route::post("/add",[MarketController::class,'addTomarket']);
    Route::post("/global/purchase",[MarketController::class,'purchase']);

});


Route::controller(UserCollectionController::class)->group(function(){
    Route::get('/collection','page');
    Route::post('/collection/create','create');
    Route::get('/collection/games/{id}','games');
    Route::delete("/collection/delete/{id}","delete");
    Route::delete("/collection/games/delete/{id}","gamedelete");
});

    Route::controller(FaqController::class)->group(function () {
        Route::get('/faqs', 'userPage');
    });
    Route::controller(UserSteamNewController::class)->group(function () {
        Route::get('/steam-news', 'page');
        Route::get('/steam-news/{id}', 'singlePage');
        Route::post('/steam-news/like', 'like');
        Route::post('/steam-news/comment', 'comment');
    });





});
// admin 
Route::group(['prefix' => 'admin','middleware'=>['admin']],function(){
    Route::get('/home',[AdminController::class,"home"]);

    // user list 
    Route::controller(AdminController::class)->group(function(){
        Route::get('/userlist',"UserList");
        Route::get('/userlist/createpage',"CreatePage");
        Route::group(['middleware' => "can:create,App\Models\User"],function(){
            Route::post('/userlist/create',"CreateUser");
            Route::get('userlist/edit/{id}',"EditPage");
            Route::patch('userlist/update',"Update");
            Route::delete('userlist/delete/{id}',"Delete");
        });
    });

    // category
    Route::controller(CategoryController::class)->group(function(){
        Route::group(['middleware' => 'can:create,App\Models\User'],function(){
            Route::post('/category/create',"create");
            Route::get('/category/edit/{id}',"editPage");
            Route::delete('/category/delete/{id}',"delete");
            Route::patch('/category/update',"update");
        });
        Route::get('/category',"page");
        Route::get('/category/create',"createPage");
    });


    // games
    Route::controller(GameController::class)->group(function(){
        Route::group(['middleware' => "can:create,App\Models\User"],function(){
            Route::post('/games/create',"create");
            Route::get('/games/edit/{id}',"edit");
            Route::post('/games/update',"update");
            Route::delete('/games/delete/{id}',"delete");
        });
        Route::get('/games',"page");
        Route::get('/games/create',"createPage");
    });

    // admin account 
    Route::get('/account',[AdminController::class,"page"]);
    Route::post('/account',[AdminController::class,"updateAcc"]);

    // collection 
    Route::group(['middleware' => "can:create,App\Models\User"],function(){
        Route::post('/collection/create',[CollectionController::class,"create"]);
        Route::delete('/collection/delete/{id}',[CollectionController::class,"delete"]);
    });
    Route::get('/collection/create',[CollectionController::class,"page"]);
    Route::get('/collection/list',[CollectionController::class,"listpage"]);

    // order 
    Route::get('/order',[OrderController::class,"page"]);
    Route::patch('/order/status-change',[OrderController::class,"status"])->middleware('can:create,App\Models\User');

    // group 
    Route::controller(GroupController::class)->group(function(){
        Route::get('/group','page');
        Route::get('/group/create','createPage');
        Route::post('/group/create','create');
        Route::get('/group/edit/{id}','editPage');
        Route::patch('/group/update/{id}','update');
        Route::delete('/group/delete/{id}','delete');
        // group request 
        Route::get('/group/request/accept/{id}/{group_id}',"accept");
        Route::delete('/group/request/accept/{id}/{group_id}',"deleteRq");
    });

    // group article
    Route::controller(ArticleController::class)->group(function(){
        Route::get('/group/article/{id}',"page");
        Route::get('/group-article/createpage/{id}',"createArticlePage");
        Route::post('/group-article/create',"create");
        Route::get('/group-article/edit/{id}',"edit");
        Route::post('/group-article/update',"update");
        Route::delete('/group-article/delete/{id}',"delete");
    });

    // game item
    Route::get("/games/items/{id}",[GameItemController::class,'page']);
    Route::post("/games/items/add",[GameItemController::class,'add']);
    Route::post("/games/items/update",[GameItemController::class,'update']);
    Route::delete("/games/items/delete/{id}/{game_id}",[GameItemController::class,'delete']);


    // faq
    Route::controller(FaqController::class)->group(function () {
        Route::get('/faqs', 'page');
        Route::get('/faqs/createpage', 'createPage');
        Route::post('/faqs/create', 'create');
        Route::get('/faqs/edit/{id}', 'edit');
        Route::patch('/faqs/update', 'update');
        Route::delete('/faqs/delete/{id}', 'delete');
    });

    // steam news 
      Route::controller(SteamNewsController::class)->group(function () {
        Route::get('/steam-news', 'page');
        Route::get('/steam-news/create-page', 'createPage');
        Route::post('/steam-news/create', 'create');
        Route::get('/steam-news/edit/{id}', 'edit');
        Route::post('/steam-news/update', 'update');
        Route::delete('/steam-news/delete/{id}', 'delete');
    });
});
