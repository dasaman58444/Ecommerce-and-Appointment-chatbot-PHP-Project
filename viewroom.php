<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM room WHERE roomid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('room deleted successfully..');</script>";
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Room</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<center><fieldset style='width:100%'>
    <table class="order-table" style="width:80%;text-align:center;margin:50px 0;">
        <tbody>
            <tr style="background-color:#04294c;color:white;">
          <td width="20%">Room Type</td>
          <td width="15%">Room Number</td>
          <td width="15%">Number of beds</td>
            <td width="15%">Room Tariff</td>
          <td width="15%">Status</td>
          <td width="20%">Action</td>
        </tr>
          <?php
		$sql ="SELECT * FROM room";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:2px solid #fff'>
          <td>&nbsp;$rs[roomtype]</td>
          <td>&nbsp;$rs[roomno]</td>
		   <td>&nbsp;$rs[noofbeds]</td>
		   <td>&nbsp;$rs[room_tariff]</td>
		<td>&nbsp;$rs[status]</td>
		 <td>&nbsp;<a href='room.php?editid=$rs[roomid]'>Edit</a> | <a href='viewroom.php?delid=$rs[roomid]'>Delete</a> </td>
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