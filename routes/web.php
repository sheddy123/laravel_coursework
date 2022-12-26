<?php

use App\Mail\CommentsMailable;
use App\Services\SendEmailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CommentsController;
use App\Http\Controllers\Frontend\FrontendController;

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

Auth::routes();
app()->singleton(SendEmailService::class, function(){
    return new SendEmailService();
});
Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);
// Route::get('/',[App\Http\Controllers\HomeController::class, function(){
//     dd(app());
// }]);
Route::get('category/{category_id}',[FrontendController::class, 'viewCategoryPost']);
Route::get('category/{category_id}/{post_slug}',[FrontendController::class, 'viewPost']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Comment
Route::post('delete-comment', [CommentsController::class, 'deleteComment']);
Route::post('comments', [CommentsController::class, 'addComment']);
Route::post('/update-comment', [CommentsController::class, 'update']);
Route::get('/edit-comment/{comment_id}', [CommentsController::class, 'edit_comment']);

//Users Posts
Route::get('user/{user_name}', [UserController::class, 'usersArticles']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    
    //Route::get('/delete/{category_id}', [CategoryController::class, 'delete']);

    //Posts
    Route::post('add-post', [ArticleController::class, 'create_post']);
    Route::get('posts', [ArticleController::class, 'index']);
    Route::get('add-post', [ArticleController::class, 'create']);
    Route::get('delete-post/{post_id}', [ArticleController::class, 'delete_post']);
    Route::put('/edit-post/{post_id}', [ArticleController::class, 'update']);
    Route::get('post/{post_id}', [ArticleController::class, 'edit_post']);

    //users
    Route::put('update-user/{user_id}', [UserController::class, 'update']);
    Route::get('users', [UserController::class, 'index']);
    Route::get('user/{user_id}', [UserController::class, 'edit']);

    //Categories
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/add-category', [CategoryController::class, 'store_category']);
    Route::post('/delete', [CategoryController::class, 'delete']);
    Route::get('/edit/{category_id}', [CategoryController::class, 'edit']);
    Route::put('/update/{category_id}', [CategoryController::class, 'update']);

    //Notifications
    // Route::get('notifications', function(){
    //     $name = "Notifier Coder";

    //     Mail::to('ifeanyishadrach452@gmail.com')->send(new CommentsMailable($name));
    // });
});
