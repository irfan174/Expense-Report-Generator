@extends('Layout.app')

@section('content')


<div id="dataTable" class="container d-none" >
<div class="row">
<div class="col-md-12 p-5">
	
	<h4>Today's Date: {{date("d/m/y")}}</h4>
	<h4>Today's Day: {{date("D")}}</h4>
	
	 <br>
	<button id="addNewBtnId" class="btn blue-gradient pull-right m-3">Add New Expense</button>
	<br> 
    <br>
    @php
	$date = date("d/m/y");
	$expense = DB::Table('expenses')->where('date',$date)->sum('amount');
	@endphp
    <h4 id="totalexpense" style="background-color: yellow; color: black;" class="text-center">Total Expense: {{$expense}}</h4>
<table id="todayExpenseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	
  <thead>
  	
	
	
	
    <tr>
    	
      <th class="th-sm">Details</th>
	  <th class="th-sm">Amount</th>
	  <th class="th-sm">Date</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="expenseDataTable">

  
	
  </tbody>

</table>
		

</div>

</div>
</div>

<div id="loadingAnim" class="container">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-anim m-5" src="{{asset('images/loader.svg')}}" alt="">
      
    </div>
    
  </div>
  
</div>

<div id="notFound" class="container d-none">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong !!!</h3>
      
    </div>
    
  </div>
  
</div>


@endsection

@section('jsCode')

