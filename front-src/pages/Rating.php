<?php  header("Content-type: text/css; charset: UTF-8");
$percent5=$_GET['percent5'];
$percent4=$_GET['percent4'];
$percent3=$_GET['percent3'];
$percent2=$_GET['percent2'];
$percent1=$_GET['percent1'];

?>
.heading {
    font-size: 25px;
    margin-right: 25px;
  }
  
  .fa {
    font-size: 25px;
  }
  
  .checked {
    color: orange;
  }
  
  /* Three column layout */
  .side {
    float: left;
    width: 15%;
    margin-top:10px;
  }
  .middle {
    margin-top:20px;
    float: left;
    width: 70%;
  }
  
  /* Place text to the right */
  .right {
    text-align: right;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* The bar container */
  .bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
  }
  
  /* Individual bars */
 
                    .bar-4 {width: <?php echo $percent5 ?>%; height: 18px; background-color: #4CAF50; }
                    .bar-3 {width: <?php echo $percent4 ?>%; height: 18px; background-color: #2196F3;}
                    .bar-2 {width:<?php echo $percent3 ?>%; height: 18px; background-color: #00bcd4;}
                    .bar-1 {width: <?php echo $percent2 ?>%; height: 18px; background-color: #ff9800;}
                    .bar-0 {width:<?php echo $percent1 ?>%; height: 18px; background-color: #f44336;}
                 
  
  /* Responsive layout - make the columns stack on top of each other instead of next to each other */
  @media (max-width: 400px) {
    .side, .middle {
      width: 100%;
    }
    .right {
      display: none;
    }
  }
.rating-container{
    margin: 2%;
    color: black;
}