<?php
$css = 'reports';
$title = 'Congregation Reports';
include 'controller/functions_database.php';
$login_details = login_details();
if ($login_details['auth'] !== 'E') {
  $_SESSION['flash'] = 'NOT AUTHRISED LOGGED OUT';
  $_SESSION['flash_colour'] = 'red';
  setcookie('token', 'hello', time() - 1,  '/');
  header('Location: /');
  exit();
}
include 'inc/header.php';
?>

<main>

  <h1 class="h1"><?= $title ?></h1>
  <div class="table_options">
    <select class="name_options" name="name">
      <option value="all">ALL</option>
      <?php
        $all_logins = $db->query("SELECT name FROM login");
        $all_logins = $all_logins->fetchAll(PDO::FETCH_ASSOC);
        foreach ($all_logins as $value) { ?>
          <option value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
        <?php } ?>
    </select>

    <div class="dates">
      <label for="from_date">From:</label>
      <input id="from_date" type="date" name="dateFrom" value="<?= Date('Y-m-01') ?>">
    </div>

    <div class="dates">
      <label for="to_date">To:</label>
      <input id="to_date" type="date" name="dateTo" value="<?= Date('Y-m-t') ?>">
    </div>

    <button id="searchButton" type="submit" name="button">Search</button>
  </div>   <!-- End .table_options  -->


  <h2 class="h2">Totals</h2>
  <table class="tabelDisplay">
    <thead>
      <tr class="rowMobile">
        <th>Name</th>
        <th>Hou</th>
        <th>Min</th>
        <th>Plac</th>
        <th>Vids</th>
        <th>RV</th>
        <th>Stds</th>
      </tr>
      <tr class="rowDesktop">
        <th>Name</th>
        <th>Hours</th>
        <th>Minutes</th>
        <th>Placments</th>
        <th>Videos</th>
        <th>Return Visits</th>
        <th>Studies</th>
      </tr>
    </thead>
    <tbody id="totalRecordes">
      <!-- AJAX DATA -->
    </tbody>
  </table>


  <h3 class="h3">Congregation</h3>
  <table class="tabelDisplay">
    <thead>
      <tr class="rowMobile">
        <th>Hou</th>
        <th>Plac</th>
        <th>Vids</th>
        <th>RV</th>
        <th>Stds</th>
      </tr>
      <tr class="rowDesktop">
        <th>Hours</th>
        <th>Placments</th>
        <th>Videos</th>
        <th>Return Visits</th>
        <th>Studies</th>
      </tr>
    </thead>
    <tbody id="totalCongRecordes">
      <!-- AJAX DATA -->
    </tbody>
  </table>

</main>
<script src="js/reports.js" type="text/javascript"></script>
</body>
</html>
