<?PHP session_start(); ?>
<?PHP include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Return the list</a><br/><br/>
	<h2>Users list</h2>
    <?PHP

    $path = "../../private";
    $file = $path."/passwd";


    if (!file_exists($file))
    {
		echo "<p>No users are currently registered</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));
      echo "<div id='tab-admin-dino'>";
      echo "<table>";
      echo "<tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Mail</th>
      </tr>";
      foreach ($unserialized as $elem)
      {
        echo "<tr>
        <td>".$elem['name']."</td>
        <td>".$elem['firstname']."</td>
        <td>".$elem['mail']."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
    <br/>
    <h2>Add a user</h2>
    <div id="add-user">
      <br/><p> Please fill out the form. All fields are mandatory</p>
      <br/>
    <form method="post" action="admin-add.php">
    	Name: <input type="text" name="name"/><br /><br />
      Firstname : <input type="text" name="firstname"/><br /><br />
      Mail : <input type="text" name="mail"/><br /><br />
      Password : <input type="password" name="passwd1"/><br /><br />
      Repeat password : <input type="password" name="passwd2"/><br /><br />
    	<input type="submit" name = "submit" value="Envoyer" />
    </form>
    </div>
    <?php
      if ($_SESSION['flagchamps'] == "ko")
      {
		  echo "<p id='error'>Error : You must fill all the fields\n</p>";
        $_SESSION['flagchamps'] = NULL;
      }
      else if ($_SESSION['flagmail'] == "ko")
      {
		  echo "<p id='error'>Error : An account already exists with this email address\n</p>";
        $_SESSION['flagmail'] = NULL;
      }
      else if ($_SESSION['flagpasswd'] == "ko")
      {
		  echo "<p id='error'>Error : Please copy your password identically\n</p>";
        $_SESSION['flagpasswd'] = NULL;
      }
      else if ($_SESSION['flagcreation'] == "ok")
        {
			echo "<div id='inscription-ok'>Registration completed	!</div>";
          $_SESSION['flagcreation'] = NULL;
        }

    ?>
	<br/><h2>Modify a user account</h2>


 <br/><p>Enter the email of the user you want to edit,
      as well as the changes you wish to make :</p><br/>
	<form method="post" action="admin-modif-users.php">
	<p>You must fill all the fields, if you do not wish to modify an element, fill in the old element instead</p>
	 
	  E-Mail of the user : <input type="text" name="mail"/><br/><br/>
      New user e-mail : <input type="text" name="newmail"/><br/><br/>
      Name of the user : <input type="text" name="name"/><br/><br/>
      New name of the user : <input type="text" name="newname"/><br/><br/>
      Firstname of the user : <input type="text" name="firstnaem"/><br/><br/>
      New first name of the user : <input type="text" name="newfirstname"/><br/><br/>
        <input type="submit" name = "submit" value="OK" />
    </form>
 <?php
      if ($_SESSION['flag_modif_users'] == "KO")
      {
        echo "<p id='error'>The information given is incorrect\n</p>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
	  }
	  else if ($_SESSION['flag_modif_users'] == "KO-OK") //a virer
      {
        echo "<p id='error'>JK\n</p>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
	  }
	 else if ($_SESSION['flag_modif_users'] == "OK")
      {
          echo "<div id='registration-ok'>The change has been made to the user</div>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
      }

    ?>



	<br/><h2>Delete a user</h2>
	<br/><p>Enter the email address of the user you wish to delete :</p>
    <form method="post" action="admin-delete.php">
      Mail: <input type="text" name="mail"/>
      <input type="submit" name = "submit" value="Envoyer" />
    </form>

    <?php
    if ($_SESSION['no-user-to-delete'] == "ko")
    {
		echo "<p id='error'>Error : no users in the database</p>";
      $_SESSION['no-user-to-delete'] = "";
    }
    else {

      if ($_SESSION['flag_suppression_user'] == "ok")
      {
		  echo "<p id='inscription-ok'>Deleted user</p>";
        $_SESSION['flag_suppression_user'] = "";
      }
      else if ($_SESSION['flag_suppression_user'] == "ko")
      {
        echo "<p id='error'>Erreur : no users found with this email address</p>";
        $_SESSION['flag_suppression_user'] = "";
      }
    }
    ?>
  </div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>
