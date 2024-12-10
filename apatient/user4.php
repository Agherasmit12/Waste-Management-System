<?php include 'head.php'; 
        
include 'aaside.php'; ?>

    
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                          <form  enctype="multipart/form-data" method="post" action="" autocomplete="off">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                            <label>Name Of Category</label>
                                                </div>
                                            </div>

           <div class="col-md-10">
                            <div class="form-group">
      
   <input type="text" title="What is the name of this cartegory? " name="name" id="text" required  class="form-control" placeholder="Enter the name of the category you are registering">

                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                     <label>Amount Per Month</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                        <input type="number" title="What is the amount of this category? " name="chargespm" id="text" required  class="form-control" placeholder="Enter the amount of the category per month">
                                               </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Amount Per Collection</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                        <input type="text" title="What is the amount of this cartegory? " name="chargespd" id="text" required  class="form-control" placeholder="Enter the amount of the cartegory per collection">
   </div>
                                            </div>
                                        </div>
                                        

                                        
                                       
                                        
                                    
                                   
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="submit" class="btn btn-info">REGISTER CATEGORY</button>
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
   
    $name=$_POST['name'];
    $chargespm=$_POST['chargespm'];
    $chargespd=$_POST['chargespd'];
    
    
     
      

$query=mysqli_query($con,"INSERT INTO gabbage_type (name,chargespm,chargespd) VALUES('$name','$chargespm','$chargespd')");

        if ($query) {
            echo "successfull";
            echo("<script>location.href='users6.php';</script>");
        }else{
            echo "error occurred";
        }
    
    }


     ?>



       
              
          <?php include 'footer.php'; ?>