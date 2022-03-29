<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM treatment WHERE treatmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('treatment deleted successfully..');</script>";
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Treatment Type</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<center><fieldset style='width:100%'>
    <table style="width:80%;text-align:center;margin:100px auto;">
        <tbody>
            <tr style="background-color:#04294c;color:white;">
          <td style="width:10%"><strong>Treatment Type</strong></td>
          <td style="width:10%"><strong>Treatment cost</strong></td>
          <td style="width:60%"><strong>Note</strong></td>
          <td style="width:10%"><strong>Status</strong></td>
          <?php
		  		if(isset($_SESSION[adminid]))
		{
		?>
          <td style="width:10%"><strong>Action</strong></td>
          <?php
		}
		?>
        </tr>
          <?php
		$sql ="SELECT * FROM treatment";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:2px solid #fff'>
          <td>&nbsp;$rs[treatmenttype]</td>
		  <td>&nbsp;Rs. $rs[treatment_cost]</td>
          <td>&nbsp;$rs[note]</td>
			 <td>&nbsp;$rs[status]</td>";
		if(isset($_SESSION[adminid]))
		{
		echo "<td>&nbsp;
			  <a href='treatment.php?editid=$rs[treatmentid]'>Edit</a> | <a href='viewtreatment.php?delid=$rs[treatmentid]'>Delete</a> </td>";
			}
        echo "</tr>";
		}
		?>
      </tbody>
    </table>
    <h1>&nbsp;</h1>
    <p>&nbsp;</p>
    </fieldset>
</center>
<?php
include("footers.php");
?>