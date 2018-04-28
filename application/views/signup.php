<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style4.css">
  <link href="https://fonts.googleapis.com/css?family=Caveat+Brush|Lobster|Merienda+One|Open+Sans|Rock+Salt|Rufina|Vollkorn+SC" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-inverse">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border:1px solid white;">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="<?php echo base_url();?>index.php/User_controller/get_user" class="white" style="color:white;
  font-family: 'Caveat Brush', cursive;font-size:30px;">Home</a>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar" style="border:none;">
       <ul class="nav navbar-nav" >
         <li><a href="<?php echo base_url();?>index.php/User_controller/get_records" style="color:white;font-family: 'Caveat Brush', cursive;cursive;font-size:20px;">Records</a></li>
       </ul>


       <ul class="nav navbar-nav navbar-right">

         <li><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' style='color:white;font-family:Caveat Brush;font-size:18px;background:none;border:none;'>Logout ? ?</button></li>
         <li><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' style='color:white;font-family:Caveat Brush;font-size:18px;background:none;border:none;'><a href="<?php echo base_url();?>index.php/User_controller/signup" class="link"><span class='glyphicon glyphicon-user'></span> Sign Up</a></button></li>
         <li><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal1' style='color:white;font-family:Caveat Brush;font-size:18px;background:none;border:none;'><a href="<?php echo base_url();?>index.php/User_controller/login" class="link"><span class='glyphicon glyphicon-user'></span> Login</a></button></li>
       </ul>
     </div>
 </nav>

<div class="row">
<div class="col-sm-4">
 <h1 class="text-center">Signup Here</h1>
</div>
<div class="col-sm-4">
<div class="form">
<form class="form-class" method="post" action="<?php echo base_url();?>index.php/User_controller/read_user_data">
  <div>
      <input type="text" name="name" placeholder="Username" class="form__input" value="<?php echo set_value('name');?>"></div>
      <div><input type="text" name="email" placeholder="Email" class="form__input" value="<?php echo set_value('email');?>"></div>
     <div><input type="text" name="number" placeholder="Number" class="form__input" value="<?php echo set_value('number');?>"></div>
   <div><input type="password" name="password" placeholder="Password" class="form__input" value="<?php echo set_value('password');?>"></div>
     <div><button class="btn register" type="submit" name="submit">Register</button></div>


 </form>
</div>
</div>
<div class="col-sm-4">
  <h1 style="color:white;"><?php if(isset($ret)){echo $ret;}?></h1>
  <?php
  echo "<h3 style='color:#0099ff;'>".form_error('name')."</h3>";
  echo "<h3 style='color:#0099ff;'>".form_error('email')."</h3>";
  echo "<h3 style='color:#0099ff;'>".form_error('number')."</h3>";
  echo "<h3 style='color:#0099ff;'>".form_error('password')."</h3>";
   ?>
</div>
</div>

</body>
</html>
