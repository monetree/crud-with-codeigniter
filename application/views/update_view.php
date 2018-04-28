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
  <style>
</style>
</head>
<body onload="myFunction()">
<div class="jumbotron">
<h3 style="float:right;">logo </h3>
<h1 class="text-center">EAT : SLEEP : CODE</h1>
</div>

 <nav class="navbar navbar-inverse" style="margin-top:-1cm;">
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

<?php
$row = $records->row();
?>
<div id="update">
  <!-- <?php echo form_open('User_controller/update_now/'.$row->user_id);?> -->
  <form method="post" action="<?php echo base_url();?>index.php/User_controller/update_now/<?php echo $row->user_id;?>">
  <input type="text" name="update_name" value="<?php echo $row->name;?>"  style="padding:5px;border:2px solid #0099ff;border-radius:5px;">
  <input type="text" name="update_email" value="<?php echo $row->email;?>" style="padding:5px;border:2px solid #0099ff;border-radius:5px;">
  <input type="text" name="update_number" value="<?php echo $row->number;?>" style="padding:5px;border:2px solid #0099ff;border-radius:5px;">
  <input type="submit" name="update" id="update" value="update" style="color:white;background:#0099ff;padding:5px;border:none;box-shadow:2px 2px 5px;border-radius:10px/25px;">
<?php echo form_close();?>
</div>



    <script src="<?php echo base_url()?>assets/js/script.js"> </script>
</body>

</html>
