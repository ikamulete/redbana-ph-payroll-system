<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>Department Maintenance</title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>/jqtransform/jqtransformplugin/jqtransform.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url();?>/jqtransform/demo.css" type="text/css" media="all" />
	
</head>
<body id="dt_example">
	<div id="demo">
	<center>
	<h1>Department Maintenance</h1>
		<table  align="center" class="display" cellpadding="10"  id="example"> 
			<tr>
				<th>Seq #</th>
				<th>Department</th>
				<th colspan="2">Action</th>
			</tr>
			<?php 
			$cnt=1;
			foreach($query as $row){?>
			<tr>
				<td><?php echo $cnt;?></td>
				<td><?php echo $row->dept;?></td>
				<td>
				<?php
					echo form_open('maintenance/deptedit'); 
					echo form_hidden('id', $row->id);
					echo form_hidden('dept', $row->dept);
					echo form_submit('mysubmit','Edit'); 
					echo form_close();
				?>
				</td>
				<td>
				<?php
					echo form_open('maintenance/deptdelete'); 
					echo form_hidden('id', $row->id);
					echo form_hidden('dept', $row->dept);
					echo form_submit('mysubmit','Delete'); 
					echo form_close();
				?>
				</td>

			</tr>
			<?php 
			$cnt++;} ?>
		</table>
		<hr></hr>
		</center>
		<p>Enter the department name.</p><br/>
		<?php
			echo "Sequence no. ".$cnt."";
			echo form_open('maintenance/deptinsert'); 
			echo form_input('dept',"");
			echo form_submit('mysubmit','Insert'); 
			echo form_close();
		?>
	</div>
</body>
</html>