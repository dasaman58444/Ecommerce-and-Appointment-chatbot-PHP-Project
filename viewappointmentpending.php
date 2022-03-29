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
	$sql ="UPDATE patient SET status='Active' WHERE patientid='$_GET[patientid]'";
	$qsql=mysqli_query($con,$sql);
	
	$sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appointment record Approved successfully..');</script>";
		echo "<script>window.location='viewappointmentpending.php';</script>";
	}	
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Pending Appointment</h2>
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
          
          <th>Patient detail</th>
          <th>Appointment Date &  Time</th>
          <th>Department</th>
          <th>Doctor</th>
          <th>Appointment Reason</th>
          <th>Status</th>
          <th><div align="center">Action</div></th>
        </tr>
        </thead>
        <tbody>
          <?php
		$sql ="SELECT * FROM appointment WHERE (status='Pending' OR status='Inactive')";
		if(isset($_SESSION[patientid]))
		{
			$sql  = $sql . " AND patientid='$_SESSION[patientid]'";
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
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:4px solid #fff'>
          
          <td>&nbsp;$rspat[patientname]<br>&nbsp;$rspat[mobileno]</td>		 
			 <td>&nbsp;" . date("d-M-Y",strtotime($rs[appointmentdate])) . " &nbsp; " . date("H:i A",strtotime($rs[appointmenttime])) . "</td> 
		    <td>&nbsp;$rsdept[departmentname]</td>
			   <td>&nbsp;$rsdoc[doctorname]</td>
			    <td>&nbsp;$rs[app_reason]</td>
			    <td>&nbsp;$rs[status]</td>
          <td><div align='center'>";
		  if($rs[status] != "Approved")
		  {
				  if(!(isset($_SESSION[patientid])))
				  {
						  echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]&patientid=$rs[patientid]'>Approve</a><hr>";
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
    </section>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>