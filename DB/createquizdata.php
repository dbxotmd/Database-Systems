<?php
  session_start();
  include 'ConnectDB.php';
  //Insert all data
  $quizid = "SELECT IFNULL(max(QuizID),0)+1 FROM `QUIZtable`" ;
  $result = $conn->query($quizid);
  if (!$result){
      echo ("Error: " . $conn->error);
      echo ("$max_userid");
  }
  $row = mysqli_fetch_array($result);
  $max_num = $row[0];
  $Member_ID =$_SESSION['Member_ID'];

  $author = "SELECT forename FROM Memeber WHERE Member_ID = '$Member_ID'";
  $res = $conn->query($author);
  $row = mysqli_fetch_array($res);
  $authorname = $row[0];		  

  $author = "SELECT surname FROM Memeber WHERE Member_ID = '$Member_ID'";
  $res = $conn->query($author);
  $row = mysqli_fetch_array($res);
  $authorname = $authorname.$row[0];  
  

  $sql = "INSERT INTO `QUIZtable` (`Member_ID`, `QuizID`, `Quizduration`, `Quizname`, `Quizauthor`, `Quizavailable`,`score`,`Quizdateofattempt`) VALUES ('".$_SESSION['Member_ID']."','".$max_num."','".$_POST['Quizduration']."', '".$_POST['Quizname']."','".$authorname."', '1','0',NULL)";
  $records = $conn->query($sql);
  if ($records)
  {
    
    $_SESSION['QuizID'] =$max_num;
    echo "<script language='javascript'>\n";
  	echo "window.location.href='Quizdetail.php';";
  	echo "</script>\n";
  }
  else{
    echo ("Error: " . $conn->error);
    echo ("$sql");
  }


