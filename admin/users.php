<html>
<head>
<title>Online voting system</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<script src="js/bootstrap.js"></script>
<script src="js/javascript.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-sm-6">
		<table class="table table-responsive table-hover">
			<tr>
				<th>#</th>
				<th>User name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Address</th>
				<th>Email</th>

			</tr>
			<?php
			$conn=new mysqli("localhost","root","","votingsystem_db");
			$select="SELECT * FROM users_db";
			$run=$conn->query($select);
	        if($run->num_rows>0){
	        	$total=0;
		        while ($row=$run->fetch_array()) {
		        	$total=$total+1;
		        	?>
		        	<tr>
		        		<td><?php echo $total;?></td>
		        		<td><?php echo $row['user_name'];?></td>
		        		<td><?php echo $row['user_gender'];?></td>
		        		<td><?php echo $row['user_age'];?></td>
		        		<td><?php echo $row['user_address'];?></td>
		        		<td><?php echo $row['user_email'];?></td>
		        	</tr>
		        	<?php
		    }
		    }
			
		



			?>
		</table>
	</div>
    </div>
</body>
</html>
    

