<?php
//include database configuration file
include("../root/db.php");




if(!empty($_FILES["img1"]['tmp_name'])){
  $temp1 = explode(".",$_FILES["img1"]["name"]);
  $newfilename1 = rand(). "_".date('m-d-Y_hia') . '.' .end($temp1);
  move_uploaded_file($_FILES['img1']['tmp_name'],"../gallery/".$newfilename1);
  $img1=$newfilename1;
  }
  else{
    $img1="";
  }


if(!empty($_FILES["img2"]['tmp_name'])){
$temp2 = explode(".",$_FILES["img2"]["name"]);
$newfilename2 = rand(). "_".date('m-d-Y_hia') . '.' .end($temp2);
move_uploaded_file($_FILES['img2']['tmp_name'],"../gallery/".$newfilename2);
$img2=$newfilename2;
} else{
  $img2="";
}



$name=mysqli_real_escape_string($mysqli , $_POST['pct_name']);
$price=mysqli_real_escape_string($mysqli , $_POST['pct_price']);
$wdth=mysqli_real_escape_string($mysqli , $_POST['pct_wdth']);
$wgt=mysqli_real_escape_string($mysqli , $_POST['pct_wgt']);
$gst=mysqli_real_escape_string($mysqli , $_POST['pct_gst']);
$qlty=mysqli_real_escape_string($mysqli , $_POST['pct_qlty']);
$cat=mysqli_real_escape_string($mysqli , $_POST['uniform-suiting']);




$sql		 =   "INSERT INTO  products(prct_image_1,prct_image_2,prct_name,prct_price,prct_wdth,prct_wgt,prct_gst,prct_qlty,category
                                       )
					   			 VALUES	('$img1','$img2','$name','$price','$wdth','$wgt','$gst','$qlty','$cat')";	
if (!mysqli_query($mysqli,$sql)) {
  die('Error: ' . mysqli_error($mysqli));
}
																 

header("location:index.php?pro=$menu");
?>										  
										  				   