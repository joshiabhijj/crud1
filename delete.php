<?php 
include('connection.php');
if (isset($_POST['deletesend'])){
    $unique=$_POST['deletesend'];
    $sql="delete from  `ajax`  where id=$unique";
    $result=mysqli_query($conn,$sql);
}
?>   