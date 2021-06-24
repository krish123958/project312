<?php
    session_start();
    error_reporting(0); 
    $servername="remotemysql.com";
    $username="voq4GI381Y";
    $password="1WFM10Kevf";
    $dbname="voq4GI381Y";
    $n=$p=$cp=$email=$phn='';
    $n=$_POST["name"];
    $p=$_POST["password"];
    $cp=$_POST["cpwd"];
    $email=$_POST["email"];
    $loc=$_POST["location"];
    $phn=$_POST["mobile"];
    $msg="";
    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];   
    $folder = "img/".$filename;
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) 
    {
        die("Some Error Occurred " . mysqli_connect_error());
    }
    $n_pat='/^[a-zA-Z][a-zA-Z0-9]{5,13}$/';
	$p_pat='/^[a-zA-Z0-9@$& ]{5,13}$/';
    $l_pat='/^[a-zA-Z][a-zA-Z0-9]{4,13}$/';
	$phn_pat='/^\d{10}$/';
	$email_pat='/^[A-Za-z0-9]+@[A-Za-z]+.[A-Za-z]{2,4}$/';
    $errors=array('email'=>'','n'=>'','p'=>'','cp'=>'','phn'=>'','suc'=>'','con'=>'','loc'=>'');
    $flag=true;
    if(isset($_POST['submit']))
    {
        if($n=="")
        {   
            
            $errors['n'] = "Please enter the Name<br>";$flag=false;
        }
        else{
            if(preg_match("/^[a-zA-Z-' ]*$/",$n)==false) 
            {
		    
		        $errors['n'] = "Please enter a valid name<br>";$flag=false;
	        }
        }
        if($p=="")
        {
            
            $errors['p'] = "Please enter the password<br>";$flag=false;
        }
        else{
            if(preg_match($p_pat,$p)==false) {
		    
		    $errors['p'] = "Please enter password with sufficient strength<br>";$flag=false;
	        }
        }   
        if($cp=="" || $p != $cp)
        {
            
            $errors['cp'] = "Please confirm the password<br>";$flag=false;
        }
        else{
            if(preg_match($p_pat,$cp)==false) {
		    
		    $errors['cp'] = "Please re-enter the password as given above<br>";$flag=false;
	        }
        }
        if($email=="")
        {
            
            $errors['email'] = "Please enter the Email-ID<br>";$flag=false;
        }
        else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $errors['email'] = "Please Enter Mail in Given Format<br>";$flag=false;
            }
        }
        if(empty($loc))
        {
            $errors['loc']="Please enter your location<br>";$flag=false;
        }
        else{
            if(preg_match($l_pat,$loc)==false)
            {
                $errors['loc']="Please enter a valid location<br>";$flag=false;
            }
        }
        if($phn=="")
        {
            
            $errors['phn'] = "Please enter the phone number<br>";$flag=false;
        }
	    else{
            if(preg_match($phn_pat,$phn)==false) {
				
		    $errors['phn'] = "Please Enter Mobile in Given Format<br>";$flag=false;
	        }
        }
      
        $sql = "INSERT INTO regphr VALUES ('$n','$p','$cp','$email','$loc','$phn','$filename')";
        #$res=mysqli_query($conn,$sql);
        #$count=mysqli_num_rows($res);
        mysqli_query($conn,$sql);
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
        if($flag==false)
        {
            $errors['con'] = "Registeration unsuccessfull";
        } 
        else
        {
            $errors['suc'] = "Registered successfully!<br>";
        }
        
    }
    mysqli_close($conn); 
?>
<!DOCTYPE html>
<html>
    
    
    <head>
        <link rel="stylesheet" href="regstyle.css">
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
        <form name='register' action='regforphotographer.php' method="POST" enctype="multipart/form-data">
        <div class="regbox">
            <h1>Register</h1>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Full-Name" value="<?php echo htmlspecialchars($n)?>">
            </div>
            <div class="w-text"><?php echo $errors['n']; ?></div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter password" value="<?php echo htmlspecialchars($p)?>"> 
            </div>
            <div class="w-text"><?php echo $errors['p']; ?></div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="cpwd" placeholder="Confirm password" value="<?php echo htmlspecialchars($cp)?>"> 
            </div>
            <div class="w-text"><?php echo $errors['cp']; ?></div>
            <div class="textbox">
                <i class="far fa-envelope"></i>
                <input type="email" name="email" placeholder="sample@gmail.com" value="<?php echo htmlspecialchars($email)?>">
            </div>
            <div class="w-text"><?php echo $errors['email']; ?></div>
            <div class="textbox">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" name="location" placeholder="Enter a City Name" value="<?php echo htmlspecialchars($loc)?>">
            </div>
            <div class="w-text"><?php echo $errors['loc']; ?></div>
            <div class="textbox">
                <i class="fas fa-mobile-alt"></i>
                <input type="text" name="mobile" placeholder="Enter 10 digit phone number" value="<?php echo htmlspecialchars($phn)?>">
            </div>
            <div class="w-text"><?php echo $errors['phn']; ?></div>
            <div class="img-content">
                <input type="file" name="img" value="">
            </div>
            <div class="w-text"><?php echo $msg ?></div>
            <input type="submit" name="submit" class="btn" value="Sign-up">
        </div>
        </form>
    </body>
    
    
</html>