<?php session_start();

include 'connect.php';
function getrkey($table,$col)
{  
$sql=mysqli_num_rows(mysqli_query($con,"SELECT DISTINCT $col FROM $table "));
$new=$sql+1;
$format=010000;
if($sql<10)
{
$key='MC/0000'.$new;
}
elseif(($sql<100)&&($sql>9))
{
$key='MC/000'.$new;
}
elseif(($sql>99)&&($sql<1000))
{
$key='MC/00'.$new;
}
else
{
$key='MC/0'.$new;
}
return $key;
}
 if(isset($_POST['obalpo']))
{
	$a1=$_POST['passbook']; $date=$_POST['dat']; $reason='opening balance for '.$date;
	if(preg_match("/^[0-9,]+$/", $a1))
							{
							$a = str_replace(',','',$a1); } else { 
								$a=$a1;
					 }
			$sql=mysqli_query($con,"INSERT INTO incomes VALUES('','opening balance','$a','$date','$reason','".$_SESSION['username']."','')");
			if($sql)
			{?>
				<script type="text/Javascript">
				alert("Opening Balance Successfully Set");
				window.location="home.php";
				</script>
			<?php }
			else
			{?>
				<script type="text/Javascript">
				alert("OPening Balance Could Not Be Set");
				window.location="javascript:history.go(-1)";
				</script>
			<?php }
}





elseif(isset($_POST['regdel']))
{
	$a=$_POST['name'];
	$b=$_POST['scontact'];
	$c=$_POST['address'];
	$d=$_POST['results'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM people WHERE fname='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Delivery Person You Are Adding Already Exists");
		window.location="sales.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO people(fname,phone) VALUES('$a','$b')");
		$id=mysqli_insert_id();
		$sql2=mysqli_query($con,"INSERT INTO deliveryperson VALUES('','$c','$d','$id')");
		if($sql2)
		{ ?>
			<script type="text/Javascript">
			alert("You Have Successfully Registered A New Delivery Person");
			window.location="sales.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Delivery Person Could Not Be Registered");
			window.location="sales.php";
			</script>
		<?php }
	}
}












elseif(isset($_GET['confirmappoint']))
{
	$a=$_GET['confirmappoint'];
	$sql=mysqli_query($con,"UPDATE appointment SET appState='confirmed' WHERE appid='$a'");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Appointment Successfully Confirmed");
		window.location="myappoint.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Appointment Could Not Be Confirmed");
		window.location="myappoint.php";
		</script>
	<?php }
}








elseif(isset($_POST['newambulance']))
{
	$a=$_POST['branch'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM ambulances WHERE regNumber='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("There Is Already An Ambulance With That Registration Number");
		window.location="ourambulances.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO ambulances VALUES('','$a')");
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("You Have Successfully Registered A New Ambulance");
			window.location="ourambulances.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Ambulance Could Not Be Added");			
			window.location="ourambulances.php";
			</script>
		<?php }
	}
}




















elseif(isset($_GET['declineappo']))
{
	$a=$_GET['declineappo'];
	$sql=mysqli_query($con,"UPDATE appointment SET appState='declined' WHERE appid='$a'");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Appointment Successfully Declined");
		window.location="myappoint.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Appointment Could Not Be Declined");
		window.location="myappoint.php";
		</script>
	<?php }
}





elseif(isset($_POST['setapp']))
{
	$a=$_POST['date'];
	$b=$_POST['time'];
	$c=$_POST['shiplan'];
	$d=$_POST['apwith'];
	$rdate = date("Y-m-d", strtotime($a));
	$date=date_create($a);
   $rdate=date_format($date,"Y-m-d");
	$sql=mysqli_query($con,"INSERT INTO appointment VALUES('','$rdate','$b','$c','pending','".$_SESSION['username']."','medic','$d')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Appointment Successfully Set");
		window.location="appoint1.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Appointment Could Not Be Set Right Now \nPlease Try Again Later");
		window.location="appoint.php";
		</script>
	<?php }
 }






 
 elseif(isset($_POST['setapp2']))
{
	$a=$_POST['date'];
	$b=$_POST['time'];
	$c=$_POST['shiplan'];
	$d=$_POST['apwith'];
	$rdate = date("Y-m-d", strtotime($a));
	$date=date_create($a);
   $rdate=date_format($date,"Y-m-d");
   $app=$_POST['appid'];
	$sql=mysqli_query($con,"INSERT INTO appointment VALUES('','$rdate','$b','$c','pending','".$_SESSION['username']."','medic','$d')");
	if($sql)
	{ 
	mysqli_query($con,"UPDATE appointment SET appState='Rescheduled' WHERE appid='$app'");
?>
		<script type="text/Javascript">
		alert("Appointment Successfully Rescheduled");
		window.location="myappoint.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Appointment Could Not Be Rescheduled Right Now \nPlease Try Again Later");
		window.location="myappoint.php";
		</script>
	<?php }
 }




 elseif(isset($_POST['setrse']))
{
	$a=$_POST['date'];
	$b=$_POST['time'];
    $route=$_POST['rut'];
	$ry=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM ambroute WHERE ambrouteid='$route'"));
	$travel='Ambulance Request to '.$ry['ambRoute'];
	$c=$_POST['shiplan'].$travel;
	$rdate = date("Y-m-d", strtotime($a));
	$date=date_create($a);
   $rdate=date_format($date,"Y-m-d");
	$sql=mysqli_query($con,"INSERT INTO appointment VALUES('','$rdate','$b','$c','pending','".$_SESSION['username']."','ambulance')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("You Have Successfully Sent An Ambulance Request");
		window.location="ambulances.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Ambulance Request Could Not Be Sent \nPlease Try Again Later");
		window.location="ambulances.php";
		</script>
	<?php }
 }













 
 elseif(isset($_POST['sendmsg']))
 {
	 $a=$_POST['recepient'];
	 $b=$_POST['subject'];
	 $c=$_POST['shiplan'];
	 $d=date('Y-m-d');
	 	if ($_FILES['file']['size'] > 0)
				   {
	$file = $_FILES ['file'];
	$name = $file ['name'];
	$type = $file ['type'];
	$size = $file ['size'];
	$tmppath = $file ['tmp_name'];

if($name==""){
	$name = $file ['name'];
	}
	else{
		$name = time()."_".$file ['name'];
		}

move_uploaded_file ($tmppath, '../uploads/'.$name);
					 }
		$sql=mysqli_query($con,"INSERT INTO msgs VALUES('','$b','$d','".$_SESSION['username']."','$a','$c','$name','active')");
			if($sql)
			{ ?>
				<script type="text/Javascript">
				alert("Message Successfully Sent");
				window.location="messages.php?user=<?php echo $_SESSION['username'];?>";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("Message Not Sent");
				window.location="messages.php?user=<?php echo $_SESSION['username'];?>";
				</script>
			<?php }
 }



 elseif(isset($_POST['respondmsg']))
 {
	 $msg=$_POST['msgid'];
	 $response=$_POST['shiplan'];
  	 $d=date('Y-m-d');
	 	if ($_FILES['file']['size'] > 0)
				   {
	$file = $_FILES ['file'];
	$name = $file ['name'];
	$type = $file ['type'];
	$size = $file ['size'];
	$tmppath = $file ['tmp_name'];

if($name==""){
	$name = $file ['name'];
	}
	else{
		$name = time()."_".$file ['name'];
		}

move_uploaded_file ($tmppath, 'uploads/'.$name);
					 }
		$sql=mysqli_query($con,"INSERT INTO msgresponses VALUES('','$response','$date','".$_SESSION['username']."','$name','$msg') ");
			if($sql)
			{ ?>
				<script type="text/Javascript">
				alert("Response Successfully Sent");
				window.location="messages.php";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("Message Not Sent");
				window.location="messages.php";
				</script>
			<?php }
 }





elseif(isset($_POST['create']))
{
	$a=$_POST['namesurname'];
	$b=$_POST['email'];
	$c=$_POST['password'];
	$d=$_POST['confirm'];
	$e=$_POST['username'];
	$key=getrkey('patients','fileNo');
	$date=date('Y-m-d');
	if($c<>$d)
	{ ?>
		<script type="text/Javascript">
		alert("The Passwords You Entered Do Not Match. \nPlease Enter Matching Passwords");
		window.location="index.php";
		</script>
	<?php }
	elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM ulogin WHERE username='$e'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Username You Entered Is Already In Use\nPlease Try Again, With A Different Username");
		window.location="index.php";
		</script>
	<?php }
	elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM people WHERE phone='$b'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Phone Number You Entered Is Already Registered\nPlease Go Ahead And Login If You Are The One");
		window.location="index.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO people(fname,phone) VALUES('$a','$b')");
		$id=mysqli_insert_id();
		mysqli_query($con,"INSERT INTO ulogin VALUES('$e','$c','patient','','','active')");
		$sql2=mysqli_query($con,"INSERT INTO patients(fileNo,regDate,people_pid) VALUES('$key','$date','$id')");
		if($sql && $sql2)
		{  
		header("location:signin.php?msg=Account Successfully Created");
		}
		else
		{ ?>
			<script type="text/Javascript">
			alert("Account Could Not Be Created\nPlease Try Again");
			window.location="index.php";
			</script>
		<?php }
	}
}










