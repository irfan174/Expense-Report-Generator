<?php

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

Route::get('/', 'HomeController@HomeIndex')->middleware('loginCheck');
Route::get('/todaynewexpenses', 'TodayExpensesController@TodayExpensesIndex')->middleware('loginCheck');
Route::get('/getexpensesdata', 'TodayExpensesController@getExpensesData')->middleware('loginCheck');
Route::post('/expensesdelete', 'TodayExpensesController@ExpenseDelete')->middleware('loginCheck');
Route::post('/expensedetails', 'TodayExpensesController@getExpenseDetailsData')->middleware('loginCheck');
Route::post('/expenseupdate', 'TodayExpensesController@ExpenseUpdate')->middleware('loginCheck');
Route::post('/expenseinsert', 'TodayExpensesController@ExpenseInsert')->middleware('loginCheck');


Route::get('/thismonthewexpenses', 'ThisMonthExpensesController@ThisMonthExpensesIndex')->middleware('loginCheck');

Route::get('/yearewexpenses', 'YearExpensesCOntroller@YearExpensesIndex')->middleware('loginCheck');


Route::get('/janexpense', 'ThisMonthExpensesController@JanExpensesIndex')->middleware('loginCheck');
Route::get('/febexpense', 'ThisMonthExpensesController@FebExpensesIndex')->middleware('loginCheck');
Route::get('/marexpense', 'ThisMonthExpensesController@MarExpensesIndex')->middleware('loginCheck');
Route::get('/aprexpense', 'ThisMonthExpensesController@AprExpensesIndex')->middleware('loginCheck');
Route::get('/mayexpense', 'ThisMonthExpensesController@MayExpensesIndex')->middleware('loginCheck');
Route::get('/junexpense', 'ThisMonthExpensesController@JunExpensesIndex')->middleware('loginCheck');
Route::get('/julexpense', 'ThisMonthExpensesController@JulExpensesIndex')->middleware('loginCheck');
Route::get('/augexpense', 'ThisMonthExpensesController@AugExpensesIndex')->middleware('loginCheck');
Route::get('/sepexpense', 'ThisMonthExpensesController@SepExpensesIndex')->middleware('loginCheck');
Route::get('/octexpense', 'ThisMonthExpensesController@OctExpensesIndex')->middleware('loginCheck');
Route::get('/novexpense', 'ThisMonthExpensesController@NovExpensesIndex')->middleware('loginCheck');
Route::get('/decexpense', 'ThisMonthExpensesController@DecExpensesIndex')->middleware('loginCheck');


Route::get('/login', 'LoginController@LoginIndex');
Route::post('/onLogin', 'LoginController@UserLogin');
Route::get('/logout', 'LoginController@UserLogout');
