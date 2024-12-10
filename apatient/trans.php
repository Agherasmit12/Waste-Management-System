<?php include 'head.php'; 
        
include 'aside.php'; ?>

    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transport</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item"><a href="trans.php" class="text-muted">Request Transport</a></li>
                                    <li class="breadcrumb-item"><a href="trans2.php" class="text-muted">Pending Transport Approval</a></li>
                                    
                                    
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
                          


<form  enctype="multipart/form-data" method="post" action="" autocomplete="off">
                               
                            


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#transport_category').change(function() {
                var transport_category = $(this).val();
                var data_String = 'transport_category=' + transport_category;
                $.get('json123xyz.php', data_String, function(result) {

                    $.each(result, function(){
                        $('#amount').val(this.amount);
                       
                    });


                });
            });
        });
    </script>










        <div class="form-group">
                <label for="text">Choose Transport Form</label>

        <div >
            <?php
            $query = mysqli_query($con,"SELECT * FROM transport "); 
            echo '<select name="scanname" id="transport_category">'; 
            echo '<option value="">---Choose---</option>';

            while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
              echo '<option value="' . $row['transport_category'] . '">' . $row['transport_category'] . '</option>';
            }
           echo '</select>';
            ?>
        </div>
    </div> 
    <label for="text">Price</label>
     <div class="form-group">
           <div class="form-line">
                <input type="text" class="form-control" value="<?php echo $details['amount'];?>" id="amount" name="price" placeholder=" " required>

                    </div>
            </div>   

                           <label for="text">No Of Transport Form</label>
                                <div class="form-group">
                                    <div class="form-line">
<input type="number"  name="qty"  class="form-control" >
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />

<input type="hidden" name="date" value="<?php echo date('Y-m-d h:i:s A') ?>" required="required">
<input type="hidden" name="name" value="<?php echo $_SESSION['username']; ?>" />
                                    </div>
                                </div>


<input type="submit" value="Add Transport Form" name="addpatientnotes" class="btn btn-primary m-t-15 waves-effect" />
                              <input type="reset" value="RESET" class="btn btn-primary m-t-15 waves-effect" />
                            </form>    


<?php

   
    if (isset($_POST['addpatientnotes'])) {
    $user=$_POST['scanname'];
    $pass=$_POST['price'];
    $fname=$_POST['qty'];
    $fon=$_POST['amount'];
    $invoice=$_POST['invoice'];
        $date=$_POST['date'];
        $name=$_POST['name'];


   $fon=$pass*$fname;
    
  

$query=mysqli_query($con,"INSERT INTO new_omsaotrans (scanname,price,qty,amount,invoice,date,name) VALUES('$user','$pass','$fname','$fon','$invoice','$date','$name')");

        if ($query) {
            echo "successfull";
           // header("Location: patients11.php");
        }else{
            echo "error occurred";
        }
    
    }


     ?>

                                  </div>
                              <?php
                            $id=$_GET['invoice']; 
                            $a=$_SESSION['username'];
                            $sq=mysqli_query($con,"SELECT * FROM new_omsaotrans WHERE invoice='$id' ");
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Transport Name</th>
                                            <th>Price Per Transport Form</th>
                                            <th>No Of Transport Forms</th>
                                            <th>Total</th>
                                    

                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php $k=1;
                                    while($hk=mysqli_fetch_array($sq))
                                    { ?>
                                        <tr>
                                            <td><?php echo $k;?></td>
                                            <td><?php echo ucfirst($hk['scanname']);?></td>
                                             <td><?php  echo ucfirst($hk['price']);?></td> 
                                            <td><?php echo ucfirst($hk['qty']);?></td>

                                             <td><?php echo ucfirst($hk['amount']);?></td> 
                                           
                                               
                                        
                                            



                                           


               
                
            
        
                                        <?php $k++; } ?>
                                        </tr>
                                         <?php

 $sql="SELECT sum(amount) as total FROM new_omsaotrans WHERE invoice='$id'";

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_assoc($result))
{ ?>
    <td><strong>  Total: <?php echo $row['total'];?>  </strong></td>
   
   <?php
   $u=$row['total'];
}

mysqli_close($con);
?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </div>



 <input type="hidden" name="patientname"   />
 <input type="hidden" name="user" value="<?php echo $_GET['user']; ?>" />
 


<button><a href="chekilabxyz.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $u ?>&cashier=<?php echo $_SESSION['username']?>&user=<?php echo $_GET['user'];?>&patientname=<?php echo $_SESSION['username'];?>">Check Out</a>
</button>











              
                
             
       
              
<?php include 'footer.php'; ?>