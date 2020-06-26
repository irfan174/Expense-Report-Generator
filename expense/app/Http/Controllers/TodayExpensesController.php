<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpensesModel;
class TodayExpensesController extends Controller
{
    function TodayExpensesIndex(){

    	
    	return view('TodayExpenses');
    	
      	
    }

    //expenses section; get all data from database and send to script section in getExpensesJsonData function
	function getExpensesData(){

		$date = date("d/m/y");
		$allExpensesData = json_encode(ExpensesModel::where('date','=',$date)->get());
		return $allExpensesData;
    }


    //expenses section; expenses delete function
	function ExpenseDelete(Request $request){
    	$deleteId = $request->input('id');
    	$deleteQuery = ExpensesModel::where('id','=',$deleteId)->delete();
    	if($deleteQuery == true)
    	{
    		return 1;
		}
    	else
    	{
    		return 0;
    	}
    }

    //expenses section; get all details [all coloumns] of each data for edit expenses
    function getExpenseDetailsData(Request $request){
    	$editId = $request->input('id');
    	$editQuery = json_encode(ExpensesModel::where('id','=',$editId)->get()) ;
    	return $editQuery;

    }


    //expenses section; expenses update function
    function ExpenseUpdate(Request $request){ 
    	$updateId = $request->input('id');
    	$details = $request->input('details');
    	$amount = $request->input('amount');
    	

    	$updateQuery = ExpensesModel::where('id','=',$updateId)->update(['details'=>$details,'amount'=>$amount]);
    	if($updateQuery == true)
    	{
    		return 1;
		}
    	else
    	{
    		return 0;
    	}
    }
    //expenses section; expenses expenses function
    function ExpenseInsert(Request $request){
        $details = $request->input('details');
        $amount = $request->input('amount');
        $date = $request->input('date');
        $month = $request->input('month');
        $year = $request->input('year');
       

        $insertQuery = ExpensesModel::insert([
        	'details'=>$details,
        	'amount'=>$amount,
        	'date'=>$date,
        	'month'=>$month,
        	'year'=>$year

        ]);
        if($insertQuery == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
