<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completeModal">
  ADD
</button>
<div id="displayDataTable"></div>
<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
  <div class="form-group">
    <label for="completename">Name</label>
    <input type="text" class="form-control" id="completename"  placeholder="Enter name">
    
  </div>
  <div class="form-group">
    <label for="completemail">Email address</label>
    
    <input type="text" class="form-control" id="completeemail" placeholder="Enter email">
  </div>
       <!-- #region -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"   data-dismiss="modal" onclick="adduser()">Save </button>
      </div>
    </div>
  </div>
 
</div>
  </div>
  <!-- update-->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
  <div class="form-group">
    <label for="updatename">Name</label>
    <input type="text" class="form-control" id="updatename"  placeholder="Enter name">
    
  </div>
  <div class="form-group">
    <label for="updateemail">Email address</label>
    
    <input type="text" class="form-control" id="updateemail" placeholder="Enter email">
  </div>
       <!-- #region -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateDetails()"  data-dismiss="modal" >Update</button>
        <input type="hidden" id="hiddendata">
      </div>
    </div>
  </div>
 
</div>

  </div>
<script>
  $(document).ready(function(){
    displayData();
  });
  function displayData(){
    var displayData="true";
    $.ajax({
      url:"display.php",
      type:"post",
      data:{
           displaySend:displayData
      },
      success:function(data,status){
        $('#displayDataTable').html(data);
      }
    });
  }
  function adduser(){
    var nameAdd=$('#completename').val();
    var emailAdd=$('#completeemail').val();
    $.ajax({
      url:"insert.php",
      type:"post",
      data:{
        nameSend:nameAdd,
        emailSend:emailAdd
      },
 success:function(data,status){
 // console.log(status);
  $('#completeModal').modal('hide');
  displayData();
 }
    });   
  } 
  function DeleteUser(deleteid){
    $.ajax({
      url:"delete.php",
      type:'post',
      data:{
        deletesend:deleteid
      },
      success:function(data,status){
        displayData(); 
      }
    });
  }
  function GetDetails(editid){
    $('#hiddendata').val(editid);
    $.post("update.php",{editid:editid},function(data,status){
      var userid=JSON.parse(data);
      $('#updatename').val(userid.name);
      $('#updateemail').val(userid.email);


    });
    ('#updateModal').modal('show'); 
  } 

function updateDetails(){
  var updatename=$('#updatename').val();
  var updateemail=$('#updateemail').val();
  var hiddendata=$('#hiddendata').val();
   $.post("update.php",{
  updatename:updatename, 
  updateemail:updateemail,
  hiddendata:hiddendata
   },function(data,status){
    $('#updatModal').modal('hide');
    
   displayData();
   });

}
</script>
</body>
</html>

