@extends('layouts.app')
@section('main-content')
<section id="content">
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
   <!-- Search for small screen -->
   <div class="header-search-wrapper grey hide-on-large-only">
      <i class="mdi-action-search active"></i>
      <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
   </div>
   <div class="container">
      <div class="row">
         <div class="col s12 m12 l12">
            <h5 class="breadcrumbs-title">Employee</h5>
            <ol class="breadcrumbs">
               <li><a href="/dashboard">Dashboard</a></li>
               <li><a href="#">Employee</a></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="section">
      <div id="table-datatables">
         <div class="row">
            <div class="col s12 m12 l12">
               <table id="example" class="display" cellspacing="0" width="75%">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Action</th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
   <a class="btn-floating add_dep btn-large red modal-trigger" href="#modal2">
   <i class="mdi-content-add"></i>
   </a>
</div>
<div id="modal2" class="modal modal-fixed-footer" style=" max-height: 100% !important;height: 100%;top: 11px !important; ">
<div class="modal-header">
   <nav class="blue">
      <div class="nav-wrapper">
         <div class="left col s12 m5 l5">
            <ul>
               <li><a href="#!" class="email-type">Employee</a>
               </li>
            </ul>
         </div>
         <div class="col s12 m7 l7 hide-on-med-and-down">
            <ul class="right">
               <li><a href="#!"><i class="mdi-content-clear modal-action modal-close  "></i></a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
</div>
<div class="modal-content">
   <div class="col s12 m12 l6">
      <div class="card-panel">
         <!-- <h4 class="header2">Add Department</h4> -->
         <div class="row">
            <form class="col s12" id="emp_form">
               <div class="row">
                  <div class="input-field col s12">
                     <input id="name" required type="text" name="name">
                     <input id="emp_id" type="hidden" value="0" name="id">
                     <label for="first_name">Name</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <input id="email" required type="email" name="email">
                     <label for="first_name">Email</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <input id="phone" required type="number" name="phone">
                     <label for="first_name">Phone</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <select name="department_id" class="browser-default" id="department_id">
                        <option value="0">Select Department</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                     </select>
                     <!-- <label for="first_name">Department</label> -->
                  </div>
                  <div class="row">
                     <div class="input-field col s12">
                        <textarea id="address" required name="address" class="materialize-textarea"></textarea>
                        <label for="address">Address</label>
                     </div>
                  </div>
               </div>
         </div>
      </div>
   </div>
   <div class="modal-footer">
   <button id="submit_button" class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
   <i class="mdi-content-send right"></i>
   </button>
   </form>
   </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
   $('#example').DataTable( {
             "ajax": {
     "url": "api/employee",
     "method": "GET",
     "timeout": 0,
     "headers": {
       "Accept": "application/json",
       "Authorization": "Bearer {{$token}}"
     },},
     "initComplete": function(){
   
    setTimeout(function(){  del_edit(); }, 1000);
     },
     
           
           "columns": [
               { "data": "name" },
               { "data": "email" },
               { "data": "phone" },
               { "data": "address" },
               { "data": "department" },
                { "data": "action" }
           ]
       } );
</script>
<script>
   function del_edit(){
      setTimeout(function(){
      $(".del").click(function(){
    del = $(this).data('del');
    var settings = {
    "url": "api/employee/"+del,
    "method": "DELETE",
    "timeout": 0,
    "headers": {
      "Accept": "application/json",
      "Authorization": "Bearer {{$token}}",
      "X-CSRF-Token": "{{csrf_token()}}"
    },
   };
   
   $.ajax(settings).done(function (response) {
    if(response){
   Swal.fire(
                
                 '',
                 'Deleted !',
                'success'
                 )
                $('#example').DataTable().ajax.reload();
         
    }
    else{
   Swal.fire(
                
                 '',
                 'Something Went Wrong!',
                'success'
                 )
    }
      setTimeout(function(){   del_edit(); }, 1000);
   });
   });
   add_edit();
   }, 200);
   }
   
   
</script>
<script>
   // setInterval(function () { }, 100);
   $(".add_dep").click(function(){
   $("#name").val('');
   $("#address").val('');
   $("#department_id").val('');
   $("#phone").val('');
   $("#email").val('');
   $("#emp_id").val(0);
   setTimeout(function(){  $("#modal2").css('top','10px'); }, 1000);
   });
   
     $("#emp_form").submit(function(e) {
   
   e.preventDefault(); // avoid to execute the actual submit of the form.
   $('#loader-wrapper').show();
   var form = $(this);
   var edit = ($("#emp_id").val()!=0) ? "/"+$("#emp_id").val() : "";
   var type = ($("#emp_id").val()!=0) ? "PUT" : "POST";
   var url = 'api/employee'+edit;
   $('#submit_button').prop( "disabled", true );
   
   $.ajax({
          type: type,
          url: url,
           headers: {
           "Accept": "application/json",
           "Authorization": "Bearer {{$token}}",
           "X-CSRF-Token": "{{csrf_token()}}"
           },
          data: form.serialize(),
          // serializes the form's elements.
          success: function(data)
          { 
              $('#loader-wrapper').hide();
               $('#submit_button').prop( "disabled", false );
             
              var txt = data;
             var obj = JSON.parse(txt);
             console.log(obj.msg);
             var success = obj.code;
             console.log(success);
             $(".modal-close").click();
             if(success=='1'){
             var msg = obj.msg;
             Swal.fire(
             
              msg,
              'Thank You!',
             'success'
              )
                 $('#example').DataTable().ajax.reload();
                 
              
             }else{
                 Swal.fire(
             '',
              obj.message,
             'question'
              )
             }
               setTimeout(function(){   del_edit(); }, 1000);
             // show response from the php script.
          },
          error :function( data ) {
            $('#submit_button').prop( "disabled", false );
      
             Swal.fire(
             '',
             'Something Went Wrong OR Email and phone should be unique!',
             'question'
              )
      
         
       }
        });
   
   
   });
   
   
   function add_edit(){
   $(".edit").click(function(){
   setTimeout(function(){  $("#modal2").css('top','10px'); }, 1000);
   $(".add_dep").click();
   edit_id =  $(this).data('edit');
   $("#emp_id").val(edit_id);
   var settings = {
   "url": "api/employee/"+edit_id,
   "method": "GET",
   "timeout": 0,
   "headers": {
   "Accept": "application/json",
   "Authorization": "Bearer {{$token}}"
   },
   };
   
   $.ajax(settings).done(function (response) {
             $("#name").val(response.name);
          $("#address").val(response.address);
             $("#department_id").val(response.department_id);
            $("#phone").val(response.phone);
               $("#email").val(response.email);
   });
   
   });
   
   }
   
</script>
<script>
   var type = 'GET';
   var url =  'api/get_departments';
   
      $.ajax({
              type: type,
              url: url,
               headers: {
               "Accept": "application/json",
               "Authorization": "Bearer {{$token}}",
               "X-CSRF-Token": "{{csrf_token()}}"
               },
              data: {},
              // serializes the form's elements.
              success: function(data)
              { 
               console.log(data);
                var   option = "";
               option += `<option disabled value="0">Select Department</option>`;
               for(i=0;i<data.length;i++){
                 console.log(data[i].name);
                  option += `<option  value="${data[i].id}">${data[i].name}</option>`;
               }
               $("#department_id").html(option);
              }
            
            });
     
</script>
@endpush