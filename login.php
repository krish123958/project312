<?php
    session_start();
    error_reporting(0); 
    $servername="remotemysql.com";
    $username="voq4GI381Y";
    $password="1WFM10Kevf";
    $dbname="voq4GI381Y";
    $email=$_POST["email"];
    $p=$_POST["password"];
    $name=$_POST["name"];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) 
    {
        die("Some Error Occurred " . mysqli_connect_error());
    }
	$p_pat='/^[a-zA-Z0-9@$& ]{5,13}$/';
	$email_pat='/^[A-Za-z0-9]+@[A-Za-z]+.[A-Za-z]{2,4}$/';
    $errors=array('email'=>'','p'=>'','suc'=>'','con'=>'');
    if(isset($_POST['submit']))
    {
        if($email=="")
        {
            
            $errors['email'] = "Please enter the Email-ID<br>";
        }
        else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $errors['email'] = "Invalid mail-Id<br>";
            }
        }
        if($p=="")
        {
            
            $errors['p'] = "Please enter the password<br>";
        }
        else{
            if(preg_match($p_pat,$p)==false) {
		    
		    $errors['p'] = "Password is incorrect.<br>";
	        }
        }   
        $email = stripcslashes($email);  
        $p = stripcslashes($p);  
        $email = mysqli_real_escape_string($conn, $email);  
        $p = mysqli_real_escape_string($conn, $p);
        
        $sql = "SELECT * FROM register WHERE email = '$email' and pwd = '$p' ";  
        $result = mysqli_query($conn,$sql);  
        #$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        $row=mysqli_fetch_assoc($result); 
        $count = mysqli_num_rows($result);  
        if($count == 0){  
            
            $errors['con'] = " Login failed. Invalid username or password.<br>";  
        }  
        else{  
          $errors['suc'] = " Login successful<br>";
          $_SESSION['email'] = $email;
          $_SESSION['id'] = $id;
          header("location:index.php"); 
            
        }  
    }
    mysqli_close($conn); 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="Loginstyle.css">
  </head>
  <body>
    <nav>
      <div class="nav-links">
           <ul>
              <li><a href="index.php">HOME</a></li>
          </ul>
      </div>
  </nav>
  <div class='w-text1'><?php echo $errors['suc'] ?></div>
  <div class='w-text1'><?php echo $errors['con'] ?></div>
<div class="login-box">
  <h1>Login</h1>
  <form name='login' action='login.php' method="POST">
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="email" placeholder="Username" value="<?php echo htmlspecialchars($email)?>">
  </div>
  <div class="w-text"><?php echo $errors['email']; ?></div>
  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" placeholder="Password" value="<?php echo htmlspecialchars($p)?>">
  </div>
  <div class="w-text"><?php echo $errors['p']; ?></div>
  <input type="submit" name="submit" class="btn" value="Sign in">
</div>
</form>
  </body>
</html>
