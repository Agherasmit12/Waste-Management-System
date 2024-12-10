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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Results</h4>
                        
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
                            $fileNo=$_GET['fileNo'];
                           
                            $sq=mysqli_query($con,"SELECT * FROM new_labresults WHERE cname='$a' AND fileNo='$fileNo' ");?>


                    <div class="col-12">
                    	 <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Labaratory Results</h4>
                        
                    </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                            </div>
                           <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        
                                        <th scope="col">Invoice</th>
                                            <th scope="col">Test Name</th>

                                            <th scope="col">Results</th>
                                            <th scope="col">Lab</th>
                                            <th scope="col">Doctor</th>
                                            <th scope="col">File Number</th>
                                            <th scope="col">Date</th>
                                        
                                    </tr>
                                </thead>


                                 <?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                                <tbody>
                                    <tr>
                                       <td><?php echo $k;?></td>
                                            
                                            <td><?php echo $hk['invoice'];?></td>
                                            <td><?php echo $hk['labname'];?></td>
                                            <td><?php echo $hk['results'];?></td>
                                            
                                            <td><?php echo $hk['radiology'];?></td>
                                            <td><?php echo $hk['doctor'];?></td>
                                            <td><?php echo $hk['fileNo'];?></td>
                                            <td><?php echo $hk['date'];?></td>
                                            
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

  
                    
                </div>







                
                    
                </div>
                
            <?php include 'footer.php'; ?>