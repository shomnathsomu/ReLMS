<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location:login.php");
	}
	include "../connection.php";
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
					<div class="panel-title">Add New Lecture</div>
				</div>

				<div class="panel-body">
					<form id="form_lecture" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
						<input type="hidden" name="text_lecture_id">
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Lecture Order</span>
							<input id="text_lecture_order" type="text" class="form-control" name="text_lecture_order">
						</div> 
						<div style="margin-bottom: 25px;" class="input-group">
							<span class="input-group-addon">Sub Category</span>
							<select id="sub_category_id" name="sub_category_id" class="form-control">
								<option value="">-- Choose a Sub Category --</option>
								<?php 
									$qtc = mysqli_query($con, "select * from table_sub_category order by sub_category_order desc");
									while ($row = $qtc->fetch_assoc()) {
										echo '<option value="'.$row["sub_category_id"].'">'.$row["sub_category_name"].'</option>';
									}
								 ?>
							</select>
						</div> 
						<div style="margin-bottom: 25px;" class="input-group">
							Lecture Content<br/>
							<textarea class="form-control ckeditor" name="editor" id="text_lecture_content"></textarea>
						</div> 
						<div style="margin-top: 10px;" class="form-group">
							<div class="col-sm-12 controls">
								<?php 
									
									echo '<input type="submit" id="btn_save" name="btn_save" class="btn btn-info btn-block btn-large" value="Save">';
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
				if ($('#text_lecture_content').val() == '') {
					$('#text_lecture_content').css("border-color", "#DA190B");
					$('#text_lecture_content').css("background", "#F2DEDE");
					e.preventDefault();
				}
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
					$('form_lecture').unbind('submit').submit();
				}
			});
		});
	</script>
<!-- footer area starts here -->
<?php include "footer.php"; ?>