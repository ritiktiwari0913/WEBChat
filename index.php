<?php
session_start();
if(isset($_SESSION['unique_id'])){
  header("location: users.php");
}
?>
<?php include_once"header.php";?>
  <body>
    <div class="container">
      <section class="form signup">
        <header>RealTime Chat App</header>
        <form action="#" enctype="multipart/form-data" autocomplete="off">
          <div class="chatlogo">
            <img src="images/logo-removebg-preview.png" alt="" />
            <h3>SIGNUP</h3>
          </div>
          <div class="error-txt">something went wrong &#x26A0;</div>
          <div class="field input">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="fname" placeholder="Enter Your First Name" required/>
          </div>
          <div class="field input">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lname" placeholder="Enter Your Last Name" required/>
          </div>
          <div class="field input">
            <label for="emailid">Email Address:</label>
            <input type="email" id="emailid" name="email" placeholder="Enter Your Email" required/>
          </div>
          <div class="field input">
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="password" placeholder="Enter Your Password" required/>
            <i id="eyeicon" class="fas fa-eye"></i>
          </div>
          <div class="field image">
            <label for="simg">Select Image:</label>
            <input type="file" id="simg" name="image" required/>
          </div>
          <div class="field button">
            <input type="submit" value="SignUp" required/>
          </div>

          <div class="link">
            Already SignedUp ? <a href="login.php">Login Now</a>
          </div>
        </form>
      </section>
    </div>
    <script src="javascript/passwordshowhide.js"></script>
    <script src="javascript/signup.js"></script>
  </body>
</html>
