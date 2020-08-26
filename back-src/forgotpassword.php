<?php
/*require 'databaseconnect.php';
require 'redirect.php';
*/
$connection=mysqli_connect('localhost','root','','project');
if(!isset($_GET['email'])&&!isset($_GET['validity'])){
	//redirect('');
	header("Location:../front-src/pages/index3.html");
}

$validity=$_GET['validity'];
$query="SELECT * FROM student WHERE validity='$validity'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)>=1){
if(isset($_POST['submit'])){
if(isset($_POST['password']) && isset($_POST['confirmpassword'])){
	$password=$_POST['password'];
	echo "$password";
$hashFormate="$2y$10$";
$x="gjhgjhghjghjghlkjljklmjkl";
$y=$hashFormate . $x;
$password=crypt($password,$y);
	
	$query="UPDATE student SET password='$password',validity='' WHERE email=?";
	$stmt=mysqli_prepare($connection,$query);
	if($stmt){
		mysqli_stmt_bind_param($stmt,"s",$_GET['email']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);
		if(mysqli_stmt_affected_rows($stmt)){
			mysqli_stmt_close($stmt);
			//redirect('login.php');
			header("Location:../front-src/pages/index3.html");
		}
	} 
	else{
		echo 'query failed as:'.mysqli_error($connection);
	}
}
}
}
else{
	http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students' Feedback System</title>
    <link rel='icon' href='../front-src/images/manitlogo3.jpg'></link>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/basic.css'></link>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/modal.css' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
           
        </div>
    </div>
    <div id='home'></div>
	<div class='workSpace'>
	  <div class="container">
			<form method="POST" action="action_page.php">
		<div class="row">
			<div class="col-75">
			<h1 style="font-size:30px;text-align:center;padding:5px">Reset Password</h1>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label for="password">Password</label>
			</div>
			<div class="col-75">
				<input type="password" name="password" placeholder="Password" id="password" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="cCode"> Confirm Password</label>
			</div>
			<div class="col-75">
				<input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirm_password" required>
			</div>
		</div>
		<div class="row">
		<input type="submit" value="Confirm">
		</div>
		<script>
					var password = document.getElementById("password")
  					, confirm_password = document.getElementById("confirm_password");
					function validatePassword(){
  					if(password.value != confirm_password.value) {
    				confirm_password.setCustomValidity("Passwords Don't Match");
  					} else {
				    confirm_password.setCustomValidity('');
  					}
				}

				password.onchange = validatePassword;
				confirm_password.onkeyup = validatePassword;
			</script>
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