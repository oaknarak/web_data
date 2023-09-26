<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\userController;
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
Route::get('/news/detail/{id}', [userController::class, 'show_news_detail']);
Route::get('/home', [userController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('home');
    })->name('dashboard');
    Route::get('/company', [companyController::class, 'index']);
    Route::get('form/post/pet', [userController::class, 'post_pet']);
    Route::post('/create/post/pet', [userController::class, 'create_post_pet']);
    Route::get('/profile_user', [userController::class, 'profile']);
    Route::get('/form/to_adopt', [userController::class, 'form_to_adopt']);
    Route::post('/update/form', [userController::class, 'update_form']);
    Route::get('/adopt/{id}', [userController::class, 'adopt']);
    Route::get('/findhome/dog', [userController::class, 'findhome_dog']);
    Route::get('/findhome/cat', [userController::class, 'findhome_cat']);
    Route::get('/detail/dog/{id}', [userController::class, 'show_detail_dog']);
    Route::get('/detail/cat/{id}', [userController::class, 'show_detail_cat']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students/insert', [StudentController::class, 'insert']);
    Route::get('/students/delete/{id}', [StudentController::class, 'delete']);
    Route::get('/students/editForm/{id}',[StudentController::class,'editForm']);
    Route::post('/students/update/{id}',[StudentController::class,'update']);
    Route::get('/historypost', [userController::class, 'history']);
    Route::get('/historypost/details/{id}', [userController::class, 'details']);
    Route::get('/historypost/delete/{id}', [userController::class, 'deletepost']);
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('web');
    Route::get('/adopt_request', [userController::class, 'adopt_request']);
    Route::get('/accept_request', [userController::class, 'owner_confirm'])->name('accept');
    Route::get('/success', [userController::class, 'success_adopt'])->name('success');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/history/post', [userController::class, 'history_post']);

    Route::get('/history', [userController::class, 'owner_confirm'])->name("tha");
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('web');

    Route::get('/home_admin', [adminController::class, 'index']);
    Route::get('/form/post_type', [adminController::class, 'form_post_type']);
    Route::post('/create/post_type', [adminController::class, 'create_post_type']);
    Route::get('/detail/post_type/{id}', [adminController::class, 'show_detail_post_type']);
    Route::get('/edit/post_type/{id}', [adminController::class, 'edit_post_type']);
    Route::post('/update/post_type/{id}', [adminController::class, 'update_post_type']);
    Route::get('/form/post', [adminController::class, 'form_post']);
    Route::post('/create/post', [adminController::class, 'create_post']);
    Route::get('/detail/post/{id}', [adminController::class, 'show_detail_post']);
    Route::get('/edit/post/{id}', [adminController::class, 'edit_post']);
    Route::post('/update/post/{id}', [adminController::class, 'update_post']);
    Route::get('/delete/post/{id}', [adminController::class, 'delete_post']);
    Route::get('/trashed/post', [adminController::class, 'trashed_post']);
    Route::get('/restore/post/{id}', [adminController::class, 'restore_post']);
    Route::get('/profile', [adminController::class, 'profile']);
    Route::get('/approve', [adminController::class, 'approve']);
    Route::get('/post/adopt/{pet_id}', [adminController::class, 'create_post_adopt']);
    Route::get('/approve/pet/{id}',[adminController::class,'approve_pet'] );
});

