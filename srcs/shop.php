<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    
    <?PHP
    $path = "../private";
    $file = $path."/categories";
    $unserialized = unserialize(file_get_contents($file));
  echo "<h2>Shop</h2>";
  echo "<aside>";
  echo "<p>Categories :</p>";
  echo "<form method='post' action='check-box-shop.php'>";
  foreach ($unserialized as $key=>$value)
  {
    foreach ($value as $elem)
    {
      echo "<input type='checkbox' name='".$elem."' checked='checked'> ".$elem."<br/>";
  }
}
  echo "<input type='submit' name = 'submit' value='Validate' />";
  echo "</form>";
  echo "</aside>";
  ?>

  <?PHP

  $bdd = unserialize(file_get_contents("../bdd/serialized"));
  // print_r ($bdd);
  echo "<table id='shop-Model trains'>";
  foreach ($bdd as $train)
  {
    echo "<tr><td class='name-train'>".$train[1]."</td></tr>";
    echo "<tr><td><img src='".$train[9]."'/ style='width:100%;'></td><tr/>";
    echo "<tr><td class='buy-a-train'><a href='buy_a_train.php?train=".$train[0]."'>Choo choo bitch !</a></td></tr>";
  }
  echo "</table>";

  ?>
</div>
</body>
<footer>
</footer>
</html>
