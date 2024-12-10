<?php include 'head.php'; 
        
include 'aaside.php'; ?>

    
        <div class="page-wrapper">
      
        <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-body">
                             <div class="btn-list">
                                
                                <a href="patients.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">Add Client</button></a>
                          
                              <a href="patients1.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">View Clients</button></a>
                                                        
                            
                                                        
                              
                            
                                       
                                </div>
                            </div>
                        </div>
                    </div>                   
        <?php 
        
        $qry = mysqli_query($con, "SELECT * FROM clients where id ='{$_GET['id']}' ");
        $res = mysqli_fetch_assoc($qry);

        ?>

           <div class="container-fluid">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="" autocomplete="off">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Name</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
        <input type="hidden" name="id" required  class="form-control" value="<?php echo $res['id'] ?>">

                                        <input type="text" name="names" required value="<?php echo $res['names'] ?>" class="form-control" placeholder="Enter the username of the person you are registering">
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
 <select name="pay_type" class="form-control show-tick" required data-live-search="true">
                                      <option selected value="">---Choose---</option>
                                       
                                       <option value="monthly" <?php echo $res['pay_type'] == 'monthly' ? 'selected' : '' ?>> Monthly</option> 
                                       <option value="percollection" <?php echo $res['pay_type'] == 'percollection' ? 'selected' : '' ?>>Per Collection </option> 
                                       

                                    </select>                                                </div>
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
                                                    <select name="client_type" class="form-control show-tick" required data-live-search="true">
                                                        <option selected value="">---Choose---</option>
                                                        
                                                        <option value="company" <?php echo $res['client_type'] == 'company' ? 'selected' : '' ?>> Company</option> 
                                                        <option value="individual" <?php echo $res['client_type'] == 'individual' ? 'selected' : '' ?>>Individual </option> 
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
                                  <input type="text" name="location" value="<?php echo $res['location'] ?>" required  class="form-control" placeholder="Enter the weight of the patient you are registering">
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
                                        <input type="number" name="contact" value="<?php echo $res['contact'] ?>" required  class="form-control" placeholder="Enter the contact of the client you are registering">
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
 <select name="gabage_type" class="form-control show-tick" required data-live-search="true">
                                      <option selected value="">---Choose---</option>

                                      <?php 
                                      $sql=mysqli_query($con,"SELECT * FROM gabbage_type");
                                      while($row=mysqli_fetch_array($sql))
                                      {
                                      ?>
                                       <option value="<?php echo $row['name'];?>"  <?php echo $res['gabage_type'] == $row['name'] ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['name'];?></option>
                                       <?php } ?>
                                        </select>                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <select name="status" class="form-control show-tick" required data-live-search="true">
                                                        <option selected value="">---Choose---</option>
                                                        
                                                        <option value="pending" <?php echo $res['status'] == 'pending' ? 'selected' : '' ?>> Pending</option> 
                                                        <option value="Approved" <?php echo $res['status'] == 'Approved' ? 'selected' : '' ?>>Approved </option>
                                                        <option value="Denied" <?php echo $res['status'] == 'Denied' ? 'selected' : '' ?>>Denied </option> 
                                                    </select>   
                                                </div>
                                            </div>
                                        </div>
                               


                                        
                                       
                                        
                                    
                                   
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="submit" class="btn btn-info">UPDATE CLIENT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




<?php


   
   
    if (isset($_POST['submit'])) {
    $names=$_POST['names'];
    $pay_type=$_POST['pay_type'];
    $client_type=$_POST['client_type'];
    $gabage_type=$_POST['gabage_type'];
    $location=$_POST['location'];
    $contact=$_POST['contact'];
    $status=$_POST['status'];
    $date=$_POST['date'];
    
    
  

$query=mysqli_query($con,"UPDATE clients set    names ='$names',
                                                pay_type = '$pay_type',
                                                client_type = '$client_type',
                                                gabage_type = '$gabage_type',
                                                `location` = '$location',
                                                contact = '$contact',
                                                status = '$status' where id = '{$_POST['id']}' ");

        if ($query) {
            echo "successfull";
            echo("<script>location.href='patients1.php';</script>");
            // header("Location: patients1.php");
        }else{
            echo "error occurred";
        }
    
    
}

     ?>


















              
                
             
       
              
          <?php include 'footer.php'; ?>