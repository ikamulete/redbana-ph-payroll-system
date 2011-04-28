<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*

 REDBANA PHILS PAYROLL 
 For Practicum Purposes | CMSC 198 | summer 2011
 Generated by: Llave, Abraham Darius S. | 2008-37120
 
 FilePurpose: VIEW-CHANGE-WITHOLDINGTAX
 version: 1.0.0
*/



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Edit Witholding Tax</title>

<style type="text/css">
#eventTitle {
	font-family: Arial, Helvetica, sans-serif;
	font-size: xx-large;
	font-weight: bold;
	font-style: normal;
	color: #008000;
	text-align: left;
	border: thin solid #000099;
	width: 944px;
	height: 50px;
	background-repeat: repeat-x;
	background-attachment: fixed;
	vertical-align: text-bottom;
	overflow: hidden;
	margin: 0px;
	padding: 0px;
	word-spacing: 0em;
	background-image: url('images/event-bg3.png');
}

#menuSub-Bar {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	font-weight: normal;
	font-style: normal;
	color: #000000;
	text-align: left;
	border: thin solid #000099;
	width: 944px;
	height: 25px;
	background-repeat: repeat-x;
	background-attachment: fixed;
	vertical-align: middle;
	overflow: hidden;
	margin: 0px;
	padding: 4px 0px 0px 0px;
	word-spacing: 0em;
	background-image: url('images/event-bg3.png');
}

#main_div {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	font-weight: normal;
	font-style: normal;
	color: #000000;
	text-align: left;
	border: thin solid #000000;
	width: 944px;
	background-repeat: repeat-x;
	background-attachment: fixed;
	vertical-align: middle;
	overflow: hidden;
	margin: 0px;
	padding: 0px;
	word-spacing: 0em;
}

#UPDATE_MESSAGE {
	font-family: Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
	width: 944px;
	color: #333333;
	background-color: #E8F8FF;
	text-align: center;
}
#payment_mode_title {
	font-family: Arial, Helvetica, sans-serif;
	font-size: medium;
	background-color: #18DCE7;
	font-weight: bold;
	visibility: visible;
	float: left;
	clear: both;
	display: block;
	width: 912px;
}
.bracketSpan {
	width: 80px;
	margin-left: 2px;
	margin-right: 2px;
	text-align: center;
	float: left;
	position: relative;
}
.paymentMode_propertitle {
	width: 138px;
	text-align: center;
	float: left;
}
.contentDiv {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	position: relative;
}
.paymentMode_propertitle_alternate {
	width: 142px;
	text-align: center;
	float: left;
}
#payment_mode_subdivide {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	background-color: #999999;
	visibility: visible;
	float: left;
	clear: both;
	display: block;
	width: 912px;
}
</style>
</head>


<body >
<center>
 


<div id="eventTitle"> 
	&nbsp; REDBANA PAYROLL 
	- WITHOLDING TAX</div>
<div id="menuSub-Bar">
	&nbsp;&nbsp;%% DIsplay date of effectivity here as per BIR
</div>
<div id="menuSub-Bar">
	&nbsp;&nbsp; To edit values, click the concerned bracket number located in the same line as the payment mode. 
</div>
<div id="main_div">
<form  method="get" action="witholdingTaxController/showInputBox" name="witholdingTax_entries"  accept-charset="utf-8" class="contentDiv" style="left: 0px; top: 0px">

<?php
	
	$bracket_values = array();
	
	foreach($details->result() as $row_x)
	 {
	 	$bracket_values[] = array(
		 						"PAYMENT_MODE_ID_FK" => $row_x->PAYMENT_MODE_ID_FK,
		 						"BRACKET" => $row_x->BRACKET,
		 						"EXEMPTION_DEFINITE" => $row_x->EXEMPTION_DEFINITE,
		 						"EXEMPTION_PERCENT" => $row_x->EXEMPTION_PERCENT,
		 						"STAT_A_Z" => $row_x->STAT_A_Z,
		 						"STAT_A_SME" => $row_x->STAT_A_SME,
		 						"STAT_B_MES1" => $row_x->STAT_B_MES1,
		 						"STAT_B_MES2" => $row_x->STAT_B_MES2,
		 						"STAT_B_MES3" => $row_x->STAT_B_MES3,
		 						"STAT_B_MES4" => $row_x->STAT_B_MES4
	 	);
	 }
	 
