<?php 
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("location:login.php");
	}
	include "connection.php";
	$exam_id="";
	$category_name="";
	if (isset($_GET["exam_id"])) {
        $exam_id=mres($con, $_GET["exam_id"]);
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
							$qc = mysqli_query($con, "select category_name, category_image from table_category where category_id='".$exam_id."'");
							$rc = mysqli_fetch_array($qc, MYSQLI_NUM);
							echo "<h4>".$rc[0]."</h4>";
							echo "<img src='images/lectures/".$rc[1]."' class='img-responsive' style='display: block; margin-left: auto; margin-right: auto; padding-bottom: 15px; height: 200px; width: 150px;' />";
						 ?>
					</a>
				</li>
			</ul>
		</div>
		<div class="col-lg-9 col-md-9">
			<h3>Examination</h3>
            <form id="form_exam" action='<?php echo $_SERVER["PHP_SELF"]; ?>' method="post">
                <?php
                    $ql = mysqli_query($con, "select * from table_exam where category_id='".$exam_id."'");
                    $count = 0;
                    while($row = $ql->fetch_assoc()){
                        $count++;
                        echo "<p>".$row["exam_content"]."</p>";
                        echo "<ul style='list-style-type: none;'>";
                        echo '<li><input type="radio" name="r_'.$count.'" value="a"/> '.$row["a"].'</li>';
                        echo '<li><input type="radio" name="r_'.$count.'" value="b"/> '.$row["b"].'</li>';
                        echo '<li><input type="radio" name="r_'.$count.'" value="c"/> '.$row["c"].'</li>';
                        echo '<li><input type="radio" name="r_'.$count.'" value="d"/> '.$row["d"].'</li>';
                        echo "</ul>";
                    }
                ?>
                <input type="submit" name="btn_exam" id="btn_exam" value="Finish" class="btn btn-success" />
                <br /><br />
            </form>
		</div>
	</div>

	<?php include"footer.php"; ?>
	</body>
</html>