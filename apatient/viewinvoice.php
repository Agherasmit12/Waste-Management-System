<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Home Therapy</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item"><a href="hometherapy.php" class="text-muted">Request Therapy</a></li>
                                    <li class="breadcrumb-item"><a href="hometherapy2.php" class="text-muted">Pending Therapy Approval</a></li>
                                    
                                    <li class="breadcrumb-item"><a href="hometherapy3.php" class="text-muted">Approved Therapy</a></li>
                                    <li class="breadcrumb-item"><a href="hometherapy4.php" class="text-muted">Therapy Results</a></li>
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
                            $d=$_GET['fileNo'];

                               $a=$_SESSION['username'];
                           
                            $sq=mysqli_query($con,"SELECT * FROM new WHERE cname='$a' AND fileNo='$d' ");
                           
                           
                          
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
                                        <th scope="col">#</th>
                                        <th scope="col">View Therapy Bill</th>
                                        <th scope="col">Doctor</th>
                                        
                                        <th scope="col">Date</th>

                                         <th scope="col">Type</th>
                                          <th scope="col">Status</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">File No</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">View</th>
                                         <th scope="col">Accept</th>
                                          <th scope="col">Reject</th>
                                        
                                        
                                    </tr>
                                </thead>


                                <?php $k=1;
									while($hk=mysqli_fetch_array($sq))
									{ ?>
                                <tbody>
                                    <tr>
                                          <td><?php echo $hk['transaction_id'];?></td>

                                     <td><?php echo $hk['invoice'];?></td>
                                            <td><?php echo $hk['cashier'];?></td>
                                            <td><?php echo $hk['date'];?></td>
                                            <td><?php echo $hk['type'];?></td>
                                            <td><?php echo $hk['name'];?></td>
                                            <td><?php echo $hk['cname'];?></td>
                                            <td><?php echo $hk['fileNo'];?></td>
                                            
                                     <td><?php echo $hk['amount'];?></td>
<td><?php echo $hk['pstatus'];?></td>
                                            <td><a href="preview2.php?invoice=<?php echo $hk['invoice'];?>">View Therapy Bill</a></td>
                                            <td><a href="editviewinvoice.php?transaction_id=<?php echo $hk['transaction_id']?>&invoice=<?php echo $hk['invoice']?>&date=<?php echo $hk['date']; ?>&cashier=<?php echo $hk['cashier']?>&type=<?php echo $hk['type']?>&fileNo=<?php echo $hk['fileNo'];?>&cname=<?php echo $hk['cname'];?>&name=<?php echo $hk['name'];?>&amount=<?php echo $hk['amount'];?>&pstatus=<?php echo $hk['pstatus'];?>">Accept Therapy Bill By Cash</a></td> 
                                            <!-- <td><a href="editviewinvoice1.php?transaction_id=<?php echo $hk['transaction_id']?>&invoice=<?php echo $hk['invoice']?>&date=<?php echo $hk['date']; ?>&cashier=<?php echo $hk['cashier']?>&type=<?php echo $hk['type']?>&fileNo=<?php echo $hk['fileNo'];?>&cname=<?php echo $hk['cname'];?>&name=<?php echo $hk['name'];?>&amount=<?php echo $hk['amount'];?>&pstatus=<?php echo $hk['pstatus'];?>">Accept Invoice By Insurance</a></td>
 -->


                                            <td><a href="denyviewinvoice.php?transaction_id=<?php echo $hk['transaction_id']?>&invoice=<?php echo $hk['invoice']?>&date=<?php echo $hk['date']; ?>&cashier=<?php echo $hk['cashier']?>&type=<?php echo $hk['type']?>&fileNo=<?php echo $hk['fileNo'];?>&cname=<?php echo $hk['cname'];?>&name=<?php echo $hk['name'];?>&amount=<?php echo $hk['amount'];?>&pstatus=<?php echo $hk['pstatus'];?>">Reject Therapy Bill</a></td>
                                            
                                            
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php include 'footer.php'; ?>