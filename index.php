<?php
$css = 'login';
$title = 'Login Foleshill Cong';
if (isset($_COOKIE['token'])) {
  header('Location: menu');
  exit();
}
include 'inc/header.php';
?>
    <main>
      <img src="img/jw_logo.jpg" alt="jw_logo">
      <form class="login" action="controller/login.php" method="post">
        <table>
          <tr>
            <th><label for="email">Email:</label></th>
            <td><input id="email" type="text" name="email" placeholder="Enter Email"> </td>
          </tr>
          <tr>
            <th><label for="jw_password">Password: </label></th>
            <td><input id="jw_password" type="password" name="password" placeholder="Enter Password"> </td>
          </tr>
        </table>
        <input type="submit" value="login">
      </form>
    </main>
  </body>
</html>