?>
<div id="payment_mode_title">
	<span class="paymentMode_propertitle" >SEMI-MONTHLY
	</span>	
	<span class="bracketSpan">
	    <a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[0]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[0]["BRACKET"];
	    		 ?>">	    
		<?php		
				echo $bracket_values[0]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[1]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[1]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[1]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[2]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[2]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[2]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[3]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[3]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[3]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[4]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[4]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[4]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[5]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[5]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[5]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[6]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[6]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[6]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[7]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[7]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[7]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[8]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[8]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[8]["BRACKET"];
		?>		
		</a>
	</span>
</div>
<div  class="contentDiv">
	
	<span class="paymentMode_propertitle">Exemption</span>
	<span class="bracketSpan">
		<?php
			//echo $bracket_values[0]["EXEMPTION_DEFINITE"];
			echo "???";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[1]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[2]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[3]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[4]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[5]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[6]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[7]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[8]["EXEMPTION_DEFINITE"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >Status
	</span>	
	<span class="bracketSpan">
		<?php
			//echo "+".$bracket_values[0]["EXEMPTION_PERCENT"]."% over";
			echo "???";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[1]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[2]["EXEMPTION_PERCENT"]."% over";
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[3]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[4]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[5]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo "+".$bracket_values[6]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo "+".$bracket_values[7]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[8]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
</div>
<div id="payment_mode_subdivide" >
	A. Table for employees without qualified dependent
</div>
<div  class="contentDiv">
	
	<span class="paymentMode_propertitle">1. Z</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[0]["STAT_A_Z"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[1]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[2]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[3]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[4]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[5]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[6]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[7]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[8]["STAT_A_Z"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >2. S/ME
	</span>	
	<span class="bracketSpan">
		<?php
			echo $bracket_values[0]["STAT_A_SME"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[1]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[2]["STAT_A_SME"];
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo $bracket_values[3]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[4]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[5]["STAT_A_SME"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[6]["STAT_A_SME"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[7]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[8]["STAT_A_SME"];
		?>
	</span>
</div>
<div id="payment_mode_subdivide" >
	B. Table for single/married employee with qualified/dependent child(ren)
</div>
<div class="contentDiv">
<span class="paymentMode_propertitle">1. ME1/S1</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[0]["STAT_B_MES1"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[1]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[2]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[3]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[4]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[5]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[6]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[7]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[8]["STAT_B_MES1"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >2. ME2/S2
	</span>	
	<span class="bracketSpan">
		<?php
			echo $bracket_values[0]["STAT_B_MES2"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[1]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[2]["STAT_B_MES2"];
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo $bracket_values[3]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[4]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[5]["STAT_B_MES2"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[6]["STAT_B_MES2"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[7]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[8]["STAT_B_MES2"];
		?>
	</span>
	<span class="paymentMode_propertitle">3. ME3/S3</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[0]["STAT_B_MES3"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[1]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[2]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[3]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[4]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[5]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[6]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[7]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[8]["STAT_B_MES3"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >4. ME4/S4
	</span>	
	<span class="bracketSpan">
		<?php
			echo $bracket_values[0]["STAT_B_MES4"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[1]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[2]["STAT_B_MES4"];
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo $bracket_values[3]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[4]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[5]["STAT_B_MES4"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[6]["STAT_B_MES4"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[7]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[8]["STAT_B_MES4"];
		?>
	</span>

</div>
<div id="payment_mode_title">
	<span class="paymentMode_propertitle" >MONTHLY
	</span>	
	<span class="bracketSpan">
	    <a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[9]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[9]["BRACKET"];
	    		 ?>">	    
		<?php		
				echo $bracket_values[9]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[10]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[10]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[10]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[11]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[11]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[11]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[12]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[12]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[12]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[13]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[13]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[13]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[14]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[14]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[14]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[15]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[15]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[15]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[16]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[16]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[16]["BRACKET"];
		?>
		</a>
	</span>
	<span class="bracketSpan">
		<a href="<?php  
	    			echo base_url()."index.php"."/witholdingTaxController/editBracket/".$bracket_values[17]["PAYMENT_MODE_ID_FK"]."/".$bracket_values[17]["BRACKET"];
	    		 ?>">
		<?php
				echo $bracket_values[17]["BRACKET"];
		?>		
		</a>
	</span>
</div>
<div  class="contentDiv">
	
	<span class="paymentMode_propertitle">Exemption</span>
	<span class="bracketSpan">
		<?php
			//echo $bracket_values[9]["EXEMPTION_DEFINITE"];
			echo "???";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[10]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[11]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[12]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[13]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[14]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[15]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[16]["EXEMPTION_DEFINITE"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[17]["EXEMPTION_DEFINITE"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >Status
	</span>	
	<span class="bracketSpan">
		<?php
			//echo "+".$bracket_values[9]["EXEMPTION_PERCENT"]."% over";
			echo "???";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[10]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[11]["EXEMPTION_PERCENT"]."% over";
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[12]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[13]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[14]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo "+".$bracket_values[15]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo "+".$bracket_values[16]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo "+".$bracket_values[17]["EXEMPTION_PERCENT"]."% over";
		?>
	</span>
</div>
<div id="payment_mode_subdivide" >
	A. Table for employees without qualified dependent
</div>
<div  class="contentDiv">
	
	<span class="paymentMode_propertitle">1. Z</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[9]["STAT_A_Z"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[10]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[11]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[12]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[13]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[14]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[15]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[16]["STAT_A_Z"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[17]["STAT_A_Z"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >2. S/ME
	</span>	
	<span class="bracketSpan">
		<?php
			echo $bracket_values[9]["STAT_A_SME"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[10]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[11]["STAT_A_SME"];
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo $bracket_values[12]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[13]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[14]["STAT_A_SME"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[15]["STAT_A_SME"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[16]["STAT_A_SME"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[17]["STAT_A_SME"];
		?>
	</span>
</div>
<div id="payment_mode_subdivide" >
	B. Table for single/married employee with qualified/dependent child(ren)
</div>
<div class="contentDiv">
<span class="paymentMode_propertitle">1. ME1/S1</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[9]["STAT_B_MES1"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[10]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[11]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[12]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[13]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[14]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[15]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[16]["STAT_B_MES1"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[17]["STAT_B_MES1"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >2. ME2/S2
	</span>	
	<span class="bracketSpan">
		<?php
			echo $bracket_values[9]["STAT_B_MES2"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[10]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[11]["STAT_B_MES2"];
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo $bracket_values[12]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[13]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[14]["STAT_B_MES2"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[15]["STAT_B_MES2"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[16]["STAT_B_MES2"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[17]["STAT_B_MES2"];
		?>
	</span>
	<span class="paymentMode_propertitle">3. ME3/S3</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[9]["STAT_B_MES3"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[10]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[11]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[12]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[13]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[14]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[15]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[16]["STAT_B_MES3"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
				echo $bracket_values[17]["STAT_B_MES3"];
		?>
	</span>	
	<br/>
	<span class="paymentMode_propertitle" >4. ME4/S4
	</span>	
	<span class="bracketSpan">
		<?php
			echo $bracket_values[9]["STAT_B_MES4"];			
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[10]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[11]["STAT_B_MES4"];
		?>
	</span> 
	<span class="bracketSpan">
		<?php
			echo $bracket_values[12]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[13]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[14]["STAT_B_MES4"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[15]["STAT_B_MES4"];
		?>
	</span>
    <span class="bracketSpan">
		<?php
			echo $bracket_values[16]["STAT_B_MES4"];
		?>
	</span>
	<span class="bracketSpan">
		<?php
			echo $bracket_values[17]["STAT_B_MES4"];
		?>
	</span>

</div>

	
</form>
</div><!-- end of main div -->
<div id="UPDATE_MESSAGE">
<a name="bottom" >Copyright Notice</a>
</div>
</center>
</body>


</html>
<!--
/* End of file changeWitholdingTax.php */
/* Location: ./application/views/changeWitholdingTax.php */
-->