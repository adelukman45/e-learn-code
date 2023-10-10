<?php

use App\Http\Controllers\CourseController;
use App\Models\Course;
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

// Route::get('/', function () {
//     return view('user');
// });

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard/courses/html', function () {
//     return view('dashboard.courses.index', [
//         'courses' => Course::where('category', 'HTML')->get()
//     ]);
// });
Route::get('/', [CourseController::class, 'user']);
Route::get('/dashboard/courses/html', [CourseController::class, 'html'])->middleware('auth');
Route::get('/html', [CourseController::class, 'coursehtml']);
Route::get('/dashboard/courses/css', [CourseController::class, 'css'])->middleware('auth');
Route::get('/coursecss', [CourseController::class, 'coursecss']);
Route::get('/dashboard/courses/php', [CourseController::class, 'php'])->middleware('auth');
Route::get('/php', [CourseController::class, 'coursephp']);
Route::get('/dashboard/courses/mobile', [CourseController::class, 'mobile'])->middleware('auth');
Route::get('/mobile', [CourseController::class, 'coursemobile']);
Route::resource('/dashboard/courses', CourseController::class)->middleware('auth');


require __DIR__ . '/auth.php';
