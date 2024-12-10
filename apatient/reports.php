<?php include 'head.php'; 
        
include 'aaside.php'; ?>


<div class="page-wrapper">

    <link rel="stylesheet" type="text/css" href="new/style.css">
    <link rel="stylesheet" type="text/css" href="new/tcal.css">
    <script src="new/tcal.js" type="text/javascript"></script>

    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">

                <div class="btn-list">
                    <a href="log.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">Payment Reports</button></a>

                    <a href="waste.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">Waste Reports</button></a>

    

                </div>
            </div>
        </div>
    </div>


</div>

<?php include 'footer.php'; ?>