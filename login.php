<?php 
require('conn.php');
session_start();
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
  <div class="c_login">
    <form action="" method="post">
    <table>
      <tr>
        <h2>Login Page</h2>
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
      

    </tr><td> <a href="http://localhost/Database_project_Udemy/register.php">Registration page</a></td>

    
    </table>
  </div>
  
</form>
</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username=$_POST["username"];
  $email=$_POST["email"];
  $password=md5($_POST["password"]); 
  
  $sql="SELECT * FROM users WHERE u_name = '$username'";

  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      if($username==$row['u_name'] && $password==$row['u_pass'] && $email==$row['u_email'] ){
        $_SESSION['username']=$username;
        header('Location:dash.php');
      }else{
        echo "Error";
      }
    }
  }else{
    echo "<br><center>Error username or password incorrect</center>";
  }
}
?>