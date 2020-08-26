<?php
include 'operation.php';
ob_start();
$connection=mysqli_connect('localhost','root','','project');
session_start();
$adminId=$_SESSION['adminId'];
	$sex_domain=array('F'=>"FEMALE",'M'=>"MALE");
$query="SELECT * FROM department";
$result=mysqli_query($connection,$query);
while($tuple=mysqli_fetch_assoc($result)){
	$x=$tuple['dId'];
	$dept["{$x}"]=$tuple['dName'];
  }
  $sem_domain=array(1,2,3,4,5,6,7,8);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students' Feedback System</title>
    <link rel='icon' href='../front-arc/images/manitlogo3.jpg'></link>
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
				<label for="cCode">Course Code</label>
			</div>
			<div class="col-75">
				<input type="text" id="cCode" name="cCode" placeholder="Course Code...">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="name">Course Name</label>
			</div>
			<div class="col-75">
				<input type="text" id="name" name="name" placeholder="Course Name...">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="sem">Semester</label>
			</div>
			<div class="col-75">
				<select id="sem" name="sem">
				<?php 
		foreach($sem_domain as $value){
			?>
				<option  value="<?php echo $value ?>" ?><?php echo $value ?> </option>
		<?php }
		?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="lecture">No of Lecture</label>
			</div>
			<div class="col-75">
				<input type="number" id="noOfLecture" name="noOfLecture" placeholder="No of Lectures assigned to the Course">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="branch">Branch</label>
			</div>
			<div class="col-75">
				<select id="branch" name="dId">
				<?php
				foreach($dept as $key => $value){
				?>
				}
				<option  value="<?php echo $key?>"  ?><?php echo $dept["{$key}"]  ?></option>
		<?php
	}
	?>
</select>
</div>
</div>
		<div class="row">
		<input type="submit" name="insert" value="Submit">
		<input type="reset" value="Reset">
		</div>
		</form>
	</div>
    </div>
   
<?php
if(isset($_POST['insert'])){
$cCode=mysqli_real_escape_string($connection,$_POST['cCode']);
$dId=mysqli_real_escape_string($connection,$_POST['dId']);
$sem=mysqli_real_escape_string($connection,(int)$_POST['sem']);
$name=mysqli_real_escape_string($connection,$_POST['name']);
$noOfLecture=mysqli_real_escape_string($connection,$_POST['noOfLecture']);
$query="INSERT INTO courses(cCode,name,dId,noOfLecture,sem)";
$query.=" VALUES('$cCode','$name',$dId,$noOfLecture,$sem)";
$result=mysqli_query($connection,$query);
if($result){
    redirect("updatedepartment.php");
}

else{
    echo mysqli_error($connection);
}
}
?>
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
if(!isset($_SESSION['adminId'])){
redirect("../front-src/pages/index3.html");
}
?>