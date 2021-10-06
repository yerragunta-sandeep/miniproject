
<!DOCTYPE html>
<html>
<head>
	<title>Search Item</title>
  <style>
body {
background-image: url(images/background.jpg);
}
</style>
</head>
<body>

<form method="post">
  <center>
<label>Search</label>
<input type="text" name="search"><br></br>
<input type="submit" name="submit">
<br></br>
<a href="homepage.html">Back to Home</a>
</center>
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=registrationpage",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE item = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
	while($row = $sth->fetch())
	{
		?>
		<br><br><br>
    <center>
		<table border="10">
			<tr>
				<th>item</th>
				<th>hotel</th>
        <th>Price</th>
			</tr>
			<tr>
				<td><?php echo $row->item; ?></td>
				<td><?php echo $row->hotel;?></td>
        <td><?php echo $row->price;?></td>
			</tr>

		</table>
    </center>
<?php
	}

}

?>
