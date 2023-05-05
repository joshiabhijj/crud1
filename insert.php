<?php
include("connection.php");
extract($_POST);

if(isset($_POST['nameSend']) && isset($_POST['emailSend']) )
{
    $sql="insert into ajax (name,email) values('$nameSend','$emailSend' )";
    $result=mysqli_query($conn,$sql);
}
?>
