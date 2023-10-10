<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;

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




Route::get('/', function () {
    return redirect('/home');
});
Route::get('/news/detail/{id}', [UserController::class, 'show_news_detail']);
Route::get('/home', [UserController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('home');
    })->name('dashboard');
    Route::get('form/post/pet', [UserController::class, 'post_pet']);
    Route::post('/create/post/pet', [UserController::class, 'create_post_pet']);
    Route::get('/profile_user', [UserController::class, 'profile']);
    Route::get('/form/to_adopt', [UserController::class, 'form_to_adopt']);
    Route::post('/update/form', [UserController::class, 'update_form']);
    Route::get('/adopt/{id}', [UserController::class, 'adopt']);
    Route::get('/findhome/dog', [UserController::class, 'findhome_dog']);
    Route::get('/findhome/cat', [UserController::class, 'findhome_cat']);
    Route::get('/detail/dog/{id}', [UserController::class, 'show_detail_dog']);
    Route::get('/detail/cat/{id}', [UserController::class, 'show_detail_cat']);
    Route::get('/historypost', [UserController::class, 'history']);
    Route::get('/historypost/details/{id}', [UserController::class, 'details'])->middleware('checkPetOwner');
    Route::get('/historypost/delete/{id}', [UserController::class, 'deletepost']);
    Route::get('/adopt_request', [UserController::class, 'adopt_request']);
    Route::get('/accept_request', [UserController::class, 'owner_confirm'])->name('accept');
    Route::get('/success', [UserController::class, 'success_adopt'])->name('success');
    Route::get('/history/post', [UserController::class, 'history_post']);
    Route::get('/history', [UserController::class, 'owner_confirm'])->name("tha");
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('web');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/home_admin', [AdminController::class, 'index2'])->name('home_admin');
    Route::get('/form/post_type', [AdminController::class, 'form_post_type']);
    Route::post('/create/post_type', [AdminController::class, 'create_post_type']);
    Route::get('/detail/post_type/{id}', [AdminController::class, 'show_detail_post_type']);
    Route::get('/edit/post_type/{id}', [AdminController::class, 'edit_post_type']);
    Route::post('/update/post_type/{id}', [AdminController::class, 'update_post_type']);
    Route::get('/form/post', [AdminController::class, 'form_post']);
    Route::post('/create/post', [AdminController::class, 'create_post']);
    Route::get('/detail/post/{id}', [AdminController::class, 'show_detail_post']);
    Route::get('/edit/post/{id}', [AdminController::class, 'edit_post']);
    Route::post('/update/post/{id}', [AdminController::class, 'update_post']);
    Route::get('/delete/post/{id}', [AdminController::class, 'delete_post']);
    Route::get('/trashed/post', [AdminController::class, 'trashed_post']);
    Route::get('/restore/post/{id}', [AdminController::class, 'restore_post']);
    Route::get('/profile', [AdminController::class, 'profile']);
    Route::get('/approve', [AdminController::class, 'approve']);
    Route::get('/post/adopt/{pet_id}', [AdminController::class, 'create_post_adopt']);
    Route::get('/approve/pet/{id}',[AdminController::class,'approve_pet'] );
});

