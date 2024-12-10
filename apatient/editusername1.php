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
                         $a=$_GET['userprofileid'];
                            $sq=mysqli_query($con,"SELECT * FROM userprofile WHERE userprofileid='$a' ");
						 ?>  
                        <div class="card">
                            <div class="card-body">
                            	<?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="saveedituser1.php" autocomplete="off">

                               

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Username</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
                            	<input type="hidden" name="userprofileid" value="<?php echo $hk['userprofileid'];?>">
                         	
         <input type="text" readonly name="username" value="<?php echo $hk['username'];?>" required class="form-control" placeholder="Enter the name of the patient you are registering">
                                                </div>
                                            </div>
                                        </div>


                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Next Of Kin</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
    
                                  <input type="text" name="nextofkin" value="<?php echo $hk['nextofkin'];?>"  required required  class="form-control">

                                                </div>
                                            </div>
                                        </div>



                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Id/Passport No</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                  <input type="text" name="id_no" value="<?php echo $hk['id_no'];?>" required class="form-control" placeholder="Enter the weight of the patient you are registering">
                  <input type="hidden" name="primary_doc" value="<?php echo $hk['primary_doc'];?>" required class="form-control" placeholder="Enter the weight of the patient you are registering">
                                              
                                                </div>
                                            </div>
                                        </div>
                                        
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Nationality</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
                <input type="text"  value="<?php echo $hk['nationality'];?>" name="nationality" required  class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        






                                         





                                      


                <?php } ?>
                
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="submit" class="btn btn-info">Update Details</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





              
                
             
       
              
<?php include 'footer.php'; ?>