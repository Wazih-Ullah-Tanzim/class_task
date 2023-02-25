<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CourseController;



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

Route::get('/', [HomeController::class, 'home']);


Route::get('/about', [HomeController::class, 'about']);
Route::get('/create_employee', [HomeController::class, 'create_employee']);


 //businesses variable e $arr assign hobe,
//business view te niye jawar shomoi,businesses variable niye jabe

Route::get('/business/{type}', [HomeController::class, 'business']);

Route::get('/service/{type}', [HomeController::class, 'service']);

//employee
Route::get('/create_employee', [EmployeeController::class, 'create']);
Route::post('/store_employee', [EmployeeController::class, 'store']);

Route::get('employees', [EmployeeController::class, 'all']);

Route::get('/edit_employee/{id}', [EmployeeController::class, 'edit']);

Route::post('/update_employee/{id}', [EmployeeController::class, 'update']);

Route::get('/delete_employee/{id}', [EmployeeController::class, 'delete']);

Route::get('admin/dashboard', [LayoutController::class, 'dashboard']);

Route::get('admin/tables', [LayoutController::class, 'tables']);

Route::get('admin/form', [LayoutController::class, 'form']);

Route::get('user/dashboard', [UserController::class, 'user_dashboard']);

Route::get('admin/register', [AuthController::class, 'register']);
Route::get('admin/login', [AuthController::class, 'login']);

Route::post('admin/create_user', [AuthController::class, 'createUser']);
Route::post('admin/user_login', [AuthController::class, 'userLogin']);

Route::middleware(['CheckLoggedIn'])->group(function () {
    Route::get('admin/users',[UserController::class, 'allUsers']);
    Route::get('admin/approve/{userId}', [UserController::class, 'approve']);
    Route::middleware(['IsStudent'])->group(function () {
       Route::get('admin/my-courses', function(){
            return 'you are student';
       });
    });
    Route::middleware(['IsTeacher'])->group(function () {
        Route::get('admin/give-marks', function(){
            return 'you are teacher';
       });
    });
});

Route::resource('admin/department', DepartmentController::class);

Route::resource('admin/section', SectionController::class);
Route::resource('admin/course', CourseController::class);
Route::resource('admin/Session', SessionController::class);

