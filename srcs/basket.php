<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
<!-- Panier -->
<div id="content">

<?PHP

$file = "../bdd/serialized";
$unserialized = unserialize(file_get_contents($file));

$_SESSION['nb_articles'] = count($_SESSION['basket']);


if ($_SESSION['nb_articles'] != 0)
{
		$total = 0;
		echo "<table id='tab-admin-train'>";
		echo "<tr><th>Name of product</th><th>Quantity</th><th>Price</th><tr/>";
		foreach ($_SESSION['basket'] as $elem)
		{
			$id = $elem - 1;
			echo "<tr><td>".$unserialized[$id][1]."</td><td>1</td><td>".$unserialized[$id][6]."</td><tr/>";
			$total += $unserialized[$id][6];
		}

		echo "<tr><td></td><td>Total</td><td>".$total."</td><tr/>";
		echo "</table>";



		if ($_SESSION['logged_on_user'] != "")
		{
			$_SESSION['history'] = $_SESSION['basket'];
			unset($_SESSION['basket']);
		$_SESSION['nb_articles'] = 0;

			echo "<form action='connection/my_account.php' method='post'>";
				echo "<input type='submit' name='account' value='buy' />";
			echo "</form>";
		}
		else if ($_SESSION['logged_on_user'] == "")
		{
			echo "<form action='registration.php' method='post'>";
				echo "<input type='submit' name='no-count' value='No account' />";
			echo "</form>";
		}
}
else
{
	echo "<p>Your basket is empty</p>";
}
?>

</div>


</body>

<footer>

</footer>
</html>