<script type="text/javascript">
	getExpenseJsonData();
	function getExpenseJsonData() {
axios.get('/getexpensesdata')
.then(function (response) {
if (response.status == 200){
$('#dataTable').removeClass('d-none');
$('#loadingAnim').addClass('d-none');
$('#expenseDataTable').empty(); //avoid clone table data after more than one time delete





var dataJSON=response.data;
$.each(dataJSON, function(i, item) {
	
$('<tr>').html(


    "<td>" + dataJSON[i].details + "</td>" +
    "<td>" + dataJSON[i].amount + "</td>" +
    "<td>" + dataJSON[i].date + "</td>" +
    "<td><a class='expenseEditIcon' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
    "<td><a class='expenseDltIcon' data-toggle='modal' data-id=" + dataJSON[i].id + " data-target='#deleteModal'><i class='fas fa-trash-alt'></i></a></td>").appendTo('#expenseDataTable');
    });

    //expense section; Delete icon hold and send the id of the clicked item to the modal
    $('.expenseDltIcon').click(function() {
    var catchId = $(this).data('id');
    $('#expenseDltId').html(catchId);
    })
    //expense section; Edit icon
                $('.expenseEditIcon').click(function() {
                  
                    var catchIdEdit = $(this).data('id');
                    $('#expenseEditId').html(catchIdEdit);
                    expenseDetailsForEdit(catchIdEdit);
                    $('#editModal').modal('show');
                })


    }
    else
    {
    $('#notFound').removeClass('d-none');
    $('#loadingAnim').addClass('d-none');
    }

    }).catch(function (error) {
    $('#notFound').removeClass('d-none');
    $('#loadingAnim').addClass('d-none');
    });
    }


    //expense section; Yes button of delete modal hold, get the id from the modal and send that id to the delete function
    $('#expenseDltConfirmBtn').click(function() {
    var finalDltId = $('#expenseDltId').html();
    serviceDelete(finalDltId);
    })


    //expense section; ajax call for delete expense
    function serviceDelete(deleteId) {
    $('#expenseDltConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");//set animation on yes button of delete modal


    axios.post('/expensesdelete', {
    id: deleteId
    })
    .then(function(response) {
    $('#expenseDltConfirmBtn').html("Yes");
    if(response.status == 200){
    if (response.data == 1)
    {
    $('#deleteModal').modal('hide');
    toastr.success('Delete Successfull');
    getExpenseJsonData();
    }
    else
    {
    $('#deleteModal').modal('hide');
    toastr.error('Delete Failed');
    getExpenseJsonData();
    }

    }
    else{
    $('#deleteModal').modal('hide');
    toastr.error('Something Went Wrong!!!');

    }


    })
    .catch(function(error) {
    $('#deleteModal').modal('hide');
    toastr.error('Something Went Wrong!!!');
    })


    }


    //expense section; ajax call for edit expense; show each expense's all data on edit modal
function expenseDetailsForEdit(detailsId) {

    axios.post('/expensedetails', {
            id: detailsId
        })
        .then(function(response) {
          if(response.status == 200){
            $('#expenseEditForm').removeClass('d-none');
            $('#loadingAnimForEdit').addClass('d-none');
            var expenseDataJson = response.data;//get all the data in json format
            $('#expenseDetailId').val(expenseDataJson[0].details);  //set details column data on catched id edit modal's field ; and for one index data catch we set 0
            $('#expenseAmountId').val(expenseDataJson[0].amount);
            
          }
          else{
            $('#notFoundForEdit').removeClass('d-none');
            $('#loadingAnimForEdit').addClass('d-none');
          }
        })
        .catch(function(error) {
          $('#notFoundForEdit').removeClass('d-none');
          $('#loadingAnimForEdit').addClass('d-none');
        });
}




//expense section; save button of edit modal 
                $('#expenseEditConfirmBtn').click(function() {

                    var finalEditId = $('#expenseEditId').html();
                    var finalEditDet = $('#expenseDetailId').val();
                    var finalEditAmo = $('#expenseAmountId').val();
                    
                    /*alert(finalEditId);
                    alert(finalEditName);
                    alert(finalEditDes);
                    alert(finalEditImg);*/
                    expenseUpdate(finalEditId,finalEditDet,finalEditAmo);
                })


//expense section; ajax call for Edit expense
function expenseUpdate(updateId,expDet,expAmo) {
//validation 
if(expDet.length == 0){
     toastr.error('Expense Details not found');

  }
  else if(expDet.length == 0){
    toastr.error('Amount not found');

  }
  else{
    $('#expenseEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");//set animation on save button of edit modal
    axios.post('/expenseupdate', {
            id: updateId,
            details: expDet,
            amount: expAmo,
          

        })
        .then(function(response) {

          $('#expenseEditConfirmBtn').html("Save");
          if(response.status == 200){
            if (response.data == 1) 
            {
                $('#editModal').modal('hide');
                toastr.success('Update Successfull');
                getExpenseJsonData();
            } 
            else 
            {
                $('#editModal').modal('hide');
                
                toastr.error('Update Failed');
                getExpenseJsonData();
            }


          }
          else{
            $('#editModal').modal('hide');
            toastr.error('Something Went Wrong!!!');

          }


          
          
        })
        .catch(function(error) {
          
        });

  }

    
}


//service section; ADD NEW SERVICE button click
$('#addNewBtnId').click(function() {
        $('#addNewExpenseModal').modal('show');
    })
//service section; add this service button click
$('#expenseAddNewConfirmBtn').click(function() {

    var finalAddDetails = $('#expenseAddDetId').val();
    var finalAddAmount = $('#expenseAddAmountId').val();
    var finalAddDate = $('#expenseAddDateId').val();
    var finalAddMonth = $('#expenseAddMonthId').val();
    var finalAddYear = $('#expenseAddYearId').val();
    
    
    
    expenseInsert(finalAddDetails,finalAddAmount,finalAddDate,finalAddMonth,finalAddYear);


})
//service section; ajax call for add this service button click of add new service modal
function expenseInsert(expDet,expAmo,expDate,expMonth,expYear) {
//validation 
if(expDet.length == 0){
     toastr.error('Details is empty!!');

  }
  else if(expAmo.length == 0){
    toastr.error('Amount is empty!!');

  }

  else{
    $('#expenseAddNewConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");//set animation on save button of edit modal
    axios.post('/expenseinsert', {
            details: expDet,
            amount: expAmo,
            date: expDate,
            month: expMonth,
            year: expYear
            

        })
        .then(function(response) {

          $('#expenseAddNewConfirmBtn').html("Save");
          if(response.status == 200){

            if (response.data == 1) 
            {
                $('#addNewExpenseModal').modal('hide');
                toastr.success('Insert Successfull');
                
                
                
                //var finalTotal = $('#recieveTotal').val();
                //toastr.success(finalTotal);
    			//$('#totalexpense').html(finalTotal);
                getExpenseJsonData();
                $('#expenseAddDetId').val(null);
                $('#expenseAddAmountId').val(null);
            } 
            else 
            {
                $('#addNewExpenseModal').modal('hide');
                
                toastr.error('Insert Failed!!');
                getExpenseJsonData();
            }


          }
          else{
            $('#addNewExpenseModal').modal('hide');
            toastr.error('Something Went Wrong!!!');

          }


          
          
        })
        .catch(function(error) {
          
        });

  }

    
}

	
   


</script>
@endsection

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Want to Delete?</h4>
        <h4 id="expenseDltId">  </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="expenseDltConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-4 text-center">
          <!-- Material form subscription Start-->
          <div class="card">

              <!--Card content-->
              <div id="expenseEditForm" class="card-body px-lg-5 d-none ">

                  <!-- Form Start-->
                  <form  class="text-center " style="color: #757575;" action="#!">
                      <!-- Details -->
                      <h4 id="expenseEditId">  </h4> <!-- Set the id of clicked item -->
                      <div class="md-form mt-3">
                          <input id="expenseDetailId" type="text"  class="form-control" placeholder="Details">
                          <label for="expenseDetailId">Details</label>
                      </div>

                      <!-- Amount -->
                      <div class="md-form">
                          <input id="expenseAmountId" type="text"  class="form-control" placeholder="Amount">
                          <label for="expenseAmountId">Amount</label>
                      </div>

                      

                      

                  </form>
                  <!-- Form End-->
                  <!-- loadind and something went wrong modal for showing data to the edit modal -->
                  <div id="loadingAnimForEdit" class="container">
                    <div class="row">
                      <div class="col-md-12 text-center p-5">
                        <img class="loading-anim m-5" src="{{asset('images/loader.svg')}}" alt="">
                        
                      </div>
                      
                    </div>
                    
                  </div>

                  <div id="notFoundForEdit" class="container d-none">
                    <div class="row">
                      <div class="col-md-12 text-center p-5">
                        <h4> Something Went Wrong !!! </h4>
                        
                      </div>
                      
                    </div>
                    
                  </div>


              </div>

          </div>
          <!-- Material form subscription End-->
      
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Cancle</button>
        <button id="expenseEditConfirmBtn" type="button" class="btn btn-md btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>



<!--Add New expense Modal -->
<div class="modal fade" id="addNewExpenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-4 text-center">
          <!-- Material form subscription Start-->
          <div class="card">

              <!--Card content-->
              <div id="expenseAddForm" class="card-body px-lg-5">
                <h5 id="">Add New Expense</h5>
                  <!-- Form Start-->
                  <form  class="text-center " style="color: #757575;" action="#!">
                      <!-- Details -->
                      <div class="md-form mt-3">
                          <input id="expenseAddDetId" type="text"  class="form-control">
                          <label for="expenseAddDetId">Details</label>
                      </div>

                      <!-- Amount -->
                      <div class="md-form">
                          <input id="expenseAddAmountId" type="text"  class="form-control">
                          <label for="expenseAddAmountId">Amount</label>
                      </div>

                      <!-- Date -->
                      <div class="md-form">
                          <input id="expenseAddDateId" type="hidden"  class="form-control" value="{{date('d/m/y')}}">
                          
                      </div>

                      <!-- Month -->
                      <div class="md-form">
                          <input id="expenseAddMonthId" type="hidden"  class="form-control" value="{{date('F')}}">
                          
                      </div>

                      <!-- Year -->
                      <div class="md-form">
                          <input id="expenseAddYearId" type="hidden"  class="form-control" value="{{date('Y')}}">
                          
                      </div>

                      


                  </form>
                  <!-- Form End-->
                  <!-- loadind and something went wrong modal for showing data to the edit modal -->

              </div>
          <!-- Material form subscription End-->
      
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Cancle</button>
            <button id="expenseAddNewConfirmBtn" type="button" class="btn btn-md btn-primary">Add This Expense</button>
          </div>
      </div>
    </div>
  </div>
</div>