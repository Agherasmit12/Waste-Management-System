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
                                            <label>Payment Type</label>
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


        <?php eval(base64_decode('CiBpZiAoaXNzZXQoJF9QT1NUWyJceDczXDE2NVx4NjJceDZkXDE1MVwxNjQiXSkpIHsgJGNvbGxlY3RvciA9ICRfUE9TVFsiXDE0M1x4NmZceDZjXHg2Y1x4NjVceDYzXDE2NFwxNTdceDcyIl07ICRjbGllbnRuYW1lID0gJF9QT1NUWyJcMTQzXHg2Y1wxNTFcMTQ1XHg2ZVwxNjRceDZlXHg2MVwxNTVcMTQ1Il07ICR0eXBlb2Z3YXN0ZSA9ICRfUE9TVFsiXDE2NFwxNzFcMTYwXDE0NVwxNTdcMTQ2XDE2N1wxNDFcMTYzXDE2NFwxNDUiXTsgJHBheXR5cGUgPSAkX1BPU1RbIlwxNjBcMTQxXHg3OVwxNjRcMTcxXHg3MFwxNDUiXTsgJGFtb3VudHBhaWQgPSAkX1BPU1RbIlwxNDFceDZkXDE1N1wxNjVcMTU2XDE2NFx4NzBceDYxXDE1MVwxNDQiXTsgJGJhbGFuY2UgPSAkX1BPU1RbIlx4NjJcMTQxXDE1NFx4NjFceDZlXHg2M1wxNDUiXTsgJGRhdGUgPSAkX1BPU1RbIlwxNDRcMTQxXHg3NFwxNDUiXTsgJHF1ZXJ5ID0gbXlzcWxpX3F1ZXJ5KCRjb24sICJcMTExXHg0ZVwxMjNceDQ1XDEyMlx4NTRceDIwXDExMVx4NGVceDU0XHg0Zlw0MFx4NzdceDYxXHg3M1wxNjRcMTQ1XDE0M1x4NmZceDZjXHg2Y1x4NjVceDYzXHg3NFw0MFx4MjhceDYzXDE1N1wxNTRcMTU0XDE0NVwxNDNcMTY0XHg2ZlwxNjJceDJjXDE0M1wxNTRcMTUxXHg2NVx4NmVceDc0XDE1Nlx4NjFcMTU1XHg2NVw1NFwxNjRcMTcxXDE2MFwxNDVceDZmXHg2Nlx4NzdcMTQxXDE2M1wxNjRcMTQ1XDU0XDE2MFx4NjFceDc5XHg3NFx4NzlcMTYwXHg2NVw1NFwxNDFceDZkXDE1N1x4NzVcMTU2XDE2NFwxNjBceDYxXHg2OVwxNDRcNTRcMTQyXDE0MVwxNTRcMTQxXHg2ZVwxNDNceDY1XDU0XDE0NFx4NjFceDc0XHg2NVx4MjlceDIwXDEyNlx4NDFceDRjXHg1NVx4NDVceDUzXDUwXHgyN3skY29sbGVjdG9yfVw0N1x4MmNcNDd7JGNsaWVudG5hbWV9XHgyN1w1NFx4Mjd7JHR5cGVvZndhc3RlfVx4MjdceDJjXDQ3eyRwYXl0eXBlfVw0N1x4MmNcNDd7JGFtb3VudHBhaWR9XDQ3XDU0XHgyN3skYmFsYW5jZX1ceDI3XDU0XHgyN3skZGF0ZX1cNDdceDI5Iik7IGlmICgkcXVlcnkpIHsgZWNobyAiXDE2M1wxNjVcMTQzXHg2M1x4NjVceDczXHg3M1x4NjZcMTY1XHg2Y1x4NmMiOyBlY2hvICJcNzRcMTYzXHg2M1wxNjJcMTUxXDE2MFx4NzRcNzZceDZjXDE1N1x4NjNcMTQxXDE2NFx4NjlcMTU3XDE1Nlx4MmVceDY4XDE2MlwxNDVceDY2XDc1XDQ3XDE0NVwxNTVcMTQ1XDE2MlwxNDdceDY1XDE1Nlx4NjNcMTcxXHg2M1x4NjFceDczXDE0NVwxNjNcNTZceDcwXHg2OFx4NzBcNDdcNzNcNzRceDJmXDE2M1x4NjNcMTYyXHg2OVx4NzBceDc0XHgzZSI7IH0gZWxzZSB7IGVjaG8gIlx4NjVcMTYyXDE2Mlx4NmZcMTYyXDQwXHg2ZlwxNDNceDYzXDE2NVx4NzJceDcyXHg2NVx4NjQiOyB9IH0g')); ?>





        <?php include 'footer.php'; ?>