<?php
  session_start();
  include 'ConnectDB.php';
  //Insert all data
  $Quizoption = [];
  $Quizoption[0]=$_POST['Quizoption1'];
  $Quizoption[1]=$_POST['Quizoption2'];
  $Quizoption[2]=$_POST['Quizoption3'];
  $Quizoption[3]=$_POST['Quizoption4'];

  $sql = "INSERT INTO `QUIZdetail` ( `QuizID`, `QuizQuestion`, `QuizAnswer`) VALUES ('".$_SESSION['QuizID']."','".$_POST['QuizQuestion']."','".$_POST['QuizAnswer']."')";
  $records = $conn->query($sql);
  $Question =  $_POST['QuizQuestion'];

  for ($i=0; $i <4; $i++) { 
      $sql = "INSERT INTO `QUIZQuestionoption` ( `QuizID`, `QuizQuestion`, `Quizoption`) VALUES ('".$_SESSION['QuizID']."','".$Question."','".$Quizoption[$i]."')";
      $records = $conn->query($sql);
    }  
  if (isset($_POST['next']))
  {
    echo "<script language='javascript'>\n";
  	echo "window.location.href='Quizdetail.php?QuizID';";
  	echo "</script>\n";
  }
  else{
    echo ("Error: " . $conn->error);
    echo ("$sql");
  }  
  if (isset($_POST['finish']))
  {
    echo "<script language='javascript'>\n";
    echo "window.location.href='Quiz.php';";
    echo "</script>\n";
  }
  else{
    echo ("Error: " . $conn->error);
    echo ("$sql");
  }