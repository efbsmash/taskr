<!DOCTYPE html>
<?php require_once 'task.php'; ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="forminput" action="yearly.php" method="POST">
      <input class="inputbox" type="text" name="year-input" placeholder="What's Your Main Focus for the Year?" autocomplete="off" required>
    </form>
    <div>
    <form class="tasklist-form" action="yearly.php" method="POST">
      <ul class="list-container">
        <?php require_once 'inc/backendYear.php'; ?>
      </ul>
    </form>
  </body>
</html>
