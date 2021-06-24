
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="location.css">
</head>
<body>
    <table class="table-style">
    <thead>
        <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Phone-Number</th>
            <th>Location</th>
            <th>Best Pic By Me!</th>
        </tr>
    </thead>
    <tbody>
        <?php
        #include("homepage.php");
        error_reporting(0); 
        $servername="remotemysql.com";
        $username="voq4GI381Y";
        $password="1WFM10Kevf";
        $dbname="voq4GI381Y";
        $loc=$_POST["loc"];
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) 
        {
            die("Some Error Occurred " . mysqli_connect_error());
        }
        $l_pat='/^[a-zA-Z][a-zA-Z0-9]{4,13}$/';
        $errors=array('loc'=>'');
        if(isset($_POST['submit']))
        {
            if(empty($loc))
            {
                $errors['loc']="Please enter your location<br>";
            }
            else{
                if(preg_match($l_pat,$loc)==false)
                {
                    $errors['loc']="Please enter a valid location<br>";
                }
            }
            $sql="SELECT * FROM regphr where loc = '$loc' ";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
                <tr class="">
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phn']; ?></td>
                    <td><?php echo $row['loc']; ?></td>
                    <td><img src="img/<?php echo $row['img'];?>" width="200px" height="200px"></td>
                </tr>
                <?php
            }
        }
    ?>
    </tbody>
    </table>
    <?php mysqli_close($conn);  // close connection ?>
</body>
</html>
