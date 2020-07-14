<script type="text/javascript">
let level = "<?php echo $level; ?>";
let page_name = "<?= $_SERVER['SCRIPT_NAME']?>";
</script>

<main>
  <h1 class="h1"><?= $title ?></h1>

  <select id="month" name="month">
  <?php
    $month = date('F');
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    foreach($months as $value) { ?>
      <option <?php if($value == $month) echo 'selected';?> value="<?=$value;?>"> <?=$value;?> </option>
    <?php } ?>
  </select>

  <?php if($login_details['auth'] === 'E') { ?>
  <form id="upload_files" action="controller/notice_board_upload.php" method="post" enctype="multipart/form-data">
    <input hidden  id="month_value" type="text" name="month_value" value="<?= $month ?>">
    <input hidden  id="page_name" type="text" name="page_name" value="<?= $_SERVER['SCRIPT_NAME']?>">
    <input type="file" name="f1" size="n">
    <button type="submit" name="button">UPLOAD</button>
  </form>
  <?php } ?>

<hr>

  <div id="files">
    <!-- javascript loads the PDF files here. -->
  </div>

</main>
<script src="js/notice_board.js" type="text/javascript"></script>
</body>
</html>
