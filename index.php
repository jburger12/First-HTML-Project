<?PHP
session_start();
//include("install.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Grand Central Terminal</title>
  <link rel="stylesheet" type="text/css" href="srcs/css/train_shop.css">
  <meta name="google" content="notranslate"/>
</head>
<body background=black>
  <div id="head">
	<a href="index.php"><img src="img/gct.jpg"/></a>
	<a href="index.php"><h1>Grand Central Terminal</h1></a>

  </div>

  <div id="menu">
	<ul>
	  <li><a href="srcs/who_are_we.php">Who are we ?</a></li>
	  <li><a href="srcs/shop.php">Shop</a></li>
	  <li><a href="srcs/contact.php">Contact us</a></li>

<?php
if ($_SESSION['logged_on_user'] != "")
{
	echo"<li><a href='srcs/connection/my_account.php'>My account</a></li>";
	echo"<li><a href='srcs/connection/deconnection.php'>Logout</a></li>";
}
else
{
	echo"<li><a href='srcs/registration.php'>Registration</a></li>";
	echo"<li><a href='srcs/connection/connection.php'>Login</a></li>";
}
?>

	<li><a href="srcs/basket.php">Basket <?php
if (!$_SESSION['nb_articles'])
	$_SESSION['nb_articles'] = 0;
echo "(".$_SESSION['nb_articles'].")";?></a></li>

<?php
	if ($_SESSION['logged_on_user'] == "admin")
	{
		echo"<li><a href='srcs/admin/admin.php'>Admin</a></li>";
	}
?>
	</ul>
  </div>

  <div id="content">

	<br/>
		<a href="srcs/shop.php"><h3>Click here to visit our variety of products</h3></a>

	<p>Products</p>

		<a href="srcs/shop.php"><img src="img/train1.jpg" title="Buy me" alt="image not found" width="900" height="500"/></a>

	  <p>Products</p>

		<a href="srcs/shp.php"><img src="img/Controller.jpg" alt="image not found" width="900" height="500"title="Buy me"/></a>

		<p>Products</p>

	<a href="srcs/shp.php"><img src="img/Kids.jpg" alt="image not found" width="900" height="500"title="Buy me"/></a>


<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
		</div>

	  </body>

	  <footer>

	  </footer>
	  </html>
