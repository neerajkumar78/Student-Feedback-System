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
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Students' Feedback System</title>
    <link rel='icon' href='../front-src/images/manitlogo3.jpg' />
    <link rel='stylesheet' type='text/css' href='../front-src/pages/basic.css' />
    <link rel='stylesheet' type='text/css' href='../front-src/pages/modal.css' />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
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
                 <a href="../back-src/logout.php?roll='f'" class='nav-btn'>
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
				<label for="name">Name</label>
			</div>
			<div class="col-75">
				<input type="text" id="name" name="name" placeholder="Your name..">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="id">Faculty Id</label>
			</div>
			<div class="col-75">
				<input type="text"  name="facultyId" placeholder="Your Id..">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="post">Post</label>
			</div>
			<div class="col-75">
				<select id="post" name="post">
				<option value="professor">Professor</option>
				<option value="associate professor">Associate Professor</option>
				<option value="assistant professor">Assistant Professor</option>
				<option value="contract faculty">Contract Faculty</option>
				</select>
			</div>
		</div>
		      
		<div class="row">
			<div class="col-25">
				<label for="department">Department</label>
			</div>
			<div class="col-75">
				<select id="dId" name="dId">
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
				<label for="experience">Experience</label>
			</div>
			<div class="col-75">
				<input type="number" id="experience" name="experience" placeholder="Experience">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="phno">Phone Number</label>
			</div>
			<div class="col-75">
				<input type="number" id="phNo" name="phno" placeholder="Phone Number">
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
     if($connection){
	echo "connection established";
}
	$facultyId=mysqli_real_escape_string($connection,$_POST['facultyId']);
	$post=mysqli_real_escape_string($connection,$_POST['post']);
	$name=mysqli_real_escape_string($connection,$_POST['name']);
	$sex=mysqli_real_escape_string($connection,$_POST['sex']);
	//$qualification=mysqli_real_escape_string($connection,$_POST['qualification']);
	//$areaOfInterest=mysqli_real_escape_string($connection,$_POST['areaOfInterest']);
	$dId=mysqli_real_escape_string($connection,$_POST['dId']);
	$experience=mysqli_real_escape_string($connection,$_POST['experience']);
	$phno=mysqli_real_escape_string($connection,$_POST['phno']);
	//$dob=mysqli_real_escape_string($connection,$_POST['dob']);
	$email=mysqli_real_escape_string($connection,$_POST['email']);
    $query="INSERT INTO faculty(facultyId,post,name,sex,dId,experience,phno,email)";
    $query.=" VALUES($facultyId,'$post','$name','$sex',$dId,$experience,$phno,'$email')";
    $result=mysqli_query($connection,$query);
           if($result){
             $len=5;
            // $password=bin2hex(openssl_random_pseudo_bytes($len));
             $password=$facultyId."uc";
             $hashFormate="$2y$10$";
            $x="gjhgjhghjghjghlkjljklmjkl";
             $y=$hashFormate.$x;
             $hash_password=crypt($password,$y);

              if(mailfor($email,$password))
              {
               $query="UPDATE faculty SET password='$hash_password' WHERE facultyId=$facultyId";
               $result=mysqli_query($connection,$query);
              }
                redirect('updatefaculty.php');
	                  }
            else{
	             echo "query not executed";
                die(" ".mysqli_error($connection));
               }

       }
?>
<?php
if(!isset($_SESSION['adminId'])){
redirect("../front-src/pages/index3.html");
}
?>