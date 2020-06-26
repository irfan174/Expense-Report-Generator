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

Route::get('/', 'HomeController@HomeIndex');
Route::get('/todaynewexpenses', 'TodayExpensesController@TodayExpensesIndex');
Route::get('/getexpensesdata', 'TodayExpensesController@getExpensesData');
Route::post('/expensesdelete', 'TodayExpensesController@ExpenseDelete');
Route::post('/expensedetails', 'TodayExpensesController@getExpenseDetailsData');
Route::post('/expenseupdate', 'TodayExpensesController@ExpenseUpdate');
Route::post('/expenseinsert', 'TodayExpensesController@ExpenseInsert');


Route::get('/thismonthewexpenses', 'ThisMonthExpensesController@ThisMonthExpensesIndex');

Route::get('/yearewexpenses', 'YearExpensesCOntroller@YearExpensesIndex');


Route::get('/janexpense', 'ThisMonthExpensesController@JanExpensesIndex');
Route::get('/febexpense', 'ThisMonthExpensesController@FebExpensesIndex');
Route::get('/marexpense', 'ThisMonthExpensesController@MarExpensesIndex');
Route::get('/aprexpense', 'ThisMonthExpensesController@AprExpensesIndex');
Route::get('/mayexpense', 'ThisMonthExpensesController@MayExpensesIndex');
Route::get('/junexpense', 'ThisMonthExpensesController@JunExpensesIndex');
Route::get('/julexpense', 'ThisMonthExpensesController@JulExpensesIndex');
Route::get('/augexpense', 'ThisMonthExpensesController@AugExpensesIndex');
Route::get('/sepexpense', 'ThisMonthExpensesController@SepExpensesIndex');
Route::get('/octexpense', 'ThisMonthExpensesController@OctExpensesIndex');
Route::get('/novexpense', 'ThisMonthExpensesController@NovExpensesIndex');
Route::get('/decexpense', 'ThisMonthExpensesController@DecExpensesIndex');