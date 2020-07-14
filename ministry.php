<?php
$css = 'ministry';
$title = 'Ministry Hours';
include 'controller/functions_database.php';
$login_details = login_details();
include 'inc/header.php';
?>
<main>
  <h1>Ministry Report</h1>
  <form class="details" action="controller/ministry.php" method="post">
    <input hidden type="text" name="action" value="add">
    <table class="tabelEnter">
      <tr>
        <th><label for="date">Date:</label></th>
        <td><input id="date" type="date" name="date" value="<?php echo date('Y-m-d'); ?>"></td>
      </tr>
      <tr>
        <th><label for="minutes">Minutes:</label></th>
        <td><input id="minutes" type="number" name="minutes" value="60"  ></td>
      </tr>
      <tr>
        <th><label for="placments">Placments:</label></th>
        <td><input id="placments" type="number" min="0" max="250" name="placments" value="0"></td>
      </tr>
      <tr>
        <th><label for="video">Video's Played:</label></th>
        <td><input id="video" type="number" min="0" max="20" name="video" value="0"></td>
      </tr>
      <tr>
        <th><label for="studies">Studies:</label></th>
        <td><input id="studies" type="number" min="0" max="20" name="studies" value="0"></td>
      </tr>
      <tr>
        <th><label for="returnVisits">Return Visits:</label></th>
        <td><input id="returnVisits" type="number" min="0" max="20" name="returnVisits" value="0"></td>
      </tr>
      <tr>
        <th><label for="partner">Work with:</label></th>
        <td><input id="partner" type="text" name="partner" placeholder="partner"></td>
      </tr>
    </table>
    <input id="buttonEnter" type="submit" value="Enter">
  </form>

  <hr>

  <h2>Search...</h2>
  <table class="tabelEnter">
    <tr>
      <th><label for="dateFrom">Enter from Date</label></th>
      <th><label for="dateTo">Enter to Date</label></th>
    </tr>
    <tr>
      <td><input id="dateFrom" type="date" name="dateFrom" value="<?= date('Y-m-01'); ?>"></td>
      <td><input id="dateTo"   type="date" name="dateTo"   value="<?= date('Y-m-t') ; ?>"></td>
    </tr>
  </table>
  <button id="buttonEnteSearch" type="button" name="button">Search...</button>

  <table class="tabelDisplay">
    <thead>
      <tr class="rowMobile">
        <th>Log</th>
        <th>Day</th>
        <th>Date</th>
        <th>Ho</th>
        <th>Mi</th>
        <th>Pl</th>
        <th>Vi</th>
        <th>RV</th>
        <th>St</th>
        <th>Partner</th>
      </tr>
      <tr class="rowDesktop">
        <th>Log ID</th>
        <th>Day</th>
        <th>Date</th>
        <th>Hours</th>
        <th>Minutes</th>
        <th>Placments</th>
        <th>Videos</th>
        <th>Return Visits</th>
        <th>Studies</th>
        <th>Partner</th>
      </tr>
    </thead>
    <tbody id="recordes">
      <!-- AJAX DATA -->
    </tbody>
  </table>

  <hr>

  <h2>Totals</h2>
  <table class="tabelDisplay">
    <thead>
      <tr>
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

<hr>

  <h3>Remove Record </h3>
  <form class="delete" action="controller/ministry.php" method="post">
    <input hidden type="text" name="action" value="delete">
    <input type="number" name="delete" placeholder="Enter ID"><br>
    <input type="submit" value="Remove">
  </form>
</main>
<script type="text/javascript" src="js/ministry.js"></script>
</body>
</html>
