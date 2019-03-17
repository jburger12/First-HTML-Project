<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Grand Central Terminal</title>
  <link rel="stylesheet" type="text/css" href="../srcs/css/train_shop.css">
  <meta name="google" content="translate"/>
</head>

<body>
  <div id="head">
    <a href="../index.php"><img src="../img/Calculator.jpg" alt="image not found" height="200" width="400"/></a>
    <a href="../index.php"><h1>Back to home</h1></a>
</div>


  <div id="menu">
  <ul>
    <li><a href="who_are_we.php">Who are we ?</a></li>
    <li><a href="shop.php">Shop</a></li>
	<li><a href="contact.php">Contact</a></li>
<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='connection/my_account.php'>Account Name</a></li>";
		echo"<li><a href='connection/deconnection.php'>Logout</a></li>";
	}
	else
	{
		echo"<li><a href='registration.php'>Registration</a></li>";
		echo"<li><a href='connection/connection.php'>Login</a></li>";
	}
?>


	<li><a href="basket.php">basket <?php
      if (!$_SESSION['nb_articles'])
        $_SESSION['nb_articles'] = 0;
	  echo "(".$_SESSION['nb_articles'].")";?></a></li>
<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='admin/admin.php'>Admin</a></li>";
			}
?>




  </ul>
</div>
</body>
</html>
