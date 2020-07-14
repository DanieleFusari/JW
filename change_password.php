<?php
$css = 'change_password';
$title = 'Update Password';
include 'controller/functions_database.php';
$login_details = login_details();
include 'inc/header.php';
?>


<form class="update_password" action="controller/update_password.php" method="post">
  <h1 class="h1pass">Change Password</h1>
  <label>EMAIL</label>
  <input disabled type="text" value="<?= $login_details['email']?>">

  <label for="new_password">New Password</label>
  <input id="new_password" type="password" name="new_password" placeholder="New Password">

  <label for="confirm_password">Confirm Password</label>
  <input id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password">

  <input type="submit" value="Update Password">
</form>
