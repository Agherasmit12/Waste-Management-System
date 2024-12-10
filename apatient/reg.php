<?php include 'head.php'; 
        
include 'aside.php'; ?>


<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Register A Patient</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>

                            <li class="breadcrumb-item"><a href="reg.php?user=<?php echo $_SESSION['username']; ?>"
                                    class="text-muted">Add Patients</a></li>
                            <li class="breadcrumb-item"><a href="patients.php?user=<?php echo $_SESSION['username']; ?>"
                                    class="text-muted">View My Patients</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <h4><?php echo date('Y-m-d'); ?></h4>
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
                                            <input type="hidden" required name="fileNo" class="form-input"
                                                aria-required="true" value="">

                                            <input type="text" name="patientname" required class="form-control"
                                                placeholder="Enter the name of the patient you are registering">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Age</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="ageBrac"
                                                placeholder="Enter the age of the person you are registering" required>
                                            <input type="hidden" name="regDate" required class="form-control"
                                                value="<?php echo date('Y-m-d h:i:s A') ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Gender</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <select name="gender" class="form-control show-tick" required
                                                data-live-search="true">
                                                <option selected value="">Choose Gender </option>

                                                <option value="Male"> Male</option>
                                                <option value="Female">Female </option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Patient Category</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <select name="illnes" class="form-control show-tick" required
                                                data-live-search="true">
                                                <option selected value="">Choose Patient Category</option>

                                                <option value="Urgent Case"> Urgent Case</option>
                                                <option value="Remote Patient Monitoring">Remote Patient Monitoring
                                                </option>
                                                <option value="Telemedicine"> Telemedicine</option>
                                                <option value="Home Health">Home Health </option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Weight</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="number" name="weight" required class="form-control"
                                                placeholder="Enter the weight of the patient you are registering">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>District</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="district" required class="form-control"
                                                placeholder="Enter the district of the patient you are registering">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Village</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="village" required class="form-control"
                                                placeholder="Enter the village of the user you are registering">
                                            <input type="hidden" name="user" required class="form-control"
                                                value="<?php echo $_SESSION['username'];?>">
                                            <input type="hidden" name="status" required class="form-control"
                                                value="Pending">
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
                                            <?php 
                                      $am=$_SESSION['username'];
                                      $sql=mysqli_query($con,"SELECT phone FROM ulogin WHERE username='$am'");
                                      while($row=mysqli_fetch_array($sql))
                                      {
                                      ?>
                                            <input type="text" name="contact" readonly="readonly" class="form-control"
                                                value="<?php echo $row['phone'];?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Primary Doctor</label>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <?php 
                                      $am=$_SESSION['username'];
                                      $sql=mysqli_query($con,"SELECT primary_doc FROM userprofile WHERE username='$am'");
                                      while($row=mysqli_fetch_array($sql))
                                      {
                                      ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                value="DR-<?php echo $row['primary_doc'];?>">
                                            <?php } ?>
                                        </div>
                                        <input type="hidden" required name="assistant" class="form-input"
                                            aria-required="true" value="Pending">
                                    </div>
                                </div>






                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" name="submit" class="btn btn-info">REGISTER PATIENT</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <?php


   
   
    if (isset($_POST['submit'])) {
        $fileNo=$_POST['fileNo'];
    $pass=$_POST['regDate'];
    $fname=$_POST['ageBrac'];
    $fon=$_POST['patientname'];
    $email=$_POST['gender'];
    $address=$_POST['illnes'];
    $add=$_POST['weight'];
    $district=$_POST['district'];
    $village=$_POST['village'];
    $user=$_POST['user'];
    $primary_doc=$_POST['attendant'];
$status=$_POST['status'];
    
$assistant=$_POST['assistant'];
$contact=$_POST['contact'];
    
  

$query=mysqli_query($con,"INSERT INTO patients (fileNo,regDate,ageBrac,patientname,gender,illnes,weight,district,village,user,attendant,status,assistant,contact) VALUES('$fileNo','$pass','$fname','$fon','$email','$address','$add','$district','$village','$user','$primary_doc','$status','$assistant','$contact')");

        if ($query) {
            echo "successfull";
            header("Location: patients.php");
        }else{
            echo "error occurred";
        }
    
    
}

     ?>















        <?php include 'footer.php'; ?>