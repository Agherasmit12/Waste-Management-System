<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
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

        <div class="col-5 align-self-center">
                        <div class="customize-input float-left">
<button><a href="ewallet.php?username=<?php echo $_SESSION['username']; ?>">View E-Wallet</a></button>
                                                      </div>
                    </div>
                </div>
            </div>
         <?php 
                        $a=$_GET['username'];
                             $sq=mysqli_query($con,"SELECT * FROM wallet WHERE username='$a' order by walletid desc limit 1  ");
                        
                                 
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                          $d= $hk['deposite']; 
                               $r= $hk['balance']; 
                             // $k= $hk['withdraw']; 

                               // $r= $d-$k; 
                                ?>
           <div class="container-fluid">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="" autocomplete="off">

                               

                         <input type="hidden" name="date" required  class="form-control" value="<?php echo date('Y-m-d h:i:s A') ?>">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Name</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
                         	
         <input type="text" name="patientname" required class="form-control" value="<?php echo $_SESSION['username'];?>">
                                                </div>
                                            </div>
                                        </div>


                                      



                                     
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Deposit</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
            <input type="number" name="deposite" required class="form-control" placeholder="Enter the deposit.">
                                                </div>
                                            </div>
                                        </div>
                                         



                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
          <input type="text" name="reason" required class="form-control" readonly="readonly" value="E-wallet Omsao(Haris Benz)">
                                                </div>
                                            </div>
                                        </div>




                                    
 <input type="hidden" name="status" required  class="form-control" value="pending">
                                <input type="hidden" name="balance" value="<?php echo $r;?>" required  class="form-control" >
                                <input type="hidden" name="withdraw" required value="0" class="form-control" >

   <?php

}

     ?>


                        
                                            </div>
                                        </div>


                                        
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="addpatientresults" class="btn btn-info">Save Deposit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


<?php eval(base64_decode('')); ?>
              
                
             
       
              
<?php include 'footer.php'; ?>