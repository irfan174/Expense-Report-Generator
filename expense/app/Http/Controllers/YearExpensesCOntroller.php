<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpensesModel;
class YearExpensesCOntroller extends Controller
{
    function YearExpensesIndex(){

    	$year = date("Y");
    	$selectQuery = json_decode(ExpensesModel::where('year','=',$year)->get());
    	return view('YearExpense',['YearExpenseDataKey'=>$selectQuery]);
    }
}
