<!DOCTYPE html>
<html lang="en">
  <head>
    <h2>Register</h2>
  </head>
  <body>
    <header>
    <?php include 'ConnectDB.php';?>
    </header>

    <form  action="./UploadUser.php" method="post" enctype="multipart/form-data">

    <fieldset>

    <label for="forenames"><b>Foreame</b></label>
    <input type="text" placeholder="Enter your names" name='forenames' id='forenames'required><br><br>

    <label for="surenames"><b>Surname</b></label>
    <input type="text" placeholder="Enter your names" name='surnames' id='surnames'required><br><br>

    <label for="status"><b>Status</b></label>
    <input type="status" placeholder="Enter your status" name='status' id='status'required><br><br>


    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name='Password' id='password'required><br><br>

    <label for="ConfirmPassword"><b>Confirm password</b></label>
    <input type="password" placeholder="Confirm Password" name='Confirm Password' id='confirm_password'required><br><br>

 
     <input type="submit" name="CreateAccount" class="Register-BTN" value="Register">
     </fieldset>
     </form>

     <script type="text/javascript">
        var password = document.getElementById("password")
         , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
         if(password.value != confirm_password.value) {
           confirm_password.setCustomValidity("Passwords Don't Match");
         } else {
           confirm_password.setCustomValidity('');
         }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

     </script>


  </body>
