<?php
include("db.php");
 session_start();
$msg = '';

if(isset($_POST['submit'])){

$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$username = mysql_real_escape_string($_POST['username']);

if (!empty($username)&& !empty($password) && !empty($password1) ) 
    {
		
		if(strlen($password) < 8){
			
			$msg = "Password atleast 8 characters<br>";
		}
		else{
			
		if($password == $password1)	{
             $username_query = mysql_query("SELECT * FROM username WHERE username = '$username'");
             $count=mysql_num_rows( $username_query);
             if($count==0)
             {
               $sql = "INSERT INTO username (username,password,date)VALUES 
                       ('$username','$password',now())";
                if (mysql_query($sql) === TRUE) {

                             echo'<h5 stylye="align=center">You have been sucessfully registered, please wait...</h5>';
                             header( "refresh:1;url=index.php" );
				}
			  exit;
             }
            else
            {
             $msg = "username already exists<br>";
              
            }
		}
		else{ $msg="password does not match";
		}
			
		}	
	}	
    else {
             $msg = " Fill the empty fields<br>";
   }


   
  }
	 
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Sign up</div>
				<div class="panel-body">
					<form action="" method="post" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm password" name="password1" type="password" >
							</div>
				
							  <input name="submit" class="btn btn-primary" type="submit" value="Sign up">
                             <span style="
    color: red;
" ><?php echo $msg; ?></span>

                          <span>already registred<a href="index.php"> login</a></span>
						</fieldset>
						
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	                                                                                  