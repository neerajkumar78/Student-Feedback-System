<?php
$connection=mysqli_connect('localhost','root','','project');
if(isset($_POST['submit'])){
//if($_POST['submit']=='s'){
$scholarNo=mysqli_real_escape_string($connection,(int)$_POST['userName']);
$password=mysqli_real_escape_string($connection,$_POST['password']);
$query="SELECT * FROM student WHERE scholarNo=$scholarNo";
$result=mysqli_query($connection,$query);
$tuple=mysqli_fetch_array($result);
if($tuple['scholarNo']==NULL){
	//header("Location:../front-src/pages/index3.html");
    echo 'enter correct scholar number';
}

elseif($tuple['reflag']=="false"){
	$hashFormate="$2y$10$";
$x="gjhgjhghjghjghlkjljklmjkl";
$y=$hashFormate . $x;
$password=crypt($password,$y);
$query="UPDATE student SET password='$password',reflag='true' WHERE scholarNo=$scholarNo";
$result=mysqli_query($connection,$query);
if($result){
//header("Location:../front-src/pages/index3.html");
	echo "password inserted";
}
else{
//echo ''.mysqli_error($connection);
//header("Location:../front-src/pages/index3.html");	
	echo "registration failed";
}
	
}
else{
	
echo "you are already registered";

}
}
/*
else{
$facultyId=mysqli_real_escape_string($_POST['username']);
$password=mysqli_real_escape_string($_POST['password']);
$query="SELECT facultyId FROM faculty WHERE facultyId=$facultyId;";
$result=mysqli_query($connection,$query);
$tuple=mysqli_fetch_assoc($result);
if($tuple['facultyId']==NULL){
echo 'enter correct facultyId';
}
else{
$query="UPDATE faculty SET password=$password WHERE facultyId=$facultyId;";
$result=mysqli_query($connection,$query);
if(!$result){
echo ''.mysqli_error($connection);
}
else{
echo 'password inserted';
}
}
}
}
?>
*/






