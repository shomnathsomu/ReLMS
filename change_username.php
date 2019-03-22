<?php 
    session_start();
    include "connection.php";
    $msg = "";
    if(isset($_POST["btn_change"])){
        $qr = mysqli_query($con, "update table_user set user_name='".mres($con, $_POST["user_name"])."' where user_id='".mres($con,$_SESSION["user_id"])."'");
        if($qr){
            $_SESSION["user_name"] = mres($con, $_POST["user_name"]);
            $msg = '<div id="login-alert" class="alert alert-success col-sm-12">The username has been changed.</div>';
        }
        else{
            $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">The username hasn\'t been changed.</div>';
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
                        <div class="panel-title">Change Username</div>
                    </div>
                    <div class="panel-body">
                        <form id="form_change_username" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">New Username</span>
                                <input id="user_name" type="text" class="form-control" name="user_name" placeholder="New username">
                            </div>
                            <div style="margin-top: 10px;" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" id="btn_change" name="btn_change" class="btn btn-info btn-block btn-large" value="Change">
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
                $("#btn_change").click(function(e){
                    if ($('#user_name').val() == '') {
                        $('#user_name').css("border-color", "#DA190B");
                        $('#user_name').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    else {
                        $('form_change_username').unbind('submit').submit();
                    }
                });
            });
        </script>
	</body>
</html>