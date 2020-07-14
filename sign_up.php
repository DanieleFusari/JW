<?php
$css = 'sign_up';
$title = 'Sign up Foleshill Cong';
include 'controller/functions_database.php';
$login_details = login_details();
if ($login_details['auth'] !== 'E') {
  $_SESSION['flash'] = 'NOT AUTHRISED LOGGED OUT';
  $_SESSION['flash_colour'] = 'red';
  setcookie('token', 'hello', time() - 1,  '/');
  header('Location: index.php');
  exit();
}
include 'inc/header.php';
$amend = filter_input(INPUT_GET , 'amend', FILTER_SANITIZE_STRING);
?>

<main>
  <div id="create_account">
    <h2>Sign up</h2>
    <form class="" action="controller/create.php" method="post">
      <table>
        <tr>
          <th><label for="email">Email</label></th>
          <td><input id="email" type="email" name="email" placeholder="Email"> </td>
        </tr>
        <tr>
          <th><label for="name">Name</label></th>
          <td><input type="text" name="name" placeholder="Name"></td>
        </tr>
        <tr>
          <th><label for="auth">Auth</label></th>
          <td>
            <select id="auth" name="auth">
              <option value="P">Publisher</option>
              <option value="M">Ministerial Servent</option>
              <option value="E">Elder</option>
            </select>
          </td>
        </tr>
      </table>
      <input type="submit" value="Create">
    </form>
  </div>

  <hr>

  <div id="amend_accounts">
    <h3>Amend and Delete Accounts</h3>
    <div class="search">
      <input id="name" type="text" name="name" placeholder="Name">
      <button <?php if($amend) echo 'disabled'?> id="search_name" type="button">Search</button>
    </div>

    <table>
      <thead>
        <tr <?php if($amend) echo "class='lay'"?> >
          <th>Name</th>
          <th>Email</th>
          <th>Auth</th>
          <th>Amend</th>
        </tr>
      </thead>
      <tbody id="results">
          <!-- Resulst back from search AJAX -->
        <?php if ($amend) {
          $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
          $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
          $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
          ?>
          <form action="controller/create.php" method="post">
            <tr class="lay">
              <input hidden type="text" name="amend" value="true">
              <input hidden type="id" name="id" value="<?=$id?>">
              <td><input class="name" type="text" name="name" value="<?=$name?>"> </td>
              <td><input class="email" type="text" name="email" value="<?=$email?>"> </td>
              <td>
                <select name="auth">
                  <option value="P">Publisher</option>
                  <option value="M">Ministerial Servent</option>
                  <option value="E">Elder</option>
                </select>
              </td>
              <td><input type="submit" name="s_a" value="Update">
                  <input type="submit" name="s_a" value="Delete">
                  <input type="submit" name="s_a" value="Cancel"></td>
            </tr>
          </form>
        <?php }?>
      </tbody>
    </table>
  </div>
</main>
<script src="js/sign_up.js" type="text/javascript"></script>
