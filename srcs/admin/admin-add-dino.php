<?PHP
session_start();
function	get_data()
{
  if ((isset($_POST['product']) && $_POST['product'] != NULL) &&
  (isset($_POST['category']) && $_POST['category'] != NULL) &&
  (isset($_POST['price']) && $_POST['price'] != NULL) &&
  (isset($_POST['image']) && $_POST['image'] != NULL) &&
  (isset($_POST['submit']) && $_POST['submit'] === "Submit"))
  {
    $tab[0] = NULL;
    $tab[1] = $_POST['product'];
    $tab[2] = $_POST['category'];
    $tab[4] = $_POST['price'];
    $tab[5] = "../img/".$_POST['image'];
  }
  else
  {
    $_SESSION['flagchamps'] = "ko";
    header('Location: admin-products.php');
    exit();
  }
  return ($tab);
}

$path = "../../bdd";
$file = $path."/serialized";

$tab = get_data();
$unserialized = unserialize(file_get_contents($file));
$tab[0] = count($unserialized) + 1;
echo $tab[0];
$unserialized[] = $tab;
$serialized = serialize($unserialized);
file_put_contents($file, $serialized);
$_SESSION['flagcreation'] = "ok";
echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
exit();
?>
