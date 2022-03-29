<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
    $imgname=$_FILES["file"]["name"];
    $tname=$_FILES["file"]["tmp_name"];
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    $final=$_POST[medicinename].".".$extension;
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE medicine SET medicinename='$_POST[medicinename]',medicinecost='$_POST[medicinecost]',description='$_POST[description]',status='$_POST[status]' WHERE medicineid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Medicine record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
        $sql ="INSERT INTO medicine(category,medicinebrand,medicinename,medicinecostbd,medicinecostad,description,image,status) values('$_POST[cat]','$_POST[medicinebrand]','$_POST[medicinename]','$_POST[medicinecostbd]','$_POST[medicinecostad]','$_POST[description]','$final','$_POST[status]')";
		if($qsql = mysqli_query($con,$sql))
		{
            if (file_exists("productimages/" . $final))
      {
      echo "<script>alert('".$final. " already exists.');</script>";
      }
    else
      {
            move_uploaded_file($tname,'productimages/'.$final);
			echo "<script>alert('Medicine record inserted successfully...');</script>";
		}
        }
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM medicine WHERE medicineid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Add Medicine</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<section id="login_page">
    <div class="container" style="padding:50px 25px;">
        <div class="card" style="margin:auto;width:60%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">
                <form method="post" enctype="multipart/form-data">
        <table width="100%" style="color:white;font-size:20px">
      <tbody>
          <tr><td style="width:50%;"><span class="style3" >Category:</span></td>
              <td style="width:50%;"><select style="width:100%;" name=cat onChange="showUser(this.value)" required>
                  <option value=''>Select One</option>
                  <?php
                  $q=mysqli_query($con,"select * from category");
                  while($n=mysqli_fetch_array($q)){
                      echo "<option value=".$n['id'].">".$n['categoryName']."</option>";
                  }
                  ?>
                  </select>
              </td>
          </tr>
          <tr>
              <td width="34%">Medicine Brand</td>
              <td width="66%"><input type="text" name="medicinebrand" id="medicinebrand" value="<?php echo $rsedit[medicinebrand]; ?>" /></td>
          </tr>
        <tr>
          <td width="34%">Medicine Name</td>
          <td width="66%"><input type="text" name="medicinename" id="medicinename" value="<?php echo $rsedit[medicinename]; ?>" /></td>
        </tr>
          
        <tr>
          <td width="34%">Medicine cost</td>
          <td width="66%"><input type="text" name="medicinecostbd" id="medicinecostbd" value="<?php echo $rsedit[medicinecostbd]; ?>" /></td>
        </tr>
          <tr>
              <td width="34%">After discount</td>
              <td width="66%"><input type="text" name="medicinecostad" id="medicinecostad" value="<?php echo $rsedit[medicinecostad]; ?>" /></td>
          </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="description" id="description" cols="45" rows="5"><?php echo $rsedit[description] ; ?></textarea></td>
        </tr>
          <tr>
              <td style="width:50%;"><span class="style3">Image</span></td>
              <td><input name="file" type="File" value="<?php echo $rsedit[image] ; ?>" required></td></tr>
          <tr>
        <tr>
          <td>Status</td>
          <td> <select name="status" id="status">
            <option value="">Select</option>
            <?php
		  $arr = array("In Stock","Out of Stock");
		  foreach($arr as $val)
		  {
			  if($val == $rsedit[status])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
				  echo "<option value='$val'>$val</option>";			  
			  }
		  }
		  ?>
            </select></td>
        </tr>
        <tr>
         <td></td>
          <td><br><input type="submit" class="btn btn-outline-success" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
</section>
<?php
include("footers.php");
?>
<script type="application/javascript">
/*
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmmedicine.departmentname.value == "")
	{
		alert("Department name should not be empty..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(!document.frmmedicine.departmentname.value.match(alphaExp))
	{
		alert("Department name not valid..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(document.frmmedicine.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmdept.select.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
*/
</script>