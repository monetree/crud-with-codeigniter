
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
  .plinks{
    color:#0099ff;
    text-decoration:none;
    background:lightgrey;

    padding:0px 6px;
    border:1px solid grey;
  }
  .plinks:hover{
    text-decoration:none;
  }
  .curpage{
    background:#0099ff;
    color:#fff;
    padding:0px 6px;
      border:1px solid grey;
  }
  body{
    overflow-x: hidden;
  }
</style>
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
</div>
<div class="col-sm-6">
</div>
<div class="col-sm-2">
<?php if(isset($error)){echo $error;}?>
<?php echo form_open_multipart('User_controller/upload')?>
<label style="border:2px solid #0099ff;color:#0099ff;padding:2px;box-shadow:inset 2px 5px 5px siver;corsor:pointer;">Pick Up
<input type="file" name="image" style="display:none;">
</label>
<button class="btn btn-info" type="submit" name="upload">upload</button>
<?php echo form_close();?>
</div>
</div>


<div class="row">
  <div class="col-sm-4" style="margin:10px;">

</div>

  <div class="col-sm-4">
<h1 style="color:#0099ff;text-align:center;">Total No of Users: <?php if(isset($total_user)){echo $total_user;}?></h1>
</div>
  <div class="col-sm-4">
</div>
</div>
<div class="container">


<div class="row">


  <div class="col-sm-2">
  <div class="form-group">
<select class="form-control" id="sel1">
  <option>-Search By-</option>
  <option>Name</option>
  <option>Email</option>
  <option>Mobile</option>
</select>
</div>
</div>
  <div class="col-sm-4">
<div class="form-group">
  <input type="text" class="form-control" name="filter" id="usr" placeholder="search here..">
</div>
</div>
<div class="col-sm-2">
<button type="submit" name="search" class="btn btn-info adj">Search</button>
</div>
</div>



<div class="row">
  <div class="col-sm-12">
<table class="table table-striped">
  <thead>
    <tr>
      <th>Sl.No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Number</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i = 1;
      foreach($records->result() as $row)
      {
       ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo ucfirst($row->name);?></td>
      <td><?php echo ucfirst($row->email);?></td>
      <td><?php echo $row->number;?></td>
      <td>
        <a href="<?php echo base_url();?>index.php/user_controller/get_records/<?php echo $row->user_id;?>" style="font-weight:bold;">delete</a>
        <a href="<?php echo base_url();?>index.php/user_controller/update_records/<?php echo $row->user_id;?>">Update</a>
      </td>
    </tr>
    <?php
    $i++;
      }
     ?>
  </tbody>
</table>
</div>
</div>


<?php
echo "<h1 style=color:#0099ff;text-align:center;letter-spacing:10px;>".$paginations."</h1>";
 ?>


</body>
</html>
