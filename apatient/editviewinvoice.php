<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Accept Bill</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Bill</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="savesales1.php" autocomplete="off">
                                    <div class="form-body">
                                        <div class="row">
                                           

           <div class="col-md-10">
                            <div class="form-group">
        <input type="hidden" name="transaction_id" value="<?php echo $_GET['transaction_id']; ?>" readonly class="form-input" aria-required="true" />
                         	
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                  <input type="text" name="date" required  class="form-control" value="<?php echo date('Y-m-d h:i:s A') ?>">

                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Bill</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
               <input type="text" name="invoice" value="<?php echo $_GET['invoice']; ?>" readonly class="form-input" aria-required="true" />
                                              
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                      <input type="text" name="amount" value="<?php echo $_GET['amount']; ?>" readonly class="form-input" aria-required="true" />
                                            
                                                </div>
                                            </div>
                                        </div>
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Doctor</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
               <input type="text" name="cashier" value="<?php echo $_GET['cashier']; ?>" readonly class="form-input" aria-required="true" />
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
               <input type="text" name="cname" value="<?php echo $_GET['cname']; ?>" readonly class="form-input" aria-required="true" />
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>File No</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
               <input type="text" name="fileNo" value="<?php echo $_GET['fileNo']; ?>" readonly class="form-input" aria-required="true" />

<input type="hidden" name="type" value="Invoice" />

<input type="hidden" name="name" value="Accepted" />


<input type="hidden" name="pstatus" value="pending" />

                                                </div>
                                            </div>
                                        </div>
                                     


                                        
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="submit" class="btn btn-info">Accept Payment</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





              
                
             
       
              
          <?php include 'footer.php'; ?>