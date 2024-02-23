<!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>Signup-Puskodal</title> 

  <link href="css/style-login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
 

  <script>
function showPasswordError() {
    var passwordInput = document.getElementById("new-password");
    if (passwordInput.value.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
</script>


 </head> 

 <body> <!-- partial:index.partial.html --> 

  <section>
   <div class="signin"> 

    <div class="content"> 
    <img src="img/background.png" alt="">
    <h1>Selamat Datang </h1>
        <h1>Di Aplikasi Jadwal Kegiatan Rapat Gedung Sate</h1>
     <h2>Sign Up</h2> 

     <div class="form"> 
     <form method="post" action="process/signup_process.php" onsubmit="return showPasswordError();">
    



      <div class="inputBox"> 

       <input type="text" name="username" required> <i>Username</i> 

      </div> 

      <div class="inputBox"> 

      <input type="password" id="new-password" name="password" required pattern=".{8,}" title="Password setidaknya lebih dari 8 Huruf"> <i>Password</i> 

      </div> 

      <div class="links"> <a href="#">already have an account?</a> <a href="login.php">Login Now !</a> 

      </div> 

      <div class="inputBox"> 

        <a href="signup_process.php">
        <input type="submit" value="SignUp">
        </a>
        </form>
        

      </div> 

     </div> 

    </div> 

   </div> 

  </section> <!-- partial --> 

 </body>

</html>