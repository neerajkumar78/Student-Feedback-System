  <!----------header should be put ----------->
<?php
session_start();
$connection=mysqli_connect('localhost','root','','project');
 $scholarNo=171112103;
$query="SELECT * FROM courses";
$result=mysqli_query($connection,$query);
while($tuple=mysqli_fetch_array($result)){
    $course["{$tuple['cCode']}"]=$tuple['name'];
}
$query="SELECT * FROM faculty";
$result=mysqli_query($connection,$query);
while($tuple=mysqli_fetch_array($result)){
    $faculty["{$tuple['facultyId']}"]=$tuple['name'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Students' Feedback System</title>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  -->
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
            

        
    </div>
</div>
    <div id='home'></div>
     <div class='workSpace'>
    <article>
            <table class="w3-table-all w3-hoverable"> 
                <thead>
                    <!-- Edit here -->
                    <th>Welcome  NEERAJ KUMAR</th>
                </thead>
                <tbody>
               
        <tr>
          <td>Name</td>
          <td>NEERAJ</td>
        </tr>
        
                </tbody>
            </table>

            <!-- Feedback Modal -->
            <div id="id02" class="modal register-modal">
                <!-- Feedback Modal Content -->
                <form class="modal-content animate"  method="POST" action="#">
                    <span onclick="document.querySelector('.register-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <h1 class='register-modal-heading' style="text-align: center;">Student Feedback</h1>
                    
                    <div class="container">
                        <table>
                            <tr>
                                <td>
                        <label for="courses"><b>Course code</b></label>
                        <select name="cCode1">
                            <?php foreach($course as $key=>$value){?>
                            <option  value="<?php echo $key?>"><?php echo $value?></option>
                             <?php } ?>
                         
                        </select>
                    </td>
                     <td>
                        <label for="faculty"><b>Faculty</b></label>
                        <select name="facultyId1">
                          
                            <?php foreach($faculty as $key=>$value){?>
                            <option  value="<?php echo $key?>"><?php echo $value?></option>
                             <?php } ?>
                         
                        </select>
                    </td>
                    </tr>

                     <tr>
                                <td>
                        <label for="courses"><b>Course code</b></label>
                        <select name="cCode2">
                          
                            <?php foreach($course as $key=>$value){?>
                            <option  value="<?php echo $key?>"><?php echo $value?></option>
                             <?php } ?>
                         
                        </select>
                    </td>
                     <td>
                        <label for="faculty"><b>Faculty</b></label>
                        <select name="facultyId2">
                          
                            <?php foreach($faculty as $key=>$value){?>
                            <option  value="<?php echo $key?>"><?php echo $value?></option>
                             <?php } ?>
                         
                        </select>
                    </td>
                    </tr>

                    </table>
                    </div>
                
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="submit" name='insert1' class="cancelbtn" style='display: inline-block; background-color: #089f98; '>Submit</button>
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
                   NEERAJ
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
        var modal1 = document.getElementById('id02');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal1) {
            modal.style.display = "none";
          }
        }
    </script> 
</body>
</html>
<?php
$query="SELECT * FROM courses";
$result=mysqli_query($connection,$query);
while($tuple=mysqli_fetch_array($result)){
    $course["{$tuple['cCode']}"]=$tuple['name'];
}
$query="SELECT * FROM faculty";
$result=mysqli_query($connection,$query);
while($tuple=mysqli_fetch_array($result)){
    $faculty["{$tuple['facultyId']}"]=$tuple['name'];
}
if(isset($_POST['insert1'])){
       $cCode1=$_POST['cCode1'];
    $cCode2=$_POST['cCode2'];
    $facultyId1=$_POST['facultyId1'];
    $facultyId2=$_POST['facultyId2'];
    $query="INSERT INTO opts(scholarNo,cCode,facultyId) VALUES($scholarNo,'$cCode1',$facultyId1)";
    $result=mysqli_query($connection,$query);
    if(!$result)
    {
        echo mysqli_error($connection);
}
     $query="INSERT INTO opts(scholarNo,cCode,facultyId) VALUES($scholarNo,'$cCode2',$facultyId2)";
    
    $result=mysqli_query($connection,$query);
    if(!$result)
    {
        echo mysqli_error($connection);
}

}
?>
<!----------------------------------CHOOSE SUBJECTS BY FACYLTY------------------>

                                 
                                 <?php
                                $query="SELECT cCode,name FROM courses WHERE cCode IN(SELECT  cCode FROM belongcourse WHERE dId IN(SELECT dId FROM teachbyfaculty WHERE facultyId=$facultyId))";
                                $result=mysqli_query($connection,$query);
                                if($result){
                                  while($tuple=mysqli_fetch_array($result)){
                                    $course["{$tuple['cCode']}"]=$tuple['name'];
                                  }
                                } 
                                ?>
                               
                                <div id="id01" class="modal register-modal">
                                  
                                  <form class="modal-content animate"  method="POST" action="#">
                                    <span onclick="document.querySelector('.register-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <h1 class='register-modal-heading' style="text-align: center;">Student Feedback</h1>

                                    <div class="container">
                                      <table>
                                        <tr>
                                          <td>
                                            <label for="courses"><b>Course code</b></label>
                                            <select name="cCode1">
                                              <?php foreach($course as $key=>$value){?>
                                                <option  value="<?php echo $key?>"><?php echo $value?></option>
                                              <?php } ?>

                                            </select>
                                          </td>

                                        </tr>

                                        <tr>
                                          <td>
                                            <label for="courses"><b>Course code</b></label>
                                            <select name="cCode2">

                                              <?php foreach($course as $key=>$value){?>
                                                <option  value="<?php echo $key?>"><?php echo $value?></option>
                                              <?php } ?>

                                            </select>
                                          </td>

                                        </tr>
                                        <tr>
                                          <td>
                                            <label for="courses"><b>Course code</b></label>
                                            <select name="cCode3">

                                              <?php foreach($course as $key=>$value){?>
                                                <option  value="<?php echo $key?>"><?php echo $value?></option>
                                              <?php } ?>

                                            </select>
                                          </td>

                                        </tr>
                                      </table>
                                    </div>

                                    <div class="container" style="background-color:#f1f1f1">
                                      <button type="submit" name='insert1' class="cancelbtn" style='display: inline-block; background-color: #089f98; '>Submit</button>
                                      <button type="button" onclick="document.querySelector('.register-modal').style.display='none'" class="cancelbtn" style='position: absolute; right: 3%;'>Cancel</button>
                                    </div>
                                  </form>
                                </div>
                                <?php if($GLOBALS['subject_choosen_message']=="false"){ ?>
                                <div class='register'>
                                
                                  <div>
                                    <h1>Choose Subjects</h1>
                                  </div>
                                  <div class='btn register-btn' onclick="document.querySelector('.register-modal').style.display='block';">
                                    <i class="far fa-edit"><div style='font-size: 1.5em;'>Choose Subjects</div></i>
                                  </div>

                                </div>
                                <?php } ?>
                                <!----------------------------------END CHOOSE SUBJECTS------------------>