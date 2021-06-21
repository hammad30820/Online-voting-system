<?php
session_start();
include("include/loginheader.php");
?>

<br>
<div class="container">
    
    <div class="col-md-6 col-md-offset-3">
        <form method="POST" action="">
        <?php
        $conn=new mysqli("localhost","root","","votingsystem_db");
        $elections_name=$_GET['elections_name'];
        $elections_name=str_replace('-',' ',$elections_name );
        ?>
        <div class="form-group">
            <input type='text' value="<?php echo $elections_name;?>" class='form-control' readonly />

        <?php
        $select="select * from candidates_db where elections_name='$elections_name'";
        $run=$conn->query($select);
        if($run->num_rows>0){
            while ($row=$run->fetch_array()) {

                ?>
                <div class="form-group">
                    <input type="radio" name="candidates_name" class="list-group" value="<?php echo $row['candidates_name'];?>">
                    <label><?php echo $row['candidates_name'];?></label>
                </div>    
                <?php
                    
                
                
            }
        }
        else
            echo "error"

        ?>
        <input type="submit" name="vote_caste" class="btn btn-success" value="Vote">
        </form>
    
    </div>
</div>     
<?php
if(isset($_POST['vote_caste'])){
    $candidates_name=$_POST['candidates_name'];
    $user_email=$_SESSION['user_email'] ;
    $select="select * from results where elections_name='$elections_name' and user_email='$user_email'";
    $exe1=$conn->query($select);
    if($exe1->num_rows>0){
        echo"Already voted for ".$elections_name;
    }
    else{
         $insert="insert into results (user_email,candidates_name,elections_name) values('$user_email','$candidates_name','$elections_name')";
     $run=$conn->query($insert);
     if($run){
        $update=" update candidates_db set total_votes=`total_votes`+'1' where candidates_name='$candidates_name' and elections_name='$elections_name'";
        $exe=$conn->query($update);
        if($exe){
            echo"success";
        }
        else{
            echo"not cast";
        }
     }
     else{
        echo"error";
     }
    }
   
    
    

}
?>




	