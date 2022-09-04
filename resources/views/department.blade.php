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
            <h5 class="breadcrumbs-title">Department</h5>
            <ol class="breadcrumbs">
               <li><a href="/dashboard">Dashboard</a></li>
               <li><a href="#">Department</a></li>
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
                        <th>Description</th>
                        <th>Actions</th>
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
<div id="modal2" class="modal modal-fixed-footer">
   <div class="modal-header">
      <nav class="blue">
         <div class="nav-wrapper">
            <div class="left col s12 m5 l5">
               <ul>
                  <li><a href="#!" class="email-type">Department</a>
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
               <form class="col s12" id="department_form">
                  <div class="row">
                     <div class="input-field col s12">
                        <input id="name" required type="text" name="name">
                        <input id="dep_id" type="hidden" value="0" name="id">
                        <label for="first_name">Name</label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-field col s12">
                        <textarea id="description" required name="description" class="materialize-textarea"></textarea>
                        <label for="description">Description</label>
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
     "url": "api/departments",
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
               { "data": "description" },
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
    "url": "api/departments/"+del,
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
   $("#description").val('');
   $("#dep_id").val(0);
   });
   
     $("#department_form").submit(function(e) {
   
   e.preventDefault(); // avoid to execute the actual submit of the form.
   $('#loader-wrapper').show();
   var form = $(this);
   var edit = ($("#dep_id").val()!=0) ? "/"+$("#dep_id").val() : "";
   var type = ($("#dep_id").val()!=0) ? "PUT" : "POST";
   var url = 'api/departments'+edit;
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
             'Something Went Wrong OR name should be unique!',
             'question'
              )
      
         
       }
        });
   
   
   });
   
   
   function add_edit(){
   $(".edit").click(function(){
   $(".add_dep").click();
   edit_id =  $(this).data('edit');
   $("#dep_id").val(edit_id);
   var settings = {
   "url": "api/departments/"+edit_id,
   "method": "GET",
   "timeout": 0,
   "headers": {
   "Accept": "application/json",
   "Authorization": "Bearer {{$token}}"
   },
   };
   
   $.ajax(settings).done(function (response) {
             $("#name").val(response.name);
             $("#description").val(response.description);
   });
   
   });
   
   }
   
</script>
@endpush