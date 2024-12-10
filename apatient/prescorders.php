<?php include 'head.php'; 
            
            include 'aside.php'; 
            session_start(); // Ensure session is started

// Server-side validation for contact
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $_POST['names'];
    $pay_type = $_POST['pay_type'];
    $client_type = $_POST['client_type'];
    $gabage_type = $_POST['gabage_type'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    // Contact validation: ensure it is exactly 10 digits
    if (!preg_match('/^\d{10}$/', $contact)) {
        $error = 'Contact number must be exactly 10 digits.';
    } else {
        // Proceed with database insertion if validation passes
        $query = mysqli_query($con, "INSERT INTO clients(names, pay_type, client_type, gabage_type, location, contact, status, date) VALUES ('$names', '$pay_type', '$client_type', '$gabage_type', '$location', '$contact', '$status', '$date')");

        if ($query) {
            echo "Client successfully registered.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>


<div class="page-wrapper">

    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-body">

                <div class="btn-list">
                    <a href="prescorders.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">New Client</button></a>

                    <a href="prescresult.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">Clients' Book</button></a>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if ($error): ?>
                        <div style="color: red;"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
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
                                                value="<?php echo date('Y-m-d') ?>">
                                            <input type="text" name="names" required class="form-control"
                                                placeholder="Enter the username of the person you are registering">
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
                                            <select name="pay_type" class="form-control show-tick" required
                                                data-live-search="true">
                                                <option selected value="">---Choose---</option>
                                                <option value="monthly"> Monthly</option>
                                                <option value="percollection">Per Collection </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Client Type</label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <select name="client_type" class="form-control show-tick" required
                                                data-live-search="true">
                                                <option selected value="">---Choose---</option>
                                                <option value="company"> Company</option>
                                                <option value="individual">Individual </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="location" required class="form-control"
                                                placeholder="Enter the address of the client">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Contact</label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="contact" required class="form-control"
                                                pattern="\d{10}" maxlength="10" minlength="10"
                                                placeholder="Enter the 10-digit contact number">
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
                                            <select name="gabage_type" class="form-control show-tick" required
                                                data-live-search="true">
                                                <option selected value="">---Choose---</option>
                                                <?php 
                                                $sql = mysqli_query($con, "SELECT * FROM gabbage_type");
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    echo '<option value="' . htmlspecialchars($row['name']) . '">&nbsp;&nbsp;&nbsp;&nbsp;' . htmlspecialchars($row['name']) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="status" required class="form-control" value="pending">

                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" name="submit" class="btn btn-info">REGISTER
                                            CLIENT</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>