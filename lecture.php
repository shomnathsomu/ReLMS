<?php 
	include "connection.php";

	$id="";
	$category_name="";
	if (isset($_GET["id"])) {
		$id=mres($con, $_GET["id"]);
	}
	else {
		header("Location:index.php");
	}
 ?>
<?php include"header.php"; ?>

	<div class="row" style="padding-bottom: 10px;">
		<div class="col-lg-3 col-md-3" style="padding-left: 0px;">
			<ul class="nav nav-pills nav-stacked">
				<li class="active">
					<a href="#" style="text-align:center;">
						<?php 
							$qc = mysqli_query($con, "select category_name, category_image from table_category where category_id='".$id."'");
							$rc = mysqli_fetch_array($qc, MYSQLI_NUM);
							echo "<h4>".$rc[0]."</h4>";
							echo "<img src='images/lectures/".$rc[1]."' class='img-responsive' style='display: block; margin-left: auto; margin-right: auto; padding-bottom: 15px; height: 200px; width: 150px;' />";
						 ?>
					</a>
				</li>

				<?php 
					$ql=mysqli_query($con, "select * from table_sub_category where category_id='".$id."' order by sub_category_id asc");
					while ($row = $ql->fetch_assoc()) {
						echo '<li><a href="?id='.$id.'&sub_category_id='.$row["sub_category_id"].'">'.$row["sub_category_name"].'</a></li>';
					}
				?>
			</ul>
		</div>
		<div class="col-lg-9 col-md-9">
			<?php
				if(isset($_GET["sub_category_id"])){
					$ql = mysqli_query($con, "select * from table_lecture where sub_category_id='".$_GET["sub_category_id"]."'");
				}else{
					$ql = mysqli_query($con, "select * from table_lecture inner join table_sub_category on table_lecture.sub_category_id = table_sub_category.sub_category_id where table_sub_category.category_id='".$id."' and table_sub_category.sub_category_order=1");
				}
				while($row = $ql->fetch_assoc()){
					echo $row["lecture_content"];
				}
			?>
		</div>
	</div>

	<?php include"footer.php"; ?>
	</body>
</html>