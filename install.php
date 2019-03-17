<?php
session_start();
$_SESSION['Purchase'] = "";
$path = "private";
$file = $path."/passwd";
if (!file_exists($path))
{
  mkdir ($path);
  $my_file = fopen("$file", "x");

  $tab[0][name] = 'admin';
  $tab[0][firstname] = 'admin';
  $tab[0][mail] = 'admin';
  $tab[0][passwd] = hash(sha512, "admin");

  $serialized[] = serialize($tab);
  file_put_contents($file, $serialized);
}
include("srcs/shop_get_bdd.php");

$file_cat = $path."/categories";
if (!file_exists($file_cat))
{
  $my_file_cat = fopen("$file_cat", "x");

  $tab_cat[cat1][0] = 'Model Trains';
  $tab_cat[cat1][1] = 'Accessories';
  $tab_cat[cat2][0] = 'Decorations';
  $tab_cat[cat2][1] = 'Baseboards';

  $serialized_cat[] = serialize($tab_cat);
  file_put_contents($file_cat, $serialized_cat);
}

echo "<meta http-equiv='refresh' content='0,url=index.php'>";
?>
