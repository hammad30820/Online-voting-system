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
		<h3>Add Candidates For</h3>
		<form method="POST">
			<?php
            $conn=new mysqli("localhost","root","","votingsystem_db");
               $elections_name=$_GET['elections_name'];
               $total_candidates=$_GET['total_candidates'];
               ?>

               <input type="text" name="elections_name" value="<?php echo $elections_name;?>"class="btn btn-default" readonly="readonly">
               <?php

               for ($i=1; $i<=$total_candidates ; $i++) { 
                   ?> 

                   <div class="form-group">
                       <label>Candidates Name<?php echo $i;?></label>
                       <input type="text" name="candidates_name<?php echo $i;?>" class="form-group">
                   </div>
                    <div class="form-group">
                        <label>About candidate<?php echo $i;?></label>
                        <input type="text" class="form-group" name="candidates_details<?php echo $i;?>" placeholder="description about Candidates"/>
                    </div>
                    <br>
                    <br>

                   <?php
               }
            ?>
            <input type="submit" name="add_details_candidates" class="btn btn-success">
		</form>
	    </div>
	</div>
	
</body>
</html>
<?php
if(isset($_POST['add_details_candidates'])){
    $total_candidates=$_GET['total_candidates'];
    $elections_name=$_POST['elections_name'];

    for ($i=1; $i<=$total_candidates ; $i++) { 
        $candidates_name[]=$_POST['candidates_name'.$i];
        $candidates_details[]=$_POST['candidates_details'.$i];
    }
    for ($i=0; $i <$total_candidates ; $i++) { 
        $insert="INSERT INTO Candidates_db (candidates_name,candidates_details,elections_name) values('$candidates_name[$i]','$candidates_name[$i]','$elections_name')";
        $run=$conn->query($insert);
    }
    if($run){
        echo "success";

    }
    else{
        echo "error";
    }
    
}    

?>