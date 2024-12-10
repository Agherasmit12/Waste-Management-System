<html>
<head>
    <title>Gabage Collection Management</title>

<link href="sadat/style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="sadat/tcal.css" />
<script type="text/javascript" src="sadat/tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>
<body style="background-color:#ebadd6;">
<fieldset>
<div class="wrapper">
 <div class="header">
    Gabage Collection Management Payment Report

</div>
<div id="maintable">
<div style="margin-top: -19px; margin-bottom: 21px;">
<a id="addd" href="reports.php?user=<?php echo $_GET['user']; ?>" style="float: none;">Back</a>
</div>
<form action="paymentreport.php" method="get">
From : <input type="text" name="d1" class="tcal" value=""  autocomplete="off"/> To: <input type="text" name="d2" class="tcal" value="" autocomplete="off" /> 
<input type="submit" name="submit" value="Search"><a id="addd" href="javascript:Clickheretoprint()">Print</a>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
<?php if(isset($_GET['submit'])){
	echo "payment Report from&nbsp;";
echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2']; }?>
</div>
<table id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
		

			<th width="10%">Collector </th>
			<th width="10%">Client </th>

			<th width="10%">Waste </th>
			<th width="10%">Pay Type</th>
			<th width="10%">Amount Paid </th>
			<th width="10%">Date </th>
			<th width="10%">Reciept No</th>
			<th width="10%">Reason </th>
			<th width="10%">Balance </th>

		</tr>
	</thead>
	
	<tbody>
		
			<?php
				include('configur.php');
				if(isset($_GET['submit'])){
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$result = $db->prepare("SELECT * FROM payment WHERE date BETWEEN :a AND :b");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<!-- <td><?php
			$dsdsd=$row['sdescription'];
			echo formatMoney($dsdsd, true);
			?></td> -->
			<td><?php echo $row['collector']; ?></td>
						<td><?php echo $row['clientname']; ?></td>
						<td><?php echo $row['typeofwaste']; ?></td>
						<td><?php echo $row['paytype']; ?></td>
						<td><?php echo $row['amountpaid']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['recieptno']; ?></td>
						<td><?php echo $row['reason']; ?></td>
						<td><?php echo $row['balance']; ?></td>

			</tr>
			<?php
				}
				}
				else{
				$result = $db->prepare("SELECT * FROM payment");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
		<td><?php echo $row['collector']; ?></td>
						<td><?php echo $row['clientname']; ?></td>
						<td><?php echo $row['typeofwaste']; ?></td>
						<td><?php echo $row['paytype']; ?></td>
						<td><?php echo $row['amountpaid']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['recieptno']; ?></td>
						<td><?php echo $row['reason']; ?></td>
						<td><?php echo $row['balance']; ?></td>

			</tr>	
				<?php	
				}
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total </th>
			<th colspan="2" style="border-top:1px solid #999999"> 
			<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				if(isset($_GET['submit'])){
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$results = $db->prepare("SELECT sum(amountpaid) FROM payment WHERE date BETWEEN :a AND :b");
				$results->bindParam(':a', $d1);
				$results->bindParam(':b', $d2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amountpaid)'];
				echo formatMoney($dsdsd, true);
				}
				}
				else{
				$results = $db->prepare("SELECT sum(amountpaid) FROM payment ");
				
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amountpaid)'];
				echo formatMoney($dsdsd, true);
				}	
				}
				?>
			</th>
		</tr>
	</thead>
</table>
</div>
<div class="clearfix"></div>
</div>
</fieldset>
</div>
</body>
</html>