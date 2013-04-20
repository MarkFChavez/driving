<?php 
#Author Lance Zaldua
#For Improvement

	include 'Models/UserModel.php';
	include 'Connector/Connector.php';
	include 'Services/UserService.php';
	
	$userModel = new UserModel();
	$db = new Connector();
	$userService = new UserService();
	
	$data = $userService->getRegistrations();
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
              <li><a href="index.php">Home</a></li>
              <li class="active"><a href="Registration.php">Registration</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  
	<div class="container">
		<table>
			<thead>
				<tr>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th>Birthday</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Reservation Date</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($data as $userModel):?>
				<tr>
					<td><?php echo $userModel->getFirstName()?></td>
					<td><?php echo $userModel->getMiddleName()?></td>
					<td><?php echo $userModel->getLastName()?></td>
					<td><?php echo $userModel->getBirthday() ?></td>
					<td><?php echo $userModel->getMobile()?></td>
					<td><?php echo $userModel->getEmail()?></td>
					<td><?php echo $userModel->getReservationDate()?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
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