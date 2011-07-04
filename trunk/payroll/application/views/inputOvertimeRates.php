<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--

 REDBANA PHILS PAYROLL 
 For Practicum Purposes | CMSC 198 | summer 2011
 Generated by: Llave, Abraham Darius S. | 2008-37120
 
 FilePurpose: during 'Attendance Faults' generation, if there are overtimes, this is used.
 version: 1.0.0 - initial work
 		  2.0.0 - ok na. 04 JUL 2011
 		 
-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Overtime Rates - Redbana Phils. Payroll</title>
<link href="<?php echo base_url(); ?>assets/css/forever21.css" rel="stylesheet" type="text/css" />
<?php $this->load->view('include/css.inc'); ?>
<?php $this->load->view('include/jquery-abe.inc'); ?>
<?php $this->load->view('include/jquery-abe-on_run.inc'); ?>
<?php $this->load->view('include/jquery-csstables_and_jqtransform_less_jqueryload.inc'); ?>
<?php $this->load->view('include/mixed-JS-inputOvertimeRates.inc'); ?>
</head>

<?php
		function can_Access($type,$query)
		{
			$result=false;
			foreach ($query->result() as $row)
			{
				if (($row->privilege ==$type) &&($row->type==1) )
				{
					$result=true;
					break;
				}
			}
			return $result;
		}
?>

