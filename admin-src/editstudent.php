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
include 'operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();
if(isset($_POST['edit']) && isset($_GET['scholarNo'])){
$scholarNo=$_GET['scholarNo'];
$query="SELECT * FROM student WHERE scholarNo=$scholarNo";
$result=mysqli_query($connection,$query);
$tuple=mysqli_fetch_array($result);
if($tuple){

    $name=mysqli_real_escape_string($connection,$tuple['name']);
	$scholarNo=mysqli_real_escape_string($connection,$tuple['scholarNo']);
	$sex=mysqli_real_escape_string($connection,$tuple['sex']);
	$programe=mysqli_real_escape_string($connection,$tuple['programe']);
	$dId=mysqli_real_escape_string($connection,$tuple['dId']);
	$sem=mysqli_real_escape_string($connection,$tuple['sem']);
	$phno=mysqli_real_escape_string($connection,$tuple['phno']);
	$dob=mysqli_real_escape_string($connection,$tuple['dob']);
	$email=mysqli_real_escape_string($connection,$tuple['email']);
}
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
			<form method="POST" action="action_page.php">
		<div class="row">
			<div class="col-25">
				<label for="name">Name</label>
			</div>
			<div class="col-75">
				<input type="text" id="name" name="name" value="<?php echo $name ?>" placeholder="Your name..">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="scholarNo">Scholar Number</label>
			</div>
			<div class="col-75">
				<input type="text" id="scholarNo" name="scholarNo" placeholder="Your ScholarNo" value="<?php echo $scholarNo ?>">
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
				<input type="radio" name="sex" id="sex" value="<?php echo $key ?>" <?php if($key==$sex){echo "checked";}?>><?php echo $value ?><br>
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
				<option  value="<?php echo $key ?>" <?php if($value==$programe){echo "selected";}?>/><?php echo $value ?> 
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
			
				<select id="branch" name="branch">
				<?php
				foreach($dept as $key => $value){
				?>
				}
				<option  value="<?php echo $key?>" <?php if($key==$dId){echo "selected";} ?>/><?php echo $dept["{$key}"]  ?></option>
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
				<option  value="<?php echo $value ?>" <?php if($value==$sem){echo "selected";}?>/><?php echo $value ?> </option>
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
				<input type="number" id="phno" name="phno" placeholder="Phone Number" value="<?php echo $phno ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="dob">Date of Birth</label>
			</div>
			<div class="col-75">
				<input type="date('yy-m-l')" name="dob" placeholder='YY-MM-DD' id="dob" value="<?php echo $dob ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="email">Email id</label>
			</div>
			<div class="col-75">
				<input type="email" name="email" placeholder='Email-id'  value="<?php echo $email ?>">
			</div>
		</div>
		<div class="row">
		<?php if(isset($_GET['scholarNo'])){ ?>
    	<input type="submit" name='save' value="save">
    <?php 
} else{?>
    <input type="submit" name="submit" value="submit">
<?php } ?>
		</div>
		</form>
		
<?php
	}
	?>
		<?php 
if(isset($_POST['save'])){
   $scholarNo=$_GET['scholarNo'];
echo $name=mysqli_real_escape_string($connection,$_POST['name']);
	$sex=mysqli_real_escape_string($connection,$_POST['sex']);
	$programe=mysqli_real_escape_string($connection,$_POST['programe']);
	echo $dId=mysqli_real_escape_string($connection,(int)$_POST['dId']);
	$sem=mysqli_real_escape_string($connection,(int)$_POST['sem']);
	$phno=mysqli_real_escape_string($connection,(int)$_POST['phno']);
	$dob=mysqli_real_escape_string($connection,$_POST['dob']);
	$email=mysqli_real_escape_string($connection,$_POST['email']);
    $query="UPDATE student SET name='$name',sex='$sex',programe='$programe',sem=$sem,phno=$phno,dob='$dob',email='$email' WHERE scholarNo=$scholarNo ";
    $result=mysqli_query($connection,$query);
    if($result){
    	//echo "query executed successfully";
    	redirect("profile.php");
    }
    else{
    	die(" ".mysqli_error($connection));
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
</body>

</html>
<?php
if(!isset($_SESSION['adminId'])){
redirect("../front-src/pages/index3.html");
}
?>
