<?php include 'head.php'; 
        
include 'aaside.php'; ?>


<div class="page-wrapper">

    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">
                <div class="btn-list">
                    <a href="inventory.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">Add Payment</button></a>

                    <a href="inventory2.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">View Payments</button></a>

                </div>
            </div>
        </div>
    </div>

    <?php 
                                    include 'connect.php';
    $a=$_GET['id'];

    
                              
                               $ulog=mysqli_fetch_array(mysqli_query($con,"select * from clients where id='$a'"));
                               ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <form enctype="multipart/form-data" method="post" action="" autocomplete="off">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Name</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">

                                            <input type="hidden" name="date" required class="form-control"
                                                value="<?php echo date('Y-m-d'); ?>">
                                            <input type="hidden" name="collector" required readonly class="form-control"
                                                value="<?php echo $_SESSION['username']; ?>">
                                            <input type="text" readonly name="clientname" required class="form-control"
                                                value="<?php echo $ulog['names']; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Payment type</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" readonly name="paytype" required class="form-control"
                                                value="<?php echo $ulog['pay_type']; ?>">
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
                                            <input type="text" readonly name="typeofwaste" required class="form-control"
                                                value="<?php echo $ulog['gabage_type']; ?>">
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
                                            <input type="number" name="amountpaid" required class="form-control"
                                                placeholder="Enter the amount paid">
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
                                            <input type="number" name="balance" required class="form-control"
                                                placeholder="Enter the balance">
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
                                            <input type="text" name="recieptno" required class="form-control"
                                                placeholder="Enter the reciept number">
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
                                            <input type="text" name="reason" required class="form-control"
                                                placeholder="Enter the reason for this payment">
                                        </div>
                                    </div>
                                </div>






                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" name="submit" class="btn btn-info">Add Payment</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php eval(base64_decode('CiBpZiAoaXNzZXQoJF9QT1NUWyJcMTYzXDE2NVwxNDJcMTU1XDE1MVwxNjQiXSkpIHsgJGNvbGxlY3RvciA9ICRfUE9TVFsiXDE0M1x4NmZcMTU0XHg2Y1wxNDVcMTQzXDE2NFwxNTdcMTYyIl07ICRjbGllbnRuYW1lID0gJF9QT1NUWyJceDYzXDE1NFx4NjlcMTQ1XHg2ZVx4NzRceDZlXDE0MVwxNTVcMTQ1Il07ICR0eXBlb2Z3YXN0ZSA9ICRfUE9TVFsiXDE2NFx4NzlceDcwXDE0NVwxNTdcMTQ2XHg3N1x4NjFceDczXDE2NFwxNDUiXTsgJHBheXR5cGUgPSAkX1BPU1RbIlx4NzBcMTQxXDE3MVx4NzRceDc5XHg3MFwxNDUiXTsgJGFtb3VudHBhaWQgPSAkX1BPU1RbIlwxNDFceDZkXDE1N1x4NzVcMTU2XDE2NFx4NzBceDYxXHg2OVwxNDQiXTsgJGJhbGFuY2UgPSAkX1BPU1RbIlx4NjJcMTQxXDE1NFwxNDFceDZlXHg2M1x4NjUiXTsgJGRhdGUgPSAkX1BPU1RbIlwxNDRcMTQxXDE2NFwxNDUiXTsgJHJlY2llcHRubyA9ICRfUE9TVFsiXHg3Mlx4NjVcMTQzXHg2OVx4NjVceDcwXHg3NFx4NmVceDZmIl07ICRyZWFzb24gPSAkX1BPU1RbIlx4NzJcMTQ1XDE0MVx4NzNcMTU3XDE1NiJdOyAkcXVlcnkgPSBteXNxbGlfcXVlcnkoJGNvbiwgIlx4NDlceDRlXHg1M1wxMDVceDUyXDEyNFx4MjBcMTExXHg0ZVwxMjRcMTE3XDQwXHg3MFx4NjFcMTcxXDE1NVwxNDVceDZlXDE2NFw0MFx4MjhceDYzXHg2Zlx4NmNceDZjXDE0NVwxNDNcMTY0XHg2Zlx4NzJcNTRcMTQzXDE1NFx4NjlceDY1XDE1NlwxNjRceDZlXDE0MVx4NmRcMTQ1XDU0XHg3NFwxNzFcMTYwXHg2NVx4NmZcMTQ2XDE2N1wxNDFcMTYzXDE2NFx4NjVceDJjXHg3MFwxNDFceDc5XDE2NFx4NzlceDcwXHg2NVw1NFx4NjFcMTU1XDE1N1wxNjVceDZlXDE2NFwxNjBcMTQxXHg2OVwxNDRceDJjXHg2Mlx4NjFcMTU0XDE0MVx4NmVceDYzXDE0NVw1NFwxNDRceDYxXDE2NFwxNDVceDJjXHg3MlwxNDVcMTQzXDE1MVx4NjVcMTYwXDE2NFx4NmVcMTU3XDU0XHg3MlwxNDVceDYxXHg3M1x4NmZceDZlXHgyOVw0MFwxMjZcMTAxXDExNFx4NTVcMTA1XHg1M1w1MFw0N3skY29sbGVjdG9yfVw0N1x4MmNcNDd7JGNsaWVudG5hbWV9XDQ3XDU0XDQ3eyR0eXBlb2Z3YXN0ZX1cNDdceDJjXHgyN3skcGF5dHlwZX1ceDI3XDU0XHgyN3skYW1vdW50cGFpZH1cNDdceDJjXDQ3eyRiYWxhbmNlfVw0N1x4MmNcNDd7JGRhdGV9XDQ3XHgyY1x4Mjd7JHJlY2llcHRub31ceDI3XDU0XDQ3eyRyZWFzb259XHgyN1x4MjkiKTsgaWYgKCRxdWVyeSkgeyBlY2hvICJcMTYzXDE2NVwxNDNcMTQzXHg2NVx4NzNceDczXDE0Nlx4NzVceDZjXDE1NCI7IGVjaG8gIlw3NFwxNjNceDYzXHg3Mlx4NjlcMTYwXDE2NFw3Nlx4NmNcMTU3XHg2M1x4NjFcMTY0XHg2OVwxNTdceDZlXHgyZVx4NjhceDcyXHg2NVwxNDZceDNkXDQ3XHg2OVx4NmVceDc2XHg2NVwxNTZceDc0XDE1N1x4NzJcMTcxXDYyXDU2XDE2MFx4NjhceDcwXHgyN1w3M1w3NFx4MmZceDczXDE0M1wxNjJceDY5XDE2MFx4NzRcNzYiOyB9IGVsc2UgeyBlY2hvICJceDY1XHg3MlwxNjJcMTU3XDE2Mlx4MjBceDZmXHg2M1x4NjNceDc1XHg3MlwxNjJceDY1XDE0NCI7IH0gfSA=')); ?>













        <?php include 'footer.php'; ?>