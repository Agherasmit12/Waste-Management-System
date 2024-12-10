<?php include 'head.php'; 
        
include 'aside.php'; ?>
 <script>
        function showEdit(editableObj) {
            $(editableObj).css("background","#FFF");
        } 
        
        function saveToDatabase(editableObj,column,idservices) {
            $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
            $.ajax({
                url: "edit/editItem.php",
                type: "POST",
                data:'column='+column+'&editval='+editableObj.innerHTML+'&idservices='+idservices,
                success: function(data){
                    $(editableObj).css("background","#FDFDFD");
                }        
           });
        }
    function saveToDatabase2(editableObj,column,idsuppliers) {
            $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
            $.ajax({
                url: "edit/editSupplier.php",
                type: "POST",
                data:'column='+column+'&editval='+editableObj.innerHTML+'&idsuppliers='+idsuppliers,
                success: function(data){
                    $(editableObj).css("background","#FDFDFD");
                }        
           });
        }
        </script>
    
        <div class="page-wrapper">
      
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Messages</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                   <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
   <li class="breadcrumb-item"><a href="messages.php?user=<?php echo $_SESSION['username'];?>" class="text-muted">Compose Message</a></li>
                                    <li class="breadcrumb-item"><a href="message2.php?user=<?php echo $_SESSION['username'];?>" class="text-muted">Inbox</a></li>
                                    
                                    <li class="breadcrumb-item"><a href="message3.php?user=<?php echo $_SESSION['username'];?>" class="text-muted">Outbox</a></li>
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
                          <form  enctype="multipart/form-data" method="post" action="wearesaving.php" autocomplete="off">

                               

                                    <div class="form-body">
                                        


                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Reciever</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
    <select name="recepient" class="form-control show-tick" required data-live-search="true">
                                      <option selected value="">Choose Reciever</option>
                     <?php 
                    $s=mysqli_query($con,"SELECT * FROM ulogin WHERE ucat='doctor' OR ucat='radiology' OR ucat='Ambulance' OR ucat='delivery' OR ucat='pharmacy' OR ucat='accounts' ");
                                       while($row=mysqli_fetch_array($s))
                                       {
                     ?>
                      <option value="<?php echo $row['username'];?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['fullname'];?> - <?php echo $row['ucat'];?></option> 
                                       <?php } ?>
                                    </select>

                                                </div>
                                            </div>
                                        </div>



                                        
 <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                   <label>Subject Of Message</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                <div class="form-group">
                  <input required type="text" name="subject" class="form-control" placeholder="what is this message about?...">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                <label>Message?</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                  <input required type="text" name="shiplan" class="form-control" placeholder="what is this message about?...">

                                                </div>
                                            </div>
                                        </div>



                                         <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                    <label>Add Attachment</label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
        <input type="file" id="file" title="add attachment" name="file"  class="form-control" placeholder="Upload attachment"/>

                        
                                             
                                                </div>
                                            </div>
                                        </div>



                                        
                                       
                                        
                                    
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit"  name="sendmsg" class="btn btn-info">Send</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>







              
                
             
       
              
<?php include 'footer.php'; ?>