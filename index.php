<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/taskrIcon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>taskr</title>
  </head>
  <body>
    <form class="forminput" action="index.php" method="POST">
      <input class="inputbox" type="text" placeholder="What's Your Main Focus for Today" name="input-box" autocomplete="off" required>
    </form>
    <!-- seperate form so the enter key doesn't delete tasks -->
    <form class= "tasklist-form" action="index.php" method="POST">
      <ul class='list-container' name='field'>
        <?php require 'main.php'; ?>
      </ul>
  </form>
  </body>
</html>
