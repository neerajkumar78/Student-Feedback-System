<?php
include '../admin-src/operation.php';
session_start();
$connection=mysqli_connect('localhost','root','','project');
if($connection){
	echo "connected";
}
if(isset($_POST['submit']))
{  
    if($_POST['submit']=='s'){
	$scholarNo=mysqli_real_escape_string($connection,(int)$_POST['userName']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$query="SELECT * FROM student WHERE scholarNo=$scholarNo ";
	$result=mysqli_query($connection,$query);
	while($tuple=mysqli_fetch_assoc($result))
	{
		if($tuple['scholarNo']==NULL)
		{
			echo 'enter correct username or password';
		}
		
		else
		{   $hash=$tuple['password'];
			if(password_verify($password,$hash)==1){
			$name=$tuple['name'];
			$_SESSION['scholarNo']=$scholarNo;
			$_SESSION['name']=$name;
			$_SESSION['role']='s';
			header('Location:profile.php');
		}
		else{ 
			echo "password not matched";
		}
		}
	}

   }
   elseif($_POST['submit']=='f'){
    $facultyId=mysqli_real_escape_string($connection,(int)$_POST['userName']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$query="SELECT * FROM faculty WHERE facultyId=facultyId";
	$result=mysqli_query($connection,$query);
	while($tuple=mysqli_fetch_assoc($result))
	{
		if($tuple['facultyId']==NULL)
		{
			echo 'enter correct username or password';
		}
		else
		{
			$hash=$tuple['password'];
			if(password_verify($password,$hash)){
			$name=$tuple['name'];
			$_SESSION['facultyId']=$facultyId;
			$_SESSION['name']=$name;
			$_SESSION['role']='f';
			redirect('facultyprofile.php');
		}
		else{
			$hash=$tuple['password'];
			echo password_verify($password,$hash);
			echo "password not matched";
		    }
		}
	}

}

else{
	
    $adminId=mysqli_real_escape_string($connection,(int)$_POST['userName']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$query="SELECT * FROM admin WHERE adminId=$adminId";
	$result=mysqli_query($connection,$query);
	if($result){

	while($tuple=mysqli_fetch_assoc($result))
	{
		if($tuple['adminId']==NULL)
		{
			echo 'enter correct username or password';
		}
		else
		{
			$hash=$tuple['password'];
			if(password_verify($password,$hash)){
			$name=$tuple['name'];
			$_SESSION['adminId']=$adminId;
			$_SESSION['name']=$name;
			$_SESSION['role']='a';
			redirect('../admin-src/profile.php');
		}
		else{
			echo "password not matched";
		}
		
		}
	}
}
else{
	echo mysqli_error($connection);
}
}
}
?>
<!----------------
<!doctype html>
<html>
<head>
<title>Login</title>
</head>
<body>
<h1>Student's login</h1>
 <h1></h1>
</br>
<form action="#" method="POST">
Scholar number : <input type="number" name="scholarNo" maxlength="9" required /></br></br>
Password       : <input type="password" name="password" required /></br></br>
<button name="submit" type="submit" >Confirm</button>
</form>
</body>
</html>