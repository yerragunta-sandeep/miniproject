<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration page</title>
    <link rel="shortcut icon" href="images/logo1.jpg" type="image/x-icon">
  </head>
  <body>

<marquee background color="black">Registration Page</marquee>
    <center>
    <h1>Signup</h1>
    </center>
    <form class="registration" action="" method="post">
    <center>
      <div>
    <table>
      <tr>
        <td>Name:</td>
        <td><input type="text" name="name" value="" placeholder="Enter the Name" required></td>
      </tr>
      <tr>
        <td>Surname:</td>
        <td><input type="text" name="sname" value="" placeholder="Enter the Surname"></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="email" name="email" value=""placeholder="Enter the Email" required></td>
      </tr>

      <tr>
        <td>Password:</td>
        <td><input type="password" name="password" value="" placeholder="must be 6 charcters"></td>
      </tr>
      <tr>
        <td>Confirm Password:</td>
        <td><input type="text" name="cpassword" value=""></td>
      </tr>
      <tr>
        <td>Mobile number</td>
        <td><input type="number" name="num" value="" placeholder="no"></td>
      </tr>
      <tr>

      <tr>
        <td><input type="submit" name="submit" value="SUBMIT"></td>
        <td><input type="reset" name="reset" value="RESET"></td>
      </tr>
    </table>
  </div>

    <a href="loginpage.php"> Already a exiting user?/login</a>
    </center>
  </form>
  <?php
  if(isset($_POST["submit"])){
    $name=$_POST['name'];
    $sname=$_POST['sname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $num=$_POST['num'];
    $conn = new mysqli('localhost','root','','registrationpage');
    if($conn->connect_error){
      die('Connection Failed :'.$conn->connect_error);
    }
    else {
      $statement=$conn->prepare("insert into signup(name,sname,email,password,cpassword,num)
      values(?, ?, ?, ?, ?, ?)");
      $statement->bind_param("sssssi", $name, $sname, $email, $password, $cpassword, $num);
      $statement->execute();
      echo "Registration Successfully....";
      header("Location:loginpage.php");
      exit();
      $statement->close();
      $conn->close();
    }
  }
   ?>
  </body>
</html>
