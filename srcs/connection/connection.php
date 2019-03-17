<?PHP session_start(); ?>
<?PHP include("header_connection.php"); ?>
<!DOCTYPE html>
<html>
<body>

<!-- Connection -->
<div id='content' id="connection"><center>

	<form action="connection_login.php" method="post">
		Email Adress: <input type="text" name="mail" value="" />
		<br />
		Password:  <input type="password" name="passwd" value="" />
		<br />
		<input type="submit" name="submit" value="OK" />
	</form>
<?PHP
	if ($_SESSION['flag_log'] == "OK" && $_SESSION['mail'] != NULL)
	{
		echo "<p id='registration-ok'>\nWelcome, ".$_SESSION['logged_on_user']."!\n</p>";
		echo "<p>Go to our shop to see our products <a href=../shop.php>shop</a>\n</p>";
		echo "<p>Go to <a href=../../index.php>home</a>\n</p>";
		$_SESSION['flag_log'] = "";
	}
	else if ($_SESSION['flag_log'] == "KO")
	{
		echo "<p id='error'>You are not yet registered\n</p>";
		echo "<p> Register<a href=../registration.php> ici</a>\n</p>";
		$_SESSION['flag_log'] = "";
	}
?>
</center></div>



</body>

<footer>

</footer>
</html>
