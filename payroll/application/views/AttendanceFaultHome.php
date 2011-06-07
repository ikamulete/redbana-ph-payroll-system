<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 REDBANA PHILS PAYROLL 
 For Practicum Purposes | CMSC 198 | summer 2011
 Generated by: Llave, Abraham Darius S. | 2008-37120
 
 FilePurpose: VIEW-ATTENDANCEFAULTHOME
 version: 1.0.0 - initial work		 
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title> Attendance Faults - Redbana Phils. Payroll </title>
<style type="text/css">
td
{
	text-align: center;
	width: 160px;	
}
</style>
<link href="<?php echo base_url(); ?>assets/css/mainstyling.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header" class="center">
	<img src="<?php echo base_url(); ?>assets/images/payroll.png"  alt="header" />
</div>
<div id="header2" class="center">
	<ul class="nav">
		<li class="nav"><a id="nav" href="<?php echo base_url(); ?>"> Home </a></li>
	</ul>
<?php 
	echo "<a class='active' href='login/logout' id='cname' alignment='left' > Sign out </a>";				
?>	
</div>
<div id="container" class="center">
	<div  class="center" style="width:80%; margin-top:15px" >
			In this area, we compute for the Employees' Absences, Tardiness, Undertime, OverTime and Night Differentials and their<br/>
			corresponding fees and/or deductions from the employees' salaries.<br/><br/>
	</div>
	<?php
		foreach( $payment_modes as $individ )
		{
	?>
		<div id="article_SpecificDetail" class="center" style="width:80%">
			<?php echo $individ->TITLE; ?> Payperiods 
		</div>
		<div  class="center" style="width:80%">
			<a href="<?php echo site_url().'/PayPeriodController/addPayPeriod/'.$individ->ID ?>"> Generate a new PayPeriod. </a>
			<br /><br />
		<?php
			if($payperiods[$individ->ID] == NULL)
			{
		?>
			<span style="padding:10px; margin:10px">
				There are no payperiods yet.
			</span>
		<?php			
			}else{		
		?>
			<table border="1">
				<thead>
					<tr>
						<td> Inclusive dates <br /> (YYYY-MM-DD) </td>
						<td> &nbsp; </td>
						<td> &nbsp; </td>
						<td> Finalized On </td>
						<td> Finalized By </td>
					</tr>
				</thead>				
				<tbody>
					<?php
						foreach( $payperiods[$individ->ID] as $individ_x )
						{
					?>
						<tr>
							<td>
								<?php
									echo $individ_x->START_DATE." - ";
									echo $individ_x->END_DATE;
								?>
							</td>	
							<td>
							<?php
								echo form_open('AttendanceController/viewAttendanceFaultData');
								echo form_hidden('PAYMENT_MODE', $individ->ID);
								echo form_hidden('PAYPERIOD', $individ_x->ID);
								echo form_submit('mysubmit','View'); 
								echo form_close();								
							?>
							</td>
							<td>
							<?php
								if( $individ_x->FINALIZED == 0){
										
										if( $payperiods_already_generated[$individ->ID][$individ_x->ID] )
										{										
											echo form_open('AttendanceController/regenerateAttendanceFaultData');
										}else{
											echo form_open('AttendanceController/generateAttendanceFault');
										}										
										echo form_hidden('PAYPERIOD', $individ_x->ID);
										echo form_hidden('PAYMENT_MODE', $individ->ID);
										if( $payperiods_already_generated[$individ->ID][$individ_x->ID] )
										{										
											echo form_submit('mysubmit','Regenerate'); 
										}else{
											echo form_submit('mysubmit','Generate'); 
										}
										echo form_close();				
								}else{
									echo "Regeneration not allowed.";
								}
							?>
							</td>
							<td><?php
								if( $individ_x->FINALIZED == 0 )					
								{									
										echo form_open('PayperiodController/finalizePayPeriod');
										echo form_hidden('PAYPERIOD', $individ_x->ID);	
										echo form_hidden('PAYMENT_MODE', $individ->ID);								
										echo form_submit('mysubmit','Not yet, Finalize now.'); 
										echo form_close();																	
								}else{
										echo $individ_x->FINALIZED_DATE;									}
								?>
							</td>
							<td>
								<?php
								if( $individ_x->FINALIZED == 0)					
								{									
										echo "N/A";																	
								}else
								{
										echo $individ_x->FINALIZED_BY;
								}
								?>
							</td>
						</tr>
					<?php							
						}
					?>
				</tbody>
			</table>
		<?php
			}
		?>
		</div>
	<?php		
		}
	?>
</div>
<div id="copyright">
<p> Copyright 2011 | Bautista and Associates Information Systems </p>
</div>
</body>
</html>