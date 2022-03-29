<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM orders WHERE orderid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('order record deleted successfully..');</script>";
	}
}
if(isset($_GET[deliverid]))
{
	$sql ="UPDATE orders SET deliverydate='$dt' WHERE orderid='$_GET[deliverid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('order Deliver record updated successfully..');</script>";
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Order</h2>
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
            <h2>Search Order - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter" /></h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</section> 
<center><fieldset style='width:100%'>
    <table class="order-table" style="width:80%;text-align:center;margin:70px auto;">
        <thead>
            <tr style="background-color:#04294c;color:white;">

          <th>Patient</th>
          <th>Doctor</th>
          <th>Order Date</th>
          <th>Delivery Date</th>
          <th>Address</th>
          <th>Mobile Number</th>
          <th>Status</th>
<?php
		if(isset($_SESSION[doctorid]))
		{
?>			          
          <th>Deliver</th>
          <th>Action</th>
<?php
		}
?>
<?php
		if(isset($_SESSION[adminid]))
		{
?>			         
          <th>Action</th>
<?php
		}
?>
        </tr>
        </thead>
         <tbody> 
		 <?php
		$sql ="SELECT * FROM orders where orderid!='0' ";
		if(isset($_SESSION[patientid]))
		{
			$sql = $sql . " AND patientid='$_SESSION[patientid]'";
		}
		if(isset($_SESSION[doctorid]))
		{
			$sql = $sql . " AND doctorid='$_SESSION[doctorid]'";
		}
		//echo $sql;
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlpatient = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
			$qsqlpatient = mysqli_query($con,$sqlpatient);
			$rspatient = mysqli_fetch_array($qsqlpatient);
			
			$sqldoctor = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
			$qsqldoctor = mysqli_query($con,$sqldoctor);
			$rsdoctor = mysqli_fetch_array($qsqldoctor);
        	echo "<tr>
          <td>&nbsp;$rspatient[patientname]</td>
          <td>&nbsp;$rsdoctor[doctorname]</td> 
          <td>&nbsp;$rs[orderdate]</td>
          <td>&nbsp;$rs[deliverydate]</td>
		   <td>&nbsp;$rs[address]</td>
		    <td>&nbsp;$rs[mobileno]</td>
			 <td>&nbsp;";
			 if(isset($_SESSION[patientid]))
			{
				if($rs[status] == "Active")
				{
				echo "<a href='prescriptionorderreport.php?orderid=$rs[0]&prescriptionid=$rs[3]'>Orders</a>";
				}
				else
				{
				echo $rs[status];
				}
			}
			else
			{
				echo $rs[status];
			}
			 echo "</td>";
		if(isset($_SESSION[doctorid]))
		{
				if($rs[status] == "Active")
				{
				   echo "<td><a href='prescriptionorderreport.php?orderid=$rs[0]&prescriptionid=$rs[3]'>Orders</a> </td>";
				}
				else
				{
					
		   			echo "<td><a href='prescriptionorder.php?orderid=$rs[0]'>Add Medicines</a> </td>";		   
				}
		   
		   echo "<td> <a href='patientreport.php?patientid=$rs[patientid]' target='_blank' >View Patient Report</a>  ";
			   if(isset($_SESSION[adminid]))
				{
			   echo " | <a href='vieworder.php?delid=$rs[orderid]'>Delete</a>";
				}
		   echo "</td>";
			}
			
		 if(isset($_SESSION[adminid]))
				{		  
			   echo " <td> ";
				   if($rs[deliverydate] == "0000-00-00")
				   {
				   echo "<a href='vieworder.php?deliverid=$rs[orderid]'>Deliver</a>  |  ";
				   echo "<a href='vieworder.php?delid=$rs[orderid]'>Delete</a>";
				   }
				   
			   echo "</td>";
				}
		echo "</tr>";
		
		}
		?>
      </tbody>
    </table>
    </fieldset>
    </center>
<?php
include("footer.php");
?>