<body onload="performRitual()">
<div id="main_container">
	<div id="header">
    	<div id="logo">
    	<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/redbana_logo2.png" alt="" title="" style="border:0" /></a>    	
    	</div>
    	<div id="logo">
    	<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/payroll_logo.jpg" alt="" title="" style="border:0" /></a>    	
    	</div>        
        <div id="menu">
            <ul>                                        
                <li><a class="current" href="<?php echo site_url(); ?>" title="">Home</a></li>
				<li><a href="#" title="">My Account</a></li>
                <li><a href="#" title="">Edit Other Accounts</a></li>
                <li><a href="contact.html" title="">menu4</a></li>
            </ul>
        </div>
		<div id="graynavbar" >			
			<ul>
				<li><?php echo $userData['empNum']; ?></li>
				<li><?php echo $userData['fname']." ".$userData['mname']."&nbsp;".$userData['sname']; ?></li>
				<li class="last">
					<a href="<?php echo base_url().'index.php/login/logout'; ?>" class='underline'>Log out</a>
				</li>
			</ul>			
		</div>        
    </div>

	<div id="main_content">    	
    	<div id="centralContainer">
            <!-- You place your html etc here -->
			<noscript>				
				<div style="width: 80%; color:red; padding: 20px; border-color:red; border-style:solid; border-width:2px; margin-top:5px; " class="center">
					<h2>JavaScript is disabled or cannot be found on this browser!</h2>
					<p>Please enable it first or else you can't update the overtime rates and will result in computation error. </p>
				</div>
			</noscript>
			<div id="notifyError"
					style="width: 80%; color:red; padding: 20px; border-color:red; border-style:solid; border-width:2px; margin-top:5px; " class="center" >
					<h2>Invalid Overtime Rates!</h2>
					<p>Please choose an applicable overtime rate for the ff: </p>
					<div id="notifyErrorInner">
						
					</div>
			</div>

			<div style="padding: 10px; margin: 5px; clear: both"  >
				<span>
				Before we can proceed computing the Attendance Faults, please select which overtime rates should apply on the following timesheet<br/>
				entries that have overtime. Click 'Continue Generating' when done.
			    </span>
			</div>		
			<div id="demo" >
				<div id="accordion" style="width: inherit;" >
					<?php		
						foreach($overtime_entries as $each_date)
						{						
					?>	
							<h3 style="width: inherit;"><a class="title" href="#" ><?php echo $each_date[0]->work_date; ?></a></h3>
							<div class="content">
							<table cellpadding="0" cellspacing="0" border="0" class="display" style="font-size: 1em" >
								<thead> 
									<tr> 
										<th>Employee Number</th> 		
										<th>Name</th>													
										<th>Supposed shift</th>
										<th>Actual shift</th>
										<th>Work Day Type</th>
										<th>Overtime Duration</th>
										<th>Overtime Class</th>			
										<th>&nbsp;</th>
									</tr> 
								</thead> 
								<tbody>
									<?php
											foreach($each_date as $each_emp_attendance)
											{
									?>
												<tr>
													<td><?php echo $each_emp_attendance->empnum; ?></td>
													<td><?php echo $nameList[$each_emp_attendance->empnum]; ?></td>																
													<td>								
														<?php																		
															list($thisyear, $thismonth, $thisday) = explode('-', $each_emp_attendance->work_date );
															$supposed_out = ( $shifts[$each_emp_attendance->shift_id]['OVERFLOW'] == 0 ) ? $each_emp_attendance->work_date :  date("Y-m-d", mktime(0,0,0,$thismonth,$thisday+1,$thisyear) ) ;
															echo $each_emp_attendance->work_date." ".$shifts[$each_emp_attendance->shift_id]['START_TIME']."<br/>".$supposed_out." ".$shifts[$each_emp_attendance->shift_id]['END_TIME'];
														?>
													</td>
													<td>
													<?php
														echo $each_emp_attendance->date_in." ".$each_emp_attendance->time_in."<br/>".$each_emp_attendance->date_out." ".$each_emp_attendance->time_out;
													?>
													</td>
													<td><?php echo $workday_classes[$each_emp_attendance->type]->title; ?></td>
													<td><?php echo $each_emp_attendance->overtime; ?></td>
													<td>
														<?php 								
															echo '<select name="'.$each_emp_attendance->empnum.'|'.$each_emp_attendance->work_date.'" style="width:250px;"><br/>';
															echo '<option value="0">PLEASE SELECT AN OPTION</option>';
															foreach($allowedOvertime[$each_date[0]->work_date][$each_emp_attendance->empnum]  as $eachAllowedOT)
															{
																echo '<option value="'.$eachAllowedOT->ID.'" >'.$eachAllowedOT->DESCRIPTION.'</option>';
															}
															echo '</select><center></center><br/>';
														?>
													</td>	
													<td>
														<?php 
															/*
																ABE | 04 JUL 2011 1803
																When using Notepad++, Programmer's Notepad or even Microsoft Expression Web 3,
																it seems that this part causes a "div not closed" error, Though it's not really.
															*/
														
															echo '<div id="'.$each_emp_attendance->empnum.'|'.$each_emp_attendance->work_date.'|SPAN" name="ajax_ok_indicator" >&nbsp;&nbsp;';
															echo '</div>'; 														
														?>
													</td>
												</tr>
									<?php
											}
									?>
								</tbody>
							</table>
							</div>
					<?php		
						}						
					?>
				</div> <!-- for accordion -->
			</div> <!--for demo-->
			
			<div style="clear: both; margin-top: 50px; ">				
					<?php 
					echo form_open('AttendanceController/generateAttendanceFault', 'onsubmit="return ajaxUpdate()"');
					echo form_hidden('PAYPERIOD', $payperiod);
					echo form_hidden('PAYMENT_MODE', $payment_mode);
					echo form_hidden('OT_TOOK_NOTE_ALREADY', 1);							
					echo form_submit('mysubmit', 'Continue Generating');				
					echo form_close();			
					?>
			</div>
				
			</div>	<!--end of centralContainer-->
	</div><!--end of main_content-->

    <div id="footer">
     	<div class="copyright">
			2011 UPLB Students
        </div>
    	<div class="footer_links"> 
        <a href="#">About us</a>
         <a href="privacy.html">Privacy policy</a> 
        <a href="contact.html">Contact us </a>        
        </div> 
	</div>
</div><!--end of main container-->
</body>
</html>
