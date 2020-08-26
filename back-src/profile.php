	<!----------header should be put ----------->
<!DOCTYPE html>
<html>
<head>
	<title>Students' Feedback System</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel='icon' href='../front-src/images/manitlogo3.jpg'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"/>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/classic.css' />
    <link rel='stylesheet' type='text/css' href='../front-src/pages/modal.css' />

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
            <a href="logout.php" class='nav-btn'>
            	Logout
            </a>
            
<?php
include '../admin-src/operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();
if(isset($_SESSION['scholarNo'])&&$_SESSION['role']=='s'){
   $scholarNo=$_SESSION['scholarNo'];

$query="SELECT * FROM student WHERE scholarNo=$scholarNo";
$result=mysqli_query($connection,$query);
$tuple=mysqli_fetch_array($result);
if($tuple){
    $info['Name']=mysqli_real_escape_string($connection,$tuple['name']);
	$info['Scholar Number']=mysqli_real_escape_string($connection,$tuple['scholarNo']);
	$info['Gender']=mysqli_real_escape_string($connection,$tuple['sex']);
	$info['Programe']=mysqli_real_escape_string($connection,$tuple['programe']);
	//$info['dId']=mysqli_real_escape_string($connection,$tuple['dId']);
	$info['Semester']=mysqli_real_escape_string($connection,$tuple['sem']);
	$info['Phone Number']=mysqli_real_escape_string($connection,$tuple['phno']);
	$info['Date of birth']=mysqli_real_escape_string($connection,$tuple['dob']);
	$info['Email Address']=mysqli_real_escape_string($connection,$tuple['email']);
?>
	<a href="reset.php?scholarNo='<?php echo $scholarNo?>'&&roll='s'" class='nav-btn'>
		Change password
	</a>        
    </div>
</div>
    <div id='home'></div>
     <div class='workSpace'>
		<article>
            <table class="w3-table-all w3-hoverable"> 
                <thead>
                    <!-- Edit here -->
                    <th>Welcome <?php echo $info['Name'] ?></th>
                </thead>
                <tbody>
               <?php foreach($info as $key => $value){ ?>
				<tr>
					<td><?php echo $key ?></td>
					<td><?php echo $value ?></td>
				</tr>
				<?php } ?>
                </tbody>
            </table>
<?php 
}
}
?>

 <?php
 $query="SELECT  cCode FROM opts WHERE scholarNo=$scholarNo";
 $result=mysqli_query($connection,$query);
if($result){
	
	?>
            <!-- Feedback Modal -->
            <div id="id01" class="modal register-modal">
                <!-- Feedback Modal Content -->
                <form class="modal-content animate"  method="POST" action="feedback2.php?scholarNo='<?php echo $scholarNo?>'">
                    <span onclick="document.querySelector('.register-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <h1 class='register-modal-heading' style="text-align: center;">Student Feedback</h1>
                    
                    <div class="container">
                        <label for="userName"><b>Course code</b></label>
                        <select name="cCode">
                        	<?php
                        	while($tuple=mysqli_fetch_array($result)){
                        		?>
                            <option ><?php echo $tuple['cCode']?></option>
                            <?php
                        }
                  }
                    ?>
                        </select>
                    <!--
                        <label for="password"><b>Faculty Name</b></label>
                        <select>
                            <option></option>
                        </select>
                        --->
                    </div>
                
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="submit" name='submit' class="cancelbtn" style='display: inline-block; background-color: #089f98; '>Submit</button>
                        <button type="button" onclick="document.querySelector('.register-modal').style.display='none'" class="cancelbtn" style='position: absolute; right: 3%;'>Cancel</button>
                    </div>
                </form>
            </div>
            <div class='register'>
            <!-- Student Registration button -->
                <div>
                    <h1>Student Feedback</h1>
                </div>
                <div class='btn register-btn' onclick="document.querySelector('.register-modal').style.display='block';">
                        <i class="far fa-edit"><div style='font-size: 1.5em;'>Student Feedback</div></i>
                </div>
            </div>
        </article>
        <aside>
            <div style='display: flex; flex-direction: column; justify-content: center; align-content: center;'>
                <img src='../front-src/images/manitlogo3.jpg' style='width: 20vw; align-self: center;'/>  
                <div style="text-align: center;">
                    <?php echo $info['Name'] ?>
                </div>
            </div>
        </aside>
    </div>
    <footer>
        <div class='socialMedia'>
                <a href=""> <div class="fab fa-facebook-square media"></div></a>
                <a href=""><div class="fab fa-instagram media" ></div></a>
                <a href=""><div class="fab fa-google media" ></div></a>
        </div>
        <div class='copyright'>
                2019 All Rights Reserved Terms of Use and Privacy Policy
        </div>
    </footer> 
    <script>
        // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script> 
</body>
</html>