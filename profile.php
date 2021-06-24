<?php
session_start();
?>
<?php if (isset($_SESSION['email'])) : 

    function loginUserData(){
        $id=$_SESSION['id'];
        $servername="remotemysql.com";
        $username="voq4GI381Y";
        $password="1WFM10Kevf";
        $dbname="voq4GI381Y";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = " SELECT * FROM register WHERE id= $id ";
        
        $res = mysqli_query($conn,$sql);
        if($res){
            $data = mysqli_fetch_assoc($res);
            return $data;
        }else{
            return false;
        }

    }

  $userData=loginUserData();

endif ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>photographer booking</title>
    <link rel="stylesheet" href="Homepagestyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.html">
        <!--  summernote -->
        <link href="assets/summernote/dist/summernote.css" rel="stylesheet">
        <title><?= $title . ' | '?>Admin Pannel</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
        <!--dynamic table-->
        <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
        <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
        <!--right slidebar-->
        <link href="css/slidebars.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />


</head>


<body>

<section class="heade">
        <nav>
            <a href="index.php"><im src="logo.png"></a>
            <div class="nav-links"style="background-color:#000000">
            <?php if (isset($_SESSION['email'])) : ?>
                 <ul>
                    
                    <a href="profile.php">
                    <li style="background-color:#000000"><a href="index.php"></i>HOME</a></li>
                            <li style="background-color:#000000"><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                                <span class="username"><?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ;?></span>
                                <b class="caret"></b>
                            </a>
                            
                                

                    <!--<li><a href="">COURSE</a></li>
                    <li><a href="">BLOG</a></li>
                    <li><a href="">CONTACT</a></li>-->
                </ul>
                <?php else : ?>
                    <ul>
                    <li><a href="login.php">LOGIN</a></li>
                    <li><a href="register.php">REGISTER FOR CUSTOMERS</a></li>
                    <li><a href="regforphotographer.php">REGISTER FOR PHOTOGRAPHERS</a></li>
                    <!--<li><a href="">COURSE</a></li>
                    <li><a href="">BLOG</a></li>
                    <li><a href="">CONTACT</a></li>-->
                </ul>
            <?php endif ?>
            </div>
        </nav>
<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                
                <h1><?= $userData['FullName'] ?></h1>
                <p><?= $userData['email'] ?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="active nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="editprofile.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <section class="card">
            <div class="bio-graph-heading">
                
            </div>
            <div class="card-body bio-graph-info">
                <h1>Bio Graph</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>First Name </span>: <?= $userData['FullName'] ?></p>
                    </div>
                    <div class="bio-row">
                    </div>
                    <div class="bio-row">
                        <p><span>Country </span>: INDIA</p>
                    </div>
                    
                    
                    <div class="bio-row">
                        <p><span>Email </span>: <?= $userData['email'] ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Mobile </span>: <?= $userData['Phno'] ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Username </span>:  <?= $userData['FullName'] ?></p>
                    </div>
                </div>
            </div>
        </section>
      
    </aside>
</div>
</body>
</html>