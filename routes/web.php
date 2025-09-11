<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// students        # 表示所有學生的集合
// students/{id}   # 表示特定一位學生
// 加上s是因為 laravel 的慣例是用複數形式來表示[資源集合]

Route::get('/students_excel', [StudentController::class, 'excel']);
Route::get('/students_test', [StudentController::class, 'test']);
Route::get('/students_child', [StudentController::class, 'child']);

Route::get('/students_html', [StudentController::class, 'html'])->name('student.html');
Route::get('/students_js', [StudentController::class, 'js'])->name('student.js');
Route::get('/students_php', [StudentController::class, 'php'])->name('student.php');
Route::get('/students_python', [StudentController::class, 'python'])->name('student.python');


Route::resource('students', StudentController::class);

// 轉址
Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('students.index');
});
