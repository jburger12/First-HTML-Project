<?PHP session_start(); ?>
<?PHP include("header_connection.php"); ?>
<?PHP

		$crypt = file_get_contents("../../private/passwd");
		$un_crypt = unserialize($crypt);
		$i = 0;

		foreach ($un_crypt as $elem)
		{
			if ($elem['name'] == $_SESSION['name'] 
				&& $elem['logged_on_user'] == $_SESSION['firstname'] 
				&& $elem['mail'] == $_SESSION['mail'])
			{
				$_SESSION['flag_log'] = "KO";
				$_SESSION['logged_on_user'] = "";
				$_SESSION['name'] = "";
				$_SESSION['mail'] = "";
				$_SESSION['passwd'] = "";
				unset($un_crypt[$i]);
				$un_crypt = array_values($un_crypt);
				$crypt = serialize($un_crypt);
				file_put_contents("../../private/passwd", $crypt);
				echo "<p id='registration-ok'>\nYour account has been successfully deleted. Goodbye!<br />You will be redirected to the home in a moment.</p>";
				echo "<meta http-equiv='refresh' content='4,url=../../index.php'>";
			}
			$i++;
		}
?>
