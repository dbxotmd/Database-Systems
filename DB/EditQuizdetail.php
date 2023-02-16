<?php
  session_start();
  include 'ConnectDB.php';
  //Insert all data
  
  $Member_ID =$_SESSION['Member_ID'];
  $QuizID = $_SESSION['QuizID'];
  $Quizname = $_POST['Quizname'];
  $Quizduration = $_POST['Quizduration'];

  $sql = "UPDATE `QUIZtable` SET `Quizname` = '$Quizname', `Quizduration` = '$Quizduration'  WHERE QuizID = '$QuizID' ";
  $result = $conn->query($sql);
  if ($result)
  {
    
    $_SESSION['QuizID'] =$QuizID;
    echo "<script language='javascript'>\n";
  	echo "window.location.href='EditQuizdetaildata.php';";
  	echo "</script>\n";
  }
  else{
    echo ("Error: " . $conn->error);
    echo ("$sql");
  }

