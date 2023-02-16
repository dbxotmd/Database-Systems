<?php
 	session_start();
  	include 'ConnectDB.php';
  	$QuizID = $_SESSION['QuizID'];
 	$Quizoption = [];
	$Quizoption[0]=$_POST['Quizoption1'];
	$Quizoption[1]=$_POST['Quizoption2'];
	$Quizoption[2]=$_POST['Quizoption3'];
	$Quizoption[3]=$_POST['Quizoption4'];
	$QuizQuestion = $_POST['QuizQuestion'];
	$QuizAnswer = $_POST['QuizAnswer'];

	$ssql = "SELECT QuizQuestion FROM `QUIZdetail` WHERE QuizID = '$QuizID'";
	$result = $conn->query($ssql);
	$row = mysqli_fetch_assoc($result);
	$old = $row['QuizQuestion'];

	$sql = "SET FOREIGN_KEY_CHECKS = 0";
	$result = $conn->query($sql);
	
  	$sql = "DELETE FROM `QUIZQuestionoption` WHERE QuizID = '$QuizID'";
	$result = $conn->query($sql);
	$sql = "DELETE FROM `QUIZdetail` WHERE QuizID = '$QuizID'";
	$result = $conn->query($sql);

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
	





?>