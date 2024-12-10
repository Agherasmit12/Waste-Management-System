<?php include 'head.php'; 
        
include 'aaside.php'; ?>

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

                    <a href="user4.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">Add Category</button></a>

                    <a href="users6.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">View Category</button></a>






                </div>
            </div>
        </div>
    </div>





    <div class="container-fluid">

        <div class="row">

            <?php 
							$sq=mysqli_query($con,"SELECT * FROM gabbage_type");
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
                                    <th>&nbsp;</th>
                                    <th>Category Name</th>
                                    <th>Amount Per Month</th>
                                    <th>Amount Per Collection</th>

                                    <th>Update Category</th>
                                    <th>Delete Category </th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php $k=1;
									while($hk=mysqli_fetch_array($sq))
									{ ?>

                                <tr>
                                    <td><?php echo $k;?></td>
                                    <td><?php echo ucfirst($hk['name']);?></td>
                                    <td><?php echo ucfirst($hk['chargespm']);?></td>
                                    <td><?php echo ucfirst($hk['chargespd']);?></td>


                                    <td><a href="users7.php?id=<?php echo $hk['id']; ?>"> Update Category </a></td>
                                    <td><a href="deletecat.php?id=<?php echo $hk['id']; ?>"> Delete </a></td>


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