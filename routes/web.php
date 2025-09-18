<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// students        # 表示所有學生的集合
// students/{id}   # 表示特定一位學生
// 加上s是因為 laravel 的慣例是用複數形式來表示[資源集合]

Route::get('/students_excel', [StudentController::class, 'excel'])->name('students.excel');
Route::get('/students_test', [StudentController::class, 'test']);

Route::get('/trys_gaga', [StudentController::class, 'gaga']);

Route::get('/pages_html', [StudentController::class, 'html'])->name('pages.html');
Route::get('/pages_js', [StudentController::class, 'js'])->name('pages.js');
Route::get('/pages_php', [StudentController::class, 'php'])->name('pages.php');
Route::get('/pages_python', [StudentController::class, 'python'])->name('pages.python');


Route::resource('students', StudentController::class);

// 轉址
Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('students.index');
});
