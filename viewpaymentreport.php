<?php
session_start();
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM billing_records WHERE billingid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('billing record deleted successfully..');</script>";
	}
}

?>
 <section class="container">
<?php
$sqlbilling_records ="SELECT * FROM billing WHERE appointmentid='$billappointmentid'";
$qsqlbilling_records = mysqli_query($con,$sqlbilling_records);
$rsbilling_records = mysqli_fetch_array($qsqlbilling_records);
?>
    <table width="100%" style="color:white;font-size:20px;border:1px solid white;">>
        <tbody>
            <tr style="border:1px solid white;">
        <th scope="col" style="border:1px solid white;"><div align="right">Bill number &nbsp; </div></th>
                <td style="border:1px solid white;"><?php echo $rsbilling_records[billingid]; ?></td>
                <th style="border:1px solid white;">Appointment Number &nbsp;</th>
                <td style="border:1px solid white;"><?php echo $rsbilling_records[appointmentid]; ?></td>
        </tr>
            <tr style="border:1px solid white;">
                <th style="border:1px solid white;" width="442" scope="col"><div align="right">Billing Date &nbsp; </div></th>
                <td style="border:1px solid white;" width="413"><?php echo $rsbilling_records[billingdate]; ?></td>
                <th style="border:1px solid white;" width="413">Billing time&nbsp; </th>
                <td style="border:1px solid white;" width="413"><?php echo $rsbilling_records[billingtime] ; ?></td>
        </tr>
         
            <tr style="border:1px solid white;">
                <th scope="col"><div align="right"></div></th>
                <td  style="border:none;"></td>
                <th style="border:1px solid white;" scope="col"><div align="right">Bill Amount &nbsp; </div></th>
          <td><?php
		$sql ="SELECT * FROM billing_records where billingid='$rsbilling_records[billingid]'";
		$qsql = mysqli_query($con,$sql);
		$billamt= 0;
		while($rs = mysqli_fetch_array($qsql))
		{
			$billamt = $billamt +  $rs[bill_amount];
		}
?>
  &nbsp;Rs. <?php echo $billamt; ?></td>
        </tr>
            <tr style="border:1px solid white;">
                <th width="442" scope="col"><div align="right"></div></th>
                <td style="border:none;" width="413">&nbsp;</td>
                <th style="border:1px solid white;" width="442" scope="col"><div align="right">Tax Amount (5%) &nbsp; </div></th>
                <td style="border:1px solid white;" width="413">&nbsp;Rs. <?php echo $taxamt = 5 * ($billamt / 100); ?></td>
       	</tr>
         
		<tr>
            <th style="border:none" scope="col"><div align="right">Disount reason</div></th>
            <td style="border:1px solid white;" rowspan="4" valign="top"><?php echo $rsbilling_records[discountreason]; ?></td>
            <th style="border:1px solid white;" scope="col"><div align="right">Discount &nbsp; </div></th>
            <td style="border:1px solid white;">&nbsp;Rs. <?php echo $rsbilling_records[discount]; ?></td>
	    </tr>
        
		<tr>
            <th rowspan="3" scope="col">&nbsp;</th>
            <th style="border:1px solid white;" scope="col"><div align="right">Grand Total &nbsp; </div></th>
            <td style="border:1px solid white;">&nbsp;Rs. <?php echo $grandtotal = ($billamt + $taxamt)  - $rsbilling_records[discount] ; ?></td>
	    </tr>
		<tr>
            <th style="border:1px solid white;" scope="col"><div align="right">Paid Amount </div></th>
            <td style="border:1px solid white;">Rs. <?php
		  	$sqlpayment ="SELECT sum(paidamount) FROM payment where appointmentid='$billappointmentid'";
			$qsqlpayment = mysqli_query($con,$sqlpayment);
			$rspayment = mysqli_fetch_array($qsqlpayment);
			echo $rspayment[0];		  
		   ?></td>
	    </tr>
		<tr>
            <th style="border:1px solid white;" scope="col"><div align="right">Balance Amount</div></th>
            <td style="border:1px solid white;">Rs. <?php echo $balanceamt = $grandtotal - $rspayment[0]  ; ?></td>
	    </tr>
      </tbody>
    </table>
    <br>
    <br>
   <p style="color:white"><strong>Payment report:</strong></p>
<?php
$sqlpayment = "SELECT * FROM payment where appointmentid='$billappointmentid'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
if(mysqli_num_rows($qsqlpayment) == 0)
{
	echo "<strong>No transaction details found..</strong>";
}
else
{
?>
     <table width="100%" style="border:1px solid white; color:white;">
     <tbody>
         <tr style="border:1px solid white;">
             <th style="border:1px solid white;" scope="col">Paid Date</th>
             <th style="border:1px solid white;" scope="col">Paid time</th>
             <th style="border:1px solid white;" scope="col">Paid amount</th>
       </tr>
<?php       
		while($rspayment = mysqli_fetch_array($qsqlpayment))
		{
		?>
         <tr style="border:1px solid white;">
             <td style="border:1px solid white;">&nbsp;<?php echo $rspayment[paiddate]; ?></td>
             <td style="border:1px solid white;">&nbsp;<?php echo $rspayment[paidtime]; ?></td>
             <td style="border:1px solid white;">&nbsp;Rs. <?php echo $rspayment[paidamount]; ?></td>
			   </tr>
		<?php
		}
?>

     </tbody>
   </table>
<?php
}
?>   
   <p><strong></strong></p>
</section>