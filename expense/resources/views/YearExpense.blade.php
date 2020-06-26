@extends('Layout.app')

@section('content')
<div class="container">
<div class="row">
<div  class="col-md-12 p-5">
	
	<h4 style="color: red">Welcome! To {{date("Y")}}</h4>
	@php
	$year = date("Y");
	$expense = DB::Table('expenses')->where('year',$year)->sum('amount');
	@endphp
	<h4 id="totalexpense" style="background-color: yellow; color: black;" class="text-center">Total Expense Till {{date("M")}} : {{$expense}}</h4>
<table id="monthsExpense" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">ID</th>
      <th class="th-sm">Details</th>
	  <th class="th-sm">Amount</th>
	  <th class="th-sm">Month</th>
	  <th class="th-sm">Date</th>
	  
    </tr>
  </thead>
  <tbody>
  	@foreach($YearExpenseDataKey as $YearExpenseDataKey)
  	<tr>
  		<td>{{$YearExpenseDataKey->id}} </td>
  		<td>{{$YearExpenseDataKey->details}} </td>
  		<td>{{$YearExpenseDataKey->amount}} </td>
  		<td>{{$YearExpenseDataKey->month}} </td>
  		<td>{{$YearExpenseDataKey->date}} </td>

  	</tr>



  	@endforeach
    
  </tbody>
</table>

</div>
</div>
</div>


@endsection

@section('jsCode')

<script type="text/javascript">
	

</script>
@endsection