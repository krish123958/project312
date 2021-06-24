<?php
session_start();

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

  $userData=loginUserData();



function updateUser($data){
        $userData=loginUserData();
        $emaill=$_SESSION['email'];
        $servername="remotemysql.com";
        $username="voq4GI381Y";
        $password="1WFM10Kevf";
        $dbname="voq4GI381Y";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $fname = $data['fname'];
        $email = $data['email'];
        $id = $data['phoneno'];
        $idd=$userData['id'];

        $sql = " UPDATE register SET Fullname='$fname',Phno=$id,email='$email' WHERE id=$idd";
            
        $result = mysqli_query($conn,$sql);
    

    }

    $result = updateUser($_POST);
    header('location:editprofile.php');

?>