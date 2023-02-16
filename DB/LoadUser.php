<?php
# UPLOAD IMAGE TO SQL SUCCESSFULLY
include 'ConnectDB.php';

$Memeber_ID = $_POST['Memeber_ID'];
$Password = $_POST['Password'];


$sql = "SELECT * FROM Memeber WHERE Member_ID='$Memeber_ID' and Password='$Password'";
$result = $conn->query($sql);
    if (!$result){
      echo("Error: " . $conn->error);
    }
    

    // Mysql_num_row is counting the table rows
    $count=mysqli_num_rows($result);
    $row = $result->fetch_assoc();
    $Memeber_ID = $row["Member_ID"];

    // If the result matched $username and $password, the table row must be one row
    if($count == 1){
        session_start();

        $_SESSION['loggedin'] = true;
        $_SESSION['Member_ID'] = $Memeber_ID;

        echo "<script language='javascript'>\n";
		    echo "alert('Log in successful'); window.location.href='Quiz.php';\n";
		    echo "</script>\n";
    	   
    }
    else{
      echo "<script language='javascript'>\n";
  		echo "alert('Wrong Email or Password'); window.location.href='login.php'\n;";
  		echo "</script>\n";
    }
?>

