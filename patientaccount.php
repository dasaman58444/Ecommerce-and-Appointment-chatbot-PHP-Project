<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION['patientid']))
{
	echo "<script>window.location='patientlogin.php';</script>";
}
include("headers.php");

$sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatient = mysqli_query($con,$sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);

$sqlpatientappointment = "SELECT * FROM appointment WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatientappointment = mysqli_query($con,$sqlpatientappointment);
$rspatientappointment = mysqli_fetch_array($qsqlpatientappointment);
?>

<section id="welcome" style="background-image:url(images/hm.jpg);background-size:100%;padding:300px 400px 170px 0px; margin-top:5px;">
    <div class="container d-flex justify-content-center gap100">
        <div class="col-md-10 ">
    <h2>This account is registered under <?php echo $rspatient[patientname]; ?> </h2>
    <p style="font-size:40px;">You have Registered on <?php echo $rspatient[admissiondate]; ?> <?php echo $rspatient[admissiontime]; ?></p>
<?php
if(mysqli_num_rows($qsqlpatientappointment) == 0)
{
?>
        <p style="font-size:40px;">Appointment records not found.. </p>
<?php
}
else
{
?>    
        <p style="font-size:40px;">Last Appointment taken on - <?php echo $rspatientappointment[appointmentdate]; ?> <?php echo $rspatientappointment[appointmenttime]; ?> </p>
<?php
}
?>      
  </div>
</div>
</section>
<?php
include("footers.php");
?>