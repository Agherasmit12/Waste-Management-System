<?php include 'head.php'; 
        
include 'aaside.php'; session_start(); // Ensure session is started

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
                    <a href="users.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">Add User Accounts</button></a>

                    <a href="users1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                            class="btn waves-effect waves-light btn-rounded btn-primary">View User Accounts</button></a>
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

                                            <input type="text" title="What is the name of this user? " name="fullname"
                                                required class="form-control"
                                                placeholder="Enter the name of the user you are registering">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>User type</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <select name="ucat" class="form-control show-tick" required
                                                data-live-search="true">
                                                <option selected value="">---Choose---</option>

                                                <option value="admin"> Admin</option>
                                                <option value="collector">Collector </option>


                                            </select>
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
                                            <label>Address</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" title="What is the address of this user? " name="address"
                                                required class="form-control"
                                                placeholder="Enter the address of the user you are registering">
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
                                            <input type="text" title="What is the address of this user? "
                                                name="username" required class="form-control"
                                                placeholder="Enter the username of the user you are registering">
                                            <input type="hidden" name="acstatus" required class="form-control"
                                                value="active">
                                            <input type="hidden" name="date" required class="form-control"
                                                value="<?php echo date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Password</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="password" title="What is the address of this user? "
                                                name="password" required class="form-control"
                                                placeholder="Enter the password of the user you are registering">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ID/Passport Copy</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="file" name="image" required class="form-control">
                                        </div>
                                    </div>
                                </div>






                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" name="submit" class="btn btn-info">REGISTER USER</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <?php
 
$con = mysqli_connect("localhost","root","","gabbage");
error_reporting(E_ALL^E_NOTICE);

   
    if (isset($_POST['submit'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $fullname=$_POST['fullname'];
    $ucat=$_POST['ucat'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $acstatus=$_POST['acstatus'];
    $date=$_POST['date'];
     
    
    $file=$_FILES['image']['name'];
      $filename=$_FILES['image']['tmp_name'];
      $destination='contract/';
      $realname=$destination.$file;
      if (move_uploaded_file($filename, $realname)) {
        echo "SUCCESSFULLY ";
      }else{
        echo "upload error";
      }
     
         if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM admin WHERE username='$username'"))>0)
    { 
    
     ?>
        <script type="text/Javascript">
            alert("The Username You Entered Is Already In Use\nPlease Enter Another Username");
                window.location="users.php";
        window.location="users.php";
        </script>
        <?php
        //echo "Sorry.. Username Already Taken";
   // header('location:register.php');

     }
    else
    {

$query=mysqli_query($con,"INSERT INTO admin (username,password,fullname,ucat,address,contact,acstatus,date,image) VALUES('$username','$password','$fullname','$ucat','$address','$contact','$acstatus','$date','$file')");

        if ($query) {
            echo "successfull";
            echo("<script>location.href='users1.php';</script>");
            // header("Location: users1.php");
        }else{
            echo "error occurred";
        }
    
    }
}

     ?>










        <?php include 'footer.php'; ?>