<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location:login.php");
	}
	include "../connection.php";
    $msg = "";
    $lecture_id = "";
    $lecture_content = "";
    $lecture_order = "";
    $sub_category_id = "";
    if(isset($_GET["edit_id"])){
        $qedit = mysqli_query($con, "select * from table_lecture where lecture_id='".mres($con, $_GET["edit_id"])."'");
        while($row=mysqli_fetch_array($qedit, MYSQLI_ASSOC)){
            $lecture_id = $row["lecture_id"];
            $lecture_content = $row["lecture_content"];
            $lecture_order = $row["lecture_order"];
            $sub_category_id = $row["sub_category_id"];
        }
    }
	if(isset($_POST["btn_save"])){
        $lecture_id = mres($con, $_POST["text_lecture_id"]);
		$lecture_order = mres($con, $_POST["text_lecture_order"]);
		$sub_category_id = mres($con, $_POST["sub_category_id"]);
		$editor = mres($con, $_POST["editor"]);
		$qe = mysqli_query($con, "update table_lecture set lecture_content='".$editor."', lecture_order='".$lecture_order."', sub_category_id='".$sub_category_id."' where lecture_id='".$lecture_id."'");
		if($qe){
            header("Location:manage_lecture.php");
			$msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success!! Data is updated.</div>';
		}
		else{
			$msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail!! Data is not updated.</div>';
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
					<div class="panel-title">Edit Lecture</div>
				</div>

				<div class="panel-body">
				<?php echo $msg; ?>
					<form id="form_lecture" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
						<input type="hidden" name="text_lecture_id" value='<?php echo $lecture_id; ?>'>
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Sub Category</span>
							<select id="sub_category_id" name="sub_category_id" class="form-control">
								<option value="">-- Choose a Sub Category --</option>
								<?php 
									$qtc = mysqli_query($con, "select * from table_sub_category order by sub_category_order desc");
									while ($row = $qtc->fetch_assoc()) {
                                        if($row["sub_category_id"] == $sub_category_id){
                                            echo '<option value="'.$row["sub_category_id"].'" selected>'.$row["sub_category_name"].'</option>';
                                        }
                                        else{
                                            echo '<option value="'.$row["sub_category_id"].'">'.$row["sub_category_name"].'</option>';
                                        }
									}
								 ?>
							</select>
						</div> 
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Lecture Order</span>
							<input id="text_lecture_order" type="text" class="form-control" name="text_lecture_order" value='<?php echo $lecture_order; ?>'>
						</div> 
						<div style="margin-bottom: 25px;" class="input-group">
							Lecture Content<br/>
							<textarea class="form-control ckeditor" name="editor" id="editor"><?php echo $lecture_content; ?></textarea>
						</div> 
						<div style="margin-top: 10px;" class="form-group">
							<div class="col-sm-12 controls">
								<?php 
									echo '<input type="submit" id="btn_save" name="btn_save" class="btn btn-info btn-block btn-large" value="Edit">';
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
			$("#btn_save").click(function(e){
				if ($('#text_lecture_order').val() == '') {
					$('#text_lecture_order').css("border-color", "#DA190B");
					$('#text_lecture_order').css("background", "#F2DEDE");
					e.preventDefault();
				}
				if ($('#sub_category_id').val() == '') {
					$('#sub_category_id').css("border-color", "#DA190B");
					$('#sub_category_id').css("background", "#F2DEDE");
					e.preventDefault();
				}
				else {
					$('#form_lecture').unbind('submit').submit();
				}
			});
		});
	</script>
<!-- footer area starts here -->
<?php include "footer.php"; ?>