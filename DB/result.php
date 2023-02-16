<?php
	session_start();
  	include 'ConnectDB.php';
  	$QuizID = $_SESSION['QuizID'];
  	$quizarray = $_SESSION['quizarray'];
  	echo $_SESSION['Member_ID'];
	

	$score =0;

	$sql = "SELECT QuizQuestion FROM `QUIZdetail` WHERE QuizID ='$QuizID'";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	$count++;
	$post =[];
	for ($i=1; $i <$count ; $i++) {
		$post[$i] = $_POST['q'.$i.''];
	} 
	for ($i=1; $i <$count ; $i++){
		$ans = "SELECT QuizAnswer FROM `QUIZdetail` WHERE QuizID ='$QuizID' and QuizQuestion = '".$quizarray[$i]."'";	
		$res = $conn->query($ans);
		$row = mysqli_fetch_assoc($res);
		if ($post[$i]==$row['QuizAnswer']) {
			$score++;
		}
	}
	$sql = "SELECT * FROM `QUIZtable` WHERE QuizID ='$QuizID'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$quizname =$row['Quizname'];
	$quizduration = $row['Quizduration'];
	$quizauthor = $row['Quizauthor'];
	
	$Member_ID = $_SESSION['Member_ID'];
	$date = date("Y/m/d");	

	$ssql = "SELECT Member_ID FROM `QUIZtable` WHERE QuizID ='$QuizID'";
	$resul = $conn->query($ssql);
	$exist =0;
	while ($row = mysqli_fetch_assoc($resul)) {
		if ($row['Member_ID'] == $Member_ID) {
			$exist =1;
		}
	}
	if($exist){
			$ssql = "UPDATE `QUIZtable` SET `score` = '$score', `Quizdateofattempt` = '$date' ,`Quizavailable` = 0  WHERE Member_ID = '$Member_ID'and QuizID = '$QuizID' ";
			$res = $conn->query($ssql);
			if (!$res){
      			echo ("Error: " . $conn->error);
  	  
  			}
			echo "<script language='javascript'>\n";
			echo "alert('score = ".$score."'); window.location.href='Quizview.php?QuizID=".$QuizID."';\n";
			echo "</script>\n";
	}else{
		$sql = "INSERT INTO `QUIZtable`(`Member_ID`, `QuizID`, `Quizduration`, `Quizname`, `Quizauthor`, `Quizavailable`, `score`, `Quizdateofattempt`) VALUES ('".$Member_ID."','".$QuizID."','".$quizduration."','".$quizname."', '".$quizauthor."','0','".$score."','".$date."')";
  		$result = $conn->query($sql);

		if (!$result){
      		echo ("Error: " . $conn->error);
  	  
  		}
	  	echo "<script language='javascript'>\n";
		echo "alert('score = ".$score."'); window.location.href='Quizview.php?QuizID=".$QuizID."';\n";
		echo "</script>\n";

	}


?>