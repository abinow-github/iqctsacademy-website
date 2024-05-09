
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <title>Document</title>
</head>
<body>
   <?php
   include("../root/db.php");
   $id=$_GET ['sa'];
   $sql="SELECT * From products WHERE id= '$id'";
   $result=$mysqli->query($sql);
   if($result->num_rows>0){
    while($rows=$result->fetch_assoc()){
        ?>
        <table width="80%"  align="center" cellpading="0" cellspacing="0">
            <tr>
                <td><form action="us_update_back.php" method="post" enctype="multipart/form-data" id="formID" class="formular">
                <table width="100%" border="1" cellspacing="0" cellpading="0">
                    <tr>
                        <td width="175">id</td>
                        <td width="419"><input type="text" name="id" value="<?php echo $rows['id'];?>"/></td>
                    </tr>
                    
                    <tr>
                        <td>image 1</td>
                        <td><input type="file" name="img1" class="" value="<?php echo $rows['prct_image_1'];?>"/></td>
                    </tr>
                    <tr>
                        <td>image 2</td>
                        <td><input type="file" name="img2" class="" value="<?php echo $rows['prct_image_2'];?>" /></td>
                    </tr>
                    <tr>
                        <td>Product name</td>
                        <td style="width: 90%;"><input style="width: 99%;" type="text" name="name" value="<?php echo $rows['prct_name'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Product Price</td>
                        <td><input style="width: 99%;" type="text" name="price" value="<?php echo $rows['prct_price'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Width</td>
                        <td><input style="width: 99%;" type="text" name="width" value="<?php echo $rows['prct_wdth'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td><input style="width: 99%;" type="text" name="weight" value="<?php echo $rows['prct_wgt'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Gst</td>
                        <td><input style="width: 99%;" type="text" name="gst" value="<?php echo $rows['prct_gst'];?>"/></td>
                    </tr>
                    
                    
                    
                    
                    
                    

                  
                    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="hidden" name="id" id="id" value="<?php echo $rows['id'];?>">
                            <input type="submit" name="button" id="button" value="submit"/>
                        </td>
                    </tr>

                </table>
                <?php
    }
}
                ?>
            </form>
        </td>
            </tr>
        </table>
</body>
</html>
<?php 
}else{
     header("Location: ../login/index.php");
     exit();
}
 ?>