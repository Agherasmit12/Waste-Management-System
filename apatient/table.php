<?php 
include 'head.php'; 
include 'aaside.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="apitblstyle.css">
        <!-- DataTable CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">  
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Relway Font link -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
        
        <title>DataTable Demo</title>

    </head>
    <body>
	<!-- Awesome HTML code goes here -->
    <h1 id="heading">DataTable Demo</h1>
<div class="container">
				<?php 
                // Fetching data from the database
                $sq = mysqli_query($con, "SELECT * FROM clients"); 
                ?>
	<table class="table table-hover table-light table-bordered" id="myTable">
	<thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Pay Type</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Waste Type</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Status</th>
                                    </tr>
</thead>
		<tbody>
                                    <?php
                                    $k = 1;
                                    while ($hk = mysqli_fetch_array($sq)) { 
                                    ?>
                                        <tr>
                                            <td><?php echo $k; ?></td>
                                            <td>
                                                <a href="inventory1.php?id=<?php echo $hk['id']; ?>">
                                                    <?php echo $hk['names']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $hk['pay_type']; ?></td>
                                            <td><?php echo $hk['client_type']; ?></td>
                                            <td><?php echo $hk['gabage_type']; ?></td>
                                            <td><?php echo $hk['location']; ?></td>
                                            <td><?php echo $hk['contact']; ?></td>
                                            <td><?php echo $hk['status']; ?></td>
                                        </tr>
                                    <?php 
                                        $k++; 
                                    } 
                                    ?>
                                </tbody> 
	</table> 
</div>
	<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then DataTable, then script tag -->
        
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> 
        <script>
    // Awesome JS Code Goes here
    $(document).ready( function () {
        $('#myTable').DataTable({responsive: true});
    } );
</script>
    </body>
</html>