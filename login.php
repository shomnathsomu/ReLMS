<?php 
    session_start();
    include "connection.php";
    $msg = "";
    if(isset($_POST["btn_login"])){
        $qr = mysqli_query($con, "select * from table_user where user_name='".mres($con, $_POST["user_name"])."' and password='".mres($con, md5($_POST["password"]))."'");
        if(mysqli_num_rows($qr) == 0){
            $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Sorry!! Username or password is incorrect.</div>';
        }
        else{
            $_SESSION["user_name"] = mres($con, $_POST["user_name"]);
            header("location:index.php");
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
                        <div class="panel-title">Login</div>
                    </div>
                    <div class="panel-body">
                        <form id="form_login" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Username</span>
                                <input id="user_name" type="text" class="form-control" name="user_name" placeholder="username">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Password</span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <span id="msg"></span>
                            <div style="margin-top: 10px;" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" id="btn_login" name="btn_login" class="btn btn-info btn-block btn-large" value="Login">
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
                $("#btn_login").click(function(e){
                    if ($('#user_name').val() == '') {
                        $('#user_name').css("border-color", "#DA190B");
                        $('#user_name').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#password').val() == '') {
                        $('#password').css("border-color", "#DA190B");
                        $('#password').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    else {
                        $('form_login').unbind('submit').submit();
                    }
                });
            });
        </script>
	</body>
</html>