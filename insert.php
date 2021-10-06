<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration page</title>
    <link rel="shortcut icon" href="images/logo1.jpg" type="image/x-icon">
    <style>
body {
  background-image: url(images/backlogo6.jpg);
}
</style>
  </head>
  <body >


    <center>
    <h1>ITEM Insertion</h1>
    </center>
    <form class="registration" action="" method="post">
    <center>
    <table>
      <tr>
    <h2>    <td>Hotel Name:</td></h2>
        <td><input type="text" name="hotel" value="" placeholder="Enter the hotel Name"></td>
      </tr>
      <tr>
      <h2> <td>Item name:</td></h2>
        <td><input type="text" name="item" value="" placeholder="Enter the food item"></td>
      </tr>
      <tr>
        <h2><td>Price</td></h2>
        <td><input type="number" name="price" value="" placeholder="price of the item"></td>
      </tr>
      <tr>

      <tr>
        <td><input type="submit" name="submit" value="SUBMIT"></td>
        <td><input type="reset" name="reset" value="RESET"></td>
      </tr>
    </table>
    <a href="admin.html">Back to Admin page</a>
    </center>
  </form>
  <?php
  if(isset($_POST["submit"])){
    $hotel=$_POST['hotel'];
    $item=$_POST['item'];
    $price=$_POST['price'];
    $conn = new mysqli('localhost','root','','registrationpage');
    if($conn->connect_error){
      die('Connection Failed :'.$conn->connect_error);
    }
    else {
      $statement=$conn->prepare("insert into search(hotel,item,price)
      values(?, ?, ?)");
      $statement->bind_param("ssi", $hotel, $item, $price);
      $statement->execute();
      echo "Inserted Successfully....";

      $statement->close();
      $conn->close();
    }
  }
   ?>
  </body>
</html>
