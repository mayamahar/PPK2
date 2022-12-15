<?php
// include database connection file
include_once("connection.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $location=$_POST['location'];
    $arrivals=$_POST['arrivals'];
    $leaving=$_POST['leaving'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE book_form SET name='$name',email='$email',phone='$phone', address='$address', location='$location', arrivals='$arrivals', leaving='$leaving', WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: crud.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM book_form WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['name'];
    $email = $user_data['email'];
    $phone = $user_data['phone'];
    $address=$user_data['address'];
    $location=$user_data['location'];
    $leaving=$user_data['leaving'];
    $arrivals=$user_data['arrivals'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="crud.php">Kembali</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Phone</td>
                <td><input type="number" name="phone" value=<?php echo $phone;?>></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="address" value=<?php echo $address;?>></td>
            </tr>
            <tr> 
                <td>Location</td>
                <td><input type="text" name="location" value=<?php echo $location;?>></td>
            </tr>
            <tr> 
                <td>Arrivals</td>
                <td><input type="date" name="arrivals" value=<?php echo $arrivals;?>></td>
            </tr>
            <tr> 
                <td>Leaving</td>
                <td><input type="date" name="leaving" value=<?php echo $leaving;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>