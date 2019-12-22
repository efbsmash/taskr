<!DOCTYPE html>
<!-- this page is simply so the previous post request doesn't submit twice -->
<!-- will be used for submiting and deleting to and from the db -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="./img/taskrIcon.ico">
    <title>taskr</title>
  </head>
  <body>
    <p class="text">Submitted</p>
    <?php  header('Location: index.php');?>
  </body>
</html>