elseif(isset($_POST['newro']))
{
	$a=$_POST['route'];
	$b=$_POST['cost'];
	$sql=mysqli_query($con,"INSERT INTO ambRoute VALUES('','$a','$b')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Route Succesfully Added");
		window.location="ourambulances3.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Route Could Not Be Added");
		window.location="ourambulances2.php";
		</script>
	<?php }
}





elseif(isset($_POST['addinsure']))
{
	$a=$_POST['name'];
	$b=$_POST['address'];
	$c=$_POST['fon'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT  * FROM insurecompanies WHERE insureName='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Insurance Company You Are Trying To Add Already Exists");
		window.location="insurance.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO insurecompanies VALUES('','$a','$b','$c')");
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("You Have Successfully Added A New Insurance Company");
			window.location="insurance.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Insurance Company Could Not Be Added");
			window.location="insurance.php";
			</script>
		<?php }
	}
}










elseif(isset($_POST['addpatient']))
{
	$a=$_POST['patientname'];
	$b=$_POST['sex'];
	$c=$_POST['age'];
	$d=$_POST['weight'];
	$e=$_POST['fon'];
	$f=$_POST['district'];
	$g=$_POST['village'];
	$key=getrkey('patients','fileNo');
	$doc=$_POST['ulevel'];
	$date=date('Y-m-d');
	mysqli_query($con,"INSERT INTO people(fname,gender,phone) VALUES('$a','$b','$e')");
	$id=mysqli_insert_id($con);
	$sql=mysqli_query($con,"INSERT INTO patients VALUES('$key','$date','$c','$id','$d','$f','$g')");
	mysqli_query($con,"INSERT INTO patientvisits VALUES('','$date','$key','','pending','$doc')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Patient Successfully Registered");
		window.location="rpatients.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Patient Could Not Be Registered");
		window.location="rpatients.php";
		</script>
	<?php }
}







elseif(isset($_POST['regscan']))
{
	$a=$_POST['branch'];
	$c1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $c1))
							{
							$c = str_replace(',','',$c1); } else { 
								$c=$c1;
								}
	$b=$_POST['stype'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM pscans WHERE pscan='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Scan You Are Adding Already Exists");
		window.location="addScan.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO pscans VALUES('','$a','$c','$b')");
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("You Have Successfully Added A New Scan");
			window.location="addScan.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Scan Could Not Be Added");
			window.location="addScan.php";
			</script>
		<?php }
	}
}

elseif(isset($_POST['regdept']))
{
	$a=$_POST['fname'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM udepart WHERE udepr='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Department You Are Adding Already Exists");
		window.location="users.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO udepart VALUES('','$a')");
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("Department Succesfully Added");
			window.location="users.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Department Could Not Be Added");
			window.location="users.php";
			</script>
		<?php }
	}
}
elseif(isset($_POST['additem']))
{
	$atit=$_POST['actitle'];
	$b=$_POST['cat'];
	$c=$_POST['subcat'];
	$d=$_POST['actype']; 
	$code="";
							 if($b=='Asset')
							 {
							 $a=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chartitem WHERE chartcat='Asset'"));
$new=$a+1;
$format=010000;
if($a<10)
{
$code='01000'.$new;
}
elseif(($a<100)&&($a>9))
{
$code='0100'.$new;
}
elseif(($a>99)&&($a<1000))
{
$code='010'.$new;
}
else
{
$code='01'.$new;
}
							 
							 }
							 elseif($b=='Liability')
							 {
							  $a=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chartitem WHERE chartcat='Liability'"));
$new=$a+1;
$format=050000;
if($a<10)
{
$code='05000'.$new;
}
elseif(($a<100)&&($a>9))
{
$code='0500'.$new;
}
elseif(($a>99)&&($a<1000))
{
$code='050'.$new;
}
else
{
$code='05'.$new;
}
						
							 }
							 elseif($b=='Expenses')
							 {
							  $a=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chartitem WHERE chartcat='Expenses'"));
$new=$a+1;
$format=030000;
if($a<10)
{
$code='03000'.$new;
}
elseif(($a<100)&&($a>9))
{
$code='0300'.$new;
}
elseif(($a>99)&&($a<1000))
{
$code='030'.$new;
}
else
{
$code='03'.$new;
}
							 }
							 else
							{
		$a=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chartitem WHERE chartcat='Revenue'"));
$new=$a+1;
$format=020000;
if($a<10)
{
$code='02000'.$new;
}
elseif(($a<100)&&($a>9))
{
$code='0200'.$new;
}
elseif(($a>99)&&($a<1000))
{
$code='020'.$new;
}
else
{
$code='02'.$new;
}		
}
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM chartitem WHERE accname='$atit' AND chartcat='$b'"))>0)
							{ ?><script type="text/Javascript">
							alert("The Chart Item You Are Trying To Add Already Exists.\n Data Not Saved");
							window.location="javascript:history.go(-)";
							</script>
							<?php }
							else{
							    $sql=="";
							$vote=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM vote WHERE votes='$c'"));
								    if($c=='Fixed Assets')
							  {
							      $sql=mysqli_query($con,"INSERT INTO chartitem VALUES('$code','$atit','$b','$d',14)");

							  }  
						        else{
							$sql=mysqli_query($con,"INSERT INTO chartitem VALUES('$code','$atit','$b','$d','".$vote['idvote']."')");
						        }
							 if($sql)
							{?>
								<script type="text/Javascript">
								alert("Item Successfully Added To Chart");
								window.location="chart.php";
								</script>
						<?php 	}
						else
						{?>
							<script type="text/Javascript">
							alert("Item Could Not Be Added To Chart\nA Technical Error Seems To Have Occured");
							window.location="chart.php";
							</script>
						<?php }
							}
							}

							elseif(isset($_POST['addvote']))
							{
								$a=$_POST['vote'];
								if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM vote WHERE votes='$a'"))>0)
								{?>
							<script type="text/Javascript">
							alert("The Vote You Are Trying To Add Already Exists\nPlease Enter A Different Vote");
							window.location="javascript:history.go(-1)";
							</script>
							<?php }
							else
							{
								$sql=mysqli_query($con,"INSERT INTO vote VALUES('','$a')");
								if($sql)
								{?>
									<script type="text/Javascript">
									alert("A New Vote Has Been Successfully Added");
									window.location="chart.php";
									</script>
								<?php }
								else
								{?>
									<script type="text/Javascript">
									alert("A New Vote Could Not Be Added");
									window.location="chart.php";
									</script>
								<?php }
							}
							}							
