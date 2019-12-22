<?php

require './inc/dbhandler.php';

$inputBox = isset($_POST['input-box']) ? $_POST['input-box'] : '';
$completeBtn = isset($_POST['complete-btn']) ? $_POST['complete-btn'] : NULL;
$insertSql = "INSERT INTO tasks (tasklist) VALUES ('".$inputBox."');";
$selectSql = "SELECT * FROM tasks ORDER BY tasklist DESC;";
$checkColSql = "SELECT tasklist FROM tasks;";
$selectQuery = mysqli_query($conn, $selectSql) or die('error getting databse info');

// if tasks is empty put up the logo with 'no tasks' else echo column
$result = mysqli_query($conn, $checkColSql);
$row = mysqli_fetch_assoc($result);
if ($row == ''){
  echo '<img src="./img/taskrLogo.png"><br><p class="p-tag">No tasks set!</p>';
}else{
  // display tasklist column
  while ($row = mysqli_fetch_assoc($selectQuery)) {
    echo "<li class= 'tasklist'>" . $row['tasklist'] . "</li>
    <button type='submit' class='complete-btn' name='complete-btn' value={$row['id']}>Complete</button>";
  }
}

// insert text submitted from the textbox into the db
if ($inputBox){
  if (!empty($inputBox)){
    if (mysqli_query($conn, $insertSql)) {
      header("Location: task.php");
    }
  }
}

// delete information from the db
$completeSql = "DELETE FROM tasks WHERE id = $completeBtn;";
if(isset($_POST['complete-btn'])){
  if(mysqli_query($conn, $completeSql)){
    // redirect to different page so it doesn't try to submit multiple times
    header("Location: task.php");
  }
}
