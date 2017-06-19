<?php
include("db.php");
session_start();
$msg ='';
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
<title>Lumino - Dashboard</title>

<?php

if(isset($_POST['edit'])){

$userid = $_POST['userid'];

$username_query = mysql_query("SELECT * FROM task  WHERE userid = '$userid'");
$row = mysql_fetch_assoc($username_query);

?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
<div class="row">	
		<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit task </div>
					<div class="panel-body">
						<div class="col-md-6">
							
                            <form role="form" method="post" action="modify.php">
							    
								<div class="form-group">
									<label>User Id</label>
									<input class="form-control" placeholder="name" name="userid" value="<?php echo $row["userid"];?>" readonly>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" placeholder="name" name="uname" value="<?php echo $row["uname"];?>" >
								</div>
								<div class="form-group">
									<label>Description</label>
									<input class="form-control" placeholder="name" name="descr" value="<?php echo $row["descr"];?>" >
								</div>
								<div class="form-group">
									 <input name="submit" class="btn btn-primary" type="submit" value="Modifiy">
					                 			
								</div>
								
								</form>
								
</div>	
								</div>	
</div>								
</div>	
</div>
</div>	










<?php
exit();
}

if(isset($_POST['delete'])){

$userid = $_POST['userid'];

$sp = "DELETE from task WHERE userid='$userid'";

if(mysql_query($sp)=== True)
{
	$msg = '<span style="color:Green"> Record deleted successfully </span>';
}
else {
	$msg = '<span style="color:red"> Record deleted successfully </span>';
}


}

?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
			
					<div class="panel-heading table" >Tasks Created <?php echo $msg; ?></div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th >ID</th>
						         <th >Name</th>
								<th >Description</th>
								<th >Date Created</th>
						        <th >Date Updated</th>
						        <th >Modifiy</th>
								
						        
						    </tr>
						    </thead>
							<tbody>
							<?php


$username_query = mysql_query("SELECT * FROM task where username='$user'");
$count=mysql_num_rows( $username_query);
             if($count !== 0)
             {

    // output data of each row
    while($row = mysql_fetch_assoc($username_query)) {
		
		
?>
							
						         <tr>
        <td class="center"><?php echo  $row["userid"]; ?></td>
        <td class="center" ><?php echo  $row["uname"]; ?></td>
		<td class="center"><?php echo  $row["descr"]; ?></td>
        <td class="center"><?php echo  $row["date_c"]; ?></td>
	    <td class="center" ><?php echo  $row["date_u"]; ?></td>
        <td class="center" ><form role="form" method="post"><input type="hidden" value="<?php echo  $row["userid"]; ?>" name="userid" />
		<input name="edit" class="btn btn-primary" type="submit" value="edit"> <input name="delete"onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" type="submit" value="Delete">
		</form></td>			        
						    </tr>
							
							<?php
	}
	
} else {
    $msg = "no tasks";
}

?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div><!--/.row-->	
		
			
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
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
<?php  } 
else{
	echo 'please login';
}
?>