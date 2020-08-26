
<?php
include 'operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();
$adminId=$_SESSION['adminId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Students' Feedback System</title>
    <link rel='icon' href='../front-src/images/manitlogo3.jpg'></link>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/basic.css'></link>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/modal.css' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>
        footer{
            position:relative;
            bottom:-135%;
        }
      

    </style>
</head>
<body>
    <div class='header-container'>
        <a href='http://www.manit.ac.in/'  class='header'>
            <img class='logo' src='../front-src/images/manitlogo.png' alt='manit.ac.in' />
            <div class='title'>
                <div class='innertitle'>
                    MAULANA AZAD NATIONAL INSTITUTE OF TECHNOLOGY
                </div>
                Students' Feedback System
            </div>
        </a>
        <div class='nav'>
            <a href='../front-src/pages/index3.html' class='nav-btn'>
                Home
            </a>
                 <a href="../back-src/logout.php?roll='a'" class='nav-btn'>
                    Logout
            </a>
            <a href="../back-src/reset.php?adminId=<?php echo $adminId ?>&&roll='a'" class='nav-btn'>
                    change password
            </a>
        </div>
    </div>
 <div id='home'></div>
    <div class='workSpace'>
       <div class="container">
            <form method="POST" action="#">
        <div class="row">
            <div class="col-25">
                <label for="id">Department Id</label>
            </div>
            <div class="col-75">
                <input type="number"  name="dId" placeholder="Department ID..">
            </div>
        </div>
         <div class="row">
            <div class="col-25">
                <label for="id">Department Id</label>
            </div>
            <div class="col-75">
                <input type="text"  name="dName" placeholder="Department Name..">
            </div>
        </div>
       
        
        <div class="row">
        <input type="submit" name="insert" value="Submit">
        <input type="reset" value="Reset">
        </div>
        </form>
    </div>
    </div>
    <div class='top-container'>
    <footer>
        <div class='socialMedia'>
                <a href=""> <div class="fab fa-facebook-square media" padding='10px'></div></a>
                <a href=""><div class="fab fa-instagram media" padding='10px'></div></a>
                <a href=""><div class="fab fa-google media" padding='10px'></div></a>
        </div>
        <div class='copyright'>
                2019 All Rights Reserved Terms of Use and Privacy Policy
        </div>
    </footer> 
</body>
</html>
<?php
if(isset($_POST['insert'])){
$dId=mysqli_real_escape_string($connection,$_POST['dId']);
$dName=mysqli_real_escape_string($connection,$_POST['dName']);
$query="INSERT INTO department(dId,dName) VALUES($dId,'$dName')";
$result=mysqli_query($connection,$query);
if($result){
    redirect("updatedepartment.php");
}

else{
    echo mysqli_error($connection,$result);
}
}
?>
<?php
if(!isset($_SESSION['adminId'])){
redirect("../front-src/pages/index3.html");
}
?>