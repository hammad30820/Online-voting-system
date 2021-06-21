<?php
session_start();
include("include/loginheader.php");
?>
<br>
<div class="container">
    
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text text-info text-center">Result</h3>
        <p class="text text-center text-danger"></p>
        <form method="post">
            <div class="form-group">
                <select class="form-control" name="elections_name">
                <option  selected ="selected" value="">select election</option>
                <?php
                require("include/db.php");
                $select="SELECT * FROM elections";
                $run=$conn->query($select);
                if($run->num_rows>0){
                while($row=$run->fetch_array()){
                  echo  $elections_name=$row['elections_name'];
                    $elections_start_date=$row['elections_start_date'];
                    $elections_end_date=$row['elections_end_date'];
                    ?>
                    <option value="<?php echo $elections_name;?>"><?php echo $elections_name;?></option>
                    <?php
                }
                }
                ?>
                </select>
            </div>
                <div class="form-group">
                    <input type="submit" name="search_results" class="btn btn-success" value="Results">
                </div>
                </form>
                <table class="table table-responsive table-hover table-bordered text-center">
            <tr>
                <td>#</td>
                <td>Candidates name</td>
                <td>Votes</td>
                <td>Winning Status</td>
            </tr>
            <?php
            

            if(isset($_POST['search_results'])){
               $elections_name=$_POST['elections_name'];
               $select="select * from Results where elections_name='$elections_name'";
               $run=$conn->query($select);
               if($run->num_rows>0){
                $total_elections_votes=0;
                   while ($row=$run->fetch_array()) {
                        $total_elections_votes=$total_elections_votes+1;
                               
                    }
                }
                    $select="select * from candidates_db where elections_name='$elections_name'";
                    $run1=$conn->query($select);
                    if($run1->num_rows>0){
                        $total=0;
                    while ($row1=$run1->fetch_array()) {
                    $total=$total+1;    
                    $candidates_name=$row1['candidates_name'];
                    $total_votes=$row1['total_votes'];
                    $percentage=(($total_votes/$total_elections_votes)*100);
                    ?>
                    <tr>
                        <td><?php echo $total;?></td>
                        <td><?php echo $candidates_name;?></td>
                        <td><?php echo $total_votes;?></td>
                        <td><?php echo $percentage;?>%</td>

                    </tr>
                    <?php

                }
              }
              else{
                    ?>
                        <tr>
                            <td colspan="4">Record not found</td>
                        </tr>    
                    <?php
                }
            }
        ?>
        </table>
            </div>     
    </div>
</div>     
