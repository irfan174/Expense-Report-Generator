<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ExpensesModel;
class ThisMonthExpensesController extends Controller
{
    function ThisMonthExpensesIndex(){

    	$month = date("F");
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('ThisMonthExpense',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function JanExpensesIndex(){

    	$month = "January";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('JanExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function FebExpensesIndex(){

    	$month = "February";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('FebExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function MarExpensesIndex(){

    	$month = "March";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('MarExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function AprExpensesIndex(){

    	$month = "April";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('AprExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function MayExpensesIndex(){

    	$month = "May";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('MayExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function JunExpensesIndex(){

    	$month = "June";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('JunExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function JulExpensesIndex(){

    	$month = "July";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('JulExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function AugExpensesIndex(){

    	$month = "August";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('AugExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function SepExpensesIndex(){

    	$month = "September";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('SepExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function OctExpensesIndex(){

    	$month = "October";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('OctExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function NovExpensesIndex(){

    	$month = "November";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('NovExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }
    function DecExpensesIndex(){

    	$month = "December";
    	$selectQuery = json_decode(ExpensesModel::where('month','=',$month)->get());
    	return view('DecExpenses',['thisMonthExpenseDataKey'=>$selectQuery]);
    }

}
