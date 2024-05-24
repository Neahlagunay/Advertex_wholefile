<body>
  <div class="container my-5">
    <form method="post">
       <input type ="text" placeholder="Search Data" name="search">
       <button class= "btn btn-dark btn-sm" name="submit">Search</button>
    </form>
<div class="container my-4">
    <table class="container my-4">
       <?php
if(isset($_POST['submit'])){
   $search=$_POST['search'];

   $sql="Select * from material where id like '%$search%' or tablename like '%$search%' or tablename like '%$search%' ";
   $result=mysqli_query($con,$sql);
   if($result){
   if(mysqli_num_rows($result)>0){
     echo '<thead>
     <tr>
     <th>S1 no</th>
     <th>First Name</th>
     <th>Last Name</th>
     </tr>
     </thead>
     ';
     $row=mysqli_fetch_assoc($result);
     echo '<tbody> 
     <tr>
     <td>'.$row['id'].'</td>
     <td>'.$row['column name'].'</td>
     <td>'.$row['column name'].'</td>
     </tr>
     </tbody>';

   }else{
     echo '<h2 class=text-danger>Data not Found</h2>';
   }
   }
}

?>
    </table>
  </div>
</body>