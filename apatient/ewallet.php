<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> E-Wallet</h4>
                        <div class="d-flex align-items-center">
                           
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <h4><?php echo date('Y-m-d'); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
       
                             



        <div class="col-5 align-self-center">
                        <div class="customize-input float-left">
<button><a href="patientdeposit.php?username=<?php echo $_SESSION['username']; ?>">Add Deposit</a></button>
                                                      </div>
                    </div>
       
            <div class="container-fluid">
            	 
                <div class="row">

                   
 <?php 
						$a=$_SESSION['username'];
                           
                       $sq=mysqli_query($con,"SELECT * FROM addambulance WHERE user='$a' AND labstatus1!='pending' AND type='Emergency' AND status='Approved' ");
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
                                            <th scope="col">Deposit</th>

                                            <th scope="col">Withdraw</th>
<th scope="col">Balance</th>                                      
      <th scope="col">Reason</th>
                            <th scope="col">Date</th>
<th scope="col">Status</th>

                                    </tr>
                                </thead>


                                <?php $k=1;
									while($hk=mysqli_fetch_array($sq))
									{ ?>
                                <tbody>
                                    <tr>
                                        td><?php echo $hk['walletid'];?></td>

                                            <td><?php echo $hk['username'];?></td>

                                     <td><?php echo $hk['deposite'];?> </td>
                                            <td><?php echo $hk['withdraw'];?> </td>
                               <td><?php echo $hk['balance'];?></td>
                <td><?php echo $hk['reason'];?></td>
                                            <td><?php echo $hk['date'];?></td>
                                            <td><?php echo $hk['status'];?></td>
                                    </tr>
                                  <?php $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php include 'footer.php'; ?>