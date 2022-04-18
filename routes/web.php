<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

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

route::get('/', [StudentsController::class, 'index'])->name('home')->middleware('auth');
route::get('/student', [StudentsController::class, 'student'])->name('student')->middleware('auth');
route::get('/template', [StudentsController::class, 'template'])->name('');

route::get('/tambahstudent', [StudentsController::class, 'tambahstudent'])->name('tambahstudent')->middleware('auth');
route::post('/insertdata', [StudentsController::class, 'insertdata'])->name('insertdata')->middleware('auth');
route::get('/modalfilter', [StudentsController::class, 'modalfilter'])->name('modalfilter');
route::get('/detailstudent/{id}', [StudentsController::class, 'detailstudent'])->name('detailstudent')->middleware('auth');
route::get('/tampildata/{id}', [StudentsController::class, 'tampildata'])->name('tampildata')->middleware('auth');
route::post('/updatedata/{id}', [StudentsController::class, 'updatedata'])->name('updatedata')->middleware('auth');

route::get('/deletedata/{id}', [StudentsController::class, 'deletedata'])->name('deletedata')->middleware('auth');

route::get('/login', [UserController::class, 'login'])->name('login');
route::post('/loginuser', [UserController::class, 'loginuser'])->name('loginuser');
route::get('/register', [UserController::class, 'register'])->name('register');
route::post('/registeruser', [UserController::class, 'registeruser'])->name('registeruser');

route::get('/logout', [UserController::class, 'logout'])->name('logout');
