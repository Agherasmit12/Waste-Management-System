<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                
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

                    	 <?php 
                       //  $a=$_GET['patientid'];
                         $a=$_GET['username'];
                            $sq=mysqli_query($con,"SELECT * FROM ulogin WHERE username='$a' ");
						 ?>  
                        <div class="card">
                            <div class="card-body">
                            	<?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="saveedituser.php" autocomplete="off">

                               

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Username</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
                         	
         <input type="text" readonly name="username" value="<?php echo $hk['username'];?>" required class="form-control" placeholder="Enter the name of the patient you are registering">
                                                </div>
                                            </div>
                                        </div>


                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
    
                                  <input type="text" name="password" value="<?php echo $hk['password'];?>"  required required  class="form-control">

                                                </div>
                                            </div>
                                        </div>



                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Names</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                  <input type="text" name="fullname" value="<?php echo $hk['fullname'];?>" required class="form-control" placeholder="Enter the weight of the patient you are registering">
                                              
                                                </div>
                                            </div>
                                        </div>
                                        
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
                <input type="number"  value="<?php echo $hk['phone'];?>" name="phone" required  class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                        <input type="email"  name="address1" required  class="form-control" value="<?php echo $hk['address1'];?>">
                                                </div>
                                            </div>
                                        </div>



                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                        <input type="text"  name="uaddress" required  class="form-control" value="<?php echo $hk['uaddress'];?>">

                        
                                             
                                                </div>
                                            </div>
                                        </div>




                                         





                                      


                <?php } ?>
                
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="submit" class="btn btn-info">Update Profile</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





              
                
             
       
              
<?php include 'footer.php'; ?>