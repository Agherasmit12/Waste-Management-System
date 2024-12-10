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
                       //  $a=$_GET['patientid'];
                         $a=$_GET['msgSubject'];
						 $details=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM msgs WHERE msgSubject='$a'"));
						 ?>    

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                            </div>
                           <div class="table-responsive">
                                     <table class="table" style="width:100%">
  <tr>
    <th>Recipient:</th>
    <td><?php echo $details['mrecep'];?></td>
  </tr>
  <tr>
    <th>Subject:</th>
    <td><?php echo $details['msgSubject'];?></td>
  </tr>
  <tr>
    <th>Message:</th>
    <td><?php echo $details['realMsg'];?></td>
  </tr>
   <tr>
    <th>Sender:</th>
    <td><?php echo $details['msender'];?></td>
  </tr>
  <tr>
    <th>Attachment:</th>
<td><image src="../uploads/<?php echo $details['mAttach']; ?>" style="border-radius:10px; width:500px; height:400px;"></td>  </tr>
  <tr>
    <th>Date:</th>
    <td><?php echo $details['msdate'];?></td>
  </tr>
<tr><th>Reply</th><td><a href="reply.php?msgSubject=<?php echo $details['msgSubject'];?>&msid=<?php echo $details['msid'];?>&user=<?php echo $_SESSION['username'];?>">Reply</a></td></tr>                                           
</table>

                        </div>
                    </div>








                
                    
                </div>
                
            <?php include 'footer.php'; ?>