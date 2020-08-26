<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students' Feedback System</title>
    <link rel='icon' href='../front-src/images/manitlogo3.jpg'></link>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/basic.css'></link>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/modal.css' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' type='text/css' href='../front-src/pages/rating_rishabh.css'></link>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

<?php 
session_start();
include '../admin-src/operation.php';
$connection=mysqli_connect("localhost","root","","project");
if(isset($_POST['insert'])){
$scholarNo=$_POST['scholarNo'];
$cCode=$_POST['cCode'];
$facultyId=$_POST['facultyId'];
$que1=(int)$_POST['rating_1'];
$que2=(int)$_POST['rating_2'];
$que3=(int)$_POST['rating_3'];
$que4=(int)$_POST['rating_4'];
$que5=(int)$_POST['rating_5'];
$que6=(int)$_POST['rating_6'];
  $query="INSERT INTO feedback(scholarNo,cCode,facultyId,que1,que2,que3,que4,que5,que6) VALUES ($scholarNo,'$cCode',$facultyId,$que1,$que2,$que3,$que4,$que5,$que6)";
  $result=mysqli_query($connection,$query);
  if($result){

}
else{
  echo mysqli_error($connection);
}
}
?>
<?php
//if(isset($_GET['scholarNo'])&&isset($_POST['submit'])){
$scholarNo=$_SESSION['scholarNo'];
 $query="SELECT  cCode FROM opts WHERE scholarNo=$scholarNo";
 $result=mysqli_query($connection,$query);
