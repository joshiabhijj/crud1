<?php 
 include('connection.php');
 if (isset($_POST['editid'])){
     $user_id=$_POST['editid'];
     $sql="Select * from `ajax` where id=$user_id";
     $result=mysqli_query($conn,$sql);
     $response=array();
     while($row=mysqli_fetch_assoc($result)){
        $response=$row;

     }
     echo json_encode($response);
    }else{
        $response['status']=200;
        $response['message']="invalid";

 }
// update query
 if (isset($_POST['hiddendata'])){
    $uniqueid=$_POST['hiddendata'];
    $name=$_POST['updatename'];
    $email=$_POST['updateemail'];
     
    $sql="update `ajax` set name='$name', email='$email' where id=$uniqueid";

    $result=mysqli_query($conn,$sql);
 }
 
?>
