
<?php 
  $atts = array('id'=>'login_form', 'class' =>'form-signin' , 'role'=>'form' );
  echo form_open('admin/users/login',$atts); 
  if($this->session->flashdata('success')) : 
      echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' ; 
   endif; 
  if($this->session->flashdata('error')) : 
     echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' ;
   endif; 
    echo validation_errors('<p class="alert alert-danger">');
?>
      
      <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
      <label for="username" class="sr-only">Username</label>
      <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
      <br>
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      
    </form>
    <?php echo form_close(); ?>