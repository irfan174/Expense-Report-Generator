@extends('Layout.app')

@section('content')
<div class="container">
<div class="row">
<div id="allMonths" class="col-md-12 p-5">
	<a id="jan" href="{{url('/janexpense')}}" class="btn btn-info btn-rounded">January</a>
	<a href="{{url('/febexpense')}}" class="btn btn-danger btn-rounded">February</a>
	<a href="{{url('/marexpense')}}" class="btn btn-secondary btn-rounded">March</a>
	<a href="{{url('/aprexpense')}}" class="btn btn-success btn-rounded">April</a>
	<a href="{{url('/mayexpense')}}" class="btn btn-info btn-rounded">May</a>
	<a href="{{url('/junexpense')}}" class="btn btn-warning btn-rounded">June</a>
	<a href="{{url('/julexpense')}}" class="btn btn-danger btn-rounded">July</a>
	<a href="{{url('/augexpense')}}" class="btn btn-primary btn-rounded">August</a>
	<a href="{{url('/sepexpense')}}" class="btn btn-default btn-rounded">September</a>
	<a href="{{url('/octexpense')}}" class="btn btn-warning btn-rounded">October</a>
	<a href="{{url('/novexpense')}}" class="btn btn-success btn-rounded">November</a>
	<a href="{{url('/decexpense')}}" class="btn btn-danger btn-rounded">December</a><br><br>
	
	@php
	$month = "February";
	$expense = DB::Table('expenses')->where('month',$month)->sum('amount');
	@endphp
	<h4 style="color: red">Month: {{$month}}</h4>
	<h4 id="totalexpense" style="background-color: yellow; color: black;" class="text-center">Total Expense : {{$expense}}</h4>
<table id="monthsExpense" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">ID</th>
      <th class="th-sm">Details</th>
	  <th class="th-sm">Amount</th>
	  <th class="th-sm">Date</th>
	  
    </tr>
  </thead>
  <tbody>
  	@foreach($thisMonthExpenseDataKey as $thisMonthExpenseDataKey)
  	<tr>
  		<td>{{$thisMonthExpenseDataKey->id}} </td>
  		<td>{{$thisMonthExpenseDataKey->details}} </td>
  		<td>{{$thisMonthExpenseDataKey->amount}} </td>
  		<td>{{$thisMonthExpenseDataKey->date}} </td>

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