elseif(isset($_POST['addpatients']))
{
	$a=$_POST['patientname'];
	$b=$_POST['sex'];
	$c=$_POST['age'];
	$d=$_POST['weight'];
	$e=$_POST['fon'];
	$f=$_POST['district'];
	$g=$_POST['village'];
	$key=$_POST['fileno'];
	$date=date('Y-m-d');
	mysqli_query($con,"UPDATE patients SET ageBrac='$c',weight='$d',district='$f',village='$g' WHERE fileNo='$key'");
	 $sql=mysqli_query($con,"INSERT INTO patientvisits VALUES('','$date','$key','','pending')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Patient Successfully Received");
		window.location="rpatients.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Patient Could Not Be Received");
		window.location="rpatients.php";
		</script>
	<?php }
}
elseif(isset($_POST['closeday']))
{
	$a=$_POST['oball'];
	$b=$_POST['cashsales'];
	$c=$_POST['creditsales'];
	$d=$_POST['cashpurchase'];
	$e=$_POST['creditpurchase'];
	$f=$_POST['expenses'];
	$g=$_POST['invpaid'];
	$h=$_POST['debtspaid']; 
	$date=$_POST['date'];
	$balo=$_POST['closebal'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$date'"))>0)
	{
		$sql=mysqli_query($con,"UPDATE closedtransactions SET closebal='$balo',creditSales='$c',stockPurchases='$d',totalExpenses='$f',invoicesPaid='$g',debtsRecovered='$h',Obal='$a',creditPurchases='$e',cashSales='$b' WHERE closeDate='$date'");
	}
	else
	{
		$sql=mysqli_query($con,"INSERT INTO closedtransactions VALUES('','$a','$b','$c','$d','$f','$g','$h','$e','$balo','$date')");
	}
	if($sql)
	{?>
		<script type="text/Javascript">
		alert("Days Transactions Successfully Closed");
		window.location="home.php";
		</script>
	<?php }
	else
	{?>
		<script type="text/Javascript">
		alert("Days Transactions Could Not Be Closed");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
}

















elseif(isset($_POST['paysalary']))
{
	$a=$_POST['fname'];
	$b=$_POST['year'];
	$c=$_POST['month'];
	$d1=$_POST['amountpaid'];
	if(preg_match("/^[0-9,]+$/", $d1))
							{
							$d = str_replace(',','',$d1); } else { 
								$d=$d1;
								} 
	$e=$_POST['paydate'];
	$as=mysqli_query($con,"SELECT * FROM econtracts WHERE fname='$a' AND year='$b'");
	$real=mysqli_fetch_array($as); $payable=$real['payAmount']-$real['payee']-$real['nssf1'];
	//pick employee position
	$empos=mysqli_fetch_array(mysqli_query($con,"SELECT  ecat FROM employeecat,employee WHERE employeeCat_idemployeeCat=idemployeeCat AND idemployee='$a'"));
	
	//let's find the balance incase of installment payment
	$ba=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(pamount) AS am FROM salaries WHERE 
	econtracts_idecontracts='".$real['idecontracts']."' AND pmonth='$c' AND pyear='$b'"));
	$bal=$payable-$ba['am'];
	//end it
	if(mysqli_num_rows($as)<1)
	{?>
		<script type="text/Javascript">
		alert(<?php echo $a; ?>+"'s Contract Details For "+<?php echo $b;?>+" Could Not Be Found");
		window.location="employees.php";
		</script>
<?php	}
		elseif($d>$payable)
		{?>
			<script type="text/Javascript">
			alert(<?php echo $a; ?>+" Is On A Scale Of "+<?php echo $d;?>+". You Are Trying To Pay More");
			window.location="employees.php";
			</script>
		<?php }
		elseif($d>$bal)
		{?>
		<script type="text/Javascript">
		alert(<?php echo $a; ?>+" Has A Balance Of "+<?php echo $bal;?>+ " In "+<?php echo $c.' '.$b?>+". You Are Trying To Pay More");
		window.location="employees.php";
		</script>
		<?php }
		else
		{
			$sql=mysqli_query($con,"INSERT INTO salaries VALUES('','$e','$d','$c','$b','".$real['idecontracts']."')");
			$empdetai=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM employee,people WHERE idemployee='$a' AND peopleid=people"));
			$reason="Staff Salary For ".$empos['ecat'];
			mysqli_query($con,"INSERT INTO expenditure(amount,edate,subVote,user) VALUES('$d','$e','$reason','".$_SESSION['username']."')");
			$exid=mysqli_insert_id(); 
			if($sql)
			{?>
		<script type="text/Javascript">
		alert("Salary Payment Information Successfully Saved");
		window.location="employees.php";
		</script>
		<?php }
		else
		{?>
			<script type="text/Javascript">
			alert("Salary Payment Information Could Not Be Saved\nA Technical Error Seems To Have Occured");
			window.location="employees.php";
			</script>
		<?php }
		}
}



















elseif(isset($_POST['addasset']))
{
	$item=$_POST['accname'];
	$b=$_POST['pdate'];
	$c1=$_POST['pvalue'];
	if(preg_match("/^[0-9,]+$/", $c1))
							{
							$c = str_replace(',','',$c1); } else { 
								$c=$c1;
								} 
	$d=$_POST['pqty'];
	$qty=$_POST['qtype'];
	$e='Asset';
	$f='Item'; 
$a=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chartitem WHERE chartcat='Asset'"));
$new=$a+1;
$format=010000;
if($a<10)
{
$code='010000'.$new;
}
elseif(($a<100)&&($a>9))
{
$code='01000'.$new;
}
elseif(($a>99)&&($a<1000))
{
$code='0100'.$new;
}
else
{
$code='010'.$new;
}
mysqli_query($con,"INSERT INTO chartitem VALUES('$code','$item','$e','$f',14)");							 
$sql=mysqli_query($con,"INSERT INTO stock VALUES('$code','$c','$b','$d','$code')");
if($sql)
{?>
	<script type="text/Javascript">
	alert("You Have Successfully Registered A New Asset");
	window.location="assets.php";
	</script>
<?php }
else
{?>
<script type="text/Javascript">	
alert("Asset Could Not Be Added");
window.location="assets.php";
</script>
<?php }	
}
elseif(isset($_POST['valasset']))
{
	$a=$_POST['asset'];
	$b=$_POST['pdate'];
	$c=$_POST['pvalue'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM stock,chartitem WHERE chartcode=chartItem_chartcode AND accname='$a'"))<1)
	{?>
		<script type="text/Javascript">
		alert("Details Of The Asset You Entered Could Not Be Found\nPlease Check The Spelling Or First Register The Asset");
		window.location="assets.php";
		</script>
	<?php }
	else
	{
		$sto=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM stock,chartitem WHERE chartcode=chartItem_chartcode AND accname='$a'"));
		$sql=mysqli_query($con,"INSERT INTO stockvalue VALUES('','$c','$b','".$sto['idstock']."')");
		if($sql)
		{?>
			<script type="text/Javascript">
			alert("Asset Valuation Info Added Successfully");
			window.location="assets.php";
			</script>
		<?php }
		else
		{?>
			<script type="text/Javascript">
			alert("Asset Valuation Info Could Not Be Added\nA Technical Error Seems To Have Occured");
			window.location="assets.php";
			</script>
		<?php }
	}
}
elseif(isset($_POST['payservice']))
{
	$date=pickworkdae();
	$servid=$_POST['servid'];
	$clientbill=$_POST['payamount'];
	$clientpaid=$_POST['paid'];
	$client=mysqli_real_escape_string($_POST['client']);
	$scost1=$_POST['cubal'];
	if(preg_match("/^[0-9,]+$/", $scost1))
							{
							$scost = str_replace(',','',$scost1); } else { 
								$scost1=$scost1;
					 }
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$date'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\nSales Records Not Added");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
		//find key for payments
			$sql=mysqli_num_rows(mysqli_query($con,"SELECT idpayments FROM  payments "));
		$new=$sql+1;
$format=010000;
if($sql<10)
{
$key1='01000'.$new;
}
elseif(($sql<100)&&($sql>9))
{
$key1='0100'.$new;
}
elseif(($sql>99)&&($sql<1000))
{
$key1='010'.$new;
}
else
{
$key1='01'.$new;
}
			//end finding key for payments
			//find key for service sale
			$sql2=mysqli_num_rows(mysqli_query($con,"SELECT idpayments FROM  payments "));
		$new2=$sql2+1;
if($sql2<10)
{
$key2='01000'.$new2;
}
elseif(($sql2<100)&&($sql2>9))
{
$key2='0100'.$new2;
}
elseif(($sql2>99)&&($sql2<1000))
{
$key2='010'.$new2;
}
else
{
$key2='01'.$new2;
}
			//end finding key for service sale
		//first find any balance from the paid amount
		$bal=$clientbill-$clientpaid;
		$query1="";$query2="";
			if($bal==0)
			{	
				$query1=mysqli_query($con,"INSERT INTO payments VALUES('$key1','$clientbill','$clientbill','$date')");
				$query2=mysqli_query($con,"INSERT INTO servsales VALUES('$key2','$date','$client','$servid','$scost','$clientbill','$clientpaid','$key1','cash','paid')");
			}
			else
			{
					$query1=mysqli_query($con,"INSERT INTO payments VALUES('$key1','$clientbill','','$date')");
				   $query2=mysqli_query($con,"INSERT INTO servsales VALUES('$key2','$date','$client','$servid','$scost','$clientbill','$clientpaid','$key1','credit','not paid')");
			}
			
			if($query1 && $query2)
			{ 
		$_SESSION['receipt']=$key2;
		?>
				<script type="text/Javascript">
				alert("Transaction Successfully Saved");
				window.location="servreceipt.php";
				</script>
			<?php }
			else 
			{ ?>
				<script type="text/Javascript">
				alert("Transaction Could Not Be Saved");
				window.location="inventory.php";
				</script>
			<?php }
	}
}
elseif(isset($_POST['savebill']))
{
	$cliet=$_POST['client'];
	$date=$_POST['date'];
	$inscompany=$_POST['insure'];
	$trantype=$_POST['stype'];
	$clienttype=$_POST['supplier'];
	$bill=$_POST['total'];
	$paid="";
	if($trantype=='cash')
	{
		$paid=$bill;
	}
	else
	{
		$paid=0;
	}
	$sql=mysqli_query($con,"INSERT INTO patientbillssummary VALUES('','$cliet','$bill','$paid',
	'$clienttype','$date','$trantype','$inscompany')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Bill successfully Created");
		window.location="patientaccounts.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Bill Could Not Be Created");
		window.location="patientaccounts.php";
		</script>
	<?php }
}
elseif($_POST['makesale'])
{
	$itemid=$_POST['drugs'];
	$itemname=$_POST['itemNo'];
	$itemprice=$_POST['price'];
	$itemqty=$_POST['quantity'];
	$itemtotal=$_POST['total'];
	$totalcost=$_POST['rtotal'];
	$trandate=$_POST['date'];
	$tranid=$_POST['trnumber'];
	$clients=$_POST['supplier'];
	$trantype=$_POST['stype'];
	$prid=$_POST['pvisit'];
	//find client 
	if(mysqli_num_rows(mysqli_query($con,"SELECT idclients FROM clients WHERE clientNam='$clients'"))>0)
	{
		$rclient=mysqli_fetch_array(mysqli_query($con,"SELECT idclients FROM clients WHERE clientNam='$clients'"));
		$client=$rclient['idclients'];
	}
	else
	{
		mysqli_query($con,"INSERT INTO clients(clientNam) VALUES('$clients')");
		$client=mysqli_insert_id();
	}
	  
		{
			//find key for payments
			$sql=mysqli_num_rows(mysqli_query($con,"SELECT idpayments FROM  payments "));
		$new=$sql+1;
$format=010000;
if($sql<10)
{
$key='01000'.$new;
}
elseif(($sql<100)&&($sql>9))
{
$key='0100'.$new;
}
elseif(($sql>99)&&($sql<1000))
{
$key='010'.$new;
}
else
{
$key='01'.$new;
}
			//end finding key for payments
			$query1="";$query2="";
			if($trantype<>'debt')
			{	
				$query1=mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalcost','$totalcost','$trandate')");
				$query2=mysqli_query($con,"INSERT INTO salesummary VALUES('$tranid','$trandate','cash','$client','".$_SESSION['username']."','$key','$paid','$totalcost')");
			}
			else
			{
				$query1=mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalcost',0,'$trandate')");
				$query2=mysqli_query($con,"INSERT INTO salesummary VALUES('$tranid','$trandate','credit','$client','".$_SESSION['username']."','$key','not paid','$totalcost')");			
			}
			for($i=0; $i<count($itemid); $i++)
			{
				$idetails=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM services WHERE sname='".$itemname[$i]."'"));
				$newqty=$idetails['sqty']-$itemqty[$i];
				mysqli_query($con,"UPDATE services SET sqty='$newqty' WHERE sname='".$itemname[$i]."'");
				$query3=mysqli_query($con,"INSERT INTO sales VALUES('','".$itemqty[$i]."','Pcs','".$itemprice[$i]."','".$itemtotal[$i]."','".$idetails['idservices']."','$tranid',1)");
			}
			if( $query1 && $query2 && $query3)
			{   
			$_SESSION['receipt']=$tranid;
			mysqli_query($con,"UPDATE patientprescriptions SET prescStatus='done' WHERE prescrid='$prid'");
		?>
				 <script type="text/Javascript">
				 alert("Transaction Successfully Saved");
				 window.location="issuedrug.php";
				 </script>
			<?php }
			else
			{   ?>
				<script type="text/Javascript">
				alert("Transaction Could Not Be Saved");
				window.location="issuedrug.php";
				</script>
		<?php 	}
		}
	}





