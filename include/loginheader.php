
<html>
<head>
<title>Online voting system</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<script src="js/bootstrap.js"></script>
<script src="js/javascript.js"></script>
</head>
<body>
    <div class="container">
	    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Online Voting System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="welcome.php">Home</a></li>
                    <li><a href="vote.php">Election</a></li>
					<li><a href="vote.php">Vote</a></li>
					<li><a href="results.php">Result</a></li>
					<li><a href="#"><?php echo $_SESSION['user_name'];?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
	</div>
	<div class="container">
	    
		    <div class="col-md-6 col-md-offset-3">
		        <img src="votem.png" class="img img-thumbnail img-responsive">
			</div>	
	    
	</div>	
	