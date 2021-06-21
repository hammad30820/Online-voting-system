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
		<h3>Add Candidates</h3>
		<form method="GET" action="add_details_candidates.php">
			<div class="form-group">
				<label>Select Election Name</label>
				<select name="elections_name" class="form-control">
                <option value="" selected="selected">Select Election</option>
                <?php
                    $conn=new mysqli("localhost","root","","votingsystem_db");
                    $select="SELECT * FROM elections";
                    $run=$conn->query($select);
                    if($run->num_rows>0){
                        while($row=$run->fetch_array()){
                        
      
                ?>
                <option value="<?php echo $row['elections_name'];?>"><?php echo $row['elections_name'];?></option>            
                <?php
                   }
                }
                ?>
            
                </select>
            </div>
            <div class="form-group">
            	<label>No Of Candidates</label>
            	<input type="text" name="total_candidates" class="form-control">
            </div>	
			
		    <input type="submit" name="add_elections" class="btn btn-success">
		
			
		</form>
	    </div>
	</div>
	
</body>
</html>
