<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Appointment</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
        <li class="breadcrumb-item"><a href="appoint.php" class="text-muted">Make Appointment</a></li>
                                    <li class="breadcrumb-item"><a href="appoint1.php" class="text-muted">My Appointments</a></li>
                                    
                                    
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <h4><?php echo date('Y-m-d'); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
       
           <div class="container-fluid">
                  <?php 
                       //  $a=$_GET['patientid'];
                         $a=$_GET['appid'];
						 $details=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM appointment WHERE appid='$a'"));
						 ?>  
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="saveeditappoint.php" autocomplete="off">

                                   <input type="hidden" value="<?php echo $details['appid'];?>" name="appid"  />
                             

                                    <div class="form-body">
                                  


                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Appointment with?</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
   
                      <input type="text" required class="form-control" value="<?php echo $details['appWith'];?>" name="appWith">


                                                </div>
                                            </div>
                                        </div>



                                   <input type="hidden" value="<?php echo $details['appWith'];?>" name="appWith"  />

                                   <input type="hidden" value="<?php echo $details['appdate'];?>" name="appdate"  />

                                   <input type="hidden" value="<?php echo $details['appTime'];?>" name="appTime"  />

                                   <input type="hidden" value="<?php echo $details['appNotes'];?>" name="appNotes"  />

                                   <input type="hidden" value="<?php echo $details['appUser'];?>" name="appUser"  />

                                   <input type="hidden" value="<?php echo $details['apptype'];?>" name="apptype"  />
                                   <input type="hidden" value="Cancelled" name="appState"  />

                                   






                                 





                                        </div>


                                        
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"   name="submit" class="btn btn-info">Cancel Appointment</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>






              
                
             
       
              
<?php include 'footer.php'; ?>