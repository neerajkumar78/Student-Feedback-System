
<?php function height5($percent) {
	 $percent=$percent;
	?>
	<link rel='stylesheet' type='text/css' href="../front-src/pages/Rating.php?percent5=<?php echo $percent ?>" />
	<?php
	 } ?>
	<?php function height4($percent) {
	 $percent=$percent;
	?>
	<link rel='stylesheet' type='text/css' href="../front-src/pages/Rating.php?percent4=<?php echo $percent ?>" />
	<?php
	 } ?>
	<?php function height3($percent) {
	 $percent=$percent;
	?>
	<link rel='stylesheet' type='text/css' href="../front-src/pages/Rating.php?percent3=<?php echo $percent ?>" />
	<?php
	 } ?>
	<?php function height2($percent) {
	 $percent=$percent;
	?>
	<link rel='stylesheet' type='text/css' href="../front-src/pages/Rating.php?percent2=<?php echo $percent ?>" />
	<?php
	 } ?>
	<?php function height1($percent) {
	 $percent=$percent;
	?>
	<link rel='stylesheet' type='text/css' href="../front-src/pages/Rating.php?percent1=<?php echo $percent ?>" />
	<?php
	 } ?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Students' Feedback System</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel='icon' href='../front-src/images/manitlogo3.jpg'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--
    	<link rel='stylesheet' type='text/css' href='../front-src/pages/Rating.css'> -->
    <link rel='stylesheet' type='text/css' href="../front-src/pages/Rating.php" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"/>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/classic.css' />	

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
            </a>

