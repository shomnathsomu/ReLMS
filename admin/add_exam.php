<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location:login.php");
	}
	include "../connection.php";
	$msg = "";
	$exam_id="";
    $category_id="";
    $exam_content="";
    $a=$b=$c=$d="";
    $answer="";
	if (isset($_GET["edit_id"])) {
		$qe = mysqli_query($con, "select * from table_exam where exam_id='".mres($con, $_GET["edit_id"])."'");
		while ($row = $qe->fetch_assoc()) {
			$exam_id=$row["exam_id"];
			$category_id=$row["category_id"];
			$exam_content=$row["exam_content"];
			$a=$row["a"];
			$b=$row["b"];
			$c=$row["c"];
			$d=$row["d"];
			$answer=$row["answer"];
		}
	}
	if (isset($_POST["btn_save"])) {
		$category_id=mres($con, $_POST["category_id"]);
		$exam_content = mres($con, $_POST["exam_content"]);
		$a = mres($con, $_POST["a"]);
		$b = mres($con, $_POST["b"]);
		$c = mres($con, $_POST["c"]);
		$d = mres($con, $_POST["d"]);
		$answer = mres($con, $_POST["answer"]);
		$qry = mysqli_query($con, "insert into table_exam values('', '".$category_id."', '".$exam_content."', '".$a."', '".$b."', '".$c."', '".$d."', '".$answer."')") or die(mysqli_error($con));
		if ($qry) {
			$msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success!! Data is inserted.</div>';
		}
		else {
			$msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Failed!! Data cannot be inserted.</div>';
		}
	}
	if (isset($_POST["btn_edit"])) {
		$exam_id = mres($con, $_POST["exam_id"]);
		$category_id = mres($con, $_POST["category_id"]);
		$exam_content = mres($con, $_POST["exam_content"]);
		$a = mres($con, $_POST["a"]);
		$b = mres($con, $_POST["b"]);
		$c = mres($con, $_POST["c"]);
		$d = mres($con, $_POST["d"]);
		$answer = mres($con, $_POST["answer"]);
		$qry = mysqli_query($con, "update table_exam set category_id = '".$category_id."', exam_content = '".$exam_content."', a = '".$a."', b = '".$b."', c = '".$c."', d = '".$d."', answer = '".$answer."' where exam_id = '".$exam_id."'") or die(mysqli_error($con));
		if ($qry) {
			header("Location:manage_exam.php");
			$msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success!! Data is edited.</div>';
		}
		else {
			$msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Failed!! Data cannot be edited.</div>';
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
					<div class="panel-title">Add Exam Content</div>
				</div>

				<div class="panel-body">
					<?php echo $msg; ?>
					<form id="form_exam_content" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
						<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>"> 
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Category</span>
							<select id="category_id" name="category_id" class="form-control">
								<option value="">-- Choose a Category --</option>
								<?php 
									$qtc = mysqli_query($con, "select * from table_category order by category_order desc");
									while ($row = $qtc->fetch_assoc()) {
										if ($row["category_id"] == $category_id) {
											echo '<option value="'.$row["category_id"].'" selected>'.$row["category_name"].'</option>';
										}
										else {
											echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
										}
									}
								 ?>
							</select>
						</div> 
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Exam Content</span>
							<input id="exam_content" type="text" class="form-control" name="exam_content" value="<?php echo $exam_content; ?>">
						</div> 
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">a.</span>
							<input id="a" type="text" class="form-control" name="a" value="<?php echo $a; ?>">
						</div>
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">b.</span>
							<input id="b" type="text" class="form-control" name="b" value="<?php echo $b; ?>">
						</div>
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">c.</span>
							<input id="c" type="text" class="form-control" name="c" value="<?php echo $c; ?>">
						</div>
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">d.</span>
							<input id="d" type="text" class="form-control" name="d" value="<?php echo $d; ?>">
						</div>
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Answer.</span>
							<input id="answer" type="text" class="form-control" name="answer" value="<?php echo $answer; ?>">
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
				if ($('#category_id').val() == '') {
					$('#category_id').css("border-color", "#DA190B");
					$('#category_id').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#exam_content').val() == '') {
					$('#exam_content').css("border-color", "#DA190B");
					$('#exam_content').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#a').val() == '') {
					$('#a').css("border-color", "#DA190B");
					$('#a').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#b').val() == '') {
					$('#b').css("border-color", "#DA190B");
					$('#b').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#c').val() == '') {
					$('#c').css("border-color", "#DA190B");
					$('#c').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#d').val() == '') {
					$('#d').css("border-color", "#DA190B");
					$('#d').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#answer').val() == '') {
					$('#answer').css("border-color", "#DA190B");
					$('#answer').css("background", "#F2DEDE");
					e.preventDefault();
				}
				else {
					$('form_exam_content').unbind('submit').submit();
				}
			});
		});
	</script>
<!-- footer area starts here -->
<?php include "footer.php"; ?>