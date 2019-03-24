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
			<?php
				if(isset($_POST["btn_exam"])){
					$total = 0;
					echo "<h3>Result</h3>";
					$count = 0;
					$qa = mysqli_query($con, "select * from table_exam where category_id='".$_GET["exam_id"]."'");
					echo '<table class="table table-bordered table-hover">';
					echo '<thead><tr><th>#</th><th>Your Answer</th><th>Correct Answer</th><th>Result</th></tr></thead>';
					echo '<tbody>';
					while($row = mysqli_fetch_array($qa, MYSQLI_ASSOC)) { 
						$count++;
						if($_POST["r_".$count] == $row["answer"]){
							$total++;
							echo "<tr class='success'><td>".$count."</td><td>".$_POST["r_".$count]."</td><td>".$row["answer"]."<td><span class='glyphicon glyphicon-ok text-success' aria-hidden='true'></span> </td></tr>";
						}
						else{
							echo "<tr class='danger'><td>".$count."</td><td>".$_POST["r_".$count]."</td><td>".$row["answer"]."<td><span class='glyphicon glyphicon-remove text-danger' aria-hidden='true'></span> </td></tr>";
						}
					}
					echo '</tbody></table>';
					if (($total/$count) >= 0.5) {
						echo '<div class="alert alert-success"><h3>You have passed</h3></div>';
					}
					else{
						echo '<div class="alert alert-danger"><h3>You have failed!! <small>You must correct at least 50%</small></h3></div>';
					}
				}
			 ?>
			<h3>Examination</h3>
            <form id="form_exam" action='<?php echo $_SERVER["PHP_SELF"]."?exam_id=".$exam_id; ?>' method="post">
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