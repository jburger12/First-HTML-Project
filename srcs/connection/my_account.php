<?PHP session_start(); ?>
<?PHP include("header_connection.php"); ?>
<!DOCTYPE html>
<html>
<body>
<!-- Mon_Compte -->
<div id='content'>
<h3>Hello <?php echo $_SESSION['logged_on_user'] ?>,here is the information about your account:</h3>
<br />
<p>Your name: <?php echo $_SESSION['name'] ?></p>
<p>Your firstname: <?php echo $_SESSION['logged_on_user'] ?></p>
<p>Your email address: <?php echo $_SESSION['mail'] ?></p>
<br />


<p>My orders:</p>
<?PHP
if ($_POST['account'] == "purchase" || ((count($_SESSION['history'])) != 0))
{
	$file = "../../bdd/serialized";
	$unserialized = unserialize(file_get_contents($file));

	$_SESSION['nb_articles'] = count($_SESSION['history']);


	if ($_SESSION['nb_articles'] != 0)
	{
		$total = 0;
		echo "<table id='tab-admin-dino'>";
		echo "<tr><th>change my_account.php</th><th>Quantity</th><th>Price</th><tr/>";
		foreach ($_SESSION['history'] as $elem)
		{
			$id = $elem - 1;
			echo "<tr><td>".$unserialized[$id][1]."</td><td>1</td><td>".$unserialized[$id][6]."</td><tr/>";
			$total += $unserialized[$id][6];
		}

		echo "<tr><td></td><td>Total</td><td>".$total."</td><tr/>";
		echo "</table>";
		$_SESSION['nb_articles'] = 0;

	}
	else
	{
	echo "<p>Your basket is empty</p>";
	}

}
else
{
	echo"<p>No account</p>";
}

?>



<br />
<p>Do you want to delete your account? Really?! Okay.. <a href="delete_account.php" >Click here then..</a></p>
</div>



</body>

<footer>

</footer>
</html>
