<?php 
#Author Lance Zaldua
#For Improvement

	include 'Models/UserModel.php';
	include 'Connector/Connector.php';
	include 'Services/UserService.php';
	
	$userModel = new UserModel();
	$db = new Connector();
	$userService = new UserService();
	
	if(isset($_POST['Register'])){
		$data = $userModel->populateModel($_POST); //pass the post variables to the user model
		if(count($data)===0){//if data is complete and valid do below
			$returnedData = $userService->insertUser($userModel);//insert to database process starts here
			//echo $returnedData['userModel']->getBirthday();
		}else{
			foreach ($data as $item){
				echo $item."<br> "; //print error in data entry
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Driving School</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="jquery-ui/themes/base/jquery.ui.all.css" rel="stylesheet">
		<style>
		      body {
		        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		      }
    	</style>
	</head>
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="brand">Driiivee</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="Registration.php">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  
	<div class="container">
		<h1>This is the skeleton</h1>
		<p>I need to add more stuff here</p>
	</div>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	</body>
</html>
