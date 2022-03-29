<?php
session_start();
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminlogin.php';</script>";
}
include("dbconnection.php");
include("headers.php");
?>
<section id="welcome" style="background-image:url(images/hm.jpg);background-size:100%;padding:120px 450px 120px 0px; margin-top:5px;background-repeat: no-repeat;background-attachment: fixed;">
    <div class="container d-flex justify-content-center gap100">
        <div class="col-md-10 ">
            <h2 style="color:rgba(0,4,70,1.00)"> &nbsp; <u>Date wise appointmrnt</u></h2>
            <p><form method="get" action="" style="font-size:25px;"><strong>Date -</strong> <input type="date" name="date" value="<?php echo $_GET[date]; ?>" ><input type="submit" class="btn btn-outline-success p-2;" name="submit" value="Search"></form></p>
    <h2>Number of Appointment Records :     
    <?php
	$sql = "SELECT * FROM appointment WHERE status='Active'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND appointmentdate ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>	
    <h2>Number of Billing Reports : 
    <?php
	$sql = "SELECT * FROM billing WHERE billingid !='0'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND billingdate ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
   
    <h2>Number of Patient Records : 
    <?php
	$sql = "SELECT * FROM patient WHERE status='Active'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND admissiondate ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>    
    <h2>Number of Treatment Records : 
    <?php
	$sql = "SELECT * FROM treatment_records WHERE status='Active'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND treatment_date  ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
    
    <h2>Number of Prescription  : 
    <?php
	$sql = "SELECT * FROM prescription WHERE status='Active'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND prescriptiondate   ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
    <br>
        <hr style=" position: relative; top: 20px; border: none; height: 5px; background: black; margin-bottom: 50px;"><br><br><br><br>
    
        <h2 style="color:rgba(0,4,70,1.00)">&nbsp; <u>Database Records</u></h2>
   
   
    <h2>Number of Prescription Records : 
    <?php
	$sql = "SELECT * FROM prescription_records WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
    <h2>Number of Treatment Types : 
    <?php
	$sql = "SELECT * FROM treatment WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
    
  
    <h2>Number of Admin records :  
    <?php
	$sql = "SELECT * FROM admin WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
    <h2>Number of Department Records : 
    <?php
	$sql = "SELECT * FROM department WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
     <h2>Number of Doctor Records : 
    <?php
	$sql = "SELECT * FROM doctor WHERE status='Active' ";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
 <h2>Number of Doctor Timings Records : 
    <?php
	$sql = "SELECT * FROM doctor_timings WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
    <h2>Number of Billing Records :
    <?php
	$sql = "SELECT * FROM billing_records WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h2>
  </div>
</section>
<?php
include("footers.php");
?>