<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location:login.php");
	}
	include "../connection.php";
	$msg = "";
	if (isset($_GET["delete_id"])) {
		$qry = mysqli_query($con, "delete from table_exam where exam_id='".mres($con, $_GET["delete_id"])."'") or die(mysqli_error($con));
		if ($qry) {
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
					<div class="panel-title">Manage Exam</div>
				</div>
				<div class="panel-body">
					<?php echo $msg; ?>
					<table class="table table-hover table-bordered">
					    <thead>
					      <tr>
					      	<th>ID.</th>
					      	<th>Subject Name</th>
					        <th>Exam Content</th>
					        <th>A, B, C, D</th>
					        <th>Answer</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
					      <?php 
					      	$qry = "";
					      	if (isset($_POST["btn_search"]) && isset($_POST["search_text"])) {
					      		$qry = mysqli_query($con, "select * from table_exam inner join table_category on table_exam.category_id = table_category.category_id where category_name like '%".mres($con, $_POST["search_text"])."%' order by exam_id desc ");
					      	}
					      	else {
					      		$qry = mysqli_query($con, "select * from table_exam inner join table_category on table_exam.category_id = table_category.category_id order by exam_id desc");
					      	}
					      	while ($row = $qry->fetch_assoc()) {
					      		echo '<tr>';
					      		echo '<td>'.$row["exam_id"]."</td><td>".$row["category_name"]."</td><td>".$row["exam_content"]."</td><td>a. ".$row["a"].", b. ".$row["b"].", c. ".$row["c"].", d. ".$row["d"]."</td><td>".$row["answer"]."</td><td><a href='add_exam.php?edit_id=".$row["exam_id"]."'>Edit</a> | <a href='?delete_id=".$row["exam_id"]."' onclick=\"return confirm('Are you sure to delete this item?');\"> Delete</td>";
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
		});
	</script>
<!-- footer area starts here -->
<?php include "footer.php"; ?> 