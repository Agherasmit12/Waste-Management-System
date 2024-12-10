<?php include 'head.php'; 
        
include 'aaside.php'; ?>

    
        <div class="page-wrapper">
      
        <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-body">
                             <div class="btn-list">
                                  <a href="users.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">Add User Accounts</button></a>
                          
                              <a href="users1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">View User Accounts</button></a>
                                                        
                            
                                                        
                              
                            
                                       
                                </div>
                            </div>
                        </div>
                    </div>                   

<?php 
    include 'connect.php';
    $a=$_GET['id'];

    
                              
							   $ulog=mysqli_fetch_array(mysqli_query($con,"select * from admin where id='$a'"));
							   ?>     
                                  
       
           <div class="container-fluid">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="saveedit.php" autocomplete="off">
                 <input type="hidden" name="id" required  class="form-control" value="<?php echo $ulog['id'];?>">
                 	
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Full Name</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
      
     <input type="text" value="<?php echo $ulog['fullname'];?>"name="   fullname" required  class="form-control">

                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                     <label>User type</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
 <select name="ucat" class="form-control show-tick" required data-live-search="true">
                                      <option selected value="">---Choose---</option>
                                       
                                       <option value="admin" <?php echo $ulog['ucat'] =="admin" ? "selected" : "" ?>> Admin</option> 
                                       <option value="collector" <?php echo $ulog['ucat'] =="collector" ? "selected" : "" ?>>Collector </option> 
                                       

                                    </select>                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Contact</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
            <input type="number" name="contact" required  class="form-control" value="<?php echo $ulog['contact'];?>">
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
                                        <input type="text" title="What is the address of this user? " name="address" required  class="form-control" value="<?php echo $ulog['address'];?>">
 </div>
                                            </div>
                                        </div>
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
        <input type="text" name="username" required  class="form-control" value="<?php echo $ulog['username'];?>">
                                  <input type="hidden" name="date" required  class="form-control" value="<?php echo date('Y-m-d') ?>">                                    
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
           <input type="text" name="password" required  class="form-control" value="<?php echo $ulog['password'];?>">
   </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                      <label>Status</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
<select name="acstatus" class="form-control show-tick" required data-live-search="true">
                                      <option selected value="">---Choose---</option>
                                       
                                       <option value="active" <?php echo $ulog['acstatus'] =="active" ? "selected" : "" ?>> Active</option> 
                                       <option value="notactive" <?php echo $ulog['acstatus'] =="notactive" ? "selected" : "" ?>>Not Active </option> 
                                       

                                    </select>       </div>
                                            </div>
                                        </div>

         <input type="hidden" name="image" required  class="form-control" value="<?php echo $ulog['image'];?>">
                                       
                                       
                                        
                                    
                                   
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="submit" class="btn btn-info">UPDATE USER</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



       
              
          <?php include 'footer.php'; ?>