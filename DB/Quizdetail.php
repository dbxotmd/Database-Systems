<!DOCTYPE html>
<html lang="en">
  <h2>createQuiz</h2>
  <head>
    <? include 'ConnectDB.php';?>
  </head>
  <body>

		<form  action="createquizdetaildata.php" method="post" >
      <fieldset>
        <label for="Quiz Question"><b>Quiz Question</b></label>
        <input type="QuizQuestion" placeholder="Enter QuizQuestion" name='QuizQuestion' id='QuizQuestion'required><br><br>

        <label for="Quizoption1"><b>Quiz option1</b></label>
        <input type="Quizoption1" placeholder="Enter Quiz option1" name='Quizoption1' id='Quizoption1'required><br><br>

        <label for="Quizoption2"><b>Quiz option2</b></label>
        <input type="Quizoption2" placeholder="Enter Quiz option2" name='Quizoption2' id='Quizoption2'required><br><br>

        <label for="Quizoption3"><b>Quiz option3</b></label>
        <input type="Quizoption3" placeholder="Enter Quiz option3" name='Quizoption3' id='Quizoption3'required><br><br>

        <label for="Quizoption4"><b>Quiz option4</b></label>
        <input type="Quizoption4" placeholder="Enter Quiz option4" name='Quizoption4' id='Quizoption4'required><br><br>

        <label for="QuizAnswer"><b>Quiz Answer</b></label>
        <input type="QuizAnswer" placeholder="Enter Quiz Answer" name='QuizAnswer' id='QuizAnswer'required><br><br> 

       <input type="submit" name="next" class="next-BTN" value="next">
       <input type="submit" name="finish" class="next-BTN" value="finish">

       </fieldset>
     </form>

  </body>
