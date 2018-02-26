<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>CMS | Admin Area</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
      <a class="navbar-brand" href="#">Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="nav navbar-nav">
          <li class="nav-item"> <?php echo anchor('admin','Dashboard',array('class'=>'nav-link')) ;?></li>
          <li class="nav-item"> <?php echo anchor('admin/pages','Pages',array('class'=>'nav-link')) ;?></li>
          <li class="nav-item"> <?php echo anchor('admin/subjects','Subjects',array('class'=>'nav-link')) ;?></li>
          <li class="nav-item"> <?php echo anchor('admin/users','Users',array('class'=>'nav-link')) ;?></li>
        </ul>
        <ul class="nav navbar-nav mr-auto navbar-right">
          <li class="nav-item"> <?php echo anchor('/','View Website',array('class'=>'nav-link')) ;?></li>
          <li class="nav-item"> <?php echo anchor('admin/users/logout','Logout',array('class'=>'nav-link')) ;?></li>
          
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="container-fluid mod-container">
    	<div class = "row">
    		<div class="col-md-4">
    			<ul class="list-group">
					<li class="list-group-item"><?php echo anchor('admin/pages/add','Add New Page',array('class'=>'nav-link')) ;?></li>
					<li class="list-group-item"><?php echo anchor('admin/subjects/add','Add New Subject',array('class'=>'nav-link')) ;?></li>
					<li class="list-group-item"><?php echo anchor('admin/users/add','Add New User',array('class'=>'nav-link')) ;?></li>
				</ul>
    		</div>
    		<div class="col-md-8">
    			 <?php $this->load->view($main); ?>
    		</div>
    	</div>
      
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
