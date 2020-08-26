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
            <a href='#home' class='nav-btn'>
                Home
            </a>
            <a href="../back-src/logout.php" class='nav-btn'>
              Logout
            </a>
            
            
<?php
include '../admin-src/operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();

if(isset($_POST['submit'])){

$scholarNo=$_GET['scholarNo'];
  //$cCode=$_POST['cCode'];
  $cCode="CSE222";
$query="Select f.name,f.facultyId FROM faculty f JOIN (SELECT facultyId FROM feedback WHERE scholarNo=$scholarNo AND cCode='$cCode' ) AS t where t.facultyId=f.facultyId ";
$result=mysqli_query($connection,$query);$rowcount=mysqli_num_rows($result);
$rowcount=mysqli_num_rows($result);
if($result){
echo "ggjhgjhgjhg";
//if($rowcount>=1){
 while($tuple=mysqli_fetch_array($result)){
$id=$tuple['facultyId'];
$info["{$id}"]=$tuple['name'];
}
/*print_r($info);
 foreach($info as $key=>$value){
  echo $value;
}*/
?>
       <a href="reset.php?scholarNo='<?php echo $scholarNo?>'" class='nav-btn'>
    Change password
  </a>
  
      </div>
</div>
    <div id='home'></div>
	<div class='workSpace'>
	  <div class="container">
		<div class="row">
			<div class="col-75">
			<h1 style="font-size:30px;text-align:center;padding:5px">Feedback Form</h1>
			</div>
		</div>
		<table class="w3-table-all w3-hoverable">
    <tr>
      <td>Scholar Number</td>
      <td><?php echo $scholarNo?></td>
    </tr>
    <tr>
      <td>Course Code</td>
      <td><?php echo $cCode?></td>
    </tr>
     
      </table>
       <table class="w3-table-all w3-hoverable">
              <?php foreach($info as $key=>$value){?>
              <tr> 
              <td>Faculty Id</td>
         <td>   <?php echo $value?>
             
    </td>
  

    </tr>

  </table>
  <br><br>
  
  <table class="w3-table w3-striped">
	<thead>
    <tr>
      <th>Question</th>
      <th>Rating</th>
    </tr>
  </thead>
  <tbody>
    <tr class="q1">
      <td>Communication Skills</td>
      <td>
        <div>
		<form action="#">
		 <input type="radio" name="q1" value="1-star"><input type="radio" name="q1" value="2-star"><input type="radio" name="q1" value="3-star">
		 </form>
		 </div>
      </td>
    </tr>
    <tr class="q2">
      <td>Punctuality</td>
      <td>
        <div>
		<form action="#">
		 <input type="radio" name="q2" value="1-star"><input type="radio" name="q2" value="2-star"><input type="radio" name="q2" value="3-star">
		 </form>
		 </div>
      </td>
    </tr>
	</tbody>
	</table><br><br>
		<div class="row">
		<input type="reset" name="submit" value="<?php echo $key?>">
		<input type="submit" value="Review Another Faculty">
		</div>
	  
  <?php
}
}
//}
else{
  echo mysqli_error($connection);
}
}
?>
 </div>
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