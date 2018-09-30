<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location:login.php");
	}
	include "../connection.php";
	$msg = "";
	if (isset($_GET["delete_id"]) && isset($_GET["delete_image"])) {
		$qry = mysqli_query($con, "delete from table_category where category_id='".mres($con, $_GET["delete_id"])."'") or die(mysqli_error($con));
		if ($qry) {
			unlink("../images/lectures/".$_GET["delete_image"]);
			$msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success!! Data is deleted.</div>';
		}
		else {
			$msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail!! Data cannot be deleted.</div>';
		}
	}
	
 ?>

<!-- header area starts here -->
<?php include "header.php"; ?>
	<div class="row" style="padding-left: 0px; padding-right: 0px;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
			<?php include "left_menu.php"; ?>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-right: 0px;">
			<div class="well">
				<form method="post" class="form-inline" id="form_search" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
					<div class="form-group">
						<label>Search by Name:</label>
						<input type="text" class="form-control" name="search_text" id="search_text">
					</div>
					<button type="submit" class="btn btn-deafult" name="btn_search" id="btn_search">Search</button>
				</form>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Manage Category</div>
				</div>
				<div class="panel-body">
					<?php echo $msg; ?>
					<table class="table table-hover table-bordered">
					    <thead>
					      <tr>
					      	<th>ID.</th>
					        <th>Category Name</th>
					        <th>Category Image</th>
					        <th>Category Order</th>
					        <th>Top Category Name</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
					      <?php 
					      	$qry = "";
					      	if (isset($_POST["btn_search"])) {
					      		$qry = mysqli_query($con, "select * from table_category inner join table_top_category on table_category.top_category_id = table_top_category.top_category_id where category_name like '%".mres($con, $_POST["search_text"])."%' order by category_order asc ");
					      	}
					      	else {
					      		$qry = mysqli_query($con, "select * from table_category inner join table_top_category on table_category.top_category_id = table_top_category.top_category_id order by category_order asc");
					      	}
					      	while ($row = $qry->fetch_assoc()) {
					      		echo '<tr>';
					      		echo '<td>'.$row["category_id"]."</td><td>".$row["category_name"]."</td><td><img src='../images/lectures/".$row["category_image"]."' style='display: block; margin-left: auto; margin-right: auto; height: 100px;'/>"."</td><td>".$row["category_order"]."</td><td>".$row["top_category_name"]."</td><td><a href='add_category.php?edit_id=".$row["category_id"]."'>Edit</a> | <a href='?delete_id=".$row["category_id"]."&delete_image=".$row["category_image"]."' onclick=\"return confirm('Are you sure to delete this item?');\"> Delete</td>";
					      		echo '</tr>';
					      	}

					       ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
			$('input[class="form-control"]').focus(function() {
				$(this).removeAttr('style');
			});
			$("#btn_search").click(function(e){
				if ($('#search_text').val() == '') {
					$('#search_text').css("border-color", "#DA190B");
					$('#search_text').css("background", "#F2DEDE");
					e.preventDefault();
				}
				else {
					$('form_search').unbind('submit').submit();
				}
			});
		});
	</script>
<!-- footer area starts here -->
<?php include "footer.php"; ?> 