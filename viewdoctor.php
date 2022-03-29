<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM doctor WHERE doctorid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('doctor record deleted successfully..');</script>";
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Doctor</h2>
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
            <h2>Search Doctor - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter" /></h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</section> 
<center><fieldset style='width:100%'>
    <table class="order-table" style="width:80%;text-align:center;">
        <tbody>
            <tr style="background-color:#04294c;color:white;">
          <td>Doctor Name</td>
          <td>Mobile Number</td>
          <td>Department</td>
          <td>Login ID</td>
          <td>Consultancy Charge</td>
          <td>Education</td>
          <td>Experience</td>
          <td>Status</td>
          <td>Action</td>
        </tr>
          <?php
		$sql ="SELECT * FROM doctor";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			
			$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
			$qsqldept = mysqli_query($con,$sqldept);
			$rsdept = mysqli_fetch_array($qsqldept);
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:2px solid #fff'>
          <td>&nbsp;$rs[doctorname]</td>
          <td>&nbsp;$rs[mobileno]</td>
		   <td>&nbsp;$rsdept[departmentname]</td>
			<td>&nbsp;$rs[loginid]</td>
			<td>&nbsp;$rs[consultancy_charge]</td>
			 <td>&nbsp;$rs[education]</td>
			<td>&nbsp;$rs[experience]</td>
          <td>$rs[status]</td>
           <td>&nbsp;
		   <a href='doctor.php?editid=$rs[doctorid]'>Edit</a> | <a href='viewdoctor.php?delid=$rs[doctorid]'>Delete</a> </td>
        </tr>";
		}
		?>      </tbody>
    </table>
    <p>&nbsp;</p>
    </fieldset>
</center>
<?php
include("footers.php");
?>