<?php
include '../admin-src/operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();
if(isset($_SESSION['facultyId'])&&$_SESSION['role']=='f'){
 $facultyId=$_SESSION['facultyId'];
 $query="SELECT * FROM faculty WHERE facultyId=$facultyId";
$result=mysqli_query($connection,$query);
$tuple=mysqli_fetch_array($result);
if($tuple){
	$info['Designation']=mysqli_real_escape_string($connection,$tuple['post']);
	$info['Name']=mysqli_real_escape_string($connection,$tuple['name']);
	$GLOBALS['nam']=$info['Name'];
	$info['Gender']=mysqli_real_escape_string($connection,$tuple['sex']);
	$info['Qualification']=mysqli_real_escape_string($connection,$tuple['qualification']);
	$info['Area of interest']=mysqli_real_escape_string($connection,$tuple['areaOfInterest']);
	//$info['dId']=mysqli_real_escape_string($connection,$_POST['dId']);
	$info['Experience']=mysqli_real_escape_string($connection,$tuple['experience']);
	$info['Phone number']=mysqli_real_escape_string($connection,$tuple['phno']);
	$info['Email']=mysqli_real_escape_string($connection,$tuple['email']);
?>
<a href="reset.php?facultyId='<?php echo $facultyId?>'&&roll='f'" class='nav-btn'>Change password</a>
           
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
/*$query="SELECT cCode FROM teaches WHERE facultyId=$facultyId";
$result=mysqli_query($connection,$query);
while($tuple=mysqli_fetch_array($result)){
	$courses[]=$tuple['cCode'];
}
*/
 //foreach($courses as $ccode){
$possible_marks=array(0.5,1.5,2.5,3.5,4.5);
foreach($possible_marks as $value){
  $flag="false";
$query1="SELECT cCode,facultyId,COUNT(cCode) from feedback  WHERE facultyId=$facultyId AND (que1+que2+que3+que4+que5+que5)/6>$value GROUP BY facultyId,cCode ";
  $result=mysqli_query($connection,$query1);
  while($tuple=mysqli_fetch_array($result)){ 
  $count["{$tuple['cCode']}"]["{$value}"]=$tuple['COUNT(cCode)'];
  $flag="true";
  $GLOBALS['cCode']=$tuple['cCode'];
}
if($flag=="false"){
  $count["{$GLOBALS['cCode']}"]["{$value}"]=0;
}
}
$i=1;
//print_r($count);
foreach($count as $key1 =>$val){
	
	foreach($val as $key=>$value){
		if($i<5){
	$next="{$possible_marks[$i]}";
    $count["{$key1}"]["{$key}"]=$value-$count["{$key1}"]["{$next}"];
    //echo "$next    ";
    $i++;
	}	
}
$i=1;	
}
//print_r($count);
foreach($count as $key1 =>$val){
    $overall["$key1"]=0;
	foreach($val as $key=>$value){
       $overall["$key1"]=$overall["$key1"]+$value;}
      
   }
   //print_r($overall);
  // $count =array_reverse($count,true);
//print_r($count);
   echo "        ";
// rating of each subject
   foreach($count as $key1 =>$val){
	$rat=0;
	foreach($val as $key=>$value){
       $rate=((int)$key)+1;
        $rat=$rat+$rate*$value;
   }
   $rating["{$key1}"]=$rat/$overall["{$key1}"];
  // echo "        ";
   }
 $query="SELECT facultyId,cCode,AVG(que1) ,AVG(que2) ,AVG(que3) ,AVG(que4),AVG(que5) ,AVG(que6)  from feedback GROUP BY facultyId,cCode HAVING (facultyId=$facultyId)";

$result=mysqli_query($connection,$query);
if($result){
	
	}
	else{
		echo mysqli_error($connection,$result);
	}
?>

		<!-- <table>
			
			<tr>
				<td>Course Code</td>
				<td>question1</td>
				<td>question2</td>
				<td>question3</td>
				<td>question4</td>
				<td>question5</td>
				<td>question6</td>
			</tr>		
	</table> -->
<?php
while($tuple=mysqli_fetch_array($result)){
$cCode=$tuple['cCode'];
$que1=$tuple['AVG(que1)'];
$que2=$tuple['AVG(que2)'];
$que3=$tuple['AVG(que3)'];
$que4=$tuple['AVG(que4)'];
$que5=$tuple['AVG(que5)'];
$que6=$tuple['AVG(que6)'];
$avg=($que1+$que2+$que3+$que4+$que5+$que6)/6;

?>
		<!-- <table>			
			<tr>
				<td><?php echo $cCode ?></td>
				<td><?php echo $que1 ?></td>
				<td><?php echo $que2 ?></td>
				<td><?php echo $que3 ?></td>
				<td><?php echo $que4 ?></td>
				<td><?php echo $que5 ?></td>
				<td><?php echo $que6 ?></td>
			</tr>
		
	</table>
 -->



<?php
}
}
if(!isset($_SESSION['facultyId'])&& !isset($_SESSION['scholarNo'])){
	redirect("../front-src/pages/index3.html");
}
?>
            <!-- Faculty's Rating -->
            <?php
            $j=1;
            foreach($rating as $key => $value){?>

            <div class='rating-container'>
                <div class='overall-rating'>
                	     
                          <?php $query="SELECT name FROM courses WHERE cCode='$key'";
                          $result=mysqli_query($connection,$query);
                          if($result){
                          	$tuple=mysqli_fetch_array($result);
                          	$name=$tuple['name'];
                          }
                          ?>

                       <table class="w3-table-all w3-hoverable"> 
               
                <tbody>
                   
					<tr>
						<td><?php echo $name?></td>
						<td><?php echo $key?></td>
					</tr>
					
                </tbody>
            </table>

<!-- 
                           <span class="heading"><?php echo $name?></span>
                          <br/>
                          
                           <span class="heading"><?php echo $key?></span>

                	     <br/> -->
                	     <br/>
                        <span class="heading">RATING...</span>
                        <?php for($i=$value;$i>0;$i--){?>
                        <span class="fa fa-star checked"></span>
                        <?php
                    }
                       for($i=5-$value;$i>0;$i--){
                   	?>
                        <span class="fa fa-star"></span>
                    <?php }?>
                </div>
                
                <p>4.<?php echo $j?> average based on <?php echo $overall["{$key}"]?> reviews.</p>
                
                 

                <?php 
                
                  foreach($count as $key1 =>$value1){
                    $value1=array_reverse($value1,true);
                  	if($key==$key1){
                    $print_rate=5;
	              foreach($value1 as $key2=>$value2){
                ?>
                <?php 
                  $percent=($value2/$overall["{$key}"])*100;
                if($print_rate==5){
                height5($percent);}
            if($print_rate==4){
                height4($percent);}
            
            if($print_rate==3){
                height3($percent);}
            
            if($print_rate==2){
                height2($percent);}
            
            if($print_rate==1){
                height1($percent);}
                 ?>              
                <div class="row">
                    <div class="side">
                        <div><?php echo $print_rate--;?> star</div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                        <div class="bar-<?php echo $print_rate;?>"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div><?php echo $value2 ?></div>
                    </div>
                </div>
               <?php 
           }
           }
           } ?>
            </div>
            <hr style="border:3px solid #f1f1f1">
<?php $j++; } ?>

        </article>
        <aside>
            <div style='display: flex; flex-direction: column; justify-content: center; align-content: center;'>
                <img src='../front-src/images/manitlogo3.jpg' style='width: 20vw; align-self: center;'/>  
                <div style="text-align: center;">
                    <?php echo $GLOBALS['nam'] ?>
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
