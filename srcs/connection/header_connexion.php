<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>halpplzchange@header_connection.php</title>
  <link rel="stylesheet" type="text/css" href="../../srcs/css/dinoshop.css">
  <meta name="google" content="translate"/>
</head>

<body>
  <div id="head">
	<a href="../../index.php"><img src="../../img/oof" alt="header_connection.php" /></a>
	<a href="../../index.php"><h1>Change header_connection.php</h1></a>
	</div>


  <div id="menu">
  <ul>
	<li><a href="../who_are_we.php">Who are we ?</a></li>
	<li><a href="../shop.php">Shop</a></li>
	<li><a href="../contact.php">Contact</a></li>
<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='my_account.php'>My account</a></li>";
		echo"<li><a href='deconnection.php'>Logout</a></li>";
	}
	else
	{
		echo"<li><a href='../registration.php'>Registration</a></li>";
		echo"<li><a href='connection.php'>Connection</a></li>";
	}
?>
	<li><a href="../basket.php">Basket <?php
if (!$_SESSION['nb_goods'])
	$_SESSION['nb_goods'] = 0;
echo "(".$_SESSION['nb_goods'].")";?></a></li>

<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='../admin/admin.php'>Admin</a></li>";
			}
?>


  </ul>
</div>
</body>
</html>