elseif($_POST['makesaler'])
{
	$itemid=$_POST['drugs'];
	$itemname=$_POST['itemNo'];
	$itemprice=$_POST['price'];
	$itemqty=$_POST['quantity'];
	$itemtotal=$_POST['total'];
	$totalcost=$_POST['rtotal'];
	$trandate=$_POST['date'];
	$tranid=$_POST['trnumber'];
	$clients=$_POST['supplier'];
	$trantype=$_POST['stype'];
	$prid=$_POST['pvisit'];
	$person=$_POST['deliverperson'];
	//find client 
	if(mysqli_num_rows(mysqli_query($con,"SELECT idclients FROM clients WHERE clientNam='$clients'"))>0)
	{
		$rclient=mysqli_fetch_array(mysqli_query($con,"SELECT idclients FROM clients WHERE clientNam='$clients'"));
		$client=$rclient['idclients'];
	}
	else
	{
		mysqli_query($con,"INSERT INTO clients(clientNam) VALUES('$clients')");
		$client=mysqli_insert_id($con);
	}
	  
		{
			//find key for payments
			$sql=mysqli_num_rows(mysqli_query($con,"SELECT idpayments FROM  payments "));
		$new=$sql+1;
$format=010000;
if($sql<10)
{
$key='01000'.$new;
}
elseif(($sql<100)&&($sql>9))
{
$key='0100'.$new;
}
elseif(($sql>99)&&($sql<1000))
{
$key='010'.$new;
}
else
{
$key='01'.$new;
}
			//end finding key for payments
			$query1="";$query2="";
			if($trantype<>'debt')
			{	
				$query1=mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalcost','$totalcost','$trandate')");
				$query2=mysqli_query($con,"INSERT INTO salesummary VALUES('$tranid','$trandate','cash','$client','".$_SESSION['username']."','$key','$paid','$totalcost')");
			}
			else
			{
				$query1=mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalcost',0,'$trandate')");
				$query2=mysqli_query($con,"INSERT INTO salesummary VALUES('$tranid','$trandate','credit','$client','".$_SESSION['username']."','$key','not paid','$totalcost')");			
			}
			for($i=0; $i<count($itemid); $i++)
			{
				$idetails=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM services WHERE sname='".$itemname[$i]."'"));
				$newqty=$idetails['sqty']-$itemqty[$i];
				mysqli_query($con,"UPDATE services SET sqty='$newqty' WHERE sname='".$itemname[$i]."'");
				$query3=mysqli_query($con,"INSERT INTO sales VALUES('','".$itemqty[$i]."','Pcs','".$itemprice[$i]."','".$itemtotal[$i]."','".$idetails['idservices']."','$tranid',1)");
			}
















			if( $query1 && $query2 && $query3)
			{   
			$_SESSION['receipt']=$tranid;
			mysqli_query($con,"UPDATE drugordersummary SET orderStatus='done' WHERE idsaleSummary='$prid'");
			mysqli_query($con,"INSERT INTO deliverOrders VALUES('','$prid','$person','pending')");
		?>
				 <script type="text/Javascript">
				 alert("Transaction Successfully Saved");
				 window.location="drgorders.php";
				 </script>
			<?php }







			else
			{   ?>
				<script type="text/Javascript">
				alert("Transaction Could Not Be Saved");
				window.location="drgorders.php";
				</script>
		<?php 	}
		}
	}

elseif($_POST['createproforma'])
{
	$itemid=$_POST['drugs'];
	$itemname=$_POST['itemNo'];
	$itemprice=$_POST['price'];
	$itemqty=$_POST['quantity'];
	$itemtotal=$_POST['total'];
	$totalcost=$_POST['rtotal'];
	$trandate=$_POST['date'];
	$tranid=$_POST['trnumber'];
	$clients=$_POST['supplier'];
	$trantype=$_POST['stype'];
	//find client 
	if(mysqli_num_rows(mysqli_query($con,"SELECT idclients FROM clients WHERE clientNam='$clients'"))>0)
	{
		$rclient=mysqli_fetch_array(mysqli_query($con,"SELECT idclients FROM clients WHERE clientNam='$clients'"));
		$client=$rclient['idclients'];
	}
	else
	{
		mysqli_query($con,"INSERT INTO clients(clientNam) VALUES('$clients')");
		$client=mysqli_insert_id();
	}
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$trandate'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\n Proforma Not Created");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
		if(count($itemid)<1)
		{ ?>
			<script type="text/Javascript">
			alert("Please specify atleast one item inorder to create a proforma");
			window.location="proformas.php";
			</script>
		<?php }
		else
		{
			 
			 $query2=mysqli_query($con,"INSERT INTO proformasummary VALUES('$tranid','$trandate','$client','".$_SESSION['username']."','$totalcost')");			
			 for($i=0; $i<count($itemid); $i++)
			{
				$idetails=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM services WHERE sname='".$itemname[$i]."'"));
				$newqty=$idetails['sqty']-$itemqty[$i];
				 	$query3=mysqli_query($con,"INSERT INTO proformas VALUES('','".$itemqty[$i]."','Pcs','".$itemprice[$i]."','".$itemtotal[$i]."','".$idetails['idservices']."','$tranid',1)");
			}
			if( $query2 && $query3)
			{   
			$_SESSION['receipt']=$tranid;
		?>
				 <script type="text/Javascript">
				 alert("Proforma Successfully Created");
				 window.location="proformaprint.php";
				 </script>
			<?php }
			else
			{   ?>
				<script type="text/Javascript">
				alert("Proforma Could Not Be Saved");
				window.location="proformas.php";
				</script>
		<?php 	}
		}
	}
}
elseif(isset($_GET['confirmdeliv']))
{  
	$ct=mysqli_query($con,"UPDATE deliverorders SET rdelivStatus='delivered' WHERE rdeliverOrder='".$_GET['confirmdeliv']."'");
	if($ct)
	{ ?>
		<script type="text/Javascript">
		alert("You Have Successfully Confirmed Delivery Of That Order");
		window.location="mydeliveries.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Delivery Could Not Be Confirmed");
		window.location="mydeliveries.php";
		</script>
	<?php }
}







