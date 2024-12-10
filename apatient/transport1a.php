<?php include 'head.php'; 
        
include 'aside.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
</head>
<body>
<div class="page-wrapper">


    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">

                <div class="btn-list">
                    <a href="transport1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">New Payment</button></a>

                    <a href="transport1a.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">View Payments</button></a>






                </div>
            </div>
        </div>
    </div>





    <div class="container-fluid">

        <div class="row">


            <?php 
                            $u=$_SESSION['username'];
                            $sq=mysqli_query($con,"SELECT * FROM payment WHERE collector='$u'");
                             
                            ?>


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Collector</th>
                                    <th>Client</th>
                                    <th>Waste Tpye</th>
                                    <th>Pay Type</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                    <th>Date</th>
                                    <th>Reason</th>
                                    <th>Reciept No</th>

                                </tr>

                            </thead>



                            <tbody>
                                <?php $k=1;
									while($hk=mysqli_fetch_array($sq))
									{ ?>
                                <tr>
                                    <td><?php echo $k;?></td>
                                    <td><?php echo $hk['collector'];?></td>
                                    <td><?php echo $hk['clientname'];?></td>
                                    <td><?php echo $hk['typeofwaste'];?></td>
                                    <td><?php echo $hk['paytype'];?></td>
                                    <td><?php echo $hk['amountpaid'];?></td>
                                    <td><?php echo $hk['balance'];?></td>
                                    <td><?php echo $hk['date'];?></td>
                                    <td><?php echo $hk['reason'];?></td>
                                    <td><?php echo $hk['recieptno'];?></td>




                                </tr>
                                <?php  $k++; } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- jQuery and DataTables Scripts -->
                <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
                <script>
                // Initialize DataTable
                let table = new DataTable('#myTable');

                $(document).ready(function() {
                    $('#myTable').DataTable({
                        columnDefs: [{
                                targets: '_all',
                                defaultContent: '-'
                            } // Fills missing content with a dash
                        ]
                    });
                });
                </script>
            </div>
            </body>

            </html>

            <?php include 'footer.php'; ?>
            <!-- ////////////////////////////////// -->