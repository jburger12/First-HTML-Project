<?PHP
session_start();

function	get_data()
{
	if ((isset($_POST['name']) && $_POST['name'] != NULL) &&
		$_POST['name'] != "admin" &&
  (isset($_POST['firstname']) && $_POST['firstname'] != NULL) &&
		$_POST['firstname'] != "admin" &&
  (isset($_POST['mail']) && $_POST['mail'] != NULL) &&
		$_POST['mail'] != "admin" &&
  (isset($_POST['passwd1']) && $_POST['passwd1'] != NULL) &&
		$_POST['passwd1'] != "admin" &&
  (isset($_POST['passwd2']) && $_POST['passwd2'] != NULL) &&
		$_POST['passwd2'] != "admin" &&
  (isset($_POST['submit']) && $_POST['submit'] === "Submit") &&
  ($_POST['passwd1'] == $_POST['passwd2']))
	{
		$tab['name'] = $_POST['name'];
    $tab['firstname'] = $_POST['firstname'];
    $tab['mail'] = $_POST['mail'];
		$tab['passwd'] = hash(sha512, $_POST['passwd1']);
	}
	else
	{
		if ($_POST['passwd1'] != $_POST['passwd2'])
		{
				$_SESSION['flagpasswd'] = "ko";
			  header('Location: registration.php');
			exit();
		}
		else
		{
				$_SESSION['flagfields'] = "ko";
		    header('Location: registration.php');
			exit();
		}
	}
	return ($tab);
}

$path = "../private";
$file = $path."/passwd";

$tab = get_data();
if (!file_exists($path))
{
	mkdir ($path);
}

if (!file_exists($file))
{
	$unserialized[] = $tab;
	$serialized[] = serialize($unserialized);
	file_put_contents($file, $serialized);
	$_SESSION['flagcreation'] = "ok";
	header('Location: registration.php');
	exit();
}
else
{
	$unserialized = unserialize(file_get_contents($file));
	foreach ($unserialized as $elem)
	{
		foreach ($elem as $mail=>$value)
		{
			if ($value == $tab['mail'])
			{
				$_SESSION['flagmail'] = "ko";
				header('Location: registration.php');
				exit();
			}
		}
	}
	$unserialized[] = $tab;
	$serialized = serialize($unserialized);
	file_put_contents($file, $serialized);
	$_SESSION['flagcreation'] = "ok";
	header('Location: registration.php');
	exit();
}
?>
