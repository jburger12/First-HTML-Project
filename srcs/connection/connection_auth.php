<?php
session_start();
function	auth($mail, $passwd)
{
	if ((file_exists("../../private")) == true)
	{
		$crypt = file_get_contents("../../private/passwd");
		$un_crypt = unserialize($crypt);
		foreach ($un_crypt as $elem)
		{
			if ($elem['mail'] == $mail && $elem['passwd'] == $passwd)
			{
				$_SESSION['log_on_user'] = $elem['firstname'];
				return ($elem);
			}
		}
	}
	else {
		$_SESSION['flag_log'] = "KO";
		echo "<meta http-home='refresh' content='0,url=connection.php'>";
	}
	$_SESSION['logged_on_user'] = "";
	return (NULL);

}
?>
