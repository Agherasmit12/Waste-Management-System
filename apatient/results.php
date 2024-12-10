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
                            $sq=mysqli_query($con,"SELECT * FROM patients WHERE user='$a' ");
                            ?>


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
                                        
                                        <th scope="col">Patient</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Package</th>
                                        <th scope="col">Age </th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">File No</th>
                                        <th scope="col">View</th>
                                        
                                    </tr>
                                </thead>


                                 <?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                                <tbody>
                                    <tr>
                                       <td><?php echo $k;?></td>
                                            <td><?php echo $hk['patientname'];?></td>
                                            <td><?php echo $hk['gender'];?></td>
                                            <td><?php echo $hk['illnes'];?></td>
                                            <td><?php echo $hk['ageBrac'];?></td>
                                            <td><?php echo $hk['weight'];?></td>
                                            <td><?php echo $hk['regDate'];?></td>
                                            <td><?php echo $hk['fileNo'];?></td>
<td><a href="labresults.php?fileNo=<?php echo $hk['fileNo']; ?>">View Results</a></td>
                                            
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

  
                    
                </div>

 <?php 
                            $a=$_SESSION['username'];
                            $sq=mysqli_query($con,"SELECT * FROM patients WHERE user='$a' ");
                            ?>
                  <div class="col-12">
                  	 <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Imaging Results</h4>
                        
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
                                        
                                        <th scope="col">Patient</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Package</th>
                                        <th scope="col">Age </th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">File No</th>
                                        <th scope="col">View</th>
                                        
                                    </tr>
                                </thead>


                                 <?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                                <tbody>
                                    <tr>
                                       <td><?php echo $k;?></td>
                                            <td><?php echo $hk['patientname'];?></td>
                                            <td><?php echo $hk['gender'];?></td>
                                            <td><?php echo $hk['illnes'];?></td>
                                            <td><?php echo $hk['ageBrac'];?></td>
                                            <td><?php echo $hk['weight'];?></td>
                                            <td><?php echo $hk['regDate'];?></td>
                                            <td><?php echo $hk['fileNo'];?></td>
<td><a href="scanresults.php?fileNo=<?php echo $hk['fileNo']; ?>">View Results</a></td>
                                            
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div>
                <?php 
                           $a=$_SESSION['username'];
                           
                            $sq=mysqli_query($con,"SELECT * FROM newdrug WHERE cname='$a' AND name='Accepted' AND pstatus='Paid'");
                           
                          
                            ?>
                <div class="col-12">
                  	 <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Prescription</h4>
                        
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
                                        
                                        <th scope="col">Invoice No</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status </th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">File No</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Payment Status</th>
                                            <th scope="col">Drugs</th>
                                            <th scope="col">Patient</th>
                                            <th scope="col">View</th>
  </tr>
                                        
                                    </tr>
                                </thead>


                                 <?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                                <tbody>
                                    <tr>
                                       <td><?php echo $k;?></td>
                                           <td><?php echo $hk['transaction_id'];?></td>
                                     <td><?php echo $hk['invoice'];?></td>
                                            <td><?php echo $hk['cashier'];?></td>
                                            <td><?php echo $hk['date'];?></td>
                                             <td><?php echo $hk['name'];?></td>
                                            <td><?php echo $hk['cname'];?></td>
                                            <td><?php echo $hk['fileNo'];?></td>
                                            
                                     <td><?php echo $hk['amount'];?></td>
                             <td><?php echo $hk['pstatus'];?></td>
                             <td><?php echo $hk['primary_doc'];?></td>
                             <td><?php echo $hk['patientname'];?></td>
                                            <td><a href="prescresult.php?invoice=<?php echo $hk['invoice'];?>">View Drugs</a></td>
                                            
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php include 'footer.php'; ?>