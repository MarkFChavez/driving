<?php 
#Author Lance Zaldua
#For Improvement

	include '../Models/UserModel.php';
	include '../Connector/Connector.php';
	include '../Services/UserService.php';
	
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
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  
	<div class="container">
		<form method="post" class="well">
			<label>First Name: </label><input type="text" name="firstName" value="<?php echo $userModel->getFirstName() ?>"><br />
			<label>Middle Name: </label><input type="text" name="middleName" value="<?php echo $userModel->getMiddleName() ?>"><br />
			<label>Last Name: </label><input type="text" name="lastName" value="<?php echo $userModel->getLastName()?>"><br />
			<label>Birthday: </label><input type="text" name="birthday" id="birthday" value="<?php echo $userModel->getBirthday() ?>"><br />
			<label>Mobile: </label><input type="text" name="mobile" value="<?php echo $userModel->getMobile()?>"><br />
			<label>Email: </label><input type="text" name="email" value="<?php echo $userModel->getEmail()?>"><br />
			
			<input type="submit" name="Register" value="Register" />
		</form>
	</div>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jquery-ui/jquery-1.9.1.js"></script>
	<script src="jquery-ui/ui/jquery.ui.core.js"></script>
	<script src="jquery-ui/ui/jquery.ui.widget.js"></script>
	<script src="jquery-ui/ui/jquery.ui.datepicker.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#birthday").datepicker({
				dateFormat: 'yy-mm-dd',
	            changeMonth: true,
	            changeYear: true,
	            yearRange:'-100y:c+nn',
	            maxDate: '-18y'
	        });
		});
	</script>
	</body>
</html>
