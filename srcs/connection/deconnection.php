<?PHP session_start(); ?>
<?PHP include("header_connection.php"); ?>
<!DOCTYPE html>
<html>
<body>
	<!-- Deonnection -->
	<div id='content'><center>
	<form action="deco_logout.php" method="post">
		<h3>Would you like to disconnect?</h3>
		<input type="submit" name="submit" value="Yes.." />
		<input type="submit" name="submit" value="NO!!" />
	<center></form>
	<?PHP

		if ($_SESSION['flag_log'] == "KO" && $_SESSION['logged_on_user'] == NULL)
		{
			echo "<p id='registration-ok'>\nYou have been correctly disconnected, see you soon!\n</p>";
			$_SESSION['flag_log'] = "";

			echo "<meta http-equiv='refresh' content='4,url=../../index.php'>";
		}
		else if ($_SESSION['flag_log'] = "OK" && $SESSION['logged_on_user'] != NULL)
		{
			echo "<p id='Registration-ok'>\nPhew! Stay a little longer with us\n</p>";
			$_SESSION['flag_log'] = "";
		}
	?>
	</div>
</body>

<footer>

</footer>
</html>