elseif(isset($_POST['regRoute']))
{
	$a=$_POST['name'];
	$b=$_POST['scontact'];
	$sql=mysqli_query($con,"INSERT INTO deliverRoutes VALUES('','$a','$b')");
	if($sql)
	{ ?>
	<script type="text/Javascript">	
	alert("Delivery Route Succesfully Added");
	window.location="sales.php";
	</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Delivery Route Could Not Be Added");
		window.location="sales.php";
		</script>
	<?php }
}
elseif(isset($_POST['registerservice']))
{
	$a=$_POST['branch'];
	$c1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $c1))
							{
							$c = str_replace(',','',$c1); } else { 
								$c=$c1;
								} 
	$tre=$_POST['tserv'];
		if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM services WHERE sname='$a'"))>0)
		{ ?>
			<script type="text/Javascript">
			alert("The service you are registering already exists");
			window.location="services.php";
			</script>
		<?php }
		else
		{	$sx="";
			if($tre<>'scan')
			{
			$sx=mysqli_query($con,"INSERT INTO services(idservices,sname,sprice,itemType) VALUES('','$a','$c','service')");
			}
			else
			{
				$sx=mysqli_query($con,"INSERT INTO pscans VALUES('','$a','$c')");
			}
			if($sx)
			{ ?>
				<script type="text/Javascript">
				alert("You have successfully registered a new service");
				window.location="inventory.php";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("The service could not be registered");
				window.location="inventory.php";
				</script>
			<?php }
		}
}
elseif(isset($_POST['regtest']))
{
	$a=$_POST['branch'];
	$c1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $c1))
							{
							$c = str_replace(',','',$c1); } else { 
								$c=$c1;
								} 
	 if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM services WHERE sname='$a'"))>0)
		{ ?>
			<script type="text/Javascript">
			alert("The Test you are registering already exists");
			window.location="addTest.php";
			</script>
		<?php }
		else
		{	 
			$sx=mysqli_query($con,"INSERT INTO services(idservices,sname,sprice,itemType) VALUES('','$a','$c','tests')");
			 
			if($sx)
			{ ?>
				<script type="text/Javascript">
				alert("You have successfully registered a new test");
				window.location="addTest.php";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("The test could not be registered");
				window.location="addTest.php";
				</script>
			<?php }
		}
}








elseif(isset($_POST['addpatientnotes']))
{
	$patid=$_POST['patid'];
	$notes=mysqli_real_escape_string($_POST['shiplan']);
	$iftolab=$_POST['sendlab'];
	$realtests=$_POST['tests'];
	$iftoscan=$_POST['sendtoscan'];
	$realscans=$_POST['tests'];
	//$ifprescribe=$_POST['prescribe'];
	//$realprescribe=$_POST['tablets'];
	$ifadmit=$_POST['admitpatient'];
	$link='addnotes.php?pat='.$patid;
	$date=date('Y-m-d');
	if((count($realtests)<1) && $iftolab=='yes')
	{ ?>
		<script type="text/Javascript">
		alert("You Haven't Specified Any Tests");
		window.location=<?php echo $link;?>;
		</script>
	<?php }
	elseif((count($realscans)<1) && $iftoscan=='yes')
	{ ?>
		<script type="text/Javascript">
		alert("You Haven't Specified Any Scan");
		window.location=<?php echo $link;?>;		
		</script>
	<?php } 
	else
	{	
		$sql=mysqli_query($con,"UPDATE patientvisits SET visitResult='$notes',vstate='seen' WHERE patients_fileNo='$patid'");
		//pick the visit id
		$vid=mysqli_fetch_array(mysqli_query($con,"SELECT pvid FROM patientvisits WHERE patients_fileNo='$patid' ORDER BY pvid DESC LIMIT 1"));
		$pid=$vid['pvid']; $adid='';
		if($ifadmit=='yes')
		{
			mysqli_query($con,"INSERT INTO admissions(admissionDate,adState,dischargeDate,dremarks,adPatid) VALUES('$date','active','','','$patid')");
			$adid=mysqli_insert_id();
		}
		//check for lab 
		if($iftolab=='yes')
		{	
	       mysqli_query($con,"INSERT INTO patienttestsummary(psvid,psadid,psPstatus) VALUES('$pid','$adid','pending')");
			$psmu=mysqli_insert_id();
			for($i=0; $i<count($realtests); $i++)
			{
			mysqli_query($con,"INSERT INTO patienttests VALUES('','".$realtests[$i]."','','pending','$psmu')");
			}
		}
		//check for scan
		if($iftoscan=='yes')
		{	
			mysqli_query($con,"INSERT INTO patientscansummary(psvid,psadid,psPstatus) VALUES('$pid','$did','pending')");
			$pscanid=mysqli_insert_id();
			for($i=0; $i<count($realscans); $i++)
			{
			mysqli_query($con,"INSERT INTO patientscans VALUES('','".$realscans[$i]."','','pending','$pscanid')");
			}
		}
		 
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("Patient Info Successfully Saved");
			window.location="doctornotes.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Patient Info Could Not Be Saved");
			window.location="doctornotes.php";
			</script>
		<?php }
	}
}










































elseif(isset($_POST['reviewpat']))
{
	$patid=$_POST['patid'];
	$notes=mysqli_real_escape_string($_POST['shiplan']);
	$iftolab=$_POST['sendlab'];
	$realtests=$_POST['tests'];
	$iftoscan=$_POST['sendtoscan'];
	$realscans=$_POST['tests'];
	//$ifprescribe=$_POST['prescribe'];
	//$realprescribe=$_POST['tablets'];
	$ifadmit=$_POST['admitpatient'];
	$link='addnotes.php?pat='.$patid;
	$date=date('Y-m-d');
	if((count($realtests)<1) && $iftolab=='yes')
	{ ?>
		<script type="text/Javascript">
		alert("You Haven't Specified Any Tests");
		window.location=<?php echo $link;?>;
		</script>
	<?php }
	elseif((count($realscans)<1) && $iftoscan=='yes')
	{ ?>
		<script type="text/Javascript">
		alert("You Haven't Specified Any Scan");
		window.location=<?php echo $link;?>;		
		</script>
	<?php } 
	else
	{	
		$sql=mysqli_query($con,"UPDATE patientvisits SET visitResult='$notes',vstate='seen' WHERE patients_fileNo='$patid'");
		//pick the visit id
		$vid=mysqli_fetch_array(mysqli_query($con,"SELECT pvid FROM patientvisits WHERE patients_fileNo='$patid' ORDER BY pvid DESC LIMIT 1"));
		$pid=$vid['pvid']; $adid='';
		if($ifadmit=='yes')
		{
			mysqli_query($con,"INSERT INTO admissions(admissionDate,adState,dischargeDate,dremarks,adPatid) VALUES('$date','active','','','$patid')");
			$adid=mysqli_insert_id();
		}
		//check for lab 
		if($iftolab=='yes')
		{	
	       mysqli_query($con,"INSERT INTO patienttestsummary(psvid,psadid,psPstatus) VALUES('$pid','$adid','pending')");
			$psmu=mysqli_insert_id();
			for($i=0; $i<count($realtests); $i++)
			{
			mysqli_query($con,"INSERT INTO patienttests VALUES('','".$realtests[$i]."','','pending','$psmu')");
			}
		}
		//check for scan
		if($iftoscan=='yes')
		{	
			mysqli_query($con,"INSERT INTO patientscansummary(psvid,psadid,psPstatus) VALUES('$pid','$did','pending')");
			$pscanid=mysqli_insert_id();
			for($i=0; $i<count($realscans); $i++)
			{
			mysqli_query($con,"INSERT INTO patientscans VALUES('','".$realscans[$i]."','','pending','$pscanid')");
			}
		}
		 
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("Patient Info Successfully Saved");
			window.location="doctornotes.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Patient Info Could Not Be Saved");
			window.location="doctornotes.php";
			</script>
		<?php }
	}
}
elseif(isset($_POST['enterLabResults']))
{
	$a=$_POST['test'];
	$b=$_POST['results'];
	$testit=$_POST['visit'];
	$sql=mysqli_query($con,"UPDATE patienttestsummary SET psPstatus='done' WHERE psid='$testit'");
	for($i=0; $i<count($a); $i++)
	{
		mysqli_query($con,"UPDATE patienttests SET ptestResult='".$b[$i]."',testStatus='done' WHERE ptest='".$a[$i]."' AND revid='$testit'");
	}
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Lab Results Successfully Saved");
		window.location="maketest.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Lab Results Could Not Be Saved");
		window.location="maketest.php";
		</script>
	<?php }
}
elseif(isset($_POST['enterScan']))
{
	$a=$_POST['test'];
	$b=$_POST['results'];
	$testit=$_POST['visit'];
	$sql=mysqli_query($con,"UPDATE patientscansummary SET psPstatus='done' WHERE psid='$testit'");
	for($i=0; $i<count($a); $i++)
	{
		mysqli_query($con,"UPDATE patientscans SET ptestResult='".$b[$i]."',testStatus='done' WHERE ptest='".$a[$i]."' AND revid='$testit'");
	}
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Scan Results Successfully Saved");
		window.location="makescan.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Scan Results Could Not Be Saved");
		window.location="makescan.php";
		</script>
	<?php }
}
elseif(isset($_POST['saverev']))
{
	$e1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $e1))
							{
							$e = str_replace(',','',$e1); } else { 
								$e=$e1;
								} 
	$sos=$_POST['sos'];
	$date=$_POST['rdate'];
	$sql=mysqli_query($con,"INSERT INTO incomes2 VALUES('','$sos','$e','$date','".$_SESSION['username']."')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Revenue Successfully Saved");
		window.location="banks.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Revenue Could Not Be Saved");
		window.location="banks.php";
		</script>
	<?php }
}
elseif(isset($_POST['savetransact']))
{
	$a=$_POST['bank'];
	$e1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $e1))
							{
							$e = str_replace(',','',$e1); } else { 
								$e=$e1;
								} 
	$c=$_POST['rdate'];
	$d=$_POST['stype'];
	$sql=mysqli_query($con,"INSERT INTO banktransactions VALUES('','$e','$c','$d','$a')");
	if($sql)
	{ ?>
		<script type="text/Javascript">
		alert("Transaction Successfully Saved");
		window.location="banks.php";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Transaction Could Not Be Saved");
		window.location="banks.php";
		</script>
	<?php }
}
elseif(isset($_POST['rbank']))
{
	$a=$_POST['accname'];
	$b=$_POST['accno'];
	$c=$_POST['bank'];
	$d=$_POST['branch'];
	$e1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $e1))
							{
							$e = str_replace(',','',$e1); } else { 
								$e=$e1;
								} 
		$sql=mysqli_query($con,"INSERT INTO banks VALUES('','$b','$a','$c','$d','$e')");
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("Bank Account Successfully Created");
			window.location="banks.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Bank Account Could Not Be Created");
			window.location="banks.php";
			</script>
		<?php }
}









