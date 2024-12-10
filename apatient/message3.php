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

                   
   <?php 
                            $sq=mysqli_query($con,"SELECT * FROM msgs WHERE msender='".$_SESSION['username']."' ");
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
                                        <th scope="col">No</th>
                                        <th>Date</th>
                                            <th>Recipient</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Sender</th>

                                            <th>Attachment</th>
                                             <th>View</th><th>Reply</th>
                                    </tr>
                                </thead>

  <?php $k=1;  $rpls=0;
                                    while($hk=mysqli_fetch_array($sq))
                                    {  
                                $date=date_create($hk['msdate']);
                                $rdate=date_format($date,"l jS \of F Y");
                                $realSender=mysqli_fetch_array(mysqli_query($con,"SELECT fullname FROM ulogin WHERE username='".$hk['msender']."'"));
                                $realSende=mysqli_fetch_array(mysqli_query($con,"SELECT ucat FROM ulogin WHERE username='".$hk['msender']."'"));
                                $realSend=mysqli_fetch_array(mysqli_query($con,"SELECT ucat FROM ulogin WHERE username='".$hk['mrecep']."'"));

                                $rpls=mysqli_num_rows(mysqli_query($con,"SELECT DISTINCT msResid FROM msgresponses WHERE resmsg='".$hk['msid']."'"));
                                ?>
                                        <tr>
                                            <td><?php echo $k;?></td>
                                            <td><?php echo $rdate;?></td> 
                                             <td><?php echo ucfirst($hk['mrecep']);?> - <?php echo ucfirst($realSend['ucat']);?></td> 

                                            <td><?php echo ucfirst($hk['msgSubject']);?></td>
                                            <td><?php echo ucfirst($hk['realMsg']);?></td> 
                                            <td><?php echo ucfirst($realSender['fullname']);?> - <?php echo ucfirst($realSende['ucat']);?></td>

<td><image src="../uploads/<?php echo $hk['mAttach']; ?>" style="border-radius:10px; width:50px; height:50px;"></td>
    <td><a href="viewreply.php?msgSubject=<?php echo $hk['msgSubject'];?>">View</a></td>
                                            
    <td><a href="reply.php?msid=<?php echo $hk['msid'];?>&msgSubject=<?php echo $hk['msgSubject'];?>">Reply</a></td>
                                            </tr> 
                                        <?php  $k++; } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php include 'footer.php'; ?>