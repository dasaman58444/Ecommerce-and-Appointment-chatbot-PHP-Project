<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM medicine WHERE medicineid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Medicine redcord deleted successfully..');</script>";
	}
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Medicine List</h2>
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
            <h2>Search Medicine - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter" /></h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</section> 
<center><fieldset style='width:100%'>
    <table class="order-table" style="width:80%;text-align:center;margin-bottom:100px;">
        <thead>
            <tr style="background-color:#04294c;color:white;">
            <th style="width:8%;">Category</th>
          <th style="width:10%;">Medicine Brand</th>
          <th style="width:12%;">Medicine Name</th>
          <th style="width:8%;">Medicine Cost</th>
          <th style="width:36%;">Description</th>
          <th style="width:8%;">Status</th>
          <th style="width:8%;">Action</th>
        </tr>
        </thead> 
        <tbody>
        
          <?php
		
        $sql="SELECT * FROM medicine";
		$qsql = mysqli_query($con,$sql);
        
		while($rs = mysqli_fetch_array($qsql))
		{
            echo "<tr bgcolor='#f7f7f7' style='border-bottom:2px solid #fff'>
            <td>&nbsp;";
                $a=$rs[category];
            $r ="SELECT * FROM category where id=$a";
            $qr=mysqli_query($con,$r);
            while($s = mysqli_fetch_array($qr)){
            echo "$s[categoryName]";
            }
		echo "</td>
        <td>&nbsp;$rs[medicinebrand]</td>
          <td>&nbsp;$rs[medicinename]</td>
          <td>&nbsp;$rs[medicinecostad]</td>
          <td>&nbsp;$rs[description]</td>
			 <td>&nbsp;$rs[status]</td>
			 <td>&nbsp;
			  <a href='medicine.php?editid=$rs[medicineid]'>Edit</a> | <a href='viewmedicine.php?delid=$rs[medicineid]'>Delete</a> </td>
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