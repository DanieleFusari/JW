<?php
$css = 'menu';
$title = 'Menu page Foleshill Cong';
include 'controller/functions_database.php';
$login_details = login_details();
include 'inc/header.php';
?>

<main>
  <div class="options">
    <a class="option" href="ministry">
      <img class="img_option" src="img/ministry.jpg" alt="ministry">
      <h3>Mininstry Record</h3>
    </a>

    <a class="option" href="midweek_meeting">
      <img class="img_option" src="img/our christian_life_ministry.jpg" alt="midweek meeting">
      <h3>Midweek Meeting</h3>
    </a>

    <a class="option" href="sunday">
      <img class="img_option" src="img/sunday.jpg" alt="Sunday">
      <h3>Public Talk and Watchtower Reader</h3>
    </a>

    <a class="option" href="finance">
      <img class="img_option" src="img/contributions.jpg" alt="contributions">
      <h3>Contributions & Finance</h3>
    </a>

    <a class="option" href="announcements">
      <img class="img_option" src="img/announcements.jpg" alt="announcements">
      <h3>Announcements, Update, Publications</h3>
    </a>

    <a class="option" href="change_password">
      <img class="img_option" src="img/security.jpg" alt="password">
      <h3>Change your password</h3>
    </a>

  </div>
  <hr>
  <?php if($login_details['auth'] === 'E') {?>
  <h1 class="elders">Elders</h1>
  <div class="options">
    <a class="option" href="reports">
      <img class="img_option" src="img/reports.jpg" alt="reports">
      <h3>Reports</h3>
    </a>
    <a class="option" href="sign_up">
      <img class="img_option" src="img/sign_up.jpg" alt="sign_up">
      <h3>Sign Up</h3>
    </a>
  </div>
<?php } ?>
</main>
</body>
</html>
