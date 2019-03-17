<?PHP session_start();
include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Return the list</a><br/><br/>
    <h2>List of products</h2>
    <?PHP
    $path = "../../bdd";
    $file = $path."/serialized";
    if (!file_exists($file))
    {
      echo "<p>No products are available for sale</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));
      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Id</th>
      <th>Product</th>
      <th>Category</th>
      <th>Price</th>
      <th>Image</th>
      </tr>";
      foreach ($unserialized as $elem)
      {
        echo "<tr>
        <td>".$elem[0]."</td>
        <td>".$elem[1]."</td>
        <td>".$elem[2]."</td>
		<td>".$elem[3]."</td>
		<td>".$elem[4]."</td>
	    <td>".$elem[5]."</td>
	         </tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
    <br/>
	<h2>Add a product</h2>
    <div id="add-user">
	  <br/><p>Please indicate the product to add:</p>
      <br/>
	  <form method="post" action="admin-add-dino.php">
	    Product : <input type="text" name="product"/><br/><br/>
        Category : <input type="text" name="category"/><br/><br/>
        Price : <input type="text" name="prix"/><br/><br/>
        Image : <input type="file" name="image"/><br/><br/>
        <input type="submit" name = "submit" value="Submit" />
      </form>
    </div>
    <?php
    if ($_SESSION['flagchamps'] == "ko")
    {
		echo "<p id='error'>Error : You must fill all the fields\n</p>";
      $_SESSION['flagchamps'] = NULL;
    }
    else if ($_SESSION['flagcreation'] == "ok")
    {
		echo "<div id='registration-ok'>Congratulations ! You have a new product!</div>";
      $_SESSION['flagcreation'] = NULL;
    }

    ?>
    <br/><h2>Modify a product</h2>
	<br/><p>Enter the identifier of the product you want to edit,
      as well as the changes you wish to make :</p><br/>
    <form method="post" action="admin-modif-dino.php">
      Name of product : <input type="text" name="product"/><br/><br/>
	  Category : <input type="text" name="category"/><br/><br/>
      Price : <input type="text" name="price"/><br/><br/>
      Image : <input type="file" name="image"/><br/><br/>
      <input type="submit" name = "submit" value="Submit" />
    </form>
<?PHP

if ($_SESSION['flag_modif_dino'] == "ko")
{
	echo "<p id='error'>Error : no products found with this id</p>";
  $_SESSION['flag_modif_dino'] = "";
}
else if ($_SESSION['flag_champs_modif_dino'] == "ko")
{
  echo "<p id='error'>Error : You must fill all the fields !</p>";
  $_SESSION['flag_champs_modif_dino'] = "";
}
else if ($_SESSION['flag_modif_dino'] == "ok")
{
	echo "<p id='registration-ok'>Your product has been modified	!</p>";
  $_SESSION['flag_modif_dino'] = "";
}
?>
    <br/><h2>Delete a product</h2>
	<br/><p>The product ID you want to delete :</p><br/>
    <form method="post" action="admin-delete-dino.php">
      ID of the product : <input type="text" name="id"/>
      <input type="submit" name = "submit" value="Submit" />
    </form>

    <?php
    if ($_SESSION['no-dino-to-delete'] == "ko")
    {
      echo "<p id='error'>Error : no product present in the database/p>";
      $_SESSION['no-dinoto-delete'] = "";
    }
    else {

      if ($_SESSION['flag_suppression_dino'] == "ok")
      {
		  echo "<p id='registration-ok'>Goodbye little product !</p>";
        $_SESSION['flag_suppression_dino'] = "";
      }
      else if ($_SESSION['flag_suppression_dino'] == "ko")
      {
		  echo "<p id='error'>Error : No products found with this id</p>";
        $_SESSION['flag_suppression_dino'] = "";
      }
    }
    ?>
  </div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>
