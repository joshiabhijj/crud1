 <?php
 include('connection.php');
 if(isset($_POST['displaySend'])){
    $table='<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">Button</th>
      <th scope="col">Button</th>
    </tr>
  </thead>';

    $sql="SELECT * FROM ajax";
    $result=mysqli_query($conn,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $table.='<tr>
        <td scope="row">'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td> <button class="btn btn-primary" onclick="GetDetails('.$id.')" data-toggle="modal" data-target="#updateModal">Edit</td>
        <td> <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</td>
        </tr>';
        $number++;
    }
    $table.='</tabel>';
    echo $table;

 }
  
  ?>
<td>

</td>



 