<!DOCTYPE html>
<html lang="en">
  <h2>createQuiz</h2>
  <head>
    <? include 'ConnectDB.php';?>
  </head>
  <body>

		<form  action="createquizdata.php" method="post" >
      <fieldset>

      <label for="Quiz name"><b>Quiz Name</b></label>
      <input type="Quizname" placeholder="Enter Quizname" name='Quizname' id='Quizname'required><br><br>

      <label for="Quizduration"><b>Quiz duration</b></label>
      <input type="Quizduration" placeholder="Enter Quiz duration" name='Quizduration' id='Quizduration'required><br><br>

      
       <input type="submit" name="next" class="next-BTN" value="next">
       </fieldset>
     </form>

  </body>
