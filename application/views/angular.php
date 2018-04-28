<!DOCTYPE html>
<html>
     <head>
          <title>Webslesson Tutorial | Dynamic Dropdown list using AngularJS in PHP</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     </head>
     <body>
          <br /><br />
          <div class="container" style="width:600px;">
               <h3 align="center">Dynamic Dropdown list using AngularJS in PHP</h3>
               <br />


<div ng-app="myapp" ng-controller="usercontroller">
<?php echo form_open('User_controller/angular_test');?>
<select name="country" ng-model="country" class="form-control" ng-change="loadState()">
<option value="">Select Country</option>
<?php
foreach($country_name->result() as $country){
 ?>
<option value="<?php echo $country->country_id;?>"><?php echo $country->country_name;?></option>
<?php
}
 ?>
</select>
<br />
<select name="state" ng-model="state" class="form-control" ng-change="loadDistric()">
<option value="">Select State</option>
<option ng-repeat="state in states" value="{{state.state_id}}">{{state.state_name}}</option>
</select>


<br />
<select name="distric" ng-model="distric" class="form-control">
<option value="">Select Distric</option>
<option ng-repeat="distric in districs" value="{{distric.distric_id}}">
{{distric.distric_name}}
</option>
</select>
<br>
<div class="form-group">
  <input type="text" class="form-control" name="data" placeholder="enter data">
  <button type="submit" class="btn btn-info" name="submit">button</button>
</div>
<h1><?php if(isset($success)){ echo $success;}?></h1>
<h1><?php if(isset($failed)){ echo $failed;}?></h1>
<?php echo form_close();?>
</div>



          </div>
     </body>
</html>
<script>
var app = angular.module("myapp",[]);
app.controller("usercontroller", function($scope, $http){
     $scope.loadState = function(){
          $http.post("http://localhost/code/index.php/User_controller/angular_get_state", {'country_id':$scope.country})
          .then(function(response){
               $scope.states = response.data.states;
          });
     }
     $scope.loadDistric = function(){
       $http.post("http://localhost/code/index.php/User_controller/angular_get_distric", {'state_id':$scope.state})
       .then(function(response){
         $scope.districs = response.data.districs;
       });
     }
});
</script>
