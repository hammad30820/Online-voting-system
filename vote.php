<?php
session_start();
include("include/loginheader.php");
?>
<br>
<div class="container">
    
    <div class="col-md-6 col-md-offset-3">
        <form method="post">
            <label>Election names</label>
            <select name="elections_name" class="form-control">
                <option value="" selected="selected">Select Election</option>
            <?php
            require("include/db.php");
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
            <br>
            <input type="submit" name="search_candidate" class="btn btn-success" value="search cadidate">
        </form>
    </div>
</div>     
<?php 
date_default_timezone_set("Asia/kolkata");
if(isset($_POST['search_candidate'])){
    $elections_name=$_POST['elections_name'];
    $select="select * from elections where elections_name='$elections_name'";
    $run=$conn->query($select);
    if($run->num_rows>0){
        while ($row=$run->fetch_array()) {
            $elections_start_date=$row['elections_start_date'];
            $elections_end_date=$row['elections_end_date'];
        }
    }
    $current_ts=time();
    $elections_start_date_ts=strtotime($elections_start_date);
    $elections_end_date_ts=strtotime($elections_end_date);
    if($elections_end_date_ts<$current_ts){
        echo "Election closed";
    }
    else if($current_ts<$elections_start_date){
        echo "elections stated";
    }
    else{
         ?>
         <a href="votecaste.php?elections_name=<?php echo str_replace(' ','-',$elections_name);?>">Click here</a>
         <?php
    }

}

?>   



	