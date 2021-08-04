<?php  

                
                        
                        function posts($sql){
                            include 'db_connect.php';

                            
                           $i;
                            $i=0;
                  
                         
                          if($result =mysqli_query($link,$sql))
                          {
                            
                            if ($result->num_rows > 0) {
                                    
                                while($ads=mysqli_fetch_assoc($result)){
                                  $_SESSION['jobsT']=$ads["jobTitle"];
                                  $_SESSION["jobsD"]=$ads["jobDescription"];


                             if($i<4){
                             
                                // {
                                  ?>
                  
                          <div class="ul">

                                  
                                    <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?= $ads["jobTitle"];?></label><br>
                                                <p class="descrption"><?= $ads["jobDescription"];?></p>
                                                <br><label for="li" class="info"><?= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?= $ads["uploadDate"];?></label>
                                                <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
                                                <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?= $ads["postID"];?> per hour</label>
                                                <label for="li" class="info"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" name="more" onclick="openJobDetails()"></i>
                                    </div></div>
                                    <section class="post-overlay" id="postOverlay">
                              <div class="post-container">
                                      <span class="closebtn" onclick="closeJobDetails()" title="Close Overlay">×</span>
                                      <b>  <h5><?= $ads["jobTitle"]; ?></h5></b>
                                      
                                    <div class="JobDetails">
                                              <span></span>
                                                <label for="post-overlay" class="post-nav"><?= $ads["fname"];?></label>
                                                <label for="post-overlay" class="post-nav"><?= $ads["uploadDate"];?></label>
                                                
                                                <label for="post-overlay" class="post-nav"><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
                                                <label for="post-overlay" class="post-nav"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label>
                                                <br><br><br><br>
                                                <ul class="details-list">
                                              <li><label for="details-list" >Expire date:</label> <?= $ads["expireDate"];?></li>
                                              <li> <label for="details-list">salary:</label> <?= $ads["salary"];?> $ per day</li>  </ul>
                                                <br> 
                                                <table>
                                                  <tr>
                                              <td><label for="description" class="details" >Description:</label></td> <td><p id="description"><?= $ads["jobDescription"];?></p></td></tr><br>
                                              <tr><td><label for="benefits" class="details">Benefits:</label></td><td><p  id="benefits"><?= $ads["benefits"];?></p></td></tr> 
                                              <tr> <td><label for="requirements" class="details">requirements:</label></td><td><p id="requirements"><?= $ads["requirements"];?></p></td></tr>
                                              <tr><td> <label for="location" class="details">job location:</label></td><td><p class="location"><?= $ads["jobLocation"];?></p></td></tr> <br>
                                              <tr><td><label for="note" class="details">note:</label></td><td><p class="note"><?= $ads["note"];?></p></td></tr>
                                              </table>
                                    </div>
                                    <button class="post-btn" id="cancelbtn" onclick="closeJobDetails()" >cancel</button>
                                    <button  class="post-btn">Apply for this job</button>
                                    </div>
                        </section>
                                    
                          
                          <?php $i++;}
                        }
                  }
                    }
                  

                }   ?>
              

