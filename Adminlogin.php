<?php
session_start();
include("include/header.php");
?>

<?php
require("include/db.php");
$error="";
$success="";

if(isset($_POST['login'])){
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];

    $select="select * from admin where admin_email='$admin_email' and admin_password='$admin_password'";
	$run=$conn->query($select);
	if($run->num_rows>0){
		while ($row=$run->fetch_array()) {
			$_SESSION['admin_name']=$admin_name=$row['admin_name'];
			$_SESSION['admin_email']=$admin_email=$row['admin_email'];
			echo"<script>window.location.href='admin.php' </script>";
			
		}
	}
	else{
		$error="<span colour= red>Invalid Email or Password! ";
		 

    }
}
?>
<br>
<div class="container">
	
    <div class="row">
		<div class="col-sm-7 col-sm-offset-5">
                
            <form method="POST" id="signup-form" class="signup-form">
                <h2 class="form-title "><b>Admin login</b></h2>
				    <?php
				        if($error!=""){
						    echo "<span class='text text-danger'>".$error."</span>"; 
						}
					    if($success!=""){
							echo $success;
						}
					?>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                    </div>
                      
                    <div class="form-group">
                        <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                        
                        
                    <div class="form-group">
                        <input type="submit" name="login" id="submit" class="form-submit" value="login"/>
                    </div>
            </form>
                   
                
        </div>
	</div>
        
</div>
    