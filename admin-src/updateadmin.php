
<!DOCTYPE html>
<html>
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
            
            <a href="../back-src/logout.php?roll='a'" class='nav-btn'>
                    Logout
            </a>
             <?php
include 'operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();
if(isset($_SESSION['adminId'])&&$_SESSION['role']=='a'){
   $adminId=$_SESSION['adminId'];
   ?>
            <a href="../back-src/reset.php?adminId=<?php echo $adminId ?>&&roll='a'" class='nav-btn'>
                    change password
            </a>
        </div>
    </div>

<?php
}
if(isset($_POST['update'])){
	$sex_domain=array('F'=>"FEMALE",'M'=>"MALE");
	?>
	<div id='home'></div>
    <div class='workSpace'>
       <div class="container">
			<form method="POST" action="#">
		<div class="row">
			<div class="col-25">
				<label for="name">Name</label>
			</div>
			<div class="col-75">
				<input type="text" id="name" name="name" placeholder="Your name..">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="scholarNo">Admin Id</label>
			</div>
			<div class="col-75">
				<input type="text" id="scholarNo" name="adminId" placeholder="Your adminId">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="sex">Sex</label>
			</div>
			<div class="col-75">
				<?php 
				foreach($sex_domain as $key=>$value){
					?>
				<input type="radio" name="sex" id="sex" value="<?php echo $key ?>" ><?php echo $value ?>
<?php } ?>
			</div>
		</div>	

		<div class="row">
			<div class="col-25">
				<label for="phno">Phone Number</label>
			</div>
			<div class="col-75">
				<input type="number" id="phno" name="phno" placeholder="Phone Number">
			</div>
		</div>

		<div class="row">
			<div class="col-25">
				<label for="email">Email id</label>
			</div>
			<div class="col-75">
				<input type="email" name="email" placeholder='Email-id'  >
			</div>
		</div>
	<div class="row">
			<div class="col-25">
				<label for="password">Password</label>
			</div>
			<div class="col-75">
				<input type="password" name="password" placeholder='Enter your password'  >
			</div>
		</div>
		<div class="row">
		<input type="submit" name="insert" value="Submit">
		<input type="reset" value="Reset">
		</div>
		</form>
<?php
}
?>

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
</div>
</body>

</html>
<?php
if(isset($_POST['insert'])){
if($connection){
	echo "connection established";
	$name=mysqli_real_escape_string($connection,$_POST['name']);
	$adminId=mysqli_real_escape_string($connection,(int)$_POST['adminId']);
	$sex=mysqli_real_escape_string($connection,$_POST['sex']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$hashFormate="$2y$10$";
    $x="gjhgjhghjghjghlkjljklmjkl";
    $y=$hashFormate . $x;
    $password=crypt($password,$y);
	$phno=mysqli_real_escape_string($connection,(int)$_POST['phno']);	
	$email=mysqli_real_escape_string($connection,$_POST['email']);
$query="INSERT INTO admin(adminId,name,sex,phno,email,password)";
$query .=" VALUES($adminId,'$name','$sex',$phno,'$email','$password')";
$resut=mysqli_query($connection,$query);
if($resut){
	redirect('profile.php');
}
else{
	echo "query not executed";
die(" ".mysqli_error($connection));
}
}
else{
	echo "connection is not established";
}
}
?>
<?php
if(!isset($_SESSION['adminId'])){
redirect("../front-src/pages/index3.html");
}
?>