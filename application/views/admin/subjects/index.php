<h2 class="page-header"> Subjects</h2>

<?php if($this->session->flashdata('success')) : ?>
	<?php echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' ?>
<?php endif; ?>
<?php if($this->session->flashdata('error')) : ?>
	<?php echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' ?>
<?php endif; ?>

<?php  if($subjects) : ?> 
<table class= 'table table-striped'>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Date Created</th>
		<th></th>
	</tr>
	<?php foreach ($subjects as $subject) : ?>
	<?php $date = strtotime($subject->create_date); ?>
	<?php $formated_date =  date('F j,Y, g:i a',$date)?>
		<tr>
			<td><?php echo $subject->id; ?></td>
			<td><?php echo $subject->name; ?></td>
			<td><?php echo $formated_date; ?></td>
			<td>
				<?php echo anchor('admin/subjects/edit/'.$subject->id.'','Edit','class = "btn btn-primary"'); ?>
				<?php echo anchor('admin/subjects/delete/'.$subject->id.'','Delete','class = "btn btn-danger"'); ?>

			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?php else : ?>
  	<p>No subjects</p>
 <?php endif; ?>