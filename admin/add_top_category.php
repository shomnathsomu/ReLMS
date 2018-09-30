<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location:login.php");
	}
	include "../connection.php";
	$msg = "";
	$top_category_id="";
	$top_category_name="";
	$top_category_order="";
	if (isset($_GET["edit_id"])) {
		$qe = mysqli_query($con, "select * from table_top_category where top_category_id='".mres($con, $_GET["edit_id"])."'");
		while ($row = $qe->fetch_assoc()) {
			$top_category_id=$row["top_category_id"];
			$top_category_name=$row["top_category_name"];
			$top_category_order=$row["top_category_order"];
		}
	}
	if (isset($_POST["btn_save"])) {
		$text_top_category_name = mres($con, $_POST["text_top_category_name"]);
		$text_top_category_order = mres($con, $_POST["text_top_category_order"]);
		$qry = mysqli_query($con, "insert into table_top_category values('', '".$text_top_category_name."', '".$text_top_category_order."')") or die(mysqli_error($con));
		if ($qry) {
			$msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success!! Data is inserted.</div>';
		}
		else {
			$msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail!! Data cannot be inserted.</div>';
		}
	}
	if (isset($_POST["btn_edit"])) {
		$top_category_id = mres($con, $_POST["top_category_id"]);
		$text_top_category_name = mres($con, $_POST["text_top_category_name"]);
		$text_top_category_order = mres($con, $_POST["text_top_category_order"]);
		$qry = mysqli_query($con, "update table_top_category set top_category_name = '".$text_top_category_name."', top_category_order = '".$text_top_category_order."' where top_category_id = '".$top_category_id."'") or die(mysqli_error($con));
		if ($qry) {
			header("Location:manage_top_category.php");
			$msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success!! Data is edited.</div>';
		}
		else {
			$msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail!! Data cannot be edited.</div>';
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
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Add New Top Category</div>
				</div>

				<div class="panel-body">
					<?php echo $msg; ?>
					<form id="form_add_top_category" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
						<input type="hidden" name="top_category_id" value="<?php echo $top_category_id; ?>">
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Top Category Name</span>
							<input id="text_top_category_name" type="text" class="form-control" name="text_top_category_name" value="<?php echo $top_category_name; ?>">
						</div> 
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Top Category Order</span>
							<input id="text_top_category_order" type="text" class="form-control" name="text_top_category_order" value="<?php echo $top_category_order; ?>">
						</div> 
						<div style="margin-top: 10px;" class="form-group">
							<div class="col-sm-12 controls">
								<?php 
									if (!isset($_GET["edit_id"])) {
										echo '<input type="submit" id="btn_save" name="btn_save" class="btn btn-info btn-block btn-large" value="Save">';
									}
									else {
										echo '<input type="submit" id="btn_edit" name="btn_edit" class="btn btn-info btn-block btn-large" value="Edit">';
									}
								 ?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
			$('input[class="form-control"]').focus(function() {
				$(this).removeAttr('style');
			});
			$("#btn_save,#btn_edit").click(function(e){
				if ($('#text_top_category_name').val() == '') {
					$('#text_top_category_name').css("border-color", "#DA190B");
					$('#text_top_category_name').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#text_top_category_order').val() == '') {
					$('#text_top_category_order').css("border-color", "#DA190B");
					$('#text_top_category_order').css("background", "#F2DEDE");
					e.preventDefault();
				}
				else {
					$('form_add_top_category').unbind('submit').submit();
				}
			});
		});
	</script>
<!-- footer area starts here -->
<?php include "footer.php"; ?>