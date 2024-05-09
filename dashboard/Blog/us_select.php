<br><br><br>
<?php
 


 include("../root/db.php");
 ?>
<div class="container-fluid" style="background-color: var(--red);color:white;padding:10px"><h4> Edit/Delete</h4></div>

<div class="blog-content">
<div class="container">
<?php
include("../root/db.php");
              $sql ="SELECT * FROM  products";
              $result =$mysqli->query($sql);
              if ($result->num_rows > 0){
                  while ($row=$result -> fetch_assoc())
              {
                $cat=$row ["category"];
                $catck="unifrm-cuttng";
                if($cat == $catck){
              ?>

             
				  <div class="card">
					<div class="card__header">
					  <img src="../gallery/<?php echo $row ["prct_image_1"]; ?>" alt="card__image" class="card__image" width="600">
					</div>
					<div class="card__body" style="height: auto;">
					  <h4><?php echo $row ["prct_name"]; ?></h4>
					  <p>price : <?php echo $row ["prct_price"]; ?></p>
					  <p>width : <?php echo $row ["prct_wdth"]; ?></p>
					  <p>weight : <?php echo $row ["prct_wgt"]; ?></p>
					</div>
					<div class="card__footer">
					
                      <input  name="content" type="hidden" value="<?php echo $row ["prct_gst"]; ?>">
					  <div class="button-div">
                        <a href="us_update.php?sa=<?php echo $row["id"];?>" style="margin-right: 5px;"><button>Edit</button></a>
                        <a href="us_delete.php?sa=<?php echo $row["id"];?>"><button>Delete</button></a>
							
							
					  </div>
                      </div>
                      </div>
                  <?php
                }
              }
            }
	
                ?>
                
				