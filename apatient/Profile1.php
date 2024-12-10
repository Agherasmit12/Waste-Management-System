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
                           $e=$_SESSION['username'];
							$sq=mysqli_query($con,"SELECT * FROM userprofile WHERE username='$e'");
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
                                       
                                        <th>#</th>
                                     
                                       <th>Name</th>
                                            <th>Next Of Kin</th>
                                            <th>ID Number</th>  
                                             
                                              <th>Primary Doctor</th>
                                              <th>Nationality</th>
                                              <th>Edit Details</th>
                                    </tr>
                                </thead>


                                <?php $k=1;
                                    while($hk=mysqli_fetch_array($sq))
                                    { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $k;?></td>
                                            <td><?php echo $hk['username'];?></td>
                                            <td><?php echo $hk['nextofkin'];?></td> 
                                             <td><?php echo $hk['id_no'];?></td>
                                            <td><?php echo $hk['primary_doc'];?></td>
                                            <td><?php echo $hk['nationality'];?></td>
                                              <td><a href="editusername1.php?userprofileid=<?php echo $hk['userprofileid']; ?>">Edit Other Details</a></td>  
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php include 'footer.php'; ?>