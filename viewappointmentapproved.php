<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM appointment WHERE appointmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if(isset($_GET[approveid]))
{
	$sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appointment record Approved successfully..');</script>";
	}
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Approved Appointment</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>

<section id="search" style="margin:50px 0">  
    <div class="row text-center">
        <div class="col-md-2">
        </div>
        <div class="col-md-8" style="background-color:#f7f7f7;padding-top:30px">
            <h2>Filter Appointment - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter" /></h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</section> 
<center><fieldset style='width:100%'>
    <table class="order-table" style="width:80%;text-align:center;">
        <thead>
            <tr style="background-color:#04294c;color:white;">
          
          <td>Patient detail</td>
          <td>Registration Date &  Time</td>
          <td>Department</td>
          <td>Doctor</td>
          <td>Appointment Reason</td>
          <td>Status</td>
          <td><div align="center">Action</div></td>
        </tr>
        </thead>
        <tbody>
          <?php
		$sql ="SELECT * FROM appointment WHERE (status='Approved' OR status='Active')";
		if(isset($_SESSION[patientid]))
		{
			$sql  = $sql . " AND patientid='$_SESSION[patientid]'";
		}
		if(isset($_SESSION[doctorid]))
		{
			$sql  = $sql . " AND doctorid='$_SESSION[doctorid]'";			
		}
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
			$qsqlpat = mysqli_query($con,$sqlpat);
			$rspat = mysqli_fetch_array($qsqlpat);
			
			
			$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
			$qsqldept = mysqli_query($con,$sqldept);
			$rsdept = mysqli_fetch_array($qsqldept);
			
			$sqldoc= "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
			$qsqldoc = mysqli_query($con,$sqldoc);
			$rsdoc = mysqli_fetch_array($qsqldoc);
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:2px solid #fff'>
         
          <td>&nbsp;$rspat[patientname]<br>&nbsp;$rspat[mobileno]</td>		 
			 <td>&nbsp;$rs[appointmentdate]&nbsp;$rs[appointmenttime]</td> 
		    <td>&nbsp;$rsdept[departmentname]</td>
			   <td>&nbsp;$rsdoc[doctorname]</td>
			    <td>&nbsp;$rs[app_reason]</td>
			    <td>&nbsp;$rs[status]</td>
          <td><div align='center'>";
		  if($rs[status] != "Approved")
		  {
				  if(!(isset($_SESSION[patientid])))
				  {
						  echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]'>Approve</a><hr>";
				  }
				 echo "  <a href='viewappointment.php?delid=$rs[appointmentid]'>Delete</a>";
		  }
		  else
		  {
				echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]'>View Report</a>";
		  }
		 echo "</center></td></tr>";
		}
		?>
      </tbody>
    </table>
    </fieldset>
</center>
<?php
include("footers.php");
?>