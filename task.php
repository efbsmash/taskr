<!DOCTYPE html>
<!-- this page will hold the navbar and the linking sheets so i can customise index.php -->
<?php //require 'backendDay.php'; ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/taskrIcon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>taskr</title>
  </head>
  <header>
    <nav class="navbar">
      <ul class="navbar-container">
        <li class="navbar-list"><a class="navbar-link" href="index.php">Home</a></li>
        <li class="navbar-list"><a class="navbar-link" href="daily.php">Daily</a></li>
        <li class="navbar-list"><a class="navbar-link" href="monthly.php">Monthly</a></li>
        <li class="navbar-list"><a class="navbar-link" href="yearly.php">Yearly</a></li>
      </ul>
    </nav>
    <div class="title-page">
      <?php
        if(basename($_SERVER['PHP_SELF']) == 'daily.php'){
          echo '<p class="p-title">Daily Tasks!</p>';
        }elseif(basename($_SERVER['PHP_SELF']) == 'monthly.php'){
          echo '<p class="p-title">Monthly Tasks!</p>';
        }elseif(basename($_SERVER['PHP_SELF']) == 'yearly.php'){
          echo '<p class="p-title">Yearly Tasks!</p>';
        }else{
          echo '<p class="p-title">Home</p>';
        }
      ?>
    </div>
  </header>
  <body>
    <?php //header('Location: index.php'); ?>
  </body>
</html>
