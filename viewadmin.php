<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM admin WHERE adminid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('admin record deleted successfully..');</script>";
	}
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Add new Administrator record</h2>
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
                            <h2>Search Admin - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter" /></h2>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </section>

<center><fieldset style='width:100%'>
    <table class="order-table" style="width:80%;text-align:center;margin-bottom:50px;">
        <thead>
            <tr style="background-color:#04294c;color:white;">
          <td width="12%" height="40">Admin Name</td>
          <td width="11%">Login ID</td>
          <td width="12%">Status</td>
          <td width="34%">Action</td>
        </tr>
        </thead>
       <tbody>
       <?php
		$sql ="SELECT * FROM admin";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
        echo "<tr bgcolor='#f7f7f7'>
          <td>&nbsp;$rs[adminname]</td>
          <td>&nbsp;$rs[loginid]</td>
          <td>&nbsp;$rs[status]</td>
          <td>&nbsp;
		  <a href='admin.php?editid=$rs[adminid]'>Edit</a>| <a href='viewadmin.php?delid=$rs[adminid]'>Delete</a> </td>
        </tr>";
		}
		?>
      </tbody>
    </table>
    </fieldset>
</center>
<?php
include("footers.php");
?>