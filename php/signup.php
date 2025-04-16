<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

   //this is used to get rid of undefined array problem
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   // checking user email is valid or not
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //checking that email already exist in database or not
      $sql = mysqli_query($conn,  "SELECT email FROM users WHERE email ='{$email}'");
      if (mysqli_num_rows($sql) > 0) { //if email already exist
         echo "$email - This email already exist";
      } else {
         //checking user file upload or not
         if (isset($_FILES['image'])) { //if file is uploaded
            $img_name = $_FILES['image']['name']; //getting user uploaded img name
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in our folder

            $img_explode = explode('.',$img_name); //getting extension of the uploaded image
            $img_ext = end($img_explode); //here we get the extension of an uploaded image by a user

            $extensions = ["png" , "jpeg" , "jpg"]; //these are some valid ext stored in an array
            if(in_array($img_ext,$extensions) === true){ //if users uploaded img ext is matched with an array ext
               /* this will return current time we need this time bcz when user upload img we rename user file with current time so all img file will have unique name */
               $time = time();
               //moving user upload img to our particular folder
               /* we dont upload user uploaded file in th database we just save the file url their
               actual file will be saved in our particular folder */
               $new_img_name = $time.$img_name;   //current time will be added before the name of user uploaded img so that same name images will be unique
             if ( move_uploaded_file($tmp_name,"usersimg/".$new_img_name)){ //if users upload img it is moved to our folder successfully
               $status = "Active Now"; //once user signed up thhen his status will be active now 
               $random_id = rand(time(),10000000); //creating random id for user

               //inserting all user data inside table
               $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id,fname,lname,email,password,img,status)
               VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}',   '{$status}' )");
               if($sql2){  //if these data inserted
                  $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email='{$email}'");
                  if(mysqli_num_rows($sql3) > 0){
                     $row = mysqli_fetch_assoc($sql3);
                     $_SESSION['unique_id'] = $row['unique_id'] ; //using this session as we use user unique_id in other php files
                     echo "success" ;
                  }
               } else{
                  echo "something went wrong";
               }

             }
            }else{
               echo "select Image file with jpg,jpeg,png extensions";
            }


         } else {
            echo "please select an image file";
         }
      }
   } else {
      echo "$email - this is invalid";
   }
} else {
   echo "All Input Field Are Required";
}
?>
