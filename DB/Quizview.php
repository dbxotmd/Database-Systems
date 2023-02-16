<?php
  session_start();
  include 'ConnectDB.php';
  $QuizID = $_GET['QuizID'];
  $Member_ID = $_SESSION['Member_ID'];


  $Quizdetail = "SELECT * FROM `QUIZtable`WHERE QuizID = '$QuizID'" ;
  $result = $conn->query($Quizdetail);
  $row = $result->fetch_assoc();

  echo "QuizID: ".$row['QuizID']."<br>";
  echo "Quizname: ".$row['Quizname']."<br>";
  echo "Quizduration: ".$row['Quizduration']."min<br>";
  echo "Quizauthor: ".$row['Quizauthor']."<br>";
  
  $QID = "SELECT Member_ID FROM `QUIZtable`WHERE QuizID = '$QuizID'" ;
  $res = $conn->query($QID);
  while ($srow = mysqli_fetch_assoc($res)) {
  	if ($srow['Member_ID'] == $Member_ID) {
  		$exist = 1;
  	}
  }
  $avail = "SELECT Quizavailable FROM `QUIZtable`WHERE QuizID = '$QuizID' and Member_ID = '$Member_ID'" ;
  $res = $conn->query($avail);
  $srow = mysqli_fetch_assoc($res);
  
  if($exist) {
  	if ($srow['Quizavailable']) {
  		echo "Quizavailable :  YES<br>";
  	$QuizID = $row['QuizID'];
  $quizarray = [];
  $Quizquestion = "SELECT QuizQuestion FROM `QUIZdetail` WHERE QuizID = '$QuizID'";
  $result = $conn->query($Quizquestion);
  $i=1;
  echo "<form action='result.php' method='post'>";
  while ($row = mysqli_fetch_assoc($result)) { 
  	echo "".$i.". ".$row['QuizQuestion']." <br>";
  	$quizarray[$i] = $row['QuizQuestion'];
  	$quizoption = "SELECT Quizoption FROM `QUIZQuestionoption` WHERE QuizID = '$QuizID' and QuizQuestion ='".$row['QuizQuestion']."'";
  	$res = $conn->query($quizoption);
  	$questionoption =[];
  	$j=0;
  	while ($srow = mysqli_fetch_assoc($res)) {
  		$questionoption[$j] = $srow['Quizoption'];
  		$j++;
  	}
  	echo "<ol>";
	echo "<input type='radio' name='q".$i."' value='".$questionoption[0]."' />".$questionoption[0]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[1]."' />".$questionoption[1]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[2]."' />".$questionoption[2]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[3]."' />".$questionoption[3]."
	<br>
	</ol>
	";
	$i++;
  }
  echo "<input type='submit' value='Submit' name='submit' class='btn btn-primary'/>";
  echo "</form>";
  $_SESSION['QuizID'] = $QuizID;
  $_SESSION['quizarray'] = $quizarray;
  	}
  	else{
  		echo "Quizavailable :  NO<br>";
  	echo "Score : ".$row['score']."<br>";
  	$QuizID = $row['QuizID'];
  $quizarray = [];
  $Quizquestion = "SELECT QuizQuestion FROM `QUIZdetail` WHERE QuizID = '$QuizID'";
  $result = $conn->query($Quizquestion);
  $i=1;
  echo "<form action='result.php' method='post'>";
  while ($row = mysqli_fetch_assoc($result)) { 
  	echo "".$i.". ".$row['QuizQuestion']." <br>";
  	$quizarray[$i] = $row['QuizQuestion'];
  	$quizoption = "SELECT Quizoption FROM `QUIZQuestionoption` WHERE QuizID = '$QuizID' and QuizQuestion ='".$row['QuizQuestion']."'";
  	$res = $conn->query($quizoption);
  	$questionoption =[];
  	$j=0;
  	while ($srow = mysqli_fetch_assoc($res)) {
  		$questionoption[$j] = $srow['Quizoption'];
  		$j++;
  	}
  	echo "<ol>";
	echo "<input type='radio' name='q".$i."' value='".$questionoption[0]."' />".$questionoption[0]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[1]."' />".$questionoption[1]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[2]."' />".$questionoption[2]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[3]."' />".$questionoption[3]."
	<br>
	</ol>
	";
	$i++;
  }
  echo "</form>";
  $_SESSION['QuizID'] = $QuizID;
  $_SESSION['quizarray'] = $quizarray;
  	}
  	
  }
  else{
  	echo "Quizavailable :  YES<br>";
  	$QuizID = $row['QuizID'];
  $quizarray = [];
  $Quizquestion = "SELECT QuizQuestion FROM `QUIZdetail` WHERE QuizID = '$QuizID'";
  $result = $conn->query($Quizquestion);
  $i=1;
  echo "<form action='result.php' method='post'>";
  while ($row = mysqli_fetch_assoc($result)) { 
  	echo "".$i.". ".$row['QuizQuestion']." <br>";
  	$quizarray[$i] = $row['QuizQuestion'];
  	$quizoption = "SELECT Quizoption FROM `QUIZQuestionoption` WHERE QuizID = '$QuizID' and QuizQuestion ='".$row['QuizQuestion']."'";
  	$res = $conn->query($quizoption);
  	$questionoption =[];
  	$j=0;
  	while ($srow = mysqli_fetch_assoc($res)) {
  		$questionoption[$j] = $srow['Quizoption'];
  		$j++;
  	}
  	echo "<ol>";
	echo "<input type='radio' name='q".$i."' value='".$questionoption[0]."' />".$questionoption[0]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[1]."' />".$questionoption[1]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[2]."' />".$questionoption[2]."
	<br>
	<input type='radio' name='q".$i."' value='".$questionoption[3]."' />".$questionoption[3]."
	<br>
	</ol>
	";
	$i++;
  }
  echo "<input type='submit' value='Submit' name='submit' class='btn btn-primary'/>";
  echo "</form>";
  $_SESSION['QuizID'] = $QuizID;
  $_SESSION['quizarray'] = $quizarray;
  }


?>
