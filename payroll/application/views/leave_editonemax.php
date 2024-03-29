<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 
	<head> 
		
		<title>Edit Maximum Number of Leaves</title> 
		<style type="text/css" title="currentStyle"> 
			@import "<?php echo base_url();?>/css/demo_page.css";
			@import "<?php echo base_url();?>/css/demo_table.css";
		</style> 
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>/js/jquery.js"></script> 
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8"> 
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script> 
	</head> 
	<body id="dt_example"> 
	
		 <div id="demo">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"> 
			<thead> 
				<tr> 
				<th>Employee Number</th> 
				<th>Employee Name</th>
				<th>Maximum No. of Leaves</th>
				<th>Number of Leaves</th>
				</tr> 
			</thead> 
			<tbody> 
			<?php $cnt=1;$count=0;
			foreach ($query as $row)
			{ 
				if ($cnt%2==0)	$class="even";
				else	$class="odd";
				$emp=$row->empnum;
			?>
				<tr id="<?php echo $emp ?>" class="<?php echo $class ?>">
					<td><?php echo $emp; ?></td>
					<td><?php echo $row->fname; echo " "; echo $row->mname; echo " "; echo $row->sname; ?></td>
					<td><?php echo $row->maxleave;?></td>
					<td><?php echo $row->numofleave;?></td>
						<?php echo form_open('leave/editonemax');  ?>
					<td><label class="login_label">New Max Leave:</label><input type="text" name="maxleave" class="login_input" /></td>
					<td>
						<?php
						$hidden=$row->empnum;
						echo form_hidden('empnum', $emp);
						echo form_submit('edit','Edit'); 
						echo form_close(); 
						?>
					</td>
				</tr>
			<?php  
			$cnt++; 
			$count++;
			} ?>
			</tbody>
			<tfoot> 
				<tr> 
					<th>Employee Number</th> 
					<th>Employee Name</th> 		
				<th>Maximum No. of Leaves</th>	
				<th>Number of Leaves</th>
				</tr> 
			</tfoot>  
		</table>
	</div>
</body> 
</html>