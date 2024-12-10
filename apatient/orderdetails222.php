<?php 
session_start();
include 'connect.php';
 date_default_timezone_set("Africa/Kampala");
 $p=$_SESSION['username'];
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Patient Panel - Omsao Telemedicine In Uganda</title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="dist/css/style.min.css" rel="stylesheet">
    
</head>

<body>
   
  
    
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
       
<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Register A Patient</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Patient</li>
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
                       //  $a=$_GET['patientid'];
                         $use=$_GET['patientorderid'];
						 $details=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM patientorder WHERE patientorderid='$use'"));
						 ?>  
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="savelabtreat33.php" autocomplete="off">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Name</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
        <input type="hidden" value="<?php echo $details['patientorderid'];?>" name="patientorderid"  />
            <input type="hidden" value="<?php echo $details['invoice'];?>" name="invoice"  />
        	
         <input type="text" value="<?php echo $details['patientname'];?>" readonly name="patientname" required class="form-control" placeholder="Enter the name of the patient you are registering">
           <input type="hidden" name="patientside" required  class="form-control" value="Package Recieved">
            <input type="hidden" value="<?php echo $details['deliveryside'];?>" name="deliveryside"  />
             <input type="hidden" value="<?php echo $details['deliveryName'];?>" name="deliveryName"  />
                                 
            <input type="hidden" value="<?php echo $details['category'];?>" name="category"  />

                                                </div>
                                            </div>
                                        </div>
                                        
                                    
                                        
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"   name="addpatientnotes" class="btn btn-info">Update Category</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




              
                
             
       
              
          <?php include 'footer.php'; ?>