<h2 class="page-header"> Add Subject</h2>

<?php echo form_open('admin/subjects/add'); ?>
	<div class="form-group">
		<?php echo form_label('Subject Name','name');  ?>
		<?php  $data = array(
				'name' => 'name',
				 'id'  => 'name',
				 'maxlength' => '100',
				 'class' => 'form-control',
				 'value'  => set_value('name')
			);
			echo form_input($data); ?>
	</div>
	<?php echo form_submit('mysubmit','Add Subject',array('class'=> 'btn btn-primary')); ?>
<?php echo form_close() ?>