<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Urgent Case</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <!-- <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
        <li class="breadcrumb-item"><a href="appoint.php" class="text-muted">Make Appointment</a></li>
                                    <li class="breadcrumb-item"><a href="appoint1.php" class="text-muted">My Appointments</a></li>
                                    
                                    
                                </ol> -->
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
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">

<?php 
                            $a=$_SESSION['username'];
                            $fileNo=$_GET['fileNo'];
                           
                            $sq=mysqli_query($con,"SELECT * FROM ulogin WHERE username='$a'");?>



                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="savecon.php" autocomplete="off">

                               

                                    <div class="form-body">
                                  

   <?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                      

                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                      <input type="text" name="username" required class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>

                     


                                                </div>
                                            </div>
                                        </div>
                                  


                                        
                                        

                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Consultation Fee</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                      <input type="text" name="amount" required class="form-control" value="10000.00" readonly>

                     


                                                </div>
                                            </div>
                                        </div>



  <input type="text" name="phone_number" required class="form-control" value="<?php echo $hk['phone'];?>" readonly>
                      <input type="text" name="address" required class="form-control" value="<?php echo $hk['uaddress'];?>" readonly>
                      <input type="text" name="status" required class="form-control" value="pending" readonly>
                      <input type="text" name="reason" required class="form-control" value="urgent" readonly>
                      <input type="text" name="email" required class="form-control" value="<?php echo $hk['address1']; ?>" readonly>
                      <input type="text" name="date" required class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>



                                 



<?php } ?>

                                        </div>


                                        
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" name="submit" class="btn btn-info">Confirm Urgent Case</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>






              
                
             
       
              
<?php include 'footer.php'; ?>