<?PHP session_start(); ?>
<?PHP include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Return to the list</a><br/><br/>
    <h2>List the categories</h2>

    <?PHP
    $path = "../../private";
    $file = $path."/categories";
    if (!file_exists($file))
    {
      echo "<p>No category currently exists</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));

      $cat1 = $unserialized[cat1];
      $cat2 = $unserialized[cat2];
      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Catégorie 1</th>
      </tr>";
      foreach ($cat1 as $cat1_elem)
      {
        echo "<tr>
        <td>".$cat1_elem."</td>";
      }
      echo "</table>";
      echo "</div><br/><br/>";

      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Category 2</th>
      </tr>";
      foreach ($cat2 as $cat2_elem)
      {
        echo "<td>".$cat2_elem."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }

    ?>
    <br/>
    <h2>Add category</h2>
    <div id="add-user">
	  <br/><p>Please indicate the category to add:</p>
      <br/>
      <form method="post" action="admin-add-category.php">
        Category : <input type="text" name="category"/>
        <input type="submit" name = "submit" value="Envoyer" />
      </form>
    </div>
  <?PHP
    if ($_SESSION['category-create'] == "ko")
    {
    echo "<p id='error'>Error : This category already exists !</p>";
    $_SESSION['category-create'] = NULL;
    }
    else if ($_SESSION['flag-creation-cat'] == "ok")
    {
    echo "<p id='inscription-ok''>Category successfully modified !</p>";
    $_SESSION['flag-creation-cat'] = NULL;
    }
?>

<br/><h2>Modify a category</h2>

<br/><p>Enter the name of the category you want to edit :</p>
<form method="post" action="admin-modif-category.php">
  Old category : <input type="text" name="old-category"/><br/><br/>
  New category : <input type="text" name="new-category"/><br/><br/>
  <input type="submit" name = "submit" value="Submit" />
</form>
<?PHP
  if ($_SESSION['category-modif'] == "ko")
  {
	  echo "<p id='error'>Error : This category does not exist !</p>";
  $_SESSION['category-modif'] = NULL;
  }
  else if ($_SESSION['flag-modif-cat'] == "ok")
  {
	  echo "<p id='inscription-ok''>Category successfully modified !</p>";
  $_SESSION['flag-modif-cat'] = NULL;
  }
?>

<br/><h2>Delete category</h2>
<br/><p>Enter the name of the category you want to delete :</p>
<form method="post" action="admin-delete-category.php">
  Category : <input type="text" name="category"/>
  <input type="submit" name = "submit" value="Submit" />
</form>
<?PHP
  if ($_SESSION['category-delete'] == "ko")
  {
	  echo "<p id='error'>Error : This category does not exist !</p>";
  $_SESSION['category-delete'] = NULL;
  }
  else if ($_SESSION['flag-delete-cat'] == "ok")
  {
	  echo "<p id='inscription-ok''>Category deleted successfully !</p>";
  $_SESSION['flag-delete-cat'] = NULL;
  }
?>

</div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>
