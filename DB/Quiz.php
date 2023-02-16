<!DOCTYPE html>
<html>
<head>
	<h1>Quiz</h1>
</head>
<body>
<?php
  session_start();
  include 'ConnectDB.php';

  $Quiz = "SELECT QuizID ,Quizname FROM `QUIZtable`" ;
  $result = $conn->query($Quiz);
  $count = mysqli_num_rows($result);
  $quizlist = [];
 
  $status = "SELECT status FROM `Memeber` WHERE Member_ID = '".$_SESSION['Member_ID']."'";
  $res = $conn->query($status);
  $srow = mysqli_fetch_assoc($res);
  if ($srow['status']== 1) {
  	echo "<a href='CreateQuiz.php'>CreateQuiz</a>";
  	echo "<div class ='Quizlist'>";
  	if ($count ==0) {
  	 	echo "No Quiz";
  	 	} 
  	$j=1; 
  	$exist =0;
  	$quizlist[0] = -1;
	while($row = mysqli_fetch_assoc($result)) { 
		for ($i=0; $i <count($quizlist); $i++) { 
			if($quizlist[$i] == $row['QuizID']) {
				$exist =1;
			}
		}
		$quizlist[$j]= $row['QuizID'];
		$j++;
		if (!$exist) {
			echo "<a href='Quizview.php?QuizID=".$row['QuizID']."'>".$row['Quizname']."</a>";
	 		echo "<button type='button' class='btn btn-secondary' title='delete' onclick='window.location.href=`DeleteQuiz.php?QuizID=".$row['QuizID']."`'>delete</button>";
	  	
	  		echo "<button type='button' class='btn btn-secondary' title='Edit'onclick='window.location.href=`EditQuiz.php?QuizID=".$row['QuizID']."`'>edit</button>";
	  		echo "<br>";
		}
		$exist =0;
	 	
	 }
	echo "</div>";
	$conn->close();	
  }else{
  	echo "<div class ='Quizlist'>";
  	if ($count ==0) {
  	 	echo "No Quiz";
  	 }
  	$j=1; 
  	$exist =0;
  	$quizlist[0] = -1;
	while($row = mysqli_fetch_assoc($result)) { 
		for ($i=0; $i <count($quizlist); $i++) { 
			if($quizlist[$i] == $row['QuizID']) {
				$exist =1;
			}
		}
		$quizlist[$j]= $row['QuizID'];
		$j++;
		if (!$exist) {
		 	echo "<a href='Quizview.php?QuizID=".$row['QuizID']."'>".$row['Quizname']."</a>";
  			echo "<br>";
		 }
		$exist =0;	 
  	}
  echo "</div>";
	$conn->close();

  }
?>

</body>
</html>
