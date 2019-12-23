<?php

require 'dbhandler.php';

// checking if form isset
$yearInput = isset($_POST['year-input']) ? $_POST['year-input'] : '';
$yearComplete = isset($_POST['year-complete']) ? $_POST['year-complete'] : NULL;
// querys
$yearInsertSql = "INSERT INTO yeartasks (yearTasklist) VALUES ('".$yearInput."');";
$yearSelectSql = "SELECT * FROM yeartasks ORDER BY yearTasklist DESC;";
$yearCheckColSql = "SELECT yearTasklist FROM yeartasks;";
$yearSelectQuery = mysqli_query($conn, $yearSelectSql) or die("error getting data from db");

// put up logo if row['tasklist'] is empty
$result = mysqli_query($conn, $yearCheckColSql);
$row = mysqli_fetch_assoc($result);
if($row == ''){
  echo '<img class="taskr-logo" src="./img/taskrLogo.png"><br><p class="p-tag">No tasks set!</p>';
}else {
  // display tasklist
  while($row = mysqli_fetch_assoc($yearSelectQuery)){
    echo "<li class= 'tasklist'>" . $row['yearTasklist'] . "</li>
    <button type='submit' class='complete-btn' name='year-complete' value={$row['yearId']}>Complete</button>";
  }
}

// insert text into db
if($yearInput){
  if(!empty($yearInput)){
    if(mysqli_query($conn, $yearInsertSql)){
      header('Location: yearly.php');
    }
  }
}

// delete an item from the db
$yearCompleteSql = "DELETE FROM yeartasks WHERE yearId = $yearComplete";
if($yearComplete){
  if(mysqli_query($conn, $yearCompleteSql)){
    header('Location: yearly.php');
  }
}
