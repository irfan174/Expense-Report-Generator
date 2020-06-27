@extends('Layout.app2')

@section('content')

<div class="container ">
<div class="row justify-content-center d-flex mt-5 mb-5">

<div class="col-md-10 card">
  <div class="row">
    <div style="height: 450px" class="col-md-6 p-3">
      <form  action=" "  class="m-5 regForm">

        <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
         <input required="" name="userName" value="" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Your Name">
        </div>


        <div class="form-group">
        <label for="exampleInputEmail1">User Email</label>
         <input required="" name="userEmail" value="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
        </div>


        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input  required="" name="userPassword"  value="" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>


        <div class="form-group">
        <label for="exampleInputEmail1">User Address</label>
         <input required="" name="userAddress" value="" type="text" class="form-control" id="exampleInputAddress" aria-describedby="emailHelp" placeholder="Enter Your Address">
        </div>


        <div class="form-group">
          <button name="submit" type="submit" class="btn btn-block btn-danger">Register</button>
        </div>


        
    </form>
</div>

<div style="height: 450px" class="col-md-6 bg-light">
<img class="w-75 m-5" src="images/bannerImg.png">
</div>
</div>
</div>




</div>
</div>


@endsection




@section('jsCode')
<script type="text/javascript">


    $('.regForm').on('submit',function (event) {
        event.preventDefault();
        let formData=$(this).serializeArray();
        let userName=formData[0]['value'];
        let userEmail=formData[1]['value'];
        let password=formData[2]['value'];
        let address=formData[3]['value'];
        let url="/onReg";
        axios.post(url,{
            name:userName,
            email:userEmail,
            pass:password,
            address:address
        }).then(function (response) {
           if(response.status==200 && response.data==1){

               window.location.href="/login";
               toastr.success('You Have Successfully Registered');
           }
           else{
               toastr.error('Registration Fail ! Try Again');
           }

        }).catch(function (error) {
            toastr.error('Registration Fail ! Try Again');
        })


    })

</script>
@endsection
