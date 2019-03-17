<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <h2>Change this</h2>

    <?PHP
    $bdd = unserialize(file_get_contents("../bdd/serialized"));
    $flag = 0;
    $id = $_GET[train] - 1;
    foreach ($bdd as $num_train)
    {
        if ($num_train[0] == $_GET[train])
          $flag = 1;
    }
    if (isset($_GET[train]) && $_GET[train] != NULL &&
    $_GET[dino] >= 0 && is_numeric($_GET[train]) && $flag == 1)
    {
      echo "<a href='shop.php' class='admin-users'>Return to the list</a><br/><br/>";
      echo "<table id='page-train'>";
      echo "<tr><td class='name-train'>".$bdd[$id][1]."</td><tr/>";
      echo "<tr><td><img src='".$bdd[$id][9]."'/ style='width:100%;'></td><tr/>";
      echo "<tr><td>Categories : ".$bdd[$id][2].", ".$bdd[$_GET[train]][3]."</td><tr/>";;
      echo "<tr><td>Price : ".$bdd[$id][6]."</td><tr/>";
	  echo "<tr><td><a href='add_basket.php?train=".$bdd[$id][0]."'>I have it in my basket</a></td><tr/>";
      echo "</table>";
    }
    else {
      echo "<meta http-equiv='refresh' content='0,url=shop.php'>";
      exit();
    }
    ?>
  </div>
</body>
<footer>
</footer>
</html>
