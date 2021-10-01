<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\EmployeeController;

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


Route::get('/',[Dashboard::class,'index']);
Route::get('/dashboard',[Dashboard::class,'index']);

Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/manage_category',[CategoryController::class,'manage_category']);
Route::get('/category/status/{status}/{id}',[CategoryController::class,'status']);
Route::post('/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
Route::get('/category/manage_category/{id}',[CategoryController::class,'manage_category']);
Route::get('/category/delete/{id}',[CategoryController::class,'destroy']);

Route::get('/brand',[BrandController::class,'index']);
Route::get('/brand/manage_brand',[BrandController::class,'manage_brand']);
Route::get('/brand/status/{status}/{id}',[BrandController::class,'status']);
Route::post('/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('brand.manage_brand_process');
Route::get('/brand/manage_brand/{id}',[BrandController::class,'manage_brand']);
Route::get('/brand/delete/{id}',[BrandController::class,'destroy']);

Route::get('/product',[ProductController::class,'index']);
Route::get('/product/manage_product',[ProductController::class,'manage_product']);
Route::get('/product/manage_product/{id}',[ProductController::class,'manage_product']);
Route::get('/product/status/{status}/{id}',[ProductController::class,'status']);
Route::post('/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
Route::get('/product/delete/{id}',[ProductController::class,'destroy']);
Route::get('/product/product_attr_delete/{paid}/{id}',[ProductController::class,'product_attr_delete']);
Route::get('/product/product_images_delete/{paid}/{id}',[ProductController::class,'product_images_delete']);

Route::get('/expense',[ExpenseController::class,'index']);
Route::get('/expense/manage_expense',[ExpenseController::class,'manage_expense']);
Route::get('/expense/manage_expense/{id}',[ExpenseController::class,'manage_expense']);
Route::get('/expense/status/{status}/{id}',[ExpenseController::class,'status']);
Route::post('/expense/manage_expense_process',[ExpenseController::class,'manage_expense_process'])->name('expense.manage_expense_process');
Route::get('/expense/delete/{id}',[ExpenseController::class,'destroy']);

Route::get('/assign',[ExpenseController::class,'assign']);
Route::get('/assign/manage_assign/{id}',[ExpenseController::class,'manage_assign']);
Route::post('/assign/manage_assign_process',[ExpenseController::class,'manage_assign_process'])->name('assign.manage_assign_process');
Route::get('/assign/delete/{id}',[ExpenseController::class,'assign_destroy']);

Route::get('/repair',[ExpenseController::class,'repair']);
Route::get('/repair/manage_repair/{id}',[ExpenseController::class,'manage_repair']);
Route::post('/repair/manage_repair_process',[ExpenseController::class,'manage_repair_process'])->name('repair.manage_repair_process');
Route::get('/repair/delete/{id}',[ExpenseController::class,'repair_destroy']);

Route::get('/damage',[ExpenseController::class,'damage']);
Route::get('/damage/manage_damage/{id}',[ExpenseController::class,'manage_damage']);
Route::post('/damage/manage_damage_process',[ExpenseController::class,'manage_damage_process'])->name('damage.manage_damage_process');
Route::get('/damage/delete/{id}',[ExpenseController::class,'damage_destroy']);

Route::get('/employee',[EmployeeController::class,'index']);
Route::get('/employee/manage_employee',[EmployeeController::class,'manage_employee']);
Route::get('/employee/status/{status}/{id}',[EmployeeController::class,'status']);
Route::post('/employee/manage_employee_process',[EmployeeController::class,'manage_employee_process'])->name('employee.manage_employee_process');
Route::get('/employee/manage_employee/{id}',[EmployeeController::class,'manage_employee']);
Route::get('/employee/delete/{id}',[EmployeeController::class,'destroy']);

