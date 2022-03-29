<?php
session_start();
if(!isset($_SESSION['doctorid']))
{
	echo "<script>window.location='doctorlogin.php';</script>";
}
include("headers.php");
?>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Doctor Account</li>
    </ul>
  </div>
</div>
<section id="welcome" style="background-image:url(images/hm.jpg);background-size:100%;padding:300px 100px 170px 0px; margin-top:5px;">
    <div class="container d-flex justify-content-center gap100">
        <div class="col-md-10 ">
     <h2>Number of Appointment Records : 
    <?php
	$sql = "SELECT * FROM appointment WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
    <h2>Number of Patient Records : 
    <?php
	$sql = "SELECT * FROM patient WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
        </div>
    </div>
</section>
<?php
include("footers.php");
?>