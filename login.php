<?php
session_start();
if(isset($_SESSION['unique_id'])){
  header("location: users.php");
}
?>
<?php include_once"header.php";?>
  <body>
    <div class="container">
      <section class="form login">
        <header>RealTime Chat App</header>
        <form action="#" autocomplete="off">
          <div class="chatlogo">
            <img src="images/logo-removebg-preview.png" alt="" />
            <h3>LOGIN</h3>
          </div>
          <div class="error-txt"></div>
          <div class="field input">
            <label for="emailid">Email Address:</label>
            <input type="email" name="email" id="emailid" placeholder="Enter Your Email" />
          </div>
          <div class="field input">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter Your Password" />
            <i id="eyeicon" class="fas fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" value="Login" />
          </div>

          <div class="link">Not Yet SignedUp ? <a href="index.php">SignUp Now</a></div>
        </form>
      </section>
    </div>
    <script src="javascript/passwordshowhide.js"></script>
    <script src="javascript/login.js"></script>

  </body>
</html>
