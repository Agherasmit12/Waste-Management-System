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
                    <a href="emergencycases1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">New Collection</button></a>

                    <a href="emergencycases.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">View Collection</button></a>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">


            <?php 
                            $sq=mysqli_query($con,"SELECT * FROM clients");
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
                                    <th>Name</th>
                                    <th>Pay Type</th>
                                    <th>Category</th>
                                    <th>Waste Type</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Status</th>

                                </tr>

                            </thead>

                            <tbody>
                                <?php $k=1;
									while($hk=mysqli_fetch_array($sq))
									{ ?>
                                <tr>
                                    <th scope="row"><?php echo $k;?></th>
                                    <td><a
                                            href="emergency.php?id=<?php echo $hk['id']; ?>"><?php echo $hk['names'];?></a>
                                    </td>
                                    <td><?php echo $hk['pay_type'];?></td>
                                    <td><?php echo $hk['client_type'];?></td>
                                    <td><?php echo $hk['gabage_type'];?></td>
                                    <td><?php echo $hk['location'];?></td>
                                    <td><?php echo $hk['contact'];?></td>
                                    <td><?php echo $hk['status'];?></td>


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