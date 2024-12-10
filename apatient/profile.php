<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item"><a href="profile.php" class="text-muted">Profile</a></li>
                                    <li class="breadcrumb-item"><a href="Profile1.php" class="text-muted">Other Details</a></li>
                                    
                                    
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
               
                <div class="row">

                   
   <?php 
                            $a=$_SESSION['username'];
                            $sq=mysqli_query($con,"SELECT * FROM ulogin WHERE username='$a' ");
                            ?>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                            </div>
                           <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        
                                     
                                        <th scope="col">Names</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Edit</th>
                                       
                                    </tr>
                                </thead>


                                <?php $k=1;
                                    while($hk=mysqli_fetch_array($sq))
                                    { ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $k;?></th>
                                            <td><?php echo $hk['username'];?></td>
                                            <td><?php echo $hk['password'];?></td> 
                                             <td><?php echo $hk['fullname'];?></td>
                                            <td><?php echo $hk['phone'];?></td> 


                                            <td><?php echo $hk['address1'];?></td> 
                                             <td><?php echo $hk['uaddress'];?></td>
                                            <td><a href="editusername.php?username=<?php echo $hk['username']; ?>">Edit Profile</a></td> 
                                           
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php include 'footer.php'; ?>