<?php
include("db.php");
 session_start();
$msg = '';

if(isset($_POST['submit'])){

$username = $_POST['username'];
$password = $_POST['password'];
$username = mysql_real_escape_string($_POST['username']);

if (!empty($username)&& !empty($password) ) 
    {
		
		
		
$username_query = mysql_query("SELECT * FROM username WHERE username = '$username' and password = '$password'");
             $count=mysql_num_rows( $username_query);
             if($count==0)
             {
               $msg = "user does not exist or password wrong<br>";
             }
            else
            {
		     $_SESSION["user"] = $username;
             header("Location: main.php");
              
            }
		
			
			
	}	
    else {
             $msg = " Fill the empty fields<br>";
   }


   
  }
	 
?>



<!DOCTYPE html>
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
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form action="" method="post" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" >
							</div>
							
				
							  <input name="submit" class="btn btn-primary" type="submit" value=" Login ">
                             <span style="
    color: red;
" ><?php echo $msg; ?></span>

                          <span><a href="signup.php"> Sign Up</a></span>
						</fieldset>
						
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
