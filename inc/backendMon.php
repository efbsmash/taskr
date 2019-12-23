<?php

require 'dbhandler.php';

// checking if form isset
$monInput = isset($_POST['mon-input']) ? $_POST['mon-input'] : '';
$monComplete = isset($_POST['mon-complete']) ? $_POST['mon-complete'] : NULL;
// querys
$monInsertSql = "INSERT INTO montasks (monTasklist) VALUES ('".$monInput."');";
$monSelectSql = "SELECT * FROM montasks ORDER BY monTasklist DESC;";
$monCheckColSql = "SELECT monTasklist FROM montasks;";
$monSelectQuery = mysqli_query($conn, $monSelectSql) or die("error getting data from db");

// put up logo if row['tasklist'] is empty
$result = mysqli_query($conn, $monCheckColSql);
$row = mysqli_fetch_assoc($result);
if($row == ''){
  echo '<img class="taskr-logo" src="./img/taskrLogo.png"><br><p class="p-tag">No tasks set!</p>';
}else {
  // display tasklist
  while($row = mysqli_fetch_assoc($monSelectQuery)){
    echo "<li class= 'tasklist'>" . $row['monTasklist'] . "</li>
    <button type='submit' class='complete-btn' name='mon-complete' value={$row['monId']}>Complete</button>";
  }
}

// insert text into db
if($monInput){
  if(!empty($monInput)){
    if(mysqli_query($conn, $monInsertSql)){
      header('Location: monthly.php');
    }
  }
}

// delete an item from the db
$monCompleteSql = "DELETE FROM montasks WHERE monId = $monComplete";
if(isset($_POST['mon-complete'])){
  if(mysqli_query($conn, $monCompleteSql)){
    header('Location: monthly.php');
  }
}
