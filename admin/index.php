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
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			
		</div>
	</div>
	
<!-- footer area starts here -->
<?php include "footer.php"; ?>