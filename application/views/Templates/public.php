
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

   <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>

  <body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Always expand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
           <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url() ;?>"> <span class="sr-only">(current)</span>Home</a>
          </li>
           <?php if($this->pages) : ?>
          <?php foreach($this->pages as $page) : ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url() ;?>pages/show/<?php echo $page->slug ?>"><?php echo $page->title; ?>  <span class="sr-only">(current)</span></a>
          </li>
          <?php endforeach; 
           endif ; 
          ?>

        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>
      </div>
    </nav>

    <div class="container">

  
      

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1><?php echo $this->banner_heading; ?></h1>
        <p><?php echo $this->banner_text; ?></p>
        <p>
          <a class="btn btn-lg btn-primary" href="<?php echo $this->banner_link; ?>" role="button">View navbar docs &raquo;</a>
        </p>
      </div>
        <div class="row">
            <div class="col-md-12">
              <?php $this->load->view($main); ?>
            </div>
          
        </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
