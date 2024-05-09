<br><br><br>
<?php
 


 include("../root/db.php");
 ?>
<div class="container-fluid" style="background-color: var(--red);color:white;padding:10px"><h4> Edit/Delete Uniform Suiting</h4></div>

<div class="blog-content">
<div class="container">
<?php
include("../root/db.php");
              $sql ="SELECT * FROM  gallery";
              $result =$mysqli->query($sql);
              if ($result->num_rows > 0){
                  while ($row=$result -> fetch_assoc())
              {
                $cat="unifrm-suitng";
                $catck="unifrm-suitng";
                if($cat == $catck){
              ?>

             
				  <div class="card">
					<div class="card__header">
					  <img src="../gallery/glly-T/<?php echo $row ["img_name"]; ?>" alt="card__image" class="card__image" width="600">
					</div>
					
					<div class="card__footer">
					
                      
					  <div class="button-div">
                     
                        <a href="us_delete.php?sa=<?php echo $row["id"];?>"><button>Delete</button></a>
							
							
					  </div>
                      </div>
                      </div>
                  <?php
                }
              }
            }
	
                ?>
                
				