<?php
	session_start();
	include 'ConnectDB.php';
	$QuizID = $_GET['QuizID'];
	$MemberID = $_SESSION['Memeber_ID'];

	$sql = "SET FOREIGN_KEY_CHECKS = 0";
	$result = $conn->query($sql);
	if (!$result){
      echo ("Error: " . $conn->error);
  	} 
	$sql = "DELETE FROM `QUIZtable` WHERE QuizID = '$QuizID'";
	$result = $conn->query($sql);
	if (!$result){
      echo ("Error: " . $conn->error);
  	}
  	$sql = "SET FOREIGN_KEY_CHECKS = 1";
	$result = $conn->query($sql);
	if (!$result){
      echo ("Error: " . $conn->error);
  	} 
  	$sql = "DELETE FROM `QUIZQuestionoption` WHERE QuizID = '$QuizID'";
	$result = $conn->query($sql);
	$sql = "DELETE FROM `QUIZdetail` WHERE QuizID = '$QuizID'";
	$result = $conn->query($sql);

  	echo "<script language='javascript'>\n";
	echo "window.location.href='Quiz.php';\n";
	echo "</script>\n";

?>