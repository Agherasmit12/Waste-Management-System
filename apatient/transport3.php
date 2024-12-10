<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
           
                                                <?php 
                                 //   include 'connect.php';
    $a=$_GET['id'];

    
                              
                               $ulog=mysqli_fetch_array(mysqli_query($con,"select * from clients where id='$a'"));
                               ?> 

       
           <div class="container-fluid">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="" autocomplete="off">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Name</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
      
                         <input type="hidden" name="date" required  class="form-control" value="<?php echo date('Y-m-d'); ?>">
                         <input type="hidden" name="collector" required readonly class="form-control" value="<?php echo $_SESSION['username']; ?>">

                          <input type="text" readonly name="clientname" required  class="form-control" value="<?php echo $ulog['names']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                     <label>Payment Type</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
 <input type="text" readonly name="paytype" required  class="form-control" value="<?php echo $ulog['pay_type']; ?>">                                  
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Gabage Type</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                       <input type="text" readonly name="typeofwaste" required  class="form-control" value="<?php echo $ulog['gabage_type']; ?>">
   </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Amount paid</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                  <input type="number" name="amountpaid" required  class="form-control" placeholder="Enter the amount paid">
 </div>
                                            </div>
                                        </div>
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Balance</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
                  <input type="number" name="balance" required  class="form-control" placeholder="Enter the balance">
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
                  <input type="text" name="reason" required  class="form-control" placeholder="Enter the reason for this payment">
 </div>
                                            </div>
                                        </div>
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Reciept Number</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
                  <input type="text" name="recieptno" required  class="form-control" placeholder="Enter the reciept number">
                                                </div>
                                            </div>
                                        </div>
                                         


                                        
                                       
                                        
                                    
                                   
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="submit" class="btn btn-info">Add Collection</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



<?php
   
   
    if (isset($_POST['submit'])) {
        $collector=$_POST['collector'];
    $clientname=$_POST['clientname'];
    $typeofwaste=$_POST['typeofwaste'];
    $paytype=$_POST['paytype'];
    $amountpaid=$_POST['amountpaid'];
    $balance=$_POST['balance'];
    $date=$_POST['date'];
     $recieptno=$_POST['recieptno'];
    $reason=$_POST['reason'];
    
    
  

$query=mysqli_query($con,"INSERT INTO payment (collector,clientname,typeofwaste,paytype,amountpaid,balance,date,recieptno,reason) VALUES('$collector','$clientname','$typeofwaste','$paytype','$amountpaid','$balance','$date','$recieptno','$reason')");

        if ($query) {
            echo "successfull";
            echo("<script>location.href='transport1a.php';</script>");
            header("Location: transport1a.php");
        }else{
            echo "error occurred";
        }
    
    
}

     ?>

























































              
                
             
       
              
          <?php include 'footer.php'; ?>