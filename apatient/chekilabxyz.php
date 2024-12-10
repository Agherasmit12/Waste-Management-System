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
                          




 <link href="sadat/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="sadat/lib/jquery.js" type="text/javascript"></script>
<script src="sadat/src/facebox.js" type="text/javascript"></script>
        <link rel="stylesheet" href="sadat/newcss.css">

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>







                                <div>

<form action="savesales133xs.php" method="post">
<div id="ac">
 
                                 
<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" />
<input type="text" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="text" name="amount" value="<?php echo $_GET['total']; ?>" />
<input type="text" name="type" value="Proformer Invoice" />
<input type="text" name="cashier" value="Pending" />
<input type="text" name="cname" value="<?php echo $_SESSION['username']; ?>" />
<input type="text" name="name" value="Pending" />
<input type="text" name="pstatus" value="Pending" />

<br><br>
     
     
<input id="btn" type="submit" name="submit" value="Save Transport Request" style="width: 268px;" />
</div>
</form>







                                </div>


</div>



             </div>
                    </div>
                </div>
            </div>
         </div>

  <?php include 'footer.php'; ?>