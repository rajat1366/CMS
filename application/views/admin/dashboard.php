<h2 class="page-header">Dashboard</h2>
<h4>Recent Activites</h4>

<ul class="list-group">
	<?php foreach($activities as $activity): 
			$date = strtotime($activity->create_date); 
	 		$formated_date =  date('F j,Y, g:i a',$date)
	 ?>

		<li class="list-group-item"><strong><?php echo $activity->message; ?></strong>- <?php echo $formated_date; ?></li>
 	<?php endforeach; ?>
</ul>