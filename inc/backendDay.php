<?php

require 'dbhandler.php';


// checking if form is set
$inputBox = isset($_POST['input-box']) ? $_POST['input-box'] : '';
$completeBtn = isset($_POST['complete-btn']) ? $_POST['complete-btn'] : NULL;
// querys
$insertTaskSql = "INSERT INTO daytasks (dayTasklist) VALUES ('".$inputBox."');";
$selectTaskSql = "SELECT * FROM daytasks ORDER BY dayTasklist DESC;";
$checkColSql = "SELECT dayTasklist FROM daytasks;";
$selectQuery = mysqli_query($conn, $selectTaskSql) or die('error getting databse info');
//$insertDateSql = "INSERT INTO tasks (taskdate) VALUES ($displayDate)";

// date variables
//$taskDate = getDate();
//$displayDate = "$taskDate[mday]/$taskDate[mon]/$taskDate[year]";

// if tasks is empty put up the logo with 'no tasks' else echo column
$result = mysqli_query($conn, $checkColSql);
$row = mysqli_fetch_assoc($result);
if ($row == ''){
  echo '<img class="taskr-logo" src="./img/taskrLogo.png"><br><p class="p-tag">No tasks set!</p>';
}else{
  // display dayTasklist column
  while ($row = mysqli_fetch_assoc($selectQuery)) {
    echo "<li class= 'tasklist'>" . $row['dayTasklist'] . "</li>
    <button type='submit' class='complete-btn' name='complete-btn' value={$row['dayId']}>Complete</button>";
  }
}

// insert text submitted from the textbox into the db
if ($inputBox){
  if (!empty($inputBox)){
    if (mysqli_query($conn, $insertTaskSql)) {
      header("Location: daily.php");
    }
  }
}

// delete information from the db
$completeSql = "DELETE FROM daytasks WHERE dayId = $completeBtn;";
if(isset($_POST['complete-btn'])){
  if(mysqli_query($conn, $completeSql)){
    // redirect to different page so it doesn't try to submit multiple times
    header("Location: daily.php");
  }
}