elseif(isset($_POST['registeruser']))
{
	$a=$_POST['fname'];
	$b=$_POST['username'];
	$c=$_POST['pass1'];
	$d=$_POST['pass2'];
	$e=$_POST['ulevel'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM ulogin WHERE username='$b'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Username You Have Entered Is Already In Use");
		window.location="users.php";
		</script>
	<?php }
	else
	{
		if($c<>$d)
		{ ?>
			<script type="text/Javascript">
			alert("Please Enter Matching Passwords");
			window.location="users.php";
			</script>
		<?php }
		else
		{
			$query=mysqli_query($con,"INSERT INTO ulogin VALUES('$b','$c','$e','$a','','active')");
			if($query)
			{ ?>
				<script type="text/Javascript">
				alert("You Have Successfully Created A New User");
				window.location="users.php";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("New User Account Could Not Be Created");
				window.location="users.php";
				</script>
			<?php }
		}
	}
}
















elseif(isset($_POST['changepass']))
{
	$a=$_POST['pass1'];
	$b=$_POST['pass2'];
	$c=$_POST['pass3'];
	 if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE username='".$_SESSION['username']."' AND password='$a'"))<1)
	 { ?>
		 <script type="text/Javascript">
		 alert("The Password You Entered Does Not Match Any Exisiting Account\nPlease Make Sure You Enter A Correct Password Before You Reset Password");
		 </script>
	 <?php }
	 else
	 {
		 if($b<>$c)
		 { ?>
			 <script type="text/Javascript">
			 alert("The New Passwords You Entered Do Not Match\nPlease Enter Matching Passwords");
			 window.location="users.php";
			 </script>
		 <?php }
		 else
		 {
			 $query=mysqli_query($con,"UPDATE users SET password='$b' WHERE username='".$_SESSION['username']."'");
			 if($query)
			 { ?>
				 <script type="text/Javascript">
				 alert("You Have Successfully Changed Your Password\nYour New Password Will Be Active The Next Time You Login");
				 window.location="users.php";
				 </script>
			<?php  }
			else
			{ ?>
				<script type="text/Javascript">
				alert("Account Password Could Not Be Changed");
				window.location="users.php";
				</script>
			<?php }
		 }
	 }
}
elseif(isset($_POST['registerclient']))
{
	$client=$_POST['branch'];
	$contactperson=$_POST['cname'];
	$c=$_POST['cphone1'];
	$d=$_POST['cphone2']; $day=pickworkdae();
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM clients WHERE clientNam='$client'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The client you are registering already exists");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO clients VALUES('','$client','','$contactperson','$c','$d','$day')");
		if($sql)
		{ ?>
			<script type="text/Javascript">
			alert("You Have Successfully Registered A New Client");
			window.location="sales.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Client Could Not Be Registered");
			window.location="sales.php";
			</script>
		<?php }
	}
}
elseif(isset($_POST['payinvoice2']))
{
	$supplier=$_POST['sup'];
	$supplierid=$_POST['supid'];
	$invoice=$_POST['inv'];
	$curbal=$_POST['cubal'];
	$amountpaid=$_POST['payamount'];
	$paydate=pickworkdae();
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$paydate'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\nPayments Not Added");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
	$pr=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM payments,salesummary WHERE idsaleSummary='$invoice' AND payments_idpayments=idpayments"));
	$oldbalance=$pr['amountPaid'];$payable=$pr['amountPayable'];$oldpaid=$pr['amountPaid'];
	$newbalance=$oldbalance-$amountpaid; $paid=$oldpaid+$amountpaid;
	mysqli_query($con,"UPDATE payments SET amountPaid='$paid' WHERE idpayments='".$pr['payments_idpayments']."'");
	if($paid==$payable)
	{
		mysqli_query($con,"UPDATE salesummary SET pStatus='paid' WHERE idsaleSummary='$invoice'");
	}
	else
	{
		mysqli_query($con,"UPDATE salesummary SET pStatus='partial' WHERE idsaleSummary='$invoice'");
	}
	$query=mysqli_query($con,"INSERT INTO paydetails VALUES('','$amountpaid','$paydate','cash','".$_SESSION['username']."','".$pr['payments_idpayments']."')");
	if($query)
	{ ?>
		<script type="text/Javascript">
		alert("Payment Successfully Saved");
		window.location="invoices2.php?suppliers=<?php echo $supplierid; ?>&&supname=<?php echo $supplier;?>";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Payment Not Saved");
		window.location="invoices2.php?suppliers=<?php echo $supplierid; ?>&&supname=<?php echo $supplier;?>";
		</script>
	<?php }
}
}
elseif(isset($_POST['payinvoice3']))
{
	$supplier=$_POST['sup'];
	$supplierid=$_POST['supid'];
	$invoice=$_POST['inv'];
	$curbal=$_POST['cubal'];
	$amountpaid=$_POST['payamount'];
	$paydate=pickworkdae();
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$paydate'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\nPayments Not Added");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
	$pr=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM payments,servsales WHERE srvid='$invoice' AND paymentId=idpayments"));
	$oldbalance=$pr['amountPaid'];$payable=$pr['amountPayable'];$oldpaid=$pr['amountPaid'];
	$newbalance=$oldbalance-$amountpaid; $paid=$oldpaid+$amountpaid;
	mysqli_query($con,"UPDATE payments SET amountPaid='$paid' WHERE idpayments='".$pr['paymentId']."'");
	if($paid==$payable)
	{
		mysqli_query($con,"UPDATE servsales SET payStatus='paid' WHERE srvid='$invoice'");
	}
	else
	{
		mysqli_query($con,"UPDATE servsales SET payStatus='partial' WHERE srvid='$invoice'");
	}
	$query=mysqli_query($con,"INSERT INTO paydetails VALUES('','$amountpaid','$paydate','cash','".$_SESSION['username']."','".$pr['paymentId']."')");
	if($query)
	{ ?>
		<script type="text/Javascript">
		alert("Payment Successfully Saved");
		window.location="invoices3.php?suppliers=<?php echo $supplierid; ?>&&supname=<?php echo $supplier;?>";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Payment Not Saved");
		window.location="invoices3.php?suppliers=<?php echo $supplierid; ?>&&supname=<?php echo $supplier;?>";
		</script>
	<?php }
}
}













elseif(isset($_POST['addexpense']))
{
	$a=$_POST['branch'];
	$b1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $b1))
							{
							$b = str_replace(',','',$b1); } else { 
								$b=$b1;
								}
	$date=$_POST['rdate'];
	$expDetails=$_POST['expDetails'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$date'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\nExpenses Not Added");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
		$query=mysqli_query($con,"INSERT INTO expenditure VALUES('','$b','$a','".$_SESSION['username']."','$date','$expDetails','expense')");
		if($query)
		{ ?>
			<script type="text/Javascript">
			alert("Expenditure Successfully Saved");
			window.location="expenditure.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Expenditure Could Not Be Saved");
			window.location="expenditure.php";
			</script>
		<?php }
	}
}