if($result){

  while($tuple=mysqli_fetch_array($result)){

  $info[]=$tuple['cCode'];
 }
}
else{
 echo mysqli_error($connection);
}
 foreach($info as $value){
$query="SELECT facultyId FROM teaches WHERE cCode='$value' ";
$result=mysqli_query($connection,$query);
$rowcount=mysqli_num_rows($result);
if($result){
 while($tuple=mysqli_fetch_array($result)){
$facultyId=$tuple['facultyId'];
//echo $name=$tuple['name'];
$query_check="SELECT scholarNo as count FROM feedback WHERE scholarNo=$scholarNo AND facultyId=$facultyId AND cCode='$value'";
$result_check=mysqli_query($connection,$query_check);
if($result_check){}
else{
 echo mysqli_error($connection);
}

 $row_cnt = mysqli_num_rows($result_check);
//echo "gybhbgjhgjh";
if($row_cnt==0){
/* echo $scholarNo;
echo $facultyId;
echo $value;
echo "gybhbgjhgjh"; */
?>
            <a href="logout.php" class='nav-btn'>
              Logout
            </a>
             <a href="profile.php" class='nav-btn'>Profile</a>
             <a href="reset.php?scholarNo='<?php echo $scholarNo?>'&&roll='s" class='nav-btn'>
                     Change password
                                    </a> 
        </div>
    </div>
    <div id='home'></div>
  <div class='workSpace'>
    <div class="container">
    <div class="row">
      <div class="col-75">
      <h1 style="font-size:30px;text-align:center;padding:5px;color:black"><b><u>Feedback Form</u></b></h1>
      </div>
    </div>
    <form method="POST" action="#">
    <table class="w3-table-all w3-hoverable">
    <tr>
      <td>Scholar Number</td>
      <td><input type="text" name='scholarNo' value="<?php echo $scholarNo ?>" readonly="readonly"></td>
    </tr>
    <tr>
      <td>Course Name</td>
      <td><input type="text" name='cCode' value="<?php echo $value ?>" readonly="readonly"></td>
    </tr>
    <tr>
      <td>Faculty Name</td>
      <td><input type="text" name='facultyId' value="<?php echo $facultyId ?>" readonly="readonly"></td>
    </tr>
 <!--  </table> -->
  <br><br>
  <div class="w3-table w3-striped"> 
  <thead>
    <tr>
      <th>Question</th>
      <th>Rating</th>
    </tr>
  </thead>
  <tbody>
  <tr><td  style="color:black;align:center"><b>Courses</b></td></tr>
    <tr class="q1">
      <td>The course provided sufficient information<br> and sequence of teaching explained</td>
      <td>
        <div class="rating">
        <input type="radio" id="star5_1" name="rating_1" value="5" /><label  for="star5_1" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4_1" name="rating_1" value="4" /><label  for="star4_1" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3_1" name="rating_1" value="3" /><label  for="star3_1" title="Average - 3 stars"></label>
    <input type="radio" id="star2_1" name="rating_1" value="2" /><label  for="star2_1" title="Not satisfied - 2 stars"></label>   
    <input type="radio" id="star1_1" name="rating_1" value="1" /><label  for="star1_1" title="Disgusting - 1 star"></label> 
        </div>
      </td>
    </tr>
    <tr class="q2">
      <td>The examination covered to large extend what was<br> taught in class and evaluation was fair and transparent</td>
      <td>
        <div class="rating">
        <input type="radio" id="star5_2" name="rating_2" value="5" /><label  for="star5_2" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4_2" name="rating_2" value="4" /><label  for="star4_2" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3_2" name="rating_2" value="3" /><label  for="star3_2" title="Average - 3 stars"></label>
    <input type="radio" id="star2_2" name="rating_2" value="2" /><label  for="star2_2" title="Not satisfied- 2 stars"></label>    
    <input type="radio" id="star1_2" name="rating_2" value="1" /><label  for="star1_2" title="Disgusting - 1 star"></label>
        </div>
      </td>
    </tr>
  <tr class="q3" style="border-bottom: 1px solid black">
      <td>The course helped me acquire knowledge and <br>skills and I was satisfied with course coverage</td>
      <td>
       <div class="rating">
         <input type="radio" id="star5_3" name="rating_3" value="5" /><label  for="star5_3" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4_3" name="rating_3" value="4" /><label  for="star4_3" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3_3" name="rating_3" value="3" /><label  for="star3_3" title="Average - 3 stars"></label>
    <input type="radio" id="star2_3" name="rating_3" value="2" /><label  for="star2_3" title="Not satisfied - 2 stars"></label>   
    <input type="radio" id="star1_3" name="rating_3" value="1" /><label  for="star1_3" title="Disgusting - 1 star"></label>
        </div>
      </td>
    </tr>
   <tr><td style="color:black"><b>Faculty</b></td></tr>
   <tr class="q4">
      <td>The instructor was well prepared and <br>presented the content effectively</td>
      <td>
        <div class="rating">
        <input type="radio" id="star5_4" name="rating_4" value="5" /><label  for="star5_4" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4_4" name="rating_4" value="4" /><label  for="star4_4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3_4" name="rating_4" value="3" /><label  for="star3_4" title="Average - 3 stars"></label>
    <input type="radio" id="star2_4" name="rating_4" value="2" /><label  for="star2_4" title="Not satisfied - 2 stars"></label>   
    <input type="radio" id="star1_4" name="rating_4" value="1" /><label  for="star1_4" title="Disgusting - 1 star"></label>
        </div>
      </td>
    </tr>
  <tr class="q5">
      <td>The instructor encouraged the students<br> participation and interacted in the class</td>
      <td>
        <div class="rating">
        <input type="radio" id="star5_5" name="rating_5" value="5" /><label  for="star5_5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4_5" name="rating_5" value="4" /><label  for="star4_5" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3_5" name="rating_5" value="3" /><label  for="star3_5" title="Average - 3 stars"></label>
    <input type="radio" id="star2_5" name="rating_5" value="2" /><label  for="star2_5" title="Not satisfied - 2 stars"></label>   
    <input type="radio" id="star1_5" name="rating_5" value="1" /><label  for="star1_5" title="Disgusting - 1 star"></label>
        </div>
      </td>
    </tr>
  <tr class="q6">
      <td>The instructor was regular in class and <br>generated interest in subject</td>
      <td>
        <div class="rating">
        <input type="radio" id="star5_6" name="rating_6" value="5" /><label  for="star5_6" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4_6" name="rating_6" value="4" /><label  for="star4_6" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3_6" name="rating_6" value="3" /><label  for="star3_6" title="Average- 3 stars"></label>
    <input type="radio" id="star2_6" name="rating_6" value="2" /><label  for="star2_6" title="Not satisfied - 2 stars"></label>   
    <input type="radio" id="star1_6" name="rating_6" value="1" /><label  for="star1_6" title="Disgusting - 1 star"></label>
        </div>
      </td>
    </tr>
  </tbody>
</div>
  </table>
  
  <br>
    <div class="row">
    <input type="submit" name="insert" value="Submit">
    </div>
     </div>
  </div>
  </form>
  <?php
}
  }
}
}
 //}
 
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
  </div>
	</body>
</html>









