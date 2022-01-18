<!DOCTYPE html>


<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>



      
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</head>


<body>
<div class="container-fluid">
                    <div class="row">
                    <?php if (!empty(array_filter($errors))) : ?>
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php foreach ($errors as $error) : ?>
                                        <i class="fas fa-times-circle"></i>
                                        <?php echo $error; ?><br>
                                    <?php endforeach; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                        </div>
<div >

  <form method="post" action="<?php echo base_url('/Admin/Auth'); ?>">
  <h2 style="text-align:center">Login</h2>
 
     
       
      
  
  <div style="display: flex;justify-content: center;" class="container" >
  <div class="row">
  <input type="username" name="username" id='username' placeholder="Username" required>
  </div>
  <div class="row">
  <input type="password" name="password" id="password" placeholder="Password" required>
  </div>
  <div class="row">
  <input type="submit" name="submit" value="submit" class="btn btn-secondary btn-lg">
  </div>
  </div>
  
     
        
   
    
   

   
  </form>
</div>


</body>

</html>