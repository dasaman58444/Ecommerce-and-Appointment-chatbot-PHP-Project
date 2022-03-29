<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM doctor_timings WHERE doctor_timings_id='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('doctortimings record deleted successfully..');</script>";
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Doctor Timing</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<center><fieldset style='width:100%'>
    <table style="width:80%;text-align:center;margin:100px auto;">
        <tbody>
            <tr style="background-color:#04294c;color:white;">
          <td>Doctor</td>
          <td>Timings available</td>
          <td>Status</td>
          <td>Action</td>
        </tr>
          <?php
		$sql ="SELECT * FROM doctor_timings";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqldoctor = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
			$qsqldoctor = mysqli_query($con,$sqldoctor);
			$rsdoctor = mysqli_fetch_array($qsqldoctor);
			
			$sqldoct = "SELECT * FROM doctor_timings WHERE doctor_timings_id='$rs[doctor_timings_id]'";
			$qsqldoct = mysqli_query($con,$sqldoct);
			$rsdoct = mysqli_fetch_array($qsqldoct);
			
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:2px solid #fff'>
          <td>&nbsp;$rsdoctor[doctorname]</td>
          <td>&nbsp;$rsdoct[start_time] - $rsdoct[end_time]</td>
          <td>&nbsp;$rs[status]</td>
          <td>&nbsp;<a href='doctortimings.php?editid=$rs[doctor_timings_id]'>Edit</a> | <a href='viewdoctortimings.php?delid=$rs[doctor_timings_id]'>Delete</a> </td>
        </tr>";
		}
		?>
        
      </tbody>
    </table>
    <p>&nbsp;</p>
    </fieldset>
</center>
<?php
include("footers.php");
?>