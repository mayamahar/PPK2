<?php
// Create database connection using config file
include_once("connection.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM book_form ORDER BY id DESC");
?>
 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <a href="book.php">Tambah Data</a><br/><br/>
 
 <table width='80%' border=1>

 <tr>
     <th>Name</th> <th>Email</th> <th>Phone</th> <th>Address</th> <th>Location</th> <th>Arrival</th> <th>Leaves</th> <th>Update</th> 
 </tr>
 <?php  
 while($user_data = mysqli_fetch_array($result)) {         
     echo "<tr>";
     echo "<td>".$user_data['name']."</td>";
     echo "<td>".$user_data['email']."</td>";
     echo "<td>".$user_data['phone']."</td>";    
     echo "<td>".$user_data['address']."</td>";    
     echo "<td>".$user_data['location']."</td>";    
     echo "<td>".$user_data['arrivals']."</td>";    
     echo "<td>".$user_data['leaving']."</td>";    
     echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
 }
 ?>
 </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
<html>
