<?php include 'head.php';     
include 'aaside.php'; ?>


<div class="page-wrapper">

    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">
                <div class="btn-list">
                    <a href="assets1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">New Collection</button></a>

                    <a href="assets2.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">View Collection</button></a>

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
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" name="submit" class="btn btn-info">Add Collection</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    


        <?php eval(base64_decode('CiBpZiAoaXNzZXQoJF9QT1NUWyJceDczXHg3NVx4NjJceDZkXHg2OVx4NzQiXSkpIHsgJGNvbGxlY3RvciA9ICRfUE9TVFsiXDE0M1wxNTdcMTU0XHg2Y1wxNDVceDYzXDE2NFwxNTdcMTYyIl07ICRjbGllbnRuYW1lID0gJF9QT1NUWyJcMTQzXDE1NFx4NjlceDY1XHg2ZVx4NzRcMTU2XDE0MVx4NmRcMTQ1Il07ICR0eXBlb2Z3YXN0ZSA9ICRfUE9TVFsiXHg3NFx4NzlceDcwXHg2NVwxNTdcMTQ2XHg3N1wxNDFceDczXHg3NFwxNDUiXTsgJHBheXR5cGUgPSAkX1BPU1RbIlx4NzBcMTQxXHg3OVwxNjRcMTcxXDE2MFx4NjUiXTsgJGFtb3VudHBhaWQgPSAkX1BPU1RbIlx4NjFceDZkXDE1N1wxNjVcMTU2XDE2NFwxNjBceDYxXDE1MVwxNDQiXTsgJGJhbGFuY2UgPSAkX1BPU1RbIlwxNDJcMTQxXHg2Y1x4NjFceDZlXDE0M1wxNDUiXTsgJGRhdGUgPSAkX1BPU1RbIlx4NjRcMTQxXHg3NFx4NjUiXTsgJHF1ZXJ5ID0gbXlzcWxpX3F1ZXJ5KCRjb24sICJcMTExXDExNlx4NTNceDQ1XHg1MlwxMjRceDIwXDExMVx4NGVceDU0XDExN1x4MjBceDc3XDE0MVx4NzNcMTY0XDE0NVx4NjNcMTU3XHg2Y1x4NmNcMTQ1XHg2M1x4NzRceDIwXDUwXHg2M1wxNTdceDZjXHg2Y1wxNDVcMTQzXDE2NFx4NmZcMTYyXHgyY1wxNDNceDZjXDE1MVwxNDVcMTU2XHg3NFx4NmVceDYxXHg2ZFwxNDVceDJjXDE2NFwxNzFcMTYwXHg2NVx4NmZcMTQ2XHg3N1x4NjFcMTYzXDE2NFwxNDVceDJjXDE2MFwxNDFceDc5XHg3NFwxNzFcMTYwXDE0NVw1NFx4NjFceDZkXHg2ZlwxNjVcMTU2XHg3NFx4NzBcMTQxXHg2OVwxNDRceDJjXDE0MlwxNDFcMTU0XHg2MVx4NmVcMTQzXHg2NVx4MmNceDY0XDE0MVx4NzRceDY1XHgyOVw0MFx4NTZceDQxXHg0Y1x4NTVceDQ1XHg1M1x4MjhcNDd7JGNvbGxlY3Rvcn1cNDdceDJjXDQ3eyRjbGllbnRuYW1lfVx4MjdcNTRceDI3eyR0eXBlb2Z3YXN0ZX1cNDdceDJjXHgyN3skcGF5dHlwZX1cNDdcNTRcNDd7JGFtb3VudHBhaWR9XHgyN1x4MmNceDI3eyRiYWxhbmNlfVw0N1x4MmNceDI3eyRkYXRlfVx4MjdcNTEiKTsgaWYgKCRxdWVyeSkgeyBlY2hvICJcMTYzXDE2NVx4NjNcMTQzXDE0NVwxNjNcMTYzXHg2NlwxNjVcMTU0XHg2YyI7IGhlYWRlcigiXDExNFx4NmZcMTQzXDE0MVwxNjRceDY5XDE1N1wxNTZcNzJcNDBceDYxXHg3M1x4NzNceDY1XHg3NFwxNjNceDMyXHgyZVx4NzBceDY4XHg3MCIpOyB9IGVsc2UgeyBlY2hvICJcMTQ1XDE2MlwxNjJcMTU3XDE2Mlw0MFwxNTdceDYzXHg2M1wxNjVcMTYyXHg3Mlx4NjVceDY0IjsgfSB9IA==')); ?>





        <?php include 'footer.php'; ?>