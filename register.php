<?php 
require('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="c_register">
    <form action="" method="post">
    <table>
      <tr>
        <h2>Registration Page</h2>
        <tr>
          <td>
            <input type="text" name="username"  placeholder="Username" required>
          </td>
        </tr>
    
        <td><input type="text" name="password" placeholder="Password" required></td>
      </tr>
      <tr>
      <td><input type="email" name="email" placeholder="Email" required></td>
    </tr>
    <tr>
      <td><input type="submit" name="Sign-up" id="b_submit"></td>
    </tr>

    <tr>
      <td> <a href="http://localhost/Database_project_Udemy/login.php">Login page</a></td>
    </tr>
    </table>
  </div>
  
</form>
</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST" ){
  $username=$_POST["username"];
  $email=$_POST["email"];
  $password=md5($_POST["password"]); 
  
  $sql="INSERT INTO users( u_name, u_email, u_pass) values ('$username', '$email', '$password')";

  $result=mysqli_query($conn,$sql);

  if($result){
    echo "<br><center>Data saved successfully</center>";

    header("Location:dash.php");
  }else{
    echo "<br><center>Oops something went wrong</center>";
  }
}
?>