elseif(isset($_POST['addvoch']))
{
	$a=$_POST['branch'];
	$b1=$_POST['cost'];
		if(preg_match("/^[0-9,]+$/", $b1))
							{
							$b = str_replace(',','',$b1); } else { 
								$b=$b1;
								}
	$date=$_POST['rdate']; $details=$_POST['details'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$date'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\nExpenses Not Added");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
		$query=mysqli_query($con,"INSERT INTO expenditure(amount,subVote,user,edate,expDetails,exType) VALUES('$b','$a','".$_SESSION['username']."','$date','$details','voucher')");
		$id=mysqli_insert_id();
		if($query)
		{ ?>
			<script type="text/Javascript">
			alert("Expenditure Successfully Saved");
			window.location="voucher.php?tran=<?php echo $id;?>";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Expenditure Could Not Be Saved");
			window.location="expenditure.php";
			</script>
		<?php }
	}
}
elseif(isset($_POST['payinvoice']))
{
	$supplier=$_POST['sup'];
	$supplierid=$_POST['supid'];
	$invoice=$_POST['inv'];
	$curbal=$_POST['cubal'];
	$amountpaid=$_POST['payamount'];
	$paydate=pickworkdae();
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$paydate'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\nPayments Not Added");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
	$pr=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM payments,chemicalstockinsummary WHERE idchemicalStockinSummary='$invoice' AND payments_idpayments=idpayments"));
	$oldbalance=$pr['amountPaid'];$payable=$pr['amountPayable'];$oldpaid=$pr['amountPaid'];
	$newbalance=$oldbalance-$amountpaid; $paid=$oldpaid+$amountpaid;
	mysqli_query($con,"UPDATE payments SET amountPaid='$paid' WHERE idpayments='".$pr['payments_idpayments']."'");
	if($paid==$payable)
	{
		mysqli_query($con,"UPDATE chemicalstockinsummary SET sPayStatus='paid' WHERE idchemicalStockinSummary='$invoice'");
	}
	else
	{
		mysqli_query($con,"UPDATE chemicalstockinsummary SET sPayStatus='partial' WHERE idchemicalStockinSummary='$invoice'");
	}
	$query=mysqli_query($con,"INSERT INTO paydetails VALUES('','$amountpaid','$paydate','cash','".$_SESSION['username']."','".$pr['payments_idpayments']."')");
	if($query)
	{ ?>
		<script type="text/Javascript">
		alert("Payment Successfully Saved");
		window.location="invoices.php?suppliers=<?php echo $supplierid; ?>&&supname=<?php echo $supplier;?>";
		</script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Payment Not Saved");
		window.location="invoices2.php?suppliers=<?php echo $supplierid; ?>&&supname=<?php echo $supplier;?>";
		</script>
	<?php }
}
}
elseif(isset($_POST['additem']))
{
	$a=$_POST['itemname'];
	$b=$_POST['itype'];
	$specs=$_POST['ispecs'];
	$c1=$_POST['cost'];
	$serial=$_POST['iserial'];
	if(preg_match("/^[0-9,]+$/", $c1))
							{
							$c = str_replace(',','',$c1); } else { 
								$c=$c1;
					 }
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM services WHERE sname='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Item You Are Adding Already Exists");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
		$query=mysqli_query($con,"INSERT INTO services VALUES('','$a','$b',0,'$specs','$c','inventory','$serial','')");
		if($query)
		{ ?>
			<script type="text/Javascript">
			alert("You Have successfully Added A New Item");
			window.location="inventory.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Item Could Not Be Added");
			window.location="inventory.php";
			</script>
		<?php }
	}
}














elseif(isset($_POST['additemss']))
{
	$a=$_POST['itemname'];
	$b=$_POST['itype'];
	$specs=$_POST['ispecs'];
	$c1=$_POST['cost'];
	$d=$_POST['sqty'];

	$serial=$_POST['iserial'];
	if(preg_match("/^[0-9,]+$/", $c1))
							{
							$c = str_replace(',','',$c1); } else { 
								$c=$c1;
					 }
	$file = $_FILES ['chairfile'];
	$name1 = $file ['name'];
	$type = $file ['type'];
	$size = $file ['size'];
	$tmppath = $file ['tmp_name'];

if($name1==""){
	$name1 = $file ['name'];
	}
	else{
		$name1 = time()."_".$file ['name'];
		}

move_uploaded_file ($tmppath, 'uploads/'.$name1);
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM services WHERE sname='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Item You Are Adding Already Exists");
		window.location="newdrug.php";
		</script>
	<?php }
	else
	{
		$query=mysqli_query($con,"INSERT INTO services VALUES('','$a','$b','$d','$specs','$c','inventory','$serial','$name1')");
		if($query)
		{ ?>
			<script type="text/Javascript">
			alert("You Have successfully Added A New Item");
			window.location="newdrug.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Item Could Not Be Added");
			window.location="newdrug.php";
			</script>
		<?php }
	}
}

















