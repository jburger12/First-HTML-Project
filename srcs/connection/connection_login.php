<?PHP session_start();
	$_SESSION['mail'] = $_POST['mail'];
	$mdp = hash("sha512", $_POST['passwd']);
	$_SESSION['passwd'] = $mdp;

include ("connection_auth.php");
$ret_auth = auth($_SESSION['mail'], $_SESSION['passwd']);

if ($ret_auth == NULL)
{
	$_SESSION['flag_log'] = "KO";
	header('Location: connection.php');
}
else
{
	$_SESSION['logged_on_user'] = $ret_auth['firstname'];
	$_SESSION['name'] = $ret_auth['name'];
	$_SESSION['mail'] = $ret_auth['mail'];
	$_SESSION['flag_log'] = "OK";
	header('Location: connection.php');
}


?>
