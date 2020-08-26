<!DOCTYPE html>
<html>

<head>
    <title>Students' Feedback System</title>
    <link rel='icon' href='../front-src/images/manitlogo3.jpg'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../front-src/pages/basic.css'>
    <link rel='stylesheet' type='text/css' href='../front-src/pages/classic.css' />
    <link rel='stylesheet' type='text/css' href='../front-src/pages/modal.css' />
    <link rel='stylesheet' type='text/css' href='../front-src/pages/w3.css' />
    <link rel='stylesheet' type='text/css' href='../front-src/pages/adminProfile.css' />
</head>

<body>
    <div class='header-container'>
        <a href='http://www.manit.ac.in/' class='header'>
            <img class='logo' src='../front-src/images/manitlogo.png' alt='manit.ac.in' />
            <div class='title'>
                <div class='innertitle'>
                    MAULANA AZAD NATIONAL INSTITUTE OF TECHNOLOGY
                </div>
                Students' Feedback System
            </div>
        </a>
        <div class='nav'>
            
            <?php
include 'operation.php';
$connection=mysqli_connect("localhost","root","","project");
session_start();

if(isset($_SESSION['adminId'])&&$_SESSION['role']=='a'){
   $adminId=$_SESSION['adminId'];
$query="SELECT * FROM admin WHERE adminId=$adminId";
$result=mysqli_query($connection,$query);
$tuple=mysqli_fetch_array($result);
if($tuple){
  $info['Name']=mysqli_real_escape_string($connection,$tuple['name']);
  $GLOBALS['name']=$info['Name'];
  $info['Admin Id']=mysqli_real_escape_string($connection,$tuple['adminId']);
  $info['Gender']=mysqli_real_escape_string($connection,$tuple['sex']);
  $info['Phone Number']=mysqli_real_escape_string($connection,$tuple['phno']);
  $info['Email Address']=mysqli_real_escape_string($connection,$tuple['email']);
?>
            <a href="../back-src/reset.php?adminId=<?php echo $adminId ?>&&roll='a'" class='nav-btn'>
                    Change password
            </a>
            <a href='../back-src/logout.php' class='nav-btn'>
                Logout
            </a>
        </div>
    </div>
    <div id='home'></div>
    <div class='main-container'>
        <div class='aside'>
            <fieldset class='menu-container' style='color: black;'>
                <legend style='font-size: 1.5em; transition: .5s;'>Add section</legend>
                <form action="updateadmin.php" method="POST" style='border: none;'>
                        <button type="submit" name="update" value="udateadmin" class='menu-button'>value="udateadmin" </button>
                </form>

                <form action="updatestudent.php" method="POST" style='border: none;'>
                        <button type="submit" name="update" value="udatestudent"  class='menu-button' >value="udatestudent"</button>
                </form>

                <form action="updatefaculty.php" method="POST" style='border: none;'>
                        <button type="submit" name="update"  value="udatefaculty" class='menu-button'>value="udatefaculty</button>
                </form>

                <form action="updatedepartment.php" method="POST" style='border: none;'>
                        <button type="submit" name="update"  value="udatedepartment" class='menu-button' >value="udatedepartment"</button>
                </form>

                <form action="updatecourse.php" method="POST" style='border: none;'>
                        <button  type="submit" name="update"  class='menu-button'>value="udatecourse"</button>
                </form>
            </fieldset>


            <!--
            VIEW SECTION    

            <form action="view.php" method="POST">
                <div class="row">
                    <input type="submit" name="udateadmin" value="viewadmin">
                </div>
            </form>

            <form action="view.php" method="POST">
                <div class="row">
                    <input type="submit" name="viewt" value="viewstudent">
                </div>
            </form>

            <form action="view.php" method="POST">
                <div class="row">
                    <input type="submit" name="view" value="viewfaculty">
                </div>
            </form>

            <form action="view.php" method="POST">
                <div class="row">
                    <input type="submit" name="view" value="viewdepartment">
                </div>
            </form>

            <form action="view.php" method="POST">
                <div class="row">
                    <input type="submit" name="view" value="viewcourse">
                </div>
            </form> -->






            <!--
            EDIT SECTION    
            
            <form action="edit.php" method="POST">
                <div class="row">
                    <input type="submit" name="edit" value="editadmin">
                </div>
            </form>

            <form action="editstudent.php" method="POST">
                <div class="row">
                    <input type="submit" name="edit" value="editstudent">
                </div>
            </form>

            <form action="edit.php" method="POST">
                <div class="row">
                    <input type="submit" name="edit" value="editfaculty">
                </div>
            </form>

            <form action="edit.php" method="POST">
                <div class="row">
                    <input type="submit" name="edit" value="editdepartment">
                </div>
            </form>

            <form action="edit.php" method="POST">
                <div class="row">
                    <input type="submit" name="edit" value="editcourse">
                </div>
            </form>

            <form action="editStudent.php?scholarNo=171112021" method="POST">
                <input type="submit" name="edit" value="editstudent">
            </form> -->



</div>
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
         </article>
         <aside>
            <div style='display: flex; flex-direction: column; justify-content: center; align-content: center;'>
                <img src='../front-src/images/manitlogo3.jpg' style='width: 20vw; align-self: center;'/>  
                <div style="text-align: center;">
                    <?php echo $GLOBALS['name'] ?>
                   
                </div>
            </div>
        </aside>
        </div>
    </div>
    <footer>
        <div class='socialMedia'>
            <a href="">
                <div class="fab fa-facebook-square media" padding='10px'></div>
            </a>
            <a href="">
                <div class="fab fa-instagram media" padding='10px'></div>
            </a>
            <a href="">
                <div class="fab fa-google media" padding='10px'></div>
            </a>
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