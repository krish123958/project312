<?php
session_start();
?>
<?php if (isset($_SESSION['email'])) : 

    function loginUserData(){
        $email=$_SESSION['email'];
        $servername="remotemysql.com";
        $username="voq4GI381Y";
        $password="1WFM10Kevf";
        $dbname="voq4GI381Y";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = " SELECT * FROM register WHERE email= '$email' ";
        $res = mysqli_query($conn,$sql);
        if($res){
            $data = mysqli_fetch_assoc($res);
            return $data;
        }else{
            return false;
        }

    }
    $servername="remotemysql.com";
    $username="voq4GI381Y";
    $password="1WFM10Kevf";
    $dbname="voq4GI381Y";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $Data=loginUserData();
    $id=$Data['id'];
    $_SESSION['id']=$id;

    $sql=" SELECT * FROM register WHERE id =$id ";
    $res = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($res);

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


</head>


<body>

<section class="header">
        <nav>
            <a href="index.php"><im src="logo.png"></a>
            <div class="nav-links">
            <?php if (isset($_SESSION['email'])) : ?>
                 <ul>
                 <li style="background-color:#000000"><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                    
                    <a href="profile.php">
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
    <div class="text-box">
        <h1>Book Your's photographer</h1>
        <p>Booking a photographer is now one of the easiest thing in our country.visit our website and <br> select which photographer is suitable to your occastion</p>
        <!--<a href="" class="hero-btn">Visit Us To Know More</a>-->
        <div class="textbox">
            <form name='loca' action='location.php' method="POST">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" name="loc" placeholder="Enter a Location">
            <button type="submit" class="hero-btn" name="submit"><i class="fas fa-search-location"></i></button>
            </form>
        </div>
    </div>    
</section>
<!------ course ------>
<section class="course">
    <h1>What We Can Offer</h1>
    <p>choose best photographer for your best occation</p>
    <div class="row">
        <div class="course-col">
            <h3>Casual</h3>
            <p>We have prepared for you a casual list of photographers ... 
                from here you can select your photographers according to your
                occation</p>
        </div>
        <div class="course-col">
            <h3>Occational</h3>
            <p>We have prepared for you a Occational list of photographers ... 
                from here you can select your photographers according to your
                occation</p>
        </div>
        <div class="course-col">
            <h3>Professional</h3>
            <p>We have prepared for you a Professional list of photographers ... 
                from here you can select your photographers according to your
                occation</p>
        </div>
    </div>
</section>
<!--------chose u want----------->
<section class="campus">
    <h1>Choose What You Want</h1>
    <p>best photos make the best memories</p>
    <div class="row">
        <div class="campus-col">
            <img src="potrait.jpg">
            <div class="layer">
                <h3>PHOTOSHOOT</h3>
            </div>
        </div>
        <div class="campus-col">
            <img src="wedding.jpg">
            <div class="layer">
                <h3>WEDDING</h3>
            </div>
        </div>
        <div class="campus-col">
            <img src="family.jpg">
            <div class="layer">
                <h3>FAMILY</h3>
            </div>
        </div>
    </div>
</section>
<!--------------more from us --------->
<section class="facilities">
    <h1>More From Us</h1>
    <p>Explore more and get more.</p>
    <div class="row">  
        <div class="facilities-col">
            <img src="color constract.jpg">
            <h3>Color Constract</h3>
            <p>Get more brightning colors and perfect look to your world of photos</p>
        </div>
        <div class="facilities-col">
            <img src="sports.jpg">
            <h3>Sports</h3>
            <p>Spots photography gather your best sports moments at one place</p>
        </div>
        <div class="facilities-col">
            <img src="still life.jpg">
            <h3>Still Life</h3>
            <p>In still life photography we bring your life to your unliving things</p>
        </div>
    </div>

</section>
<!-------rating and review------------->
<section class="testimonials">
    <h1>What Our Clients Say</h1>
    <p>Reviwes of clients about our photographers.</p>
    <div class="row">
        <div class="testimonial-col">
            <img src="user1.jpg">
            <div>
                <p>Really this website is very useful to me...i had book a photographer from this website for my brothers marriage day...
                    the photographic options they will provide is definitly impress us....i love this website</p>
                    <h3>priyanka menon</h3>
                    <i class="fas fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
            </div>
        </div>
        <div class="testimonial-col">
            <img src="user2.jpg">
            <div>
                <p>one of the great thing to book a photographer in the agressive price...i booked a photographer for my birthdayday...
                    the photographic options they will provide is definitly impress us...very useful website</p>
                    <h3>manikanta kumar </h3>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-o"></i>
            </div>
        </div>
    </div>
</section>

<!----call of action-------->
<section class="cta">
    <h1>Contact for our various photographers<br> anywhere from world</h1>
    <a href="" class="hero-btn">CONTACT US</a>
</section>

<!----Footer-------->

<section class="footer">
    <h4>About Us</h4>
    <p>we are providing photographers under the certain rules and conditions..for any
        quaries<br> about our services pleace contact by our personal website</p>
    <div class="icons">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-linkedin"></i>
    </div>
    
</section>







</body>
</html>