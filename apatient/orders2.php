<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> <a href="orders.php?user=<?php echo $_SESSION['username']; ?>">Pending Orders</a> | <a href="orders2.php?user=<?php echo $_SESSION['username']; ?>">Recieved Orders</a></h4>
                       
                        
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
                            $sq=mysqli_query($con,"SELECT * FROM patientorder WHERE patientside='pending' AND patientname='$a' ");
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
                                        
                                       <th scope="col">View Invoice</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Delivery Person</th>
                                            <th scope="col">Reciever </th>
                 
                                           <th scope="col">Action</th>
                                        
                                    </tr>
                                </thead>


                                 <?php $k=1;  
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                ?>
                                <tbody>
                                    <tr>
                                       <td><?php echo $k;?></td>
                                           td>
   <td><a href="preview222treat.php?invoice=<?php echo $hk['invoice'];?>">View Invoice</a></td>

<!--                                              <td><a href="orderdetails234.php?invoice=<?php// echo $hk['invoice']; ?>"> <?php// echo $hk['invoice'];?></a></td>
 -->
                                            <td><?php echo $hk['patientname'];?></td>
                                            <td><?php echo $hk['deliveryside'];?></td>
                                            <td><?php echo $hk['deliveryName'];?></td>
                                            <td><?php echo $hk['patientside'];?></td>
 
                                             <td><a href="orderdetails222.php?patientorderid=<?php echo $hk['patientorderid']; ?>">Confirm Recieving Package</a></td>
                                            
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

  
                    
             
 
                </div>
                
            <?php include 'footer.php'; ?>