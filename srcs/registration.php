<?PHP session_start(); ?>
<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>

<div id="form">
  <p> Please fill out the form. All fields are mandatory</p>
  <br/>
<form method="post" action="check-inscription.php">
	Name: <input type="text" name="name"/><br /><br />
  Firstname : <input type="text" name="firstname"/><br /><br />
  Mail : <input type="text" name="mail"/><br /><br />
  Password : <input type="password" name="passwd1"/><br /><br />
  Repeat your password : <input type="password" name="passwd2"/><br /><br />
	<input type="submit" name = "submit" value="Submit" />
</form>
</div>
</body>
</html>
<?php
  if ($_SESSION['flagfields'] == "ko")
  {
    echo "<p id='error'>Error : you must fill in all the fields\n</p>";
    $_SESSION['flagfields'] = NULL;
  }
  else if ($_SESSION['flagmail'] == "ko")
  {
	  echo "<p id='error'>Error : an account already exists with this email address\n</p>";
    $_SESSION['flagmail'] = NULL;
  }
  else if ($_SESSION['flagpasswd'] == "ko")
  {
	  echo "<p id='error'>Error : please copy your password identically\n</p>";
    $_SESSION['flagpasswd'] = NULL;
  }
  else if ($_SESSION['flagcreation'] == "ok")
    {
      echo "<div id='registration-ok'>registration completed !<br/><br/><a href='connection/connection.php'>Registration Successful! :)</a></div>";
      $_SESSION['flagcreation'] = NULL;
    }
?>
