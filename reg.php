<?php
include("include/header.php");
?>
<?php
require("include/db.php");

if(isset($_POST['register'])){
    $user_name=$_POST['fullname'];
    $user_email=$_POST['email'];
    $user_age=$_POST['age'];
    $user_gender=$_POST['gender'];
    $user_address=$_POST['address'];
    $user_password=$_POST['password'];

    $select="select * from users_db where user_email='$user_email'";
    $exe=$conn->query($select);
    if(!empty($exe) && $exe->num_rows>0){
        echo " email already registered";
    }
    else {
           $insert="insert into users_db(user_name,user_email,user_age,user_gender,user_address,user_password)
     values('$user_name','$user_email','$user_age','$user_gender','$user_address','$user_password')";
     $run=$conn->query($insert);
     if($run){
        echo"success";
     }
     else{
        echo"error";
     }
    }

 
}
?>
<body>
<br>
    <div class="container">
	<div class="jumbotron">
		<div class="row">
		    <div class="col-sm-7 col-sm-offset-5">
                
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title "><b>User Registration</b></h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="fullname" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="radio-inline " >
                        <label><input type="radio" name="gender" value="Male">Male</label>
                        </div>
                        <div class="radio-inline">
                        <label><input type="radio" name="gender" value="Female">Female</label>
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input" name="age" id="age" placeholder="Your age"/>
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input" name="address" id="address" placeholder="Your address"/>
                        </div>
						    
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="register" id="submit" class="form-submit" value="register"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                
            </div>
			</div>
        

    </div>