
<?php
include 'operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();
$adminId=$_SESSION['adminId'];
?>
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
            <a href="../back-src/reset.php?adminId=<?php echo $adminId ?>&&roll='a'" class='nav-btn'>
                    change password
            </a>
        </div>
    </div>

<?php
if(isset($_POST['update'])){
	$sex_domain=array('F'=>"FEMALE",'M'=>"MALE");
$query="SELECT * FROM department";
$result=mysqli_query($connection,$query);
while($tuple=mysqli_fetch_assoc($result)){
	$x=$tuple['dId'];
	$dept["{$x}"]=$tuple['dName'];
  }
  $sem_domain=array(1,2,3,4,5,6,7,8);
  $programe_domain=array('PG'=>"PG",'UG'=>"UG");
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
				<label for="scholarNo">Scholar Number</label>
			</div>
			<div class="col-75">
				<input type="text" id="scholarNo" name="scholarNo" placeholder="Your ScholarNo">
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
				<input type="radio" name="sex" id="sex" value="<?php echo $key ?>" ><?php echo $value ?><br>
		<?php
	}
		?>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="programe">Select Programe</label>
			</div>
			<div class="col-75">
				<select id="programe" name="programe">
				<?php 
			foreach($programe_domain as $key=>$value){
				?>
				<option  value="<?php echo $key ?>"><?php echo $value ?> 
			</option>
		<?php }
		?>
				</select>
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
				<label for="phno">Phone Number</label>
			</div>
			<div class="col-75">
				<input type="number" id="phno" name="phno" placeholder="Phone Number">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="dob">Date of Birth</label>
			</div>
			<div class="col-75">
				<input type="date('yy-m-l')" name="dob" placeholder='YY-MM-DD' id="dob">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="email">Email id</label>
			</div>
			<div class="col-75">
				<input type="email" name='email' placeholder='Email id...' id="dob">
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
<?php
if(isset($_POST['insert'])){
if($connection){
	echo "connection established";
	$name=mysqli_real_escape_string($connection,$_POST['name']);
	$scholarNo=mysqli_real_escape_string($connection,(int)$_POST['scholarNo']);
	$sex=mysqli_real_escape_string($connection,$_POST['sex']);
	$programe=mysqli_real_escape_string($connection,$_POST['programe']);
	$dId=mysqli_real_escape_string($connection,(int)$_POST['dId']);
	$sem=mysqli_real_escape_string($connection,(int)$_POST['sem']);
	$phno=mysqli_real_escape_string($connection,(int)$_POST['phno']);
	$dob=mysqli_real_escape_string($connection,$_POST['dob']);
	$email=mysqli_real_escape_string($connection,$_POST['email']);
$query="INSERT INTO student(scholarNo,name,sex,programe,dId,sem,phno,dob,email)";
$query .=" VALUES($scholarNo,'$name','$sex','$programe',$dId,$sem,$phno,'$dob','$email')";


  $resut=mysqli_query($connection,$query);
if(!$resut){
	//echo "query not executed";
die(" ".mysqli_error($connection));
}
else{
	//redirect("profile.php");
	redirect("updatestudent.php");

}
}
else{
	//echo "connection is not esta blished";
}
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
if(!isset($_SESSION['adminId'])){
redirect("../front-src/pages/index3.html");
}
?>