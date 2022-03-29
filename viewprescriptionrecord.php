<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM prescription_records WHERE prescription_record_id='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('prescription record deleted successfully..');</script>";
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Prescription Record</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<center><fieldset style='width:100%'>
    <table class="order-table" style="width:80%;text-align:center;margin:50px 0;">
        <tbody>
            <tr style="background-color:#04294c;color:white;">
          <td>Medicine</td>
          <td>Cost</td>
          <td>Unit</td>
          <td>Dosage</td>
          <td>Status</td>
          <td>Action</td>
        </tr>
         <?php
		$sql ="SELECT * FROM prescription_records";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:2px solid #fff'>
          <td>&nbsp;$rs[medicine_name]</td>
          <td>&nbsp;$rs[cost]</td>
		   <td>&nbsp;$rs[unit]</td>
		    <td>&nbsp;$rs[dosage]</td>
			 <td>&nbsp;$rs[status]</td>
			  <td>&nbsp;<a href='viewprescriptionrecord.php?delid=$rs[prescription_record_id]'>Delete</a> </td>
        </tr>";
		}
		?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    </fieldset>
</center>
<?php
include("footer.php");
?>