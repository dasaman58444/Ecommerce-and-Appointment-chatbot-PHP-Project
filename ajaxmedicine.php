<?php
include("dbconnection.php");
$sqlmedicine ="SELECT * FROM medicine WHERE medicinename='$_GET[medicineid]'";
$qsqlmedicine = mysqli_query($con,$sqlmedicine);
$rsmedicine = mysqli_fetch_array($qsqlmedicine);
$m=$rsmedicine['medicinecostad'];
echo $m;
?>