<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Model Train Shop</title>
  <link rel="stylesheet" type="text/css" href="../css/train_shop.css">
  <meta name="google" content="notranslate"/>
</head>

<body>
  <div id="head">
  <a href="../../index.php"><img src="../../img/gct.jpg"/></a>
  <a href="../../index.php"><h1>Grand Central Terminal</h1></a>
</div>


  <div id="menu">
  <ul>
    <li><a href="../who_are_we.php">Who are we ?</a></li>
    <li><a href="../shop.php">Shop</a></li>
	<li><a href="../contact.php">Contact</a></li>
<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='../connetion/my_account.php'>My Account</a></li>";
		echo"<li><a href='../connection/deconnection.php'>Logout</a></li>";
	}
	else
	{
		echo"<li><a href='../registration.php'>Registration</a></li>";
		echo"<li><a href='../connection/connection.php'>Connection</a></li>";
	}
?>

	<li><a href="../basket.php">Basket <?php
      if (!$_SESSION['nb_articles'])
        $_SESSION['nb_articles'] = 0;
	  echo "(".$_SESSION['nb_articles'].")";?></a></li>
<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='admin.php'>Admin</a></li>";
			}
?>

  </ul>
</div>
</body>
</html>
