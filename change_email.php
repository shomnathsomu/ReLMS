<?php 
    session_start();
    include "connection.php";
    $msg = "";
    if(isset($_POST["btn_email"])){
        if($_POST["email"]!=$_POST["new_email"]){
            $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Email isn\'t matched.</div>';
        }
        else{
            $qr = mysqli_query($con, "update table_user set email='".mres($con, $_POST["email"])."' where user_id='".mres($con, $_SESSION["user_id"])."'");
            if($qr){
                $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Email has been changed.</div>';
            }
            else{
                $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Email hasn\'t been changed.</div>';
            }

        }
    }
 ?>
<?php include"header.php"; ?>

    <div class="row">
        <div class="container">
            <div style="margin-top: 50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                
                <!-- username panel starts here -->
                <?php echo $msg; ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Change email</div>
                    </div>
                    <div class="panel-body">
                        <form id="form_email" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">New email</span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="new email">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Retype new email</span>
                                <input id="new_email" type="email" class="form-control" name="new_email" placeholder="Retype new email">
                            </div>
                            <span id="msg"></span>
                            <div style="margin-top: 10px;" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" id="btn_email" name="btn_email" class="btn btn-info btn-block btn-large" value="Change">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include"footer.php"; ?>
        <script>
            $(document).ready(function(){
                $("#btn_email").click(function(e){
                    if ($('#email').val() == '') {
                        $('#email').css("border-color", "#DA190B");
                        $('#email').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#new_email').val() == '') {
                        $('#new_email').css("border-color", "#DA190B");
                        $('#new_email').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    else {
                        $('form_email').unbind('submit').submit();
                    }
                });
            });
        </script>
	</body>
</html>