<?php
//include database configuration file
include("../root/db.php");
$ids		 =	 mysqli_real_escape_string($mysqli, $_POST['id']); 


 if(!empty($_FILES['img1']['tmp_name']))
   {
$temp1 = explode(".",$_FILES["img1"]["name"]);
$newfilename1 = rand(). "_".date('m-d-Y_hia') . '.' .end($temp1);
move_uploaded_file($_FILES['img1']['tmp_name'],"../gallery/".$newfilename1);
$img1=$newfilename1;

$sql = "UPDATE products SET
prct_image_1           =     '$img1'
WHERE id='$ids'";


if (!mysqli_query($mysqli,$sql)) {
   die('Error: ' . mysqli_error($mysqli));
}
   }
   if(!empty($_FILES['img2']['tmp_name']))
   {
$temp2 = explode(".",$_FILES["img2"]["name"]);
$newfilename2 = rand(). "_".date('m-d-Y_hia') . '.' .end($temp2);
move_uploaded_file($_FILES['img2']['tmp_name'],"../gallery/".$newfilename2);
$img2=$newfilename2;
$sql = "UPDATE products SET
prct_image_2           =     '$img2'

WHERE id='$ids'";


if (!mysqli_query($mysqli,$sql)) {
   die('Error: ' . mysqli_error($mysqli));
}
   }

$name		 = 	mysqli_real_escape_string($mysqli , $_POST['name']);
$prce		 = 	mysqli_real_escape_string($mysqli , $_POST['price']);
$wdt		 = 	mysqli_real_escape_string($mysqli , $_POST['width']);
$wgt	 = 	mysqli_real_escape_string($mysqli , $_POST['weight']);
$gst		 = 	mysqli_real_escape_string($mysqli , $_POST['gst']);





$sql		    =	"UPDATE products SET

prct_name    =	  '$name	',
prct_price	    =	  '$prce',
prct_wdth    =	  '$wdt',
prct_wgt    =	  '$wgt',
prct_gst	    =	  '$gst'

	WHERE id='$ids'";    	   
  

   if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}
header("location:index.php?pro=$menu");
   ?>