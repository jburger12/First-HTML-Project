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
        echo "<input type='checkbox' name='".$elem."'";
        if (array_key_exists($elem, $_POST))
        echo" checked='checked'";
        echo "> ".$elem."<br/>";
      }
    }
    echo "<input type='submit' name = 'submit' value='Validate' />";
    echo "</form>";
    echo "</aside>";
    ?>


    <?PHP

    $bdd = unserialize(file_get_contents("../bdd/serialized"));
    if (isset($bdd) && $bdd != NULL)
    {
      foreach ($bdd as $key=>$value)
      {
        foreach ($_POST as $pkey => $pvalue) {
          if ($pkey == $value[2])
          $cat1[] = $bdd[$key];
        }
      }
      if (isset ($cat1) && $cat1 != NULL)
      {
        foreach ($cat1 as $key2=>$value2)
        {
          foreach ($_POST as $pkey2=>$pvalue2)
          {
            if ($pkey2 == $value2[3])
            $cat2[] = $cat1[$key2];
          }
        }
      }
    }
    if (isset($cat2) && $cat2 != NULL)
    {
      echo "<table id='shop-dino'>";
      foreach ($cat2 as $train)
      {
        echo "<tr><td class='name-dino'>".$train[1]."</td></tr>";
        echo "<tr><td><img src='".$train[9]."'/ style='width:100%;'></td><tr/>";
        echo "<tr><td class='purchase-train'><a href='buy_a_train.php?train=".$train[0]."'>Buy me !</a></td></tr>";
      }
      echo "</table>";
    }
    else {
      echo "<p>Sorry no stock !</p>";
    }

    ?>
  </div>
</body>
<footer>
</footer>
</html>
