<?php

use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});


// `Route::resource` in Laravel generates RESTful routes, following conventions for CRUD operations, reducing boilerplate code, promoting RESTful design, and providing consistent naming. This single command streamlines route declaration, maps controller methods, and automates URL generation, enhancing code organization and development efficiency. It's especially advantageous for resource controllers, simplifying the process of defining routes and improving overall code readability and maintainability.
Route::resource('books',BookController::class);



