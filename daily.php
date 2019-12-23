<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once 'task.php';?>
    <title>daily | taskr</title>
  </head>
  <body>
    <form class="forminput" action="daily.php" method="POST">
      <input class="inputbox" type="text" placeholder="What's Your Main Focus for Today" name="input-box" autocomplete="off" required>
    </form>
    <!-- seperate form so the enter key doesn't delete tasks -->
    <div>
    <form class="tasklist-form" action="daily.php" method="POST">
      <ul class='list-container' name='field'>
        <?php require 'inc/backendDay.php'; ?>
      </ul>
  </form>
  </body>
</html>
