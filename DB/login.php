<!DOCTYPE html>
<html lang="en">
  <h2>Log in</h2>
  <head>
    <? include 'ConnectDB.php';?>
  </head>
  <body>

		<form  action="LoadUser.php" method="post" >
      <fieldset>

      <label for="Memeber_ID"><b>Member_ID</b></label>
      <input type="Memeber_ID" placeholder="Enter Memeber_ID" name='Memeber_ID' id='Memeber_ID'required><br><br>

      <label for="Password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name='Password' id='Password'required><br><br>

       <input type="submit" name="Login" class="Login-BTN" value="Login">
       </fieldset>
     </form>

  </body>