elseif(isset($_POST['addemp']))
{
	$a=$_POST['cname'];
	$b=$_POST['caddress'];
	$c=$_POST['cphone1'];
	$d=$_POST['cphone2'];
	$e=$_POST['sex'];
	$f=$_POST['position'];
	$g=$_POST['educlevel'];
	$h=$_POST['bankaccount'];
	$i=$_POST['bank'];
	$j=$_POST['nationality'];
	$k=$_POST['nssf']; 
	
	$employee=getkey('employee','idemployee');
	$file =$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$folder="uploads/";
	move_uploaded_file($file_loc,$folder.$file);
	if($file<>'')
	{
	$sql=mysqli_query($con,"INSERT INTO people(fname,gender,phone)
	VALUES('$a','$e','$c')");	
	}
	else
	{
	$sql=mysqli_query($con,"INSERT INTO people(fname,gender,phone)
	VALUES('$a','$e','$c')");	
	}
	$id=mysqli_insert_id();
	$sql2=mysqli_query($con,"INSERT INTO employee VALUES('$employee','active','$g','$h','$i','$j','$k','$f','$id')");
	if($sql && $sql2)
	{?>
		<script type="text/javascript">
		alert("You Have Successfully Registered A New Employee");
		window.location="employees.php";
		</script>
	<?php }
	 else
	 {?>
		 <script type="text/Javascript">
		 alert("Employee Not Registered Successfully\nA Technical Error Seems To Have Occured");
		 window.location="employees.php";
		 </script>
	 <?php }
}


























elseif(isset($_POST['addcontract']))
{
	$emp=$_POST['fname'];
	$b=$_POST['year'];
	$d1=$_POST['gross'];
	if(preg_match("/^[0-9,]+$/", $d1))
							{
							$d = str_replace(',','',$d1); } else { 
								$d=$d1;
								} 
	//$emp=$_GET['$a'];
//	$emp=getemployee($a);
	//begin doing those shit calculations
							$payee=0; $nssf1=0;$nssf2=0;
							//calculate Payee	
							 if($d>410000)
							{
							$payee=(($d-410000)*0.3)+25000;
							}
							elseif(($d>335000) && ($d<=410000))
							{
							$payee=(($d-335000)*0.2)+10000;
							}
							elseif(($d>235000) && ($d<=335000))
							{
							$payee=(($d-235000)*0.1);							
							}
							else
							{
							$payee=0;
							}
							/*calculate 5% NSSF
							$nssf1=0.05*$d;
							//calculate 10% NSSF
							$nssf2=0.1*$d; */
							//end doing such shit calculations
	if(mysqli_num_rows(mysqli_query($con,"SELECT fname FROM econtracts"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Employee "+<?php echo $a;?>+" Is Already Contracted In "+<?php echo $b;?>);
		window.location="hecontract.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO econtracts VALUES('','$b','$d','$payee','$nssf1','$nssf2','$emp')");
		if($sql)
		{?>
			<script type="text/Javascript">
			alert("Contract Details Saved Successfully");
			window.location="econtract.php";
			</script>
		<?php }
		else
		{?>
			<script type="text/Javascript">
			alert("Contract Details Could Not Be Saved\nA Technical Error Seems To Have Occured");
			window.location="econtract.php";
			</script>
		<?php }
	}
}

































elseif(isset($_POST['addtitle']))
{
	$a=$_POST['cname'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM employeecat WHERE ecat='$a'"))>0)
	{?>
		<script type="text/Javascript">
		alert("The Employee Position You Are Adding Already Exists\nPlease Enter A Different One");
		window.location="employees6.php";
		</script>
	<?php }
	else
	{
		$sql=mysqli_query($con,"INSERT INTO employeecat VALUES('','$a')");
		if($sql)
		{?>
			<script type="text/Javascript">
			alert("Employee Position Successfully Added");
			window.location="employees6.php";
			</script>
		<?php }
		else
		{?>
			<script type="text/Javascript">
			alert("Employee Position Could Not Be Added\nA Technical Error Seems To Have Occured");
			window.location="employees5.php";
			</script>
		<?php }
	}
}



elseif(isset($_POST['saveorder']))
{
	$itemcode=$_POST['drugs'];
	$itemname=$_POST['itemNo'];
	$itemqty=$_POST['quantity'];
	$itemprice=$_POST['price'];
	$itemtotal=$_POST['itemtotal']; 
	$trandate=$_POST['date']; 
	$trancode=$_POST['trnumber'];
	$totalbill=$_POST['total'];
	 
	{
		 	 
		if(count($itemcode)<1)
		{ ?>
			<script type="text/Javascript">
			alert("Please Specify Atleast One Drug To Be Able To Order");
			window.location="javascript:history.go(-1)";
			</script>
		<?php }
		else
		{
			  mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalbill','$totalbill','$trandate')");
				mysqli_query($con,"INSERT INTO chemicalstockinsummary VALUES('$trancode','$supplier','$totalbill','$trandate','cash','paid','$key')");
		 	 
			for($i=0; $i<count($itemcode); $i++)
			{
				$pdetails=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM services WHERE sname='".$itemname[$i]."'"));
				$itemid=$pdetails['idservices'];$oldqty=$pdetails['sqty']; $newqty=$oldqty+$itemqty[$i];
				$query=mysqli_query($con,"INSERT INTO chemicalstockin VALUES('','".$itemqty[$i]."','".$itemprice[$i]."','".$itemtotal[$i]."','$itemid','$trancode')");
			}
			if($query)
			{ ?>
				<script type="text/Javascript">
				alert("Order Successfully Placed");
				window.location="pharmacy.php";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("Ordr Could Not Be Placed");
				window.location="";
				</script>
			<?php }
		}
	}
}
elseif(isset($_POST['savespend']))
{
	$itemcode=$_POST['drugs'];
	$itemname=$_POST['itemNo'];
	$itemqty=$_POST['quantity'];
	$itemprice=$_POST['price'];
	$itemtotal=$_POST['itemtotal'];
	$supplier=$_POST['supplier'];
	$trandate=$_POST['date'];
	$trantype=$_POST['stype'];
	$trancode=$_POST['trnumber'];
	$totalbill=$_POST['total'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM closedtransactions WHERE closeDate='$trandate'"))>0)
	{?>
		<script type="text/Javascript">
		alert("This Days Transactions Were Already Closed\nPurchases Not Added");
		window.location="javascript:history.go(-1)";
		</script>
	<?php }
	else
	{
		//find key for payments
			$sql=mysqli_num_rows(mysqli_query($con,"SELECT idpayments FROM  payments "));
		$new=$sql+1;
$format=010000;
if($sql<10)
{
$key='01000'.$new;
}
elseif(($sql<100)&&($sql>9))
{
$key='0100'.$new;
}
elseif(($sql>99)&&($sql<1000))
{
$key='010'.$new;
}
else
{
$key='01'.$new;
}
		if(count($itemcode)<1)
		{ ?>
			<script type="text/Javascript">
			alert("Please Specify Atleast One Item To Be Able To Restock");
			window.location="javascript:history.go(-1)";
			</script>
		<?php }
		else
		{
			if($trantype<>'cash')
			{
				mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalbill',0,'$trandate')");
				mysqli_query($con,"INSERT INTO chemicalstockinsummary VALUES('$trancode','$supplier','$totalbill','$trandate','debt','not paid','$key')");
			}
			else
			{
				mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalbill','$totalbill','$trandate')");
				mysqli_query($con,"INSERT INTO chemicalstockinsummary VALUES('$trancode','$supplier','$totalbill','$trandate','cash','paid','$key')");
		 	}
			for($i=0; $i<count($itemcode); $i++)
			{
				$pdetails=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM services WHERE sname='".$itemname[$i]."'"));
				$itemid=$pdetails['idservices'];$oldqty=$pdetails['sqty']; $newqty=$oldqty+$itemqty[$i];
				//update to new stock
				mysqli_query($con,"UPDATE services SET sqty='$newqty' WHERE idservices='$itemid'");
				$query=mysqli_query($con,"INSERT INTO chemicalstockin VALUES('','".$itemqty[$i]."','".$itemprice[$i]."','".$itemtotal[$i]."','$itemid','$trancode')");
			}
			if($query)
			{ ?>
				<script type="text/Javascript">
				alert("Stock Successfully Saved");
				window.location="inventory.php";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("Stock Could Not Be Saved");
				window.location="";
				</script>
			<?php }
		}
	}
}
elseif(isset($_POST['savespendss']))
{
	$itemcode=$_POST['drugs'];
	$itemname=$_POST['itemNo'];
	$itemqty=$_POST['quantity'];
	$itemprice=$_POST['price'];
	$itemtotal=$_POST['itemtotal'];
	$supplier=$_POST['supplier'];
	$trandate=$_POST['date'];
	$trantype=$_POST['stype'];
	$trancode=$_POST['trnumber'];
	$totalbill=$_POST['total'];
	 
	{
		//find key for payments
			$sql=mysqli_num_rows(mysqli_query($con,"SELECT idpayments FROM  payments "));
		$new=$sql+1;
$format=010000;
if($sql<10)
{
$key='01000'.$new;
}
elseif(($sql<100)&&($sql>9))
{
$key='0100'.$new;
}
elseif(($sql>99)&&($sql<1000))
{
$key='010'.$new;
}
else
{
$key='01'.$new;
}
		if(count($itemcode)<1)
		{ ?>
			<script type="text/Javascript">
			alert("Please Specify Atleast One Item To Be Able To Restock");
			window.location="receiveStock.php";
			</script>
		<?php }
		else
		{
			if($trantype<>'cash')
			{
				mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalbill',0,'$trandate')");
				mysqli_query($con,"INSERT INTO chemicalstockinsummary VALUES('$trancode','$supplier','$totalbill','$trandate','debt','not paid','$key')");
			}
			else
			{
				mysqli_query($con,"INSERT INTO payments VALUES('$key','$totalbill','$totalbill','$trandate')");
				mysqli_query($con,"INSERT INTO chemicalstockinsummary VALUES('$trancode','$supplier','$totalbill','$trandate','cash','paid','$key')");
		 	}
			for($i=0; $i<count($itemcode); $i++)
			{
				$pdetails=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM services WHERE sname='".$itemname[$i]."'"));
				$itemid=$pdetails['idservices'];$oldqty=$pdetails['sqty']; $newqty=$oldqty+$itemqty[$i];
				//update to new stock
				mysqli_query($con,"UPDATE services SET sqty='$newqty' WHERE idservices='$itemid'");
				$query=mysqli_query($con,"INSERT INTO chemicalstockin VALUES('','".$itemqty[$i]."','".$itemprice[$i]."','".$itemtotal[$i]."','$itemid','$trancode')");
			}
			if($query)
			{ ?>
				<script type="text/Javascript">
				alert("Stock Successfully Saved");
				window.location="receiveStock.php";
				</script>
			<?php }
			else
			{ ?>
				<script type="text/Javascript">
				alert("Stock Could Not Be Saved");
				window.location="receiveStock.php";
				</script>
			<?php }
		}
	}
}
elseif(isset($_POST['savespre']))
{
	$drugs=$_POST['itemNo'];
	$qty=$_POST['quantity'];
	$pric=$_POST['price'];
	$pat=$_POST['patid'];
	$notes=$_POST['notes'];
	//find the visit id 
	$c=mysqli_fetch_array(mysqli_query($con,"SELECT pvid FROM patientvisits WHERE vstate='seen' AND patients_fileNo='$pat' ORDER BY pvid DESC LIMIT 1"));
	$sql=mysqli_query($con,"INSERT INTO patientprescriptions(patvisitid,prescStatus,patAdid) VALUES('".$c['pvid']."','pending','')");
	$id=mysqli_insert_id();
 	for($i=0; $i<count($drugs); $i++)
	{
		$vt=mysqli_fetch_array(mysqli_query($con,"SELECT idservices, sprice FROM services WHERE sname='".$drugs[$i]."'"));
		mysqli_query($con,"INSERT INTO patientspresctabs VALUES('','".$vt['idservices']."','".$qty[$i]."','".$vt['sprice']."','','$id','".$notes[$i]."')");
	}
	if($sql)
	{ ?>
		 <script type="text/Javascript">
		 alert("Prescription Successfully Done");
		 window.location="prescribe.php";
		 </script>
	<?php }
	else
	{ ?>
		<script type="text/Javascript">
		alert("Prescription Not Done");
		window.location="prescribe.php";
		</script>
	<?php }
}
elseif(isset($_POST['registersupplier']))
{
	$a=$_POST['branch'];
	$b=$_POST['cname'];
	$c=$_POST['cphone1'];
	$d=$_POST['cphone2'];
	$f=$_POST['scontact'];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM suppliers WHERE supName='$a'"))>0)
	{ ?>
		<script type="text/Javascript">
		alert("The Supplier You Are Adding Already Exists");
		window.location="inventory.php";
		</script>
	<?php }
	else
	{
		$query=mysqli_query($con,"INSERT INTO suppliers VALUES('','$a','','$c','$d','$b','$f','')");
		if($query)
		{ ?>
			<script type="text/Javascript">
			alert("You Have Successfully Registered A New Supplier");
			window.location="inventory.php";
			</script>
		<?php }
		else
		{ ?>
			<script type="text/Javascript">
			alert("Supplier Could Not Be Registered");
			window.location="inventory.php";
			</script>
			
		<?php }
	}
}
?>