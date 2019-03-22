<?php 
    session_start();
    include "connection.php";
    $msg = "";
    if(isset($_POST["btn_password"])){
        if($_POST["password"]!=$_POST["new_password"]){
            $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Password isn\'t matched.</div>';
        }
        else{
            $qr = mysqli_query($con, "update table_user set password='".mres($con, md5($_POST["password"]))."' where user_id='".mres($con, $_SESSION["user_id"])."'");
            if($qr){
                $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Password has been changed.</div>';
            }
            else{
                $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Password hasn\'t been changed.</div>';
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
                        <div class="panel-title">Change Password</div>
                    </div>
                    <div class="panel-body">
                        <form id="form_change_password" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">New password</span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="new password">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Retype new Password</span>
                                <input id="new_password" type="password" class="form-control" name="new_password" placeholder="retype new password">
                            </div>
                            <span id="msg"></span>
                            <div style="margin-top: 10px;" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" id="btn_password" name="btn_password" class="btn btn-info btn-block btn-large" value="Change">
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
                $("#btn_password").click(function(e){
                    if ($('#password').val() == '') {
                        $('#password').css("border-color", "#DA190B");
                        $('#password').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#new_password').val() == '') {
                        $('#new_password').css("border-color", "#DA190B");
                        $('#new_password').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    else {
                        $('form_change_password').unbind('submit').submit();
                    }
                });
            });
        </script>
	</body>
</html>