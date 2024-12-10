<?php include 'head.php'; 
        
include 'aaside.php'; ?>

    
        <div class="page-wrapper">
      
       <link rel="stylesheet" type="text/css" href="new/style.css">
     <link rel="stylesheet" type="text/css" href="new/tcal.css">
 <script src="new/tcal.js" type="text/javascript"></script>
      <script type="text/javascript">

    function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        w = window.open();

        w.document.write(printContents);
        w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');

        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10

        return true;
    }

</script>
             <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="btn-list">
                                 <a href="reports.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">New Collection</button></a>
                          
                            <!--   <a href="assets2.php?user=<?php echo $_SESSION['username']; ?>"><button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-primary">View Collection</button></a>
                                               -->          
                                                        
                              
                            
                                       
                                </div>
                            </div>
                        </div>
                    </div>                   



       
       
            <div class="container-fluid">
               
                <div class="row" id="printableArea">
   <form method="post" action="stock_in_report2.php">
        <tr>
            <td><label>DATE</label></td>
            <td><input type="text" class="tcal" name="search"></td>
            <td><input type="submit" name="submit" value="SEARCH"></td>
        </tr>

    </form>
  <?php 
        $search=$_POST['search'];
    $a=mysqli_query($con,"SELECT date FROM wastecollect WHERE date LIKE '%$search%'") or mysqli_error($con);

        $k=1;
									while($hk=mysqli_fetch_array($sq))
									{




                ?>
           


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                            </div>
                           <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                    <tr>
                                            <th>&nbsp;</th>
                                           <th>Collector</th>
											<th>Client</th>
											<th>Waste Tpye</th><th>Pay Type</th>
											<th>Amount</th> 
                                            <th>Balance</th> 
                                            <th>Date</th> 
                                        </tr>
                                       
                                </thead>


                                <tbody>
                                    <tr>
                                  
                                        <tr>
                                             <td><?php echo $k;?></td>
                                            <td><?php echo $hk['collector'];?></td>
                                            <td><?php echo $hk['clientname'];?></td>
                                            <td><?php echo $hk['typeofwaste'];?></td>
                                            <td><?php echo $hk['paytype'];?></td>
                                            <td><?php echo $hk['amountpaid'];?></td>
                                            <td><?php echo $hk['balance'];?></td>
                                            <td><?php echo $hk['date'];?></td>
                                           
                                            </tr> 
                                        <?php  $k++; } ?>
                                </tbody>
                            </table>
<input type="button" style="background-color:green; font-size:20px; color:white; border-radius:2px;" onclick="printDiv('printableArea')" value="PRINT PRODUCTS REPORT" />
	</div>
</div>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php //}
            include 'footer.php'; ?>