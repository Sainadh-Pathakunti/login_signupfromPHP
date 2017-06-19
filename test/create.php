<?php
session_start();
include("db.php");
$error='';
$user = '';

if(isset($_SESSION['user']))
{
$user = $_SESSION["user"];	
include("header.php");
?>	
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Assignment</title>


<?php 

if (isset($_POST['submit']))
	{

$uname = $_POST['uname'];
$desc = $_POST['desc'];
		
if (!empty($uname) && !empty($desc) ) 
    {


$sql = "INSERT INTO task (uname,descr,date_c,date_u,username)VALUES 
                       ('$uname','$desc',now(),now(),'$user')";
 
 if (mysql_query($sql) === TRUE) {

                           $error = "<span style='color:green'>Task Created</span>";

			    }
				
				

}
else
{
$error = "<span style='color:red'>fields are empty</span>";
}

}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
<div class="row">	
		<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Create task</div>
					<div class="panel-body">
						<div class="col-md-6">
							
                            <form role="form" method="post">
							
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" placeholder="name" name="uname" >
								</div>
								<div class="form-group">
									<label>Description</label>
									<input class="form-control" placeholder="description" name="desc" >
								</div>
								<div class="form-group">
									 <input name="submit" class="btn btn-primary" type="submit" value="create">
					                <?php echo $error; ?> 			
								</div>
								
								</form>
								
</div>	
								</div>	
</div>								
</div>	
</div>
</div>							
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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
	<?php
}
	else{
	echo 'please login';
}
	?>							