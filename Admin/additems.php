<?php
	session_start();

	if(!$_SESSION['admin_username'])
	{
		header("Location: ../index.php");
	}
?>

<?php
	include("db_conection.php");

	if(isset($_POST['item_save']))
	{
		$item_name = $_POST['item_name'];
		$item_price = $_POST['item_price'];
		$check_item="SELECT * FROM items WHERE item_name='$item_name'";
		$Today=date('y:m:d');
		$run_query=oci_parse($dbcon,$check_item);
		oci_execute($run_query);

		if(oci_num_rows($run_query)>0)
		{
			echo "<script>alert('Item is already exist, Please try another one!')</script>";
			echo"<script>window.open('index.php','_self')</script>";
			exit();
		}

		$imgFile = $_FILES['item_image']['name'];
		$tmp_dir = $_FILES['item_image']['tmp_name'];
		$imgSize = $_FILES['item_image']['size'];
		$upload_dir = 'item_images/';
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
		$itempic = rand(1000,1000000).".".$imgExt;

		if(in_array($imgExt, $valid_extensions))
		{			
			if($imgSize < 5000000)				
			{
				move_uploaded_file($tmp_dir,$upload_dir.$itempic);
				$saveitem="INSERT INTO items (item_name,item_price,item_image,item_date) VALUES ('$item_name','$item_price','$itempic',TO_DATE('$Today','yyyy-mm-dd'))";
				$stid = oci_parse($dbcon,$saveitem);
				oci_execute($stid);
				echo "<script>alert('Data successfully saved!')</script>";				
				echo "<script>window.open('items.php','_self')</script>";
			}else
			{
				echo "<script>alert('Sorry, your file is too large.')</script>";				
				echo "<script>window.open('items.php','_self')</script>";
			}
		}else
		{
			echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";				
			echo "<script>window.open('items.php','_self')</script>";
		}
		oci_free_statement($stid);
        oci_close($dbcon);
	}
